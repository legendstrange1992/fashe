<?php
class database {
    protected $host = 'localhost';
    protected $user = 'root';
    protected $password = '';
    protected $db_name = 'divisima';
    protected $ketnoi = '';
    public function __construct()
    {
        $this->ketnoi = mysqli_connect($this->host,$this->user,$this->password,$this->db_name);
        if($this->ketnoi){
            mysqli_set_charset($this->ketnoi,"utf8");
        }
        else{
            echo "ket noi khong thanh cong";
        }
    }
}

?>