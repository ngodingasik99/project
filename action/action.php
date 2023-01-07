<?php
function koneksi()
{
	$server = "localhost";
	$username = "root";
	$password = "";
	$database = "magang";

	$conn = mysqli_connect($server, $username, $password, $database);
	return $conn;
}
//tampil data
function tampil()
{
	$data = mysqli_query(koneksi(), "SELECT * from monitoring");
	return $data;
}

//tambah data
function tambah($projectname, $client, $nama, $email, $nama_file, $start, $end, $progres)
{
    return mysqli_query(koneksi(), "INSERT INTO monitoring VALUES (NULL, '$projectname', '$client', '$nama', '$email',
                                                                          '$nama_file', '$start', '$end', '$progres')");
}

//edit
function edittampil($id)
{
    $data = mysqli_query(koneksi(), "SELECT * FROM monitoring WHERE id_monitoring='$id'");
    return $data;
}

//edit action
function editAction($projectname, $client, $nama, $email, $startdate, $enddate, $progres, $id)
{
	$update = mysqli_query(koneksi(), "UPDATE monitoring SET project_name='$projectname', client='$client', nama='$nama', 
    email='$email', startdate='$startdate', enddate='$enddate', progres='$progres' where id_monitoring='$id'");
	return $update;
}
function editActionT($projectname, $client, $nama, $email, $nama_file, $startdate, $enddate, $progres, $id)
{
	$update = mysqli_query(koneksi(), "UPDATE monitoring SET project_name='$projectname', client='$client', nama='$nama', 
    email='$email', foto='$nama_file',  startdate='$startdate', enddate='$enddate', progres='$progres' where id_monitoring='$id'");
	return $update;
}

//hapus
function hapus($id)
{
	return mysqli_query(koneksi(), "DELETE FROM monitoring where id_monitoring='$id'");
}