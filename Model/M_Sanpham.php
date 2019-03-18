<?php
class Sanpham extends database{ 

    public function get_all(){
        $sql = "select * from sanpham";
        $result = mysqli_query($this->ketnoi,$sql);
        $data = [];
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        return $data;
    }
    public function get_sanpham_theo_id_sanpham($id){
        $sql = "select * from sanpham where id_sanpham = $id";
        $result = mysqli_query($this->ketnoi,$sql);
        $data = mysqli_fetch_assoc($result);
        return $data;
    }
    public function Update_Sanpham_By_ID($id,$tensanpham,$dongia,$hinh,$mota){
        $sql = "update sanpham set tensanpham ='$tensanpham',dongia=$dongia,hinh='$hinh',mota='$mota' where id_sanpham = $id";
        mysqli_query($this->ketnoi,$sql);
        return "success";
    }
    public function ADD($tensanpham,$dongia,$hinh,$mota){
        $sql = "insert into sanpham(tensanpham,dongia,hinh,mota) values ('$tensanpham',$dongia,'$hinh','$mota')";
        mysqli_query($this->ketnoi,$sql);
    }
    public function Delete_Sanpham_By_ID($id){
        $sql = "delete from sanpham where id_sanpham =  $id";
        $data = mysqli_query($this->ketnoi,$sql);
        return "success";
    }
}

?>