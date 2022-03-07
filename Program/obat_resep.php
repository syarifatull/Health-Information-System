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
    <title>Dashboard Farmasi</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-1 primary-text fs-4 fw-bold text-uppercase"><br><i
                    class="fas fa-user-md me-2"></i>Puskesmas</div>
			<div class="sidebar-heading text-center py-1 primary-text border-bottom"><i
                    class="#"></i><font size="4"><b><i>Dashboard Farmasi<br></br></i></b></font></div>
            <div class="list-group list-group-flush my-3">
                <a href="obat.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Riwayat Data Obat</a>
                <a href="obat_resep.php" class="list-group-item list-group-item-action bg-transparent second-text active"><i
                        class="fas fa-tachometer-alt me-2"></i>Input Resep</a>
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
                    <h2 class="fs-2 m-0">Input Resep</h2>
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
                    <h3 class="fs-4 mb-3">Resep Obat</h3>
					<?php
						$dbCon = mysqli_connect("localhost", "root", "", "database_puskesmas");
						if(isset($_POST["update_data_obat"])) {
							$sql = mysqli_query($dbCon, "SELECT * FROM data_obat WHERE id_resep='".$_POST['id_resep']."'");
							$row = mysqli_fetch_assoc($sql);
                            
                            $daftar_obat_farmasi = $row['daftar_obat'];
							$total_harga_obat_farmasi = $row['total_harga'];


							echo '<form action="./obat_resep.php" method="post">
							<input type ="hidden" name="id_resep" value="'.$_POST['id_resep'].'"/>
							<table>
							<tr><td>Daftar Obat</td><td><input type="text" name="variable_daftar_obat_farmasi" value="'.$daftar_obat_farmasi.'" required/></td><tr>
							<tr><td>Total Harga Obat</td><td><input type="text" name="variable_total_harga_obat_farmasi" value="'.$total_harga_obat_farmasi.'" required/></td><tr>
							<table>
							<input type="submit" name="updating_data_obat" value="Update Harga Obat">
							</form>';
						
						} else {
							echo '<form action="./obat_resep.php" method="post">
							<table>
							<tr><td>No Rekmed</td><td><input type="text" name="variable_no_rekmed_farmasi" required/></td><tr>
							<tr><td>Tanggal kunjungan</td><td><input type="date" name="variable_tanggal_kunjungan_farmasi" required/></td><tr>
							<table>
					
							<input type="submit" name="cek" value="Cek Resep">
							
							</form>';
						}			
					?>
					</br>

					<?php
					
					if(isset($_POST['cek'])) {
                   		$no_rekmed = $_POST['variable_no_rekmed_farmasi'];
      					$tanggal = $_POST['variable_tanggal_kunjungan_farmasi'];
                        $sql = mysqli_query($dbCon, "SELECT * FROM data_obat WHERE no_rekmed= '$no_rekmed' and tanggal_kunjungan= '$tanggal'");
      					$row = mysqli_fetch_assoc($sql);
      					
      					if(isset($row['daftar_obat'])){
      				
      					?>
        					</br>
        					<br>
        					
                            <h3 class="fs-4 mb-3">Database Harga Obat</h3>
                            <div class="col">
                                <table class="table bg-white rounded shadow-sm  table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID Resep</th>
                                            <th scope="col">No Rekmed</th>
                                            <th scope="col">ID Dokter</th>
                                            <th scope="col">ID Staff</th>
                                            <th scope="col">Tanggal Kunjungan</th>
                                            <th scope="col">Daftar Obat</th>
                                            <th scope="col">Total Harga Obat</th>
                                            <th scope="col">Aksi</th>									
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
        									<?php
        									 $sql = mysqli_query($dbCon, "SELECT * FROM data_obat WHERE no_rekmed= '$no_rekmed' and tanggal_kunjungan= '$tanggal'");
      					
        									while ($row = mysqli_fetch_row($sql)){
        										echo '<tr><td>'.$row[0]."</td><td>".$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td><td>Rp'.$row[6].'</td>';
        										echo '<td><form action="./obat_resep.php" method="post"><input type="hidden" name="id_resep" value="'.$row[0].'"/><input type="submit" name="update_data_obat" value="Update Harga Obat"/></form>';
        										echo '</td></tr>';
        									}
        									?>								
                                        </tr>
                                    </tbody>					
                            </div>
                		<?php		

                            
         					} else {
             					echo "</br><i><b><font color=#009d63>Tidak ada resep untuk pasien dan tanggal tersebut</b></i></font>";
             				} 	
                		} else if (isset($_POST['updating_data_obat'])) {
    						$sql2 = mysqli_query($dbCon, "UPDATE data_obat SET total_harga='".$_POST['variable_total_harga_obat_farmasi']."', id_staff='".$_SESSION['id_staff']."', daftar_obat='".$_POST['variable_daftar_obat_farmasi']."' WHERE id_resep='".$_POST['id_resep']."'");
    						echo "<i><b><font color=#009d63> Data harga obat berhasil diupdate</font></b></i></br>";
    						$sql = mysqli_query($dbCon, "SELECT * FROM data_obat WHERE id_resep='".$_POST['id_resep']."'");

    						?>
        					</br>
        					<br>
        					
                            <h3 class="fs-4 mb-3">Hasil Update</h3>
                            <div class="col">
                                <table class="table bg-white rounded shadow-sm  table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID Resep</th>
                                            <th scope="col">No Rekmed</th>
                                            <th scope="col">ID Dokter</th>
                                            <th scope="col">ID Staff</th>
                                            <th scope="col">Tanggal Kunjungan</th>
                                            <th scope="col">Daftar Obat</th>
                                            <th scope="col">Total Harga Obat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
        									<?php
        									while ($row = mysqli_fetch_row($sql)){
        										echo '<tr><td>'.$row[0]."</td><td>".$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td><td>Rp'.$row[6].'</td>';
        										echo '</td></tr>';
        									}
        									?>								
                                        </tr>
                                    </tbody>					
                            </div>
                		<?php		
    						
    					}
    					
                        
					?>
					</br>

					
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