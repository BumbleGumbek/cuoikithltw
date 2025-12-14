<?php
require_once"db.php";

class Nhanvien extends db
{
    function getAll()
    {
        return $this -> conn ->query
        ("select nv.manv, nv.hoten, pb.mapb
                from nhanvien nv
                join phongban pb
                on nv.mapb = pb.mapb"
        );
    }

    function getById($id)
    {
        return $this -> conn ->query
        ("select * from where manv = $id "
        )->fetch_assoc();
    }

    function getNextId()
    {
        $r = $this -> conn ->query
        ("select MAX(manv) m from nhanvien"
        )->fetch_assoc();
        return $r['m']+1;
    }

    function insert($hoten, $mapb)
    {
        $id = $this->getNextId();
        return $this -> conn ->query
        ("insert into nhanvien values($id, '$hoten',$mapb )"
        );
    }
    function update($id, $hoten, $mapb)
    {
        return $this -> conn ->query
        ("update Nhanvien
                set hoten='$hoten', mapb='$mapb'
                where manv = $id"
        );
    }
    function delete($id)
    {
        return $this -> conn ->query
        ("delete from nhanvien where manv=$id"
        );
    }

}


?>