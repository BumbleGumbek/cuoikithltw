<?php

require_once "Db.php"; // Nạp file Db.php để sử dụng class Db

class Nhanvien extends Db {

    function getAll() //Lấy tất cả nhân viên
    {
        return $this->conn->query
        (
            "SELECT nv.manv, nv.hoten, pb.tenpb
                    FROM nhanvien nv 
                    JOIN phongban pb 
                    ON nv.mapb = pb.mapb"
        );
    }


    function getById($id) //Lấy nhân viên theo mã
    {
        return $this->conn->query
        (
            "SELECT * FROM nhanvien 
                    WHERE manv = $id"
        )
        ->fetch_assoc(); //lấy 1 dòng duy nhất dạng mảng
    }

    function getNextId()  // Tạo mã nhân viên tự động
    {
        $r = $this->conn->query
        (
            "SELECT MAX(manv) m FROM nhanvien"
        )
        ->fetch_assoc();
        return $r['m'] + 1;
    }

    function insert($hoten, $mapb) 
    {
        $id = $this->getNextId(); //Gọi hàm tạo mã tự động
        return $this->conn->query
        (
            "INSERT INTO nhanvien VALUES($id,'$hoten',$mapb)"
        );
    }

    function update($id, $hoten, $mapb) 
    {
        return $this->conn->query
        (
            "UPDATE nhanvien --Bảng nào
                    SET hoten='$hoten', mapb=$mapb -- Cột nào = giá trị nào
                    WHERE manv=$id" // Điều kiện
        );
    }

    function delete($id) 
    {
        return $this->conn->query
        (
            "DELETE FROM nhanvien 
                    WHERE manv=$id"
        );
    }
}
