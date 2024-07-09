<?php
session_start();

if (isset($_SESSION['access_level'])) {
    if ($_SESSION['access_level'] == 'Admin') {
        header("Location: Admin.php");
    } elseif ($_SESSION['access_level'] == 'Student') {
        header("Location: Student.php");
    } else {
        header("Location: Start.php");
    }
} else {
    header("Location: Start.php");
}
exit();
?>
