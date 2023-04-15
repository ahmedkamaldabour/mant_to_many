<?php

require_once ROOT . 'inc/db.php';

function getAllStudents()
{
    $conn = getConnection();
    $sql = "SELECT * FROM `students`";
    $result = mysqli_query($conn, $sql);
    $data = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            $data[] = $row;
        }
    }
    $conn->close();
    return $data;
}


// 1
// teacher_id = [1 , 2 , 3]

function createStudent($name, $teacher_id)
{
    // validate the name
    $r = validateName($name);
    if (count($r) > 0) {
        $_SESSION['errors'] = $r;
        header('Location: ' . URL . 'create.php');
        die();
    }
    $conn = getConnection();
    // add the student name in students table
    $sql = "INSERT INTO `students` (`name`) VALUES ('$name')";
    $result = mysqli_query($conn, $sql);
    // get the id of the student
    $student_id = mysqli_insert_id($conn);
    // add the student id and the ids of the teachers in the student_teacher table
    foreach ($teacher_id as $id) {
        $sql = "INSERT INTO `student_teacher` (`student_id`, `teacher_id`) VALUES ('$student_id', '$id')";
        $result = mysqli_query($conn, $sql);
    }
    $conn->close();
    header('Location: ' . URL);
    die();
}

function deleteStudent($id)
{
    if (isset($id) && !empty($id) && is_numeric($id) && $id > 0) {
        // check if the id exists in the database
        $conn = getConnection();
        $sql = "SELECT * FROM `students` WHERE id = '$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            // detele the student relation with the teacher in the student_teacher table
//            $sql = "DELETE FROM `student_teacher` WHERE student_id = '$id'";
//            $del = mysqli_query($conn, $sql);
            // delete the student from the students table
            $sql = "DELETE FROM `students` WHERE id = '$id'";
            $del = mysqli_query($conn, $sql);
            if ($del) {
                mysqli_close($conn);
                $_SESSION['success'] = 'student deleted successfully';
                header('Location:' . URL);
                exit;
            } else {
                die('Error: ' . mysqli_error($conn));
            }
        } else {
            die('Invalid ID');
        }
    } else {
        die('Invalid ID');
    }
}


// function to validate the name
function validateName($name)
{
    $errors = [];
    if (empty($name)) {
        $errors[] = 'Name is required';
    }
    $conn = getConnection();
    $sql = "SELECT * FROM `students` WHERE `name`='$name'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $errors[] = 'Name is already taken';
        return $errors;
    }
    $conn->close();
    if (strlen($name) < 3) {
        $errors[] = 'Name must be at least 3 characters';
    }
    if (strlen($name) > 50) {
        $errors[] = 'Name must be less than 50 characters';
    }
    // if not string
    if (!is_string($name)) {
        $errors[] = 'Name must be a string';
    }

    return $errors;

}


// get the student from the database by id

function getStudent($id)
{
    $conn = getConnection();
    $sql = "SELECT * FROM `students` WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $data = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    $conn->close();
    return $data;
}