<?php
session_start();

if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] == 'Admin') {
        header("Location: Admin.php");
    } elseif ($_SESSION['role'] == 'Student') {
        header("Location: Student.php");
    } else {
        header("Location: Start.php");
    }
} else {
    header("Location: Start.php");
}
exit();
?>
