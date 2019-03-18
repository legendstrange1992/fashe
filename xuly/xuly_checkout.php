<?php
    session_start();
    include "../Model/database.php";
    include "../Model/M_Donhang.php";
    include "../Model/M_Chitietdonhang.php";
    $fullname = $_GET['fullname'];
    $address = $_GET['address'];
    $email = $_GET['email'];
    $phone = $_GET['phone'];
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $ngaydathang =  date('d-m-Y h:i:s a');
    $total_cart = 0;
    foreach($_SESSION['giohang'] as $key => $value){
        $total_cart += $value['thanhtien'];
    }  
    $donhang = new Donhang();
    $donhang->ADD($fullname,$address,$phone,$email,$ngaydathang,$total_cart);
    $donhang_top = $donhang->Get_Donhang_Top();
    foreach($_SESSION['giohang'] as $key => $value){
        
        $ct = new Chitietdonhang();
        $ct->ADD($value['id_sanpham'],$value['hinh'],$value['tensanpham'],$value['soluong'],$value['dongia'],$value['thanhtien'],$donhang_top['id_donhang']);
    }
    unset($_SESSION['giohang']);
    echo 'success';


?>