<?php
    session_start();
    $array_new = $_GET['data'];
    $count = 0;
    $data = [];
    $id = [] ;
    $total = 0;
    foreach($_SESSION['giohang'] as $k => $v){
        $_SESSION['giohang'][$k]['soluong'] = $array_new[$count];
        $_SESSION['giohang'][$k]['thanhtien'] = $_SESSION['giohang'][$k]['soluong'] * $_SESSION['giohang'][$k]['dongia']; 
        $data[] = $_SESSION['giohang'][$k]['thanhtien'];
        $total += $_SESSION['giohang'][$k]['thanhtien'];
        $id[] = $k ;
        $count++;
    }
    $result[0] = $data;
    $result[1] = $total;
    $result[2] = $id;
    $result[3] = $_SESSION['giohang'];
    echo json_encode($result);

 ?>