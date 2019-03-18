<?php
	session_start();
	if(isset($_GET['id_sanpham']) && isset($_GET['soluong'])){
		include "../Model/database.php";
		include "../Model/M_Sanpham.php";
		$id_sanpham = $_GET['id_sanpham'];
		$soluong = $_GET['soluong'];
		$sanpham = new Sanpham();
		$data = $sanpham->get_sanpham_theo_id_sanpham($id_sanpham);
		
		if(empty($_SESSION['giohang']))
		{
			$_SESSION['giohang'][$id_sanpham] = array(  // $cart[2] = array()
				'id_sanpham' => $data['id_sanpham'],
				'tensanpham' => $data['tensanpham'],
				'dongia' => $data['dongia'],
				'hinh' => $data['hinh'],
				'soluong' => $soluong,
				'thanhtien' => $data['dongia']
			);
		}
		else{
			if(array_key_exists($id_sanpham, $_SESSION['giohang'])){
				$sl = $_SESSION['giohang'][$id_sanpham]['soluong']+=$soluong;
				$dongia = $_SESSION['giohang'][$id_sanpham]['dongia'];
				$_SESSION['giohang'][$id_sanpham]['thanhtien'] = $sl * $dongia; 
			}
			else
			{
				$_SESSION['giohang'][$id_sanpham] = array(  // $cart[2] = array()
				'id_sanpham' => $data['id_sanpham'],
				'tensanpham' => $data['tensanpham'],
				'dongia' => $data['dongia'],
				'hinh' => $data['hinh'],
				'soluong' => $soluong,
				'thanhtien' => $data['dongia']
				);
			}
		}
		//echo '<pre>';
		//print_r($_SESSION['giohang']);
        $count = count($_SESSION['giohang']);
        $data[0] = $count;
        $data[1] = $_SESSION['giohang'];
		echo json_encode($data);
	}

 ?>
 