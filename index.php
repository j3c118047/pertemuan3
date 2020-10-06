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
        <h2>Daftar Mahasiswa</h2>
        

        <hr>
        <a href="tambah.php"><p style="text-align:right">Tambah</p></a>
        <table class="table table-striped table-hover table-sm table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>No.</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Jenis Kelamin</th>
                    <th>Agama</th>
                    <th>Olahraga Favorit</th>
                    <th>File Upload</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "koneksi.php";
                //query ke database SELECT tabel mahasiswa
                $sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY id ASC") or die(mysqli_error($koneksi));
                //jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
                if (mysqli_num_rows($sql) > 0) {
                    //membuat variabel $no untuk menyimpan nomor urut
                    $no = 1;
                    //melakukan perulangan while dengan dari dari query $sql
                    while ($data = mysqli_fetch_assoc($sql)) {
                        //menampilkan data perulangan
                        echo '
						<tr>
							<td>' . $no . '</td>
							<td>' . $data['nim'] . '</td>
							<td>' . $data['nama'] . '</td>
							<td>' . $data['jenis_kelamin'] . '</td>
                            <td>' . $data['agama'] . '</td>
                            <td>' . $data['olahraga'] . '</td>
                            <td><center><img src=' . "file/" . $data['nama_file'] . ' width="70px"></td>
							<td>
								<a href="edit.php?id=' . $data['id'] . '" class="badge badge-warning">Edit</a>
								<a href="delete.php?id=' . $data['id'] . '" class="badge badge-danger" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
						</tr>
						';
                        $no++;
                    }
                    //jika query menghasilkan nilai 0
                } else {
                    echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
                }
                ?>
            <tbody>
        </table>

    </div>
  </div>
</div>
	 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>