<?php
require_once "Nhanvien.php";

$nv = new Nhanvien();
if(isset($_POST['add']))
    $nv ->insert($_POST['hoten'], $_POST['mapb']);

if(isset($_POST['update']))
    $nv ->update($_POST['manv'], $_POST['hoten'], $_POST['mapb']);



if(isset($_POST['delete']))
    $nv ->delete($_POST['delete']);


$edit = isset($_GET['edit']) ? $nv->getById($_GET['edit']) :null;
$list = $nv->getAll();

?>