<?php

require_once ROOT . 'inc/db.php';



function getAllTeachers()
{
    $conn = getConnection();
    $sql = "SELECT * FROM `teachers`";
    $result = mysqli_query($conn, $sql);
    $teachers = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $teachers[] = $row;
        }
    }
    $conn->close();
    return $teachers;
}

// getTeachersByStudent

function getTeachersByStudent($student_id)
{
    $conn = getConnection();
    $sql = "SELECT * FROM `teachers` WHERE `id` IN 
                               (SELECT `teacher_id` FROM `student_teacher` WHERE `student_id` = '$student_id')";
    $result = mysqli_query($conn, $sql);
    $teachers = [];
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $teachers[] = $row;
        }
    }
    $conn->close();
    return $teachers;
}