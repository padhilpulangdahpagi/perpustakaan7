<?php 
// Nggunakake absolute path supaya anti-error
require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/config/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/include/header.php';

// Ngambil ID saka URL
$id = $_GET['id'];

// Proses Update pas tombol simpan dipencet
if ($_POST) {
    $judul = $_POST['judul'];
    $conn->query("UPDATE buku SET judul = '$judul' WHERE id_buku = '$id'");
    header("Location: index.php");
    exit;
}

// Ngambil data buku sing arep diedit
$data = $conn->query("SELECT * FROM buku WHERE id_buku = '$id'")->fetch_assoc();
?>

<h3>Edit Buku</h3>
<form method="POST">
    <div class="mb-3">
        <label>Judul Buku</label>
        <input type="text" name="judul" class="form-control" value="<?= $data['judul'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="index.php" class="btn btn-secondary">Batal</a>
</form>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/include/footer.php'; ?>