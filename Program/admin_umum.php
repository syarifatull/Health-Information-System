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
    <title>Dashboard Admin - Data Umum Pasien</title>
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
                <a href="admin_kunjungan.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Data Kunjungan</a>
				<a href="admin_dokter.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-tachometer-alt me-2"></i>Data Dokter</a>
				<a href="admin_umum.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
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
                    <h2 class="fs-2 m-0">Data Umum Pasien</h2>
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
                    <h3 class="fs-4 mb-3">Registrasi Pasien</h3>
					<?php
						$dbCon = mysqli_connect("localhost", "root", "", "database_puskesmas");
						if(isset($_POST["update_data_umum"])) {
							$sql = mysqli_query($dbCon, "SELECT * FROM data_umum_pasien WHERE no_rekmed='".$_POST['no_rekmed']."'");
							$row = mysqli_fetch_assoc($sql);

							$nik = $row['nik'];
							$nama_pasien = $row['nama_pasien'];
							$jenis_kelamin = $row['jenis_kelamin'];
							$tanggal_lahir = $row['tanggal_lahir'];
							$goldar = $row['goldar'];
							$alamat = $row['alamat'];
							$pekerjaan = $row['pekerjaan'];
							$no_telepon = $row['no_telepon'];
							$no_telepon_keluarga = $row['no_telepon_keluarga'];
							$password_pasien = $row['password_pasien'];

							echo '<form action="./admin_umum.php" method="post">
							<input type ="hidden" name="no_rekmed" value="'.$_POST['no_rekmed'].'"/>
							<table>

                            <tr>
                            <td>NIK</td>
                            <td><input type="text" name="variable_nik" value="'.$nik.'" required/></td>
                            <tr>
                            
                            <tr>
                            <td>Nama pasien</td>
                            <td><input type="text" name="variable_nama_pasien" value="'.$nama_pasien.'" required/></td>
                            <tr>

                            <tr>
                            <td>Jenis kelamin</td>
                            <td>
                            <label><input type="radio" id="jenis_kelamin_L" name="variable_jenis_kelamin" value="L" required>L</label>
                            <label><input type="radio" id="jenis_kelamin_P" name="variable_jenis_kelamin" value="P">P</label>
                            </td>
                            </tr>

                            <tr>
                            <td>Tanggal lahir</td>
                            <td><input type="date" name="variable_tanggal_lahir_pasien" value="'.$tanggal_lahir.'" required/></td>
                            <tr>
                            
                            <tr>
                            <td>Golongan darah</td>
                            <td><input type="text" name="variable_goldar_pasien" value="'.$goldar.'" required/></td>
                            <tr>

                            <tr>
                            <td>Alamat</td><td><input type="text" name="variable_alamat_pasien" value="'.$alamat.'" required/></td>
                            <tr>

                            <tr>
                            <td>Pekerjaan</td>
                            <td><input type="text" name="variable_pekerjaan_pasien" value="'.$pekerjaan.'" required/></td>
                            <tr>

                            <tr>
                            <td>Nomor telepon</td>
                            <td><input type="text" name="variable_no_telp_pasien" value="'.$no_telepon.'" required/></td>
                            <tr>
                            
                            <tr>
                            <td>Nomor telepon keluarga</td>
                            <td><input type="text" name="variable_no_telp_keluarga_pasien" value="'.$no_telepon_keluarga.'" required/></td>
                            <tr>
                            
                            <tr>
                            <td>Password Lama</td>
                            <td><input type="password" name="variable_pass_lama" value="'.$password_pasien.'" required/></td>
                            </tr>                           
                            
                            <tr>
                            <td>Password Baru (jika ingin)</td>
                            <td><input type="password" name="variable_pass_pasien" /></td>
                            </tr>
                            
                            <table>
							<input type="submit" name="updating_data_umum" value="Update data umum pasien">

							</form>';
						} else {
							echo '<form action="./admin_umum.php" method="post">
							<table>

                            <tr>
                            <td>NIK</td>
                            <td><input type="text" name="variable_nik" required/></td>
                            <tr>
                            
                            <tr>
                            <td>Nama pasien</td>
                            <td><input type="text" name="variable_nama_pasien" required/></td>
                            <tr>

                            <tr>
                            <td>Jenis kelamin</td>
                            <td>
                            <label><input type="radio" id="jenis_kelamin_L" name="variable_jenis_kelamin" value="L" required>L</label>
                            <label><input type="radio" id="jenis_kelamin_P" name="variable_jenis_kelamin" value="P">P</label>
                            </td>
                            </tr>

                            <tr>
                            <td>Tanggal lahir</td>
                            <td><input type="date" name="variable_tanggal_lahir_pasien" required/></td>
                            <tr>
                            
                            <tr>
                            <td>Golongan darah</td>
                            <td><input type="text" name="variable_goldar_pasien" required/></td>
                            <tr>

                            <tr>
                            <td>Alamat</td><td><input type="text" name="variable_alamat_pasien" required/></td>
                            <tr>

                            <tr>
                            <td>Pekerjaan</td>
                            <td><input type="text" name="variable_pekerjaan_pasien" required/></td>
                            <tr>

                            <tr>
                            <td>Nomor telepon</td>
                            <td><input type="text" name="variable_no_telp_pasien" required/></td>
                            <tr>
                            
                            <tr>
                            <td>Nomor telepon keluarga</td>
                            <td><input type="text" name="variable_no_telp_keluarga_pasien"  required/></td>
                            <tr>

                            <tr>
                            <td>Password</td><td><input type="password" name="variable_pass_pasien" required/></td>
                            <tr>
                            
                            <table>
					
							<input type="submit" name="daftar_umum" value="Masukkan Data Umum Pasien">
							
							</form>';
						}
					?>
					</br>
					
					
					<?php
					if(isset($_POST['daftar_umum'])){
						$input_pass = md5($_POST['variable_pass_pasien']);
                        $sql = mysqli_query($dbCon, "INSERT INTO data_umum_pasien (nik, nama_pasien, jenis_kelamin, tanggal_lahir, goldar, alamat, pekerjaan, no_telepon, no_telepon_keluarga, password_pasien) VALUES ('".$_POST['variable_nik']."','".$_POST['variable_nama_pasien']."','".$_POST['variable_jenis_kelamin']."','".$_POST['variable_tanggal_lahir_pasien']."','".$_POST['variable_goldar_pasien']."','".$_POST['variable_alamat_pasien']."','".$_POST['variable_pekerjaan_pasien']."','".$_POST['variable_no_telp_pasien']."','".$_POST['variable_no_telp_keluarga_pasien']."','$input_pass')");
						echo mysqli_error($dbCon);
						echo "<i><b><font color=#009d63>Data umum pasien berhasil didaftarkan</font></b></i></br>";
					} else if (isset($_POST['updating_data_umum'])) {
						$cek_user = mysqli_query($dbCon, "SELECT * FROM data_umum_pasien WHERE no_rekmed='".$_POST['no_rekmed']."'");
                        $user_valid = mysqli_fetch_array($cek_user);
						$lama = md5($_POST['variable_pass_lama']); 
    					//echo "data:" .$user_valid['password_dokter'];
						//echo "lama:".$lama;
						if ($lama == $user_valid['password_pasien']){
        					if (isset($_POST['variable_pass_pasien']) and $_POST['variable_pass_pasien'] <> ''){
                				$input_pass = md5($_POST['variable_pass_pasien']);
                				$sql = mysqli_query($dbCon, "UPDATE data_umum_pasien SET nik='".$_POST['variable_nik']."', nama_pasien='".$_POST['variable_nama_pasien']."', jenis_kelamin='".$_POST['variable_jenis_kelamin']."', tanggal_lahir='".$_POST['variable_tanggal_lahir_pasien']."', goldar='".$_POST['variable_goldar_pasien']."', alamat='".$_POST['variable_alamat_pasien']."', pekerjaan='".$_POST['variable_pekerjaan_pasien']."', no_telepon='".$_POST['variable_no_telp_pasien']."', no_telepon_keluarga='".$_POST['variable_no_telp_keluarga_pasien']."', password_pasien='$input_pass' WHERE no_rekmed='".$_POST['no_rekmed']."'");
    						} else {
                				$sql = mysqli_query($dbCon, "UPDATE data_umum_pasien SET nik='".$_POST['variable_nik']."', nama_pasien='".$_POST['variable_nama_pasien']."', jenis_kelamin='".$_POST['variable_jenis_kelamin']."', tanggal_lahir='".$_POST['variable_tanggal_lahir_pasien']."', goldar='".$_POST['variable_goldar_pasien']."', alamat='".$_POST['variable_alamat_pasien']."', pekerjaan='".$_POST['variable_pekerjaan_pasien']."', no_telepon='".$_POST['variable_no_telp_pasien']."', no_telepon_keluarga='".$_POST['variable_no_telp_keluarga_pasien']."' WHERE no_rekmed='".$_POST['no_rekmed']."'");
    						}
        					
    						echo "<i><b><font color=#009d63>Data umum pasien berhasil diupdate</font></b></i></br>";
    					} else{
            				echo "<i><b><font color=#009d63>Password lama salah!</font></b></i></br>";
    					}
						
						
					}

					$sql = mysqli_query($dbCon, "SELECT * FROM data_umum_pasien");
					?>
					</br>
					</br>
					
                    <h3 class="fs-4 mb-3">Database Umum Pasien</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">No Rekmed</th>		
                                    <th scope="col">NIK</th>
                                    <th scope="col">Nama Pasien</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Tanggal Lahir</th>									
                                    <th scope="col">Golongan Darah</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">Pekerjaan</th>		
                                    <th scope="col">Nomor Telepon</th>	
                                    <th scope="col">Nomor Telepon Keluarga</th>	
                                    <th scope="col">Aksi</th>										
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
									<?php
									while ($row = mysqli_fetch_row($sql)){
										echo '<tr><td>'.$row[0]."</td><td>".$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td><td>'.$row[7].'</td><td>'.$row[8].'</td><td>'.$row[9].'</td>';
										echo '<td><form action="./admin_umum.php" method="post"><input type="hidden" name="no_rekmed" value="'.$row[0].'"/><input type="submit" name="update_data_umum" value="Update"/></form>';
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