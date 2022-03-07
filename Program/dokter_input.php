<?php
session_start();
if (empty($_SESSION['id_dokter'])) {
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
    <title>Dashboard Dokter</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-1 primary-text fs-4 fw-bold text-uppercase"><br><i
                    class="fas fa-user-md me-2"></i>Puskesmas</div>
			<div class="sidebar-heading text-center py-1 primary-text border-bottom"><i
                    class="#"></i><font size="4"><b><i>Dashboard Dokter<br></br></i></b></font></div>
            <div class="list-group list-group-flush my-3">
                <a href="dokter.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Riwayat Periksa</a>
                <a href="dokter_input.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Input Pemeriksaan</a>
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
                    <h2 class="fs-2 m-0">Input Pemeriksaan</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
							<i class="fas fa-user me-2"></i><b><?= $_SESSION['nama_dokter'] ?></b>
                        </li>
                    </ul>
                </div>
            </nav>

			<div class="container-fluid px-4">
				<div class="row g-3 my-2">
				<div class="row my-5">
                    <h3 class="fs-4 mb-3">Input Data Pemeriksaan</h3>
					<?php
						$dbCon = mysqli_connect("localhost", "root", "", "database_puskesmas");
						if(isset($_POST["update_data_pemeriksaan"])) {
							$sql = mysqli_query($dbCon, "SELECT * FROM data_pemeriksaan WHERE id_pemeriksaan='".$_POST['id_pemeriksaan']."'");
							$row = mysqli_fetch_assoc($sql);

							$subjektif = $row['subjektif'];
							$tinggi_badan = $row['tinggi_badan'];
							$berat_badan = $row['berat_badan'];
							$suhu = $row['suhu'];
							$sistol = $row['sistol'];
							$diastol = $row['diastol'];
							$diagnosis = $row['diagnosis'];
							$medikasi = $row['medikasi'];

							echo '<form action="./dokter_input.php" method="post">
							<input type ="hidden" name="id_pemeriksaan" value="'.$_POST['id_pemeriksaan'].'"/>
							<table>
							
							<tr>
							<td>Subjektif</td>
							<td><input type="text" name="variable_subjektif_pemeriksaan" value="'.$subjektif.'" required/></td>
							<tr>
							
							<tr>
							<td>Tinggi badan</td>
							<td><input type="text" name="variable_tinggi_badan_pemeriksaan" value="'.$tinggi_badan.'" required/></td>
							<tr>
							
							<tr>
							<td>Berat badan</td>
							<td><input type="text" name="variable_berat_badan_pemeriksaan" value="'.$berat_badan.'" required/></td>
							<tr>
							
							<tr>
							<td>Suhu</td>
							<td><input type="text" name="variable_suhu_pemeriksaan" value="'.$suhu.'" required/></td>
							<tr>
							
							<tr>
							<td>Sistol</td>
							<td><input type="text" name="variable_sistol_pemeriksaan" value="'.$sistol.'" required/></td>
							<tr>
							
							<tr>
							<td>Diastol</td>
							<td><input type="text" name="variable_diastol_pemeriksaan" value="'.$diastol.'" required/></td>
							<tr>
							
							<tr>
							<td>Diagnosis</td>
							<td><input type="text" name="variable_diagnosis_pemeriksaan" value="'.$diagnosis.'" required/></td>
							<tr>
							
							<tr>
							<td>Medikasi</td>
							<td><input type="text" name="variable_medikasi_pemeriksaan" value="'.$medikasi.'" required/></td>
							<tr>
							
							</table>
							<input type="submit" name="updating_data_pemeriksaan" value="Update data pemeriksaan">
							<br>
							</br>
							<br>
							</form>';
						} else {
							echo '<form action="./dokter_input.php" method="post">
							<table>
							<tr>
							<td>No Rekmed</td>
							<td><input type="text" name="variable_no_rekmed_pemeriksaan" required/></td>
							<tr>

							
							
							<tr>
							<td>Tanggal kunjungan</td>
							<td><input type="date" name="variable_tanggal_kunjungan_pemeriksaan" required/></td>
							<tr>
							
							
							<table>
					
							<input type="submit" name="cek" value="Masukkan Data">
							
							</form>';
						}
					?>
					</br>

					<?php			
					if(isset($_POST['cek'])){
						$no_rekmed = $_POST['variable_no_rekmed_pemeriksaan'];
      					$tanggal = $_POST['variable_tanggal_kunjungan_pemeriksaan'];
      					
                        $sql = mysqli_query($dbCon, "SELECT * FROM data_pemeriksaan WHERE no_rekmed= '$no_rekmed' and tanggal_kunjungan= '$tanggal'");
      					$row = mysqli_fetch_assoc($sql);
      					
      					if(isset($row['subjektif'])){
      					?>
        					</br>
        					<br>
        					
                            <h3 class="fs-4 mb-3">Hasil Pemeriksaan</h3>
                            <div class="col">
                                <table class="table bg-white rounded shadow-sm  table-hover">
                                    <thead>
                                        <tr>
                                           <th scope="col">ID Pemeriksaan</th>
                                           <th scope="col">No Rekmed</th>
                                           <th scope="col">ID Dokter</th>
                                           <th scope="col">Tanggal Kunjungan</th>
                                           <th scope="col">Subjektif</th>
                                           <th scope="col">Tinggi Badan</th>
                                           <th scope="col">Berat Badan</th>	
                                           <th scope="col">Suhu</th>		
                                           <th scope="col">Sistol</th>	
                                           <th scope="col">Diastol</th>
                                           <th scope="col">Diagnosis</th>		
                                           <th scope="col">Medikasi</th>
                                           <th scope="col">Aksi</th>									
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <tr>
       									<?php
       									$sql = mysqli_query($dbCon, "SELECT * FROM data_pemeriksaan WHERE no_rekmed= '$no_rekmed' and tanggal_kunjungan= '$tanggal'");
      					
       									while ($row = mysqli_fetch_row($sql)){
       										echo '<tr><td>'.$row[0]."</td><td>".$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td><td>'.$row[7].'</td><td>'.$row[8].'</td><td>'.$row[9].'</td><td>'.$row[10].'</td><td>'.$row[11].'</td>';
       										echo '<td><form action="./dokter_input.php" method="post"><input type="hidden" name="id_pemeriksaan" value="'.$row[0].'"/><input type="submit" name="update_data_pemeriksaan" value="Update"/></form>';
       										echo '</td></tr>';
       									}
        									?>								
                                        </tr>
                                    </tbody>					
                            </div>
                		<?php	
    					} else {
             					echo "</br><i><b><font color=#009d63>Tidak ada pemeriksaan untuk pasien dan tanggal tersebut</b></i></font>";
             				} 					
					} else if (isset($_POST['updating_data_pemeriksaan'])) {
						$sql = mysqli_query($dbCon, "UPDATE data_pemeriksaan SET id_dokter='".$_SESSION['id_dokter']."', subjektif='".$_POST['variable_subjektif_pemeriksaan']."', tinggi_badan='".$_POST['variable_tinggi_badan_pemeriksaan']."', berat_badan='".$_POST['variable_berat_badan_pemeriksaan']."', suhu='".$_POST['variable_suhu_pemeriksaan']."', sistol='".$_POST['variable_sistol_pemeriksaan']."', diastol='".$_POST['variable_diastol_pemeriksaan']."', diagnosis='".$_POST['variable_diagnosis_pemeriksaan']."', medikasi='".$_POST['variable_medikasi_pemeriksaan']."' WHERE id_pemeriksaan='".$_POST['id_pemeriksaan']."' ");
						echo "<i><b><font color=#009d63>Data pemeriksaan berhasil diupdate</font></b></i></br>";						
					
						
    					$sql = mysqli_query($dbCon, "SELECT * FROM data_pemeriksaan WHERE id_pemeriksaan='".$_POST['id_pemeriksaan']."' ");
    					?>
    					</br>
    					<br>
                        <h3 class="fs-4 mb-3">Database Hasil Pemeriksaan</h3>
                        <div class="col-md-12">
                            <table class="table bg-white rounded shadow-sm  table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">ID Pemeriksaan</th> 
                                        <th scope="col">No Rekmed</th>
                                        <th scope="col">ID Dokter</th>
                                        <th scope="col">Tanggal Kunjungan</th>
                                        <th scope="col">Subjektif</th>
                                        <th scope="col">Tinggi Badan</th>
                                        <th scope="col">Berat Badan</th>	
                                        <th scope="col">Suhu</th>		
                                        <th scope="col">Sistol</th>	
                                        <th scope="col">Diastol</th>
                                        <th scope="col">Diagnosis</th>		
                                        <th scope="col">Medikasi</th>
                                        <th scope="col">Aksi</th>									
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
    									<?php
        									while ($row = mysqli_fetch_row($sql)){
    										echo '<tr><td>'.$row[0]."</td><td>".$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td><td>'.$row[7].'</td><td>'.$row[8].'</td><td>'.$row[9].'</td><td>'.$row[10].'</td><td>'.$row[11].'</td>';
    										echo '<td><form action="./dokter_input.php" method="post"><input type="hidden" name="id_pemeriksaan" value="'.$row[0].'"/><input type="submit" name="update_data_pemeriksaan" value="Update"/></form>';
    										echo '</td></tr>';
    										
    										$baru = mysqli_query($dbCon, "INSERT INTO data_obat (no_rekmed, id_dokter, id_staff, tanggal_kunjungan, daftar_obat, total_harga) VALUES ('$row[1]','".$_SESSION['id_dokter']."','1','$row[3]','$row[11]',' ')");
                    						echo mysqli_error($dbCon);
                                            }    									
    						}		
				
									?>								
                                </tr>
                            </tbody>	
						</table>
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