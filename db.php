<?php

class Db 
{
    protected $conn; // khai báo thuộc tính biến của class
                     // $conn biến dùng để lưu kết nối CSDL
                     // Bảo mật kết nối

    public function __construct() //Hàm khởi tạo
    {
        //Kết nối CSDL
        $this->conn = new mysqli("localhost", "root", "", "db_t2c4");
        
        //Thiết lập bảng mã tiếng việt
        $this->conn->set_charset("utf8");
    }
}

?>
