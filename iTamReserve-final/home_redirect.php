<?php
session_start();

if (isset($_SESSION['user_level'])) {
    if ($_SESSION['user_level'] == 'Admin') {
        header("Location: Admin.php");
    } elseif ($_SESSION['user_level'] == 'Student') {
        header("Location: Student.php");
    } else {
        header("Location: Start.php");
    }
} else {
    header("Location: Start.php");
}
exit();
?>
