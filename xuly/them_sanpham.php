<?php
include "../Model/database.php";
include "../Model/M_Sanpham.php";
define ('SITE_ROOT', realpath(dirname(__FILE__)));
if(isset($_POST['ok'])){
    $tensanpham = $_POST['tensanpham'];
    $dongia = $_POST['dongia'];
    $mota = $_POST['mota'];
    $file_name = $_FILES['file_upload']['name'];
    $file_type = $_FILES['file_upload']['type'];
    $file_size = $_FILES['file_upload']['size'];
    $file_temp = $_FILES['file_upload']['tmp_name'];

    $destination = $_SERVER['DOCUMENT_ROOT'] . '/fashe/img/product/' .$file_name;
    move_uploaded_file($file_temp,$destination);
    $sanpham = new Sanpham();
    $sanpham->ADD($tensanpham,$dongia,$file_name,$mota);
    header('Location:http://localhost/fashe/quanly_sanpham.php');
}


?>