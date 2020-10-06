<?php include('koneksi.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pertemuan 3</title>
	<link rel="stylesheet" href="../style.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

	<script>
		$(document).ready(function(){
			$(".hamburger").click(function(){
			   $(".wrapper").toggleClass("collapse");
			});
		});
	</script>
</head>
<body style="background: #f2e1eb">

<div class="wrapper">
  <div class="top_navbar">
    <div class="hamburger">
       <div class="one"></div>
       <div class="two"></div>
       <div class="three"></div>
    </div>
    <div class="top_menu">
      <div class="logo">Maria Widhi Astuti - J3C118047</div>
      
    </div>
  </div>
  
  <div class="sidebar">
      <ul>
	  	<li><a href="../p1/aritmatika4.php">
          <span class="icon"><i class="fas fa-book"></i></span>
          <span class="title">Pertemuan 1</span></a></li>
        <li><a href=".../p2/tampil_data.php" >
          <span class="icon"><i class="fas fa-book"></i></span>
          <span class="title">Pertemuan 2</span>
          </a></li>
        <li><a href="../p3/index.php" class="active">
          <span class="icon"><i class="fas fa-book"></i></span>
          <span class="title">Pertemuan 3</span>
          </a></li>
        <!-- <li><a href="#">
          <span class="icon"><i class="fas fa-book"></i></span>
          <span class="title">Pertemuan 4</span>
          </a></li>
        <li><a href="#">
          <span class="icon"><i class="fas fa-book"></i></span>
          <span class="title">Pertemuan 5</span>
          </a></li>
        <li><a href="#">
          <span class="icon"><i class="fas fa-book"></i></span>
          <span class="title">Pertemuan 6</span>
          </a></li>
        <li><a href="#">
          <span class="icon"><i class="fas fa-book"></i></span>
          <span class="title">Pertemuan 7</span> -->
          </a></li>
    </ul>
  </div>
  
  <div class="main_container">
  <div class="container" style="margin-top:20px">
		<h2>Edit Mahasiswa</h2>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if (isset($_GET['id'])) {
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id = $_GET['id'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id='$id'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if (mysqli_num_rows($select) == 0) {
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
				//jika hasil query > 0
			} else {
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if (isset($_POST['submit'])) {
			$nama			= $_POST['nama'];
			$jenis_kelamin	= $_POST['jenis_kelamin'];
			$agama			= $_POST['agama'];
			$olahraga		= $_POST['olahraga'];

			$sql = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', jenis_kelamin='$jenis_kelamin', agama='$agama', olahraga='$olahraga' WHERE id='$id'") or die(mysqli_error($koneksi));

			if ($sql) {
				echo '<script>alert("Berhasil menyimpan data."); document.location="edit.php?id=' . $id . '";</script>';
			} else {
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="edit.php?id=<?php echo $id; ?>" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NIM</label>
				<div class="col-sm-10">
					<input type="text" name="nim" class="form-control" size="4" value="<?php echo $data['nim']; ?>" readonly required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Mahasiswa</label>
				<div class="col-sm-10">
					<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-10">
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jenis_kelamin" value="Laki-laki" <?php if ($data['jenis_kelamin'] == 'Laki-laki') {
																												echo 'checked';
																											} ?> required>
						<label class="form-check-label">Laki-laki</label>
					</div>
					<div class="form-check">
						<input type="radio" class="form-check-input" name="jenis_kelamin" value="Perempuan" <?php if ($data['jenis_kelamin'] == 'Perempuan') {
																												echo 'checked';
																											} ?> required>
						<label class="form-check-label">Perempuan</label>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Agama</label>
				<div class="col-sm-10">
					<input type="text" name="agama" class="form-control" value="<?php echo $data['agama']; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Olahraga</label>
				<div class="col-sm-10">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="olahraga" value="Badminton" <?php if ($data['olahraga'] == 'Badminton') {
																												echo 'checked';
																											} ?>>
						<label class="form-check-label">
							Badminton
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="olahraga" value="Futsal" <?php if ($data['olahraga'] == 'Futsal') {
																											echo 'checked';
																										} ?>>
						<label class="form-check-label">
							Futsal
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="olahraga" value="Sepeda" <?php if ($data['olahraga'] == 'Sepeda') {
																											echo 'checked';
																										} ?>>
						<label class="form-check-label">
							Sepeda
						</label>
					</div>
					<div class="form-check">
						<input class="form-check-input" type="checkbox" name="olahraga" value="Basket" <?php if ($data['olahraga'] == 'Basket') {
																											echo 'checked';
																										} ?>>
						<label class="form-check-label">
							Basket
						</label>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">File Upload</label>
				<div class="col-sm-10">
					<img src="<?php echo "file/" . $data['nama_file']; ?>" width="70px" disabled>
					<label class="form-check-label" disabled>Mohon maaf belom bisa update File Upload</label>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
					<a href="index.php" class="btn btn-warning">KEMBALI</a>
				</div>
			</div>
		</form>

	</div>
</div>
	 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>


