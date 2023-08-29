<?php

session_start();
include 'common/connect.php';

$id = $_GET['b_id'];

$is_delete='1';
$time = strtotime('now');

$exe = $obj->query("update blog set is_delete='$is_delete',is_delete_time='$time' where b_id='$id'");

if ($exe) {
        # code...
       // move_uploaded_file($tmp, $path);
        echo "<script>alert('Blog removed successfully');window.location='m_blog.php';</script>";
    }
    else
    {
        echo "<script>alert('error');</script>";
    }
?>