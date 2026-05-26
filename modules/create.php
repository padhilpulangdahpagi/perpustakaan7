<?php 
// Path wis bener (munggah siji level)
require_once '../config/database.php'; 
require_once '../include/header.php'; 

if ($_POST) {
    $conn->query("INSERT INTO buku (judul) VALUES ('".$_POST['judul']."')");
    header("Location: index.php");
    exit; // Tambah exit ben aman
}
?>

<form method="POST">
    <input type="text" name="judul" class="form-control mb-2" placeholder="Judul Buku" required>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>

<?php require_once '../include/footer.php'; ?>