<?php
    include "koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login Ke Galeri</title>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <style>
            body {
                font-family: 'Roboto', sans-serif;
                background-image: url('your-background-image.jpg'); /* Add your background image */
                background-size: cover;
                background-position: center;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 100vh;
                margin: 0;
            }
            .card {
                border-radius: 20px; /* Sudut yang lebih halus */
                box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2); /* Bayangan halus */
                background: linear-gradient(to bottom right, #ffffff, #f8f9fa);
                overflow: hidden;
                width: 400px; /* Set a fixed width */
            }
            .card-header {
                background: linear-gradient(to right, #800080, #6a0dad); /* Gradient header */
                color: white;
                padding: 20px;
                text-align: center;
                font-size: 1.5rem;
            }
            .form-control {
                border-radius: 10px; /* Sudut yang lebih halus untuk input */
                border: 1px solid #ced4da; /* Border standar */
                box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1); /* Bayangan dalam */
                padding: 10px; /* Padding untuk input */
                transition: border-color 0.3s;
            }
            .form-control:focus {
                border-color: #800080; /* Warna border saat fokus */
                box-shadow: 0 0 5px rgba(128, 0, 128, 0.5); /* Bayangan saat fokus */
            }
            .btn-primary {
                background-color: #800080; /* Warna header ungu */
                border: none;
                border-radius: 10px; /* Sudut yang lebih halus */
                padding: 10px 20px; /* Spasi dalam tombol */
                transition: background-color 0.3s;
            }
            .btn-primary:hover {
                background-color: #6a0dad; /* Warna saat hover */
            }
            .btn-danger {
                border-radius: 10px; /* Sudut yang lebih halus */
                padding: 10px 20px; /* Spasi dalam tombol */
                transition: background-color 0.3s;
            }
            .btn-danger:hover {
                background-color: #dc3545; /* Warna saat hover */
            }
            .footer {
                background-color: rgba(248, 249, 250, 0.9); /* Warna footer dengan transparansi */
                padding: 15px;
                text-align: center;
                color: #6c757d;
                font-size: 0.9rem;
            }
        </style>
    </head>
    <body>
        <div class="card shadow-lg border-0 rounded-lg mt-5">
            <div class="card-header">
                <h3 class="font-weight-light my-4">Login Galeri Sekolah</h3>
            </div>
            <div class="card-body">
                <?php
                    if (isset($_POST['login'])) {
                        $username = $_POST['username'];
                        $password = md5($_POST['password']);

                        $data = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
                        $cek = mysqli_num_rows($data);
                        if ($cek > 0) {
                            $_SESSION['user'] = mysqli_fetch_array($data);
                            echo '<script>alert("Selamat datang, Login Berhasil"); location.href="index.php"; </script>';
                        } else {
                            echo '<script>alert("Maaf, Username/Password salah")</script>';
                        }
                    }
                ?>
                <form method="post">
                    <div class="form-group">
                        <label for="inputEmail">Username</label>
                        <input class="form-control" id="inputEmail" type="text" name="username" placeholder="Enter username" required />
                    </div>
                    <div class="form-group">
                        <label class="small mb-1" for="inputPassword">Password</label>
                        <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Password" required />
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                        <button class="btn btn-primary" type="submit" name="login" value="login">Login</button>
                        <a class="btn btn-danger" href="register.php">Register</a>
                    </div>
                </form>
            </div>
            <div class="footer">
                <div class="small">
                    &copy; 2024 Galeri Sekolah.
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
