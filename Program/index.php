<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Puskesmas</title>
    <!-- ==== STYLE.CSS ==== -->
    <link rel="stylesheet" href="./css/style3.css">
    <!-- ==== REMIXICON CDN ==== -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
        <!-- ==== NAVBAR ==== -->
        <header>
            <nav class="navbar container">
                <div class="logo">
                    <img src="./img/hospital.png" alt="logo">
                    <a href="#"><button class="register_btn">S  I  P</button>
                </div>

                <button class="toggle_btn" id="toggle_btn">
                    <i class="ri-menu-line"></i>
                </button>
                
                <div class="nav_menu" id="nav_menu"> 
                    <button class="close_btn" id="close_btn">
                        <i class="ri-close-line"></i>
                    </button>
                    <ul class="nav_menu_list"> 
                        <li class="nav_menu_item"><a href="#" class="nav_menu_item_link active"></a></li>
                    </ul>
                </div>
            </nav>
        </header>

        <br><br>

        <!-- ==== HERO ==== -->
        <main class="hero">
            <section class="wrapper">
                <div class="hero_content">
                     <div class="hero_img_wrapper">
                        <div class="hero_img">
                            <img src="./img/ficon.svg" alt="img">
                        </div>
                    </div>
                    <div class="hero_about_wrapper">
                        <div class="hero_about">
							<h4 class="title">menu login pengguna</h4>
							<div class="main_title">
                                <h3>“Kesehatan Anda adalah yang terpenting”
                                   <br> <span class="author_name">Sistem Informasi Puskesmas</span>
                                </h3>
                           </div>
                           <div class="tagline">
                           </div>
                           <div class="btn_wrapper">								   
								<a href="index_login_pasien.php"><button class="btn_contact">Pasien</button></a>
								&ensp;
								<a href="index_login_dokter.php"><button class="btn_contact">Dokter</button></a>
								&ensp;
								<a href="index_login_admin.php"><button class="btn_contact">Admin</button></a>
								&ensp;
								<a href="index_login_farmasi.php"><button class="btn_contact">Farmasi</button></a>
								&ensp;
                        </div>
                    </div>
                </div>
            </section>
        </main>


<!-- ==== MAIN.JS ==== -->
<script src="./js/main2.js" defer></script>
<!-- ==== GSAP CDN ==== -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.7.1/gsap.min.js"></script>   
</body>
</html>