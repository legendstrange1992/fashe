<?php
include "../Model/database.php";
include "../Model/M_Sanpham.php";
if(isset($_GET['id_sanpham'])){
    $id_sanpham = $_GET['id_sanpham'];
    $sanpham = new Sanpham();
    $sanpham->Delete_Sanpham_By_ID($id_sanpham);
    header('Location:http://localhost/fashe/quanly_sanpham.php');
}


?>