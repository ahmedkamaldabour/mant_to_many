<?php
require_once 'partials/header.php';
require_once ROOT . 'handler/students.php';
require_once ROOT . 'handler/teachers.php';

$student_id = $_GET['id'];
$student = getStudent($student_id);
$student_name = $student[0]['name'];
$teachers = getTeachersByStudent($student_id);


?>
    <div class='container'>
        <div class='row'>
            <div class='col-md-12 m-1'>
                <a href="<?= URL ?>index.php" class='btn btn-primary m-1 '>Back</a>
                <h1><?php echo $student_name ?></h1>
                <h2>Teachers</h2>
                <ul>
                    <?php foreach ($teachers as $teacher): ?>
                        <li><?php echo $teacher['name'] .' ==> Teach ==> ' . $teacher['class_name'] ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
<?php
require_once 'partials/footer.php';
?>


