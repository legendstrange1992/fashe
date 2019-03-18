<?php
	class Chitietdonhang extends Database
	{
		public function ADD($id_sanpham,$hinh,$tensanpham,$soluong,$dongia,$thanhtien,$id_donhang){
            $sql = "insert into chitietdonhang(id_sanpham,hinh,tensanpham,soluong,dongia,thanhtien,id_donhang) values 
            ($id_sanpham,'$hinh','$tensanpham',$soluong,$dongia,$thanhtien,$id_donhang)";
            mysqli_query($this->ketnoi,$sql);
            return 'success';
        }
        public function Get_Donhang_By_ID_donhang($id_donhang){
            $result = mysqli_query($this->ketnoi,"select * from chitietdonhang where id_donhang = $id_donhang");
            $data = [];
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
            return $data;
        }
	}
 ?>