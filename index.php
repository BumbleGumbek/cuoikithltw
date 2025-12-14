<?php

require_once "Nhanvien.php"; // Nạp file Nhanvien.php để sử dụng class Nhanvien

$nv = new Nhanvien(); // Tạo đối tượng từ class Nhanvien

if (isset($_POST['add']))
    $nv->insert($_POST['hoten'],$_POST['mapb']);

if (isset($_POST['update']))
    $nv->update($_POST['manv'],$_POST['hoten'],$_POST['mapb']);

if (isset($_GET['delete']))
    $nv->delete($_GET['delete']);

$edit = isset($_GET['edit']) ? $nv->getById($_GET['edit']) : null;

$list = $nv->getAll(); // Gọi hàm lấy tất cả nhân viên

?>


<h3>Thêm nhân viên</h3>
<form method="post">
<input name="hoten">
<input name="mapb">
<button name="add">Thêm</button>
</form>

<?php if($edit): ?>
    
<h3>Sửa</h3>
<form method="post">
<input type="hidden" name="manv" value="<?= $edit['manv'] ?>">
<input name="hoten" value="<?= $edit['hoten'] ?>">
<input name="mapb" value="<?= $edit['mapb'] ?>">
<button name="update">Cập nhật</button>
</form>
<?php endif; ?>

<hr>

<?php while($r=$list->fetch_assoc()): ?>
<?= $r['hoten'] ?>
<a href="?edit=<?= $r['manv'] ?>">Sửa</a>
<a href="?delete=<?= $r['manv'] ?>">Xóa</a>
<br>
<?php endwhile; ?>

