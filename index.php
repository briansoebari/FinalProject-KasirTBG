<?php
	session_start();
	include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Aplikasi Kasir Toko Buku Garuda Gresik</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
		<style>
		.body{
			background-image: url("assets/perpus.jpeg");
		}
	</style>
    </head>
    <body>
        <header>
            <h1 class="site-heading text-center text-faded d-none d-lg-block">
                <span class="site-heading-upper text-primary mb-3">Aplikasi Kasir</span>
                <span class="site-heading-lower">Toko Buku Garuda Gresik</span>
            </h1>
        </header>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
            <div class="container">
                <a class="navbar-brand text-uppercase fw-bold d-lg-none" href="index.html">Aplikasi Kasir</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto">
                    </ul>
                </div>
            </div>
        </nav>
		<br>
		<br>
        <section class="page-section about-heading">
            <div class="container">
                <div class="about-heading-content">
                    <div class="row">
                        <div class="col-xl-9 col-lg-10 mx-auto">
                            <div class="bg-faded rounded p-5">
                                <h2 class="section-heading mb-4">
                                    <span class="section-heading-upper">Hope we can do our best!</span>
                                    <span class="section-heading-lower">Login</span>
                                </h2>
                                <div class="panel-body">
                                <!--bagian form login-->
									<form method="post">
										<div class="form-group">
											<label>Username</label>
											<input type="text" class="form-control" name="username">
										</div>
						
										<div class="form-group">
											<label>Password</label>
											<input type="password" class="form-control" name="password">
										</div>
										<br>
										<button class="btn btn-primary" name="login">Login</button>
									</form>
								</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <footer class="footer text-faded text-center py-5">
            <div class="container"><p class="m-0 small">Copyright &copy; Your Website 2021</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

        <!--Memastikan akun yang masuk benar sesuai database-->
		<?php 
			if (isset($_POST['login'])) 
			{
				$username = $_POST["username"];
				$password = $_POST["password"];

				$take = $koneksi-> query("SELECT * FROM kasir WHERE username ='$username' AND password='$password'");
				$right = $take->num_rows;

				if ($right==1) 
				{
					$acc = $take->fetch_assoc();
					$_SESSION["kasir"] = $acc;
					echo "<script>location='home.php';</script>";
				}
				else 
				{
					echo "<script>alert('anda gagal login, periksa akun anda');</script>";
					echo "<script>location='login.php';</script>";
				}
			}

		?>
    </body>
</html>
