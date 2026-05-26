<?php 
require_once '../config/database.php';
require_once '../include/header.php'; 
?>

<?php
$data = $conn->query("SELECT * FROM buku");
?>

<h3>Daftar Buku</h3>
<a href="create.php" class="btn btn-primary mb-3">Tambah Buku</a>
<table class="table table-bordered">
    <tr><th>Judul</th><th>Aksi</th></tr>
    <?php while($row = $data->fetch_assoc()): ?>
    <tr>
        <td><?= $row['judul'] ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id_buku'] ?>" class="btn btn-warning">Edit</a>
            <a href="delete.php?id=<?= $row['id_buku'] ?>" class="btn btn-danger">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<?php require_once '../include/footer.php'; ?>