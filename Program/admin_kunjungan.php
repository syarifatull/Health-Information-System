<?php
session_start();
if (empty($_SESSION['id_staff'])) {
    echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='index.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="styles.css" />
    <title>Dashboard Admin - Data Kunjungan Pasien</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-1 primary-text fs-4 fw-bold text-uppercase"><br><i
                    class="fas fa-user-md me-2"></i>Puskesmas</div>
			<div class="sidebar-heading text-center py-1 primary-text border-bottom"><i
                    class="#"></i><font size="4"><b><i>Dashboard Admin<br></br></i></b></font></div>
            <div class="list-group list-group-flush my-3">
                <a href="admin_kunjungan.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Data Kunjungan</a>
				<a href="admin_dokter.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Data Dokter</a>
				<a href="admin_umum.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Data Umum Pasien</a>
				<a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                        class="fas fa-power-off me-2"></i>Logout</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0">Data Kunjungan Pasien</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <i class="fas fa-user me-2"></i><b><?= $_SESSION['nama_staff'] ?></b>
                        </li>
                    </ul>
                </div>
            </nav>

			<div class="container-fluid px-4">
				<div class="row g-3 my-2">
				<div class="row my-5">
                    <h3 class="fs-4 mb-3">Registrasi Kunjungan Pasien</h3>
					<?php
						$dbCon = mysqli_connect("localhost", "root", "", "database_puskesmas");
						if(isset($_POST["update_data_kunjungan"])) {
							$sql = mysqli_query($dbCon, "SELECT * FROM data_kunjungan WHERE no_antrean='".$_POST['no_antrean']."'");
							$row = mysqli_fetch_assoc($sql);

							$id_staff = $row['id_staff'];
							$no_rekmed = $row['no_rekmed'];
							$tanggal_kunjungan = $row['tanggal_kunjungan'];
							$poli = $row['poli'];
							$keluhan_dan_riwayat_penyakit = $row['keluhan_dan_riwayat_penyakit'];
							$pembayaran = $row['pembayaran'];
							
							echo '<form action="./admin_kunjungan.php" method="post">
							<input type ="hidden" name="no_antrean" value="'.$_POST['no_antrean'].'"/>
							<table>
                           
                            
                            <tr>
                            <td>No Rekmed</td>
                            <td><input type="text" name="variable_no_rekmed" value="'.$no_rekmed.'" required/></td>
                            </tr>
                            
                            <tr>
                            <td>Tanggal kunjungan</td>
                            <td><input type="date" name="variable_tanggal_kunjungan" value="'.$tanggal_kunjungan.'" required/></td>
                            </tr>
                            
                            <tr>
                            <td>Poli</td>
                            <td><label><input type="radio" id="poli_umum" name="variable_poli" value="Umum" required>Umum</label></td>
                            </tr>
                            
                            <tr>
                            <td>Keluhan dan Riwayat Penyakit</td>
                            <td><input type="text" name="variable_keluhan" value="'.$keluhan_dan_riwayat_penyakit.'" required/></td>
                            </tr>
                            
                            <tr>
                            <td>Pembayaran</td>
                            <td><label><input type="radio" id="tunai" name="variable_pembayaran" value="Tunai" required>Tunai</label>
                            <label><input type="radio" id="debit" name="variable_pembayaran" value="Debit">Debit</label>
                            <label><input type="radio" id="e-wallet" name="variable_pembayaran" value="e-Wallet">e-Wallet</label>
                            <label><input type="radio" id="asuransi" name="variable_pembayaran" value="Asuransi">Asuransi</label>
                            </td>
                            </tr>
                            
                            <table>
							<input type="submit" name="updating_data_kunjungan" value="Update data kunjungan">
							</form>';
						} else {
							echo '<form action="./admin_kunjungan.php" method="post">
							<table>

                            
                            <tr>
                            <td>No Rekmed</td>
                            <td><input type="text" name="variable_no_rekmed" required/></td>
                            </tr>
                            
                            <tr>
                            <td>Tanggal kunjungan</td>
                            <td><input type="date" name="variable_tanggal_kunjungan" required/></td>
                            </tr>
                            
                            <tr>
                            <td>Poli</td>
                            <td><label><input type="radio" id="poli_umum" name="variable_poli" value="Umum" required>Umum</label></td>
                            </tr>
                            
                            <tr>
                            <td>Keluhan dan Riwayat Penyakit</td>
                            <td><input type="text" name="variable_keluhan" required/></td>
                            </tr>
                            
                            <tr>
                            <td>Pembayaran</td>
                            <td><label><input type="radio" id="tunai" name="variable_pembayaran" value="Tunai" required>Tunai</label>
                            <label><input type="radio" id="debit" name="variable_pembayaran" value="Debit">Debit</label>
                            <label><input type="radio" id="e-wallet" name="variable_pembayaran" value="e-Wallet">e-Wallet</label>
                            <label><input type="radio" id="asuransi" name="variable_pembayaran" value="Asuransi">Asuransi</label>
                            </td>
                            </tr>

                            <table>

							<input type="submit" name="daftar_kunjungan" value="Masukkan Data Kunjungan">							
							</form>';
						}
					?>
					</br>

					<?php	
					if(isset($_POST['daftar_kunjungan'])){
						$sql = mysqli_query($dbCon, "INSERT INTO data_kunjungan (id_staff, no_rekmed, tanggal_kunjungan, poli, keluhan_dan_riwayat_penyakit, pembayaran) VALUES ('".$_SESSION['id_staff']."','".$_POST['variable_no_rekmed']."','".$_POST['variable_tanggal_kunjungan']."','".$_POST['variable_poli']."','".$_POST['variable_keluhan']."','".$_POST['variable_pembayaran']."')");
						if (mysqli_error($dbCon)){
        					echo "<i><b><font color=#009d63>Nomor Rekam Medis tidak tersedia</font></b></i></br>";
						} else{
    						echo "<i><b><font color=#009d63>Data kunjungan pasien berhasil didaftarkan</font></b></i></br>";
						}
						
						$baru = mysqli_query($dbCon, "INSERT INTO data_pemeriksaan (no_rekmed, id_dokter, tanggal_kunjungan, subjektif, tinggi_badan, berat_badan, suhu, sistol, diastol, diagnosis, medikasi) VALUES ('".$_POST['variable_no_rekmed']."','1','".$_POST['variable_tanggal_kunjungan']."','".$_POST['variable_keluhan']."','0','0','0','0','0',' ',' ')");
						
						
					} else if (isset($_POST['updating_data_kunjungan'])) {
						$sql = mysqli_query($dbCon, "UPDATE data_kunjungan SET id_staff='".$_SESSION['id_staff']."', no_rekmed='".$_POST['variable_no_rekmed']."', tanggal_kunjungan='".$_POST['variable_tanggal_kunjungan']."', keluhan_dan_riwayat_penyakit='".$_POST['variable_keluhan']."', pembayaran='".$_POST['variable_pembayaran']."' WHERE no_antrean='".$_POST['no_antrean']."'");
						echo "<i><b><font color=#009d63>Data kunjungan pasien berhasil diupdate</font></b></i></br>";
					}

					$sql = mysqli_query($dbCon, "SELECT * FROM data_kunjungan");
					?>
					</br>
					</br>
                    <h3 class="fs-4 mb-3">Database Kunjungan Pasien</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No Antrean</th>								
                                    <th scope="col">ID Staff</th>
                                    <th scope="col">No Rekmed</th>
                                    <th scope="col">Tanggal Kunjungan</th>
                                    <th scope="col">Poli</th>
                                    <th scope="col">Keluhan dan Riwayat Penyakit</th>		
                                    <th scope="col">Pembayaran</th>	
                                    <th scope="col">Aksi</th>										
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
									<?php
									while ($row = mysqli_fetch_row($sql)){
										echo '<tr><td>'.$row[0]."</td><td>".$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td>';
										echo '<td><form action="./admin_kunjungan.php" method="post"><input type="hidden" name="no_antrean" value="'.$row[0].'"/><input type="submit" name="update_data_kunjungan" value="Update data kunjungan pasien"/></form>';
										echo '</td></tr>';
									}
									?>								
                                </tr>
                            </tbody>					
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>