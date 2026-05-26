<?php 
// Nggunakake $_SERVER['DOCUMENT_ROOT'] supaya langsung nembak ke folder htdocs
require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/config/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/perpustakaan/include/header.php';

$id = $_GET['id'];
if (isset($id)) {
    $conn->query("DELETE FROM buku WHERE id_buku = '$id'");
}
header("Location: index.php");
exit;
?>