<?php
	class Donhang extends Database
	{
		public function ADD($tenkhachhang,$diachi,$dienthoai,$email,$ngaydathang,$tongtien){
            $data = mysqli_query($this->ketnoi,"select * from donhang ORDER BY id_donhang DESC limit 1");
            if(mysqli_num_rows($data) == 0){
                $sql  = "insert into donhang values(1,'$tenkhachhang','$diachi','$dienthoai','$email','$ngaydathang',$tongtien)";
                mysqli_query($this->ketnoi,$sql);
            }
            else{
                $sql  = "insert into donhang(tenkhachhang,diachi,dienthoai,email,ngaydathang,tongtien) values('$tenkhachhang','$diachi','$dienthoai','$email','$ngaydathang',$tongtien)";
                mysqli_query($this->ketnoi,$sql);
            }
            return 'success';
        }
        public function Get_Donhang_Top(){
            $data = mysqli_query($this->ketnoi,"select * from donhang order by id_donhang desc limit 1");
            $row = mysqli_fetch_assoc($data);
            return $row;
        }
        public function Get_All(){
            $result = mysqli_query($this->ketnoi,"select * from donhang");
            $data = [];
            while($row = mysqli_fetch_assoc($result)){
                $data[] = $row;
            }
            return $data;
        }
	}
 ?>