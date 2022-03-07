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
    <title>Dashboard Admin - Data Dokter</title>
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
				<a href="admin_dokter.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
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
                    <h2 class="fs-2 m-0">Data Dokter</h2>
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
                    <h3 class="fs-4 mb-3">Registrasi Dokter</h3>
					<?php
						$dbCon = mysqli_connect("localhost", "root", "", "database_puskesmas");
						if(isset($_POST["update_data_dokter"])) {
							$sql = mysqli_query($dbCon, "SELECT * FROM data_dokter WHERE id_dokter='".$_POST['id_dokter']."'");
							$row = mysqli_fetch_assoc($sql);
							$poli = $row['poli'];
							$nama_dokter = $row['nama_dokter'];
							$password_dokter = $row['password_dokter'];

							echo '<form action="./admin_dokter.php" method="post">
							<input type ="hidden" name="id_dokter" value="'.$_POST['id_dokter'].'"/>
							<table>
							
                            <tr>
                            <td>Poli</td>
                            <td>
							<label><input type="radio" id="poli_umum" name="variable_poli" value="Umum" required>Umum</label>
							</td>
							</tr>

                            <tr>
                            <td>Nama Dokter</td>
                            <td><input type="text" name="variable_nama_dokter" value="'.$nama_dokter.'" required/></td>
                            </tr>

                            <tr>
                            <td>Password Lama</td>
                            <td><input type="password" name="variable_pass_lama" value="'.$password_dokter.'" required/></td>
                            </tr>                           
                            
                            <tr>
                            <td>Password Baru (jika ingin)</td>
                            <td><input type="password" name="variable_pass_dokter" /></td>
                            </tr>

                            <table>
							<input type="submit" name="updating_data_dokter" value="Update data dokter">

							</form>';
						} else {
							echo '<form action="./admin_dokter.php" method="post">
							<table>
							<tr>
                            <td>Poli</td>
                            <td>
							<label><input type="radio" id="poli_umum" name="variable_poli" value="Umum" required>Umum</label>
							</td>
                            </tr>

                            <tr>
                            <td>Nama Dokter</td>
                            <td><input type="text" name="variable_nama_dokter" required/></td>
                            </tr>

                            <tr>
                            <td>Password</td>
                            <td><input type="password" name="variable_pass_dokter" required/></td>
                            </tr>

                            <table>
					
							<input type="submit" name="daftar_data_dokter" value="Registrasi Dokter">
						
							</form>';
						}
					?>
					</br>
	
					<?php
					if(isset($_POST['daftar_data_dokter'])){
                        $input_pass = md5($_POST['variable_pass_dokter']);
                        $sql = mysqli_query($dbCon, "INSERT INTO data_dokter (poli, nama_dokter, password_dokter) VALUES ('".$_POST['variable_poli']."','".$_POST['variable_nama_dokter']."','$input_pass')");
						echo mysqli_error($dbCon);
						echo "<i><b><font color=#009d63>Data dokter berhasil didaftarkan</font></b></i></br>";
					} else if (isset($_POST['updating_data_dokter'])) {
    					$cek_user = mysqli_query($dbCon, "SELECT * FROM data_dokter WHERE id_dokter='".$_POST['id_dokter']."' ");
                        $user_valid = mysqli_fetch_array($cek_user);
						$lama = md5($_POST['variable_pass_lama']); 
    					//echo "data:" .$user_valid['password_dokter'];
						//echo "lama:".$lama;
						if ($lama == $user_valid['password_dokter']){
        					if (isset($_POST['variable_pass_dokter']) and $_POST['variable_pass_dokter'] <> ''){
                				$input_pass = md5($_POST['variable_pass_dokter']);
                				$sql = mysqli_query($dbCon, "UPDATE data_dokter SET poli='".$_POST['variable_poli']."', nama_dokter='".$_POST['variable_nama_dokter']."', password_dokter='$input_pass' WHERE id_dokter='".$_POST['id_dokter']."' ");
        					} else {
                				$sql = mysqli_query($dbCon, "UPDATE data_dokter SET poli='".$_POST['variable_poli']."', nama_dokter='".$_POST['variable_nama_dokter']."' WHERE id_dokter='".$_POST['id_dokter']."' ");
                        	}
    						echo "<i><b><font color=#009d63>Data dokter berhasil diupdate</font></b></i></br>";
    					} else{
            				echo "<i><b><font color=#009d63>Password lama salah!</font></b></i></br>";
    					}
					}

					$sql = mysqli_query($dbCon, "SELECT * FROM data_dokter");
					?>
					</br>
					</br>
					
                    <h3 class="fs-4 mb-3">Database Dokter</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm  table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">ID Dokter</th>
                                    <th scope="col">Poli</th>
                                    <th scope="col">Nama Dokter</th>
                                    <th scope="col">Aksi</th>									
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
									<?php
									while ($row = mysqli_fetch_row($sql)){
										echo '<tr><td>'.$row[0]."</td><td>".$row[1].'</td><td>'.$row[2].'</td>';
										echo '<td><form action="./admin_dokter.php" method="post"><input type="hidden" name="id_dokter" value="'.$row[0].'"/><input type="submit" name="update_data_dokter" value="Update data"/></form>';
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