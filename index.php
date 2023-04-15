<?php
require_once 'partials/header.php';
require_once 'handler/students.php';
$students = getAllStudents();
?>
    <div class="container">
        <div class="row">
            <div class="col-md-12 m-1">
                <h1>ALL student</h1>
                <p>Here is a list of all the categories</p>
                <a href=<?= URL ?>create.php class='btn btn-primary m-1 '>Add New student</a>
                <?php if (isset($_SESSION['success'])): ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $_SESSION['success']; ?>
                    </div>
                    <?php unset($_SESSION['success']); ?>
                <?php endif; ?>
                <table class='table'>
                    <thead class='thead-dark'>
                    <tr>
                        <th scope='col'>#</th>
                        <th scope='col'>name</th>
                        <th scope='col'>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php foreach ($students

                        as $student): ?>

                        <th scope='row'><?php echo $student['id'] ?></th>
                        <td><?php echo $student['name'] ?></td>
                        <td>
                            <a href="<?= URL ?>edit.php?id=<?php echo $student['id'] ?>"
                               class='btn btn-primary m-1 '>Edit</a>
                            <a href="<?= URL ?>delete.php?id=<?php echo $student['id'] ?>"
                               class='btn btn-danger m-1 '>Delete</a>
                            <a href="<?= URL ?>show.php?id=<?php echo $student['id'] ?>"
                               class='btn btn-success m-1 '>Show</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php
require_once 'partials/footer.php';
?>