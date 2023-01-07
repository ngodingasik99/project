<?php include 'layout/header.php'; 
      include 'action/action.php';
?>
	<div class="container mt-2">
          <div class="card">
            <div class="card-body">
            <?php
            $a = mysqli_fetch_array(edittampil($_GET['id']));
            ?>
              <form action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label for="formGroupExampleInput" class="form-label">Project Name</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" name="projectname" 
                    value="<?= $a['project_name']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2" class="form-label">Client</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="client"
                    value="<?= $a['client']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="nama"
                    value="<?= $a['nama']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2" class="form-label">Email</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="email"
                    value="<?= $a['email']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="formGroupExampleInput2" name="gambar"
                    value="<?= $a['foto']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2" class="form-label">Start Date</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="startdate"
                    value="<?= $a['startdate']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2" class="form-label">End Date</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="enddate"
                    value="<?= $a['enddate']; ?>">
                  </div>
                  <div class="form-group">
                    <label for="formGroupExampleInput2" class="form-label">Progres</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2" name="progres"
                    value="<?= $a['progres']; ?>">
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
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $progres = $_POST['progres'];

    if ($nama_file == "") {
        $update = editAction($projectname, $client, $nama, $email, $startdate, $enddate, $progres, $_GET['id']);
        if ($update) {
          echo "<script>alert('Data T Berhasil Diupdate'); window.location.href='monitoring.php'</script>";
        } else {
          echo "<script>alert('Data T Gagal Diupdate'); window.location.href='monitoring.php'</script>";
        }        
    }     
    else {
    if ($ukuranfile >= 5000000) {
        echo "<script>alert('Ukuran Terlalu Besar'); window.location.href='monitoring.php'</script>";
    } elseif ($type != "image/png") {
        echo "<script>alert('type salah'); window.location.href='monitoring.php'</script>";
    } else {
    move_uploaded_file($_FILES['tmp_name']['gambar'], './image/'.$nama_file);
    $update = editActionT($projectname, $client, $nama, $email, $nama_file, $startdate, $enddate, $progres, $_GET['id']);
        if ($update) {
        echo "<script>alert('Data Berhasil Diupdate'); window.location.href='monitoring.php'</script>";
        } else {
        echo "<script>alert('Data Gagal Diupdate'); window.location.href='monitoring.php'</script>";
        }
        
    }
  
}
  
}

include 'layout/footer.php'; ?>