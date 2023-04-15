<?php
require_once 'partials/header.php';
require_once ROOT . 'handler/students.php';
require_once ROOT . 'handler/teachers.php';

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $teacher_id = $_POST['teacher_id'];
    createStudent($name, $teacher_id);
}

?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 m-1">
                <h1>Add New student</h1>
                <p>Form To ADD NEW Student</p>
                <a href='<?= URL ?>index.php' class='btn btn-primary mb-4 '> BACK TO ALL </a>

                <form method='post' action=''>
                    <div class='mb-3'>
                        <?php
                        if (isset($_SESSION['errors'])) {
                            $errors = $_SESSION['errors'];
                            foreach ($errors as $error) {
                                echo "<div class='alert alert-danger' role='alert'>$error</div>";
                            }
                            unset($_SESSION['errors']);
                        }
                        ?>
                        <label for='name' class='form-label'>NEW Student Name</label>
                        <input type='text' class='form-control' id='name' name='name' aria-describedby='emailHelp'>
                    </div>
                    <div class='mb-3'>
                        <label for='teacher_id' class='form-label'>Select Teacher</label>
                        <select class='form-select' name='teacher_id[]' multiple aria-label='multiple select example'>
                            <?php
                            $teachers = getAllTeachers();
                            foreach ($teachers as $teacher) {
                                echo "<option value='$teacher[id]'>$teacher[name]</option>";
                            }
                            ?>
                        </select>

                    </div>

                    <button type='submit' class='btn btn-primary'>ADD</button>
                </form>

            </div>
        </div>
    </div>
<?php
require_once 'partials/footer.php';
?>