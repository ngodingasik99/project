<?php 

function koneksi()
{
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "komcyber";

	$conn = mysqli_connect($server, $username, $password, $database);
	return $conn;
}

//READ
function tampilvisi()
{
	return mysqli_query(koneksi(), "SELECT * FROM visi");
}
function tampilmedsos()
{
	return mysqli_query(koneksi(), "SELECT * FROM medsos");
}
function tampilproduct()
{
	return mysqli_query(koneksi(), "SELECT * FROM product");
}

function tampilAbout()
{
	return mysqli_query(koneksi(), "SELECT * FROM about");
}

function tampilmisi()
{
	return mysqli_query(koneksi(), "SELECT * FROM misi");
}

function tampiljumbotron()
{
	return mysqli_query(koneksi(), "SELECT * FROM jumbotron");
}

//CREATE
function tambahvisi($deskripsi)
{
	return mysqli_query(koneksi(), "INSERT INTO visi VALUES (NULL, '$deskripsi')");
}
function tambahmedsos($judul, $link)
{
	return mysqli_query(koneksi(), "INSERT INTO medsos VALUES (NULL, '$judul', '$link')");
}
function tambahproduct($gambar, $judul, $deskripsi)
{
	return mysqli_query(koneksi(), "INSERT INTO product VALUES (NULL, '$gambar', '$judul', '$deskripsi')");
}

function tambahAbout($gambar, $nama)
{
	return mysqli_query(koneksi(), "INSERT INTO about VALUES (NULL, '$gambar', '$nama')");
}
function tambahmisi($deskripsi)
{
	return mysqli_query(koneksi(), "INSERT INTO misi VALUES (NULL, '$deskripsi')");
}

function tambahjumbotron($gambar, $judul, $deskripsi)
{
	return mysqli_query(koneksi(), "INSERT INTO jumbotron VALUES (NULL, '$gambar', '$judul', '$deskripsi')");
}

//DELETE
function hapusvisi($id)
{
	return mysqli_query(koneksi(), "DELETE FROM visi where id='$id'");
}
function hapusmedsos($id)
{
	return mysqli_query(koneksi(), "DELETE FROM medsos where id='$id'");
}
function hapusproduct($id)
{
	return mysqli_query(koneksi(), "DELETE FROM product WHERE id='$id'");
}
function hapusAbout($id)
{
	return mysqli_query(koneksi(), "DELETE FROM about WHERE id='$id'");
}

function hapusmisi($id)
{
	return mysqli_query(koneksi(), "DELETE FROM misi WHERE id='$id'");
}


function hapusjumbotron($id)
{
	return mysqli_query(koneksi(), "DELETE FROM jumbotron WHERE id='$id'");
}

//UPDATE *
function editTampilV($id)
{
	$data = mysqli_query(koneksi(), "SELECT * FROM visi where id='$id'");
	return $data;
}
function editTampilM($id)
{
	$data = mysqli_query(koneksi(), "SELECT * FROM medsos where id='$id'");
	return $data;
}
function edittampilproduct($id)
{
	$data = mysqli_query(koneksi(), "SELECT * FROM product WHERE id='$id'");
	return $data;
}

function edittampilAbout($id)
{
	$data = mysqli_query(koneksi(), "SELECT * FROM about WHERE id='$id'");
	return $data;
}

function edittampilmisi($id)
{
	$data = mysqli_query(koneksi(), "SELECT * FROM misi WHERE id='$id'");
	return $data;
}

function editjumbotron($id)
{
	$data = mysqli_query(koneksi(), "SELECT * FROM jumbotron WHERE id='$id'");
	return $data;
}

//UPDATE ACTION
function editActionVisi($deskripsi, $id)
{
	$update = mysqli_query(koneksi(), "UPDATE visi SET deskripsi='$deskripsi' where id='$id'");
	return $update;
}
function editActionMedsos($judul, $link, $id)
{
	$update = mysqli_query(koneksi(), "UPDATE medsos SET judul='$judul', link='$link' where id='$id'");
	return $update;
}
function editActionP($gambar, $judul, $deskripsi, $id)	
{
	$update = mysqli_query(koneksi(), "UPDATE product SET gambar='$gambar', judul='$judul', deskripsi='$deskripsi' where id='$id'");
	return $update;
}
function editActionproduct($judul, $deskripsi, $id)
{
	$update = mysqli_query(koneksi(), "UPDATE product SET judul='$judul', deskripsi='$deskripsi' where id='$id'");
	return $update;
}

function editActionJ($gambar, $judul, $deskripsi, $id)
{
	$update = mysqli_query(koneksi(), "UPDATE jumbotron SET gambar='$gambar', judul='$judul', deskripsi='$deskripsi' where id='$id'");
	return $update;
}

function editActionJombo($judul, $deskripsi, $id)
{
	$update = mysqli_query(koneksi(), "UPDATE jumbotron SET judul='$judul', deskripsi='$deskripsi' where id='$id'");
	return $update;
}

function editActionAbout($gambar, $deskripsi, $id)
{
	$update = mysqli_query(koneksi(), "UPDATE about SET gambar='$gambar', deskripsi='$deskripsi' where id='$id'");
	return $update;
}

function editActionAboutD($deskripsi, $id)
{
	$update = mysqli_query(koneksi(), "UPDATE about SET deskripsi='$deskripsi' where id='$id'");
	return $update;
}

function editActionMisi($deskripsi, $id)
{
	$update = mysqli_query(koneksi(), "UPDATE misi SET deskripsi='$deskripsi' where id='$id'");
	return $update;
}

