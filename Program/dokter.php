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
                    <h2 class="fs-2 m-0">Riwayat Periksa</h2>
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
					<?php
						$dbCon = mysqli_connect("localhost", "root", "", "database_puskesmas");
						
					$sql = mysqli_query($dbCon, "SELECT * FROM data_pemeriksaan");
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
									<?php
									while ($row = mysqli_fetch_row($sql)){
										echo '<tr><td>'.$row[0]."</td><td>".$row[1].'</td><td>'.$row[2].'</td><td>'.$row[3].'</td><td>'.$row[4].'</td><td>'.$row[5].'</td><td>'.$row[6].'</td><td>'.$row[7].'</td><td>'.$row[8].'</td><td>'.$row[9].'</td><td>'.$row[10].'</td><td>'.$row[11].'</td>';
										echo '</td></tr>';
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