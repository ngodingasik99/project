<?php include 'layout/header.php'; 
      include 'action/action.php';
?>
	<div class="container mt-2">
          <div class="card">
            <div class="card-body">
              <form action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="formGroupExampleInput" class="form-label">Project Name</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="projectname">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2" class="form-label">Client</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="client">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="nama">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2" class="form-label">Email</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="email">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="formGroupExampleInput2" name="gambar">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2" class="form-label">Start Date</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="start">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2" class="form-label">End Date</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="end">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2" class="form-label">Progres</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="progres">
                  </div><br>
                  <button class="btn btn-primary" name="submit">Simpan Data</button>
                  <a href="monitoring.php" class="btn btn-danger">Kembali</a>
              </form>
          </div>
        </div>
      </div>

<?php 
if (isset($_POST['submit'])) {
    
    $nama_file = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $type = $_FILES['gambar']['type'];
    $projectname = $_POST['projectname'];
    $client = $_POST['client'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $progres = $_POST['progres'];

    if ($ukuranfile >= 500000) {
        echo "<script>alert('Ukuran Terlalu Besar'); window.location.href='monitoring.php'</script>";
      }elseif($type != "image/png"){
        echo "<script>alert('Harus PNG'); window.location.href='monitoring.php'</script>";
      }else{
        move_uploaded_file( $_FILES['gambar']['tmp_name'], './image/'.$nama_file);
        $data = tambah($projectname, $client, $nama, $email, $nama_file, $start, $end, $progres);
        if ($data) {
          echo "<script>alert('Data Berhasil Disimpan'); window.location.href='monitoring.php'</script>";
          }

      }
  
}

include 'layout/footer.php'; ?>