<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Page</title>
    <link href="assets/keranjang.png" rel="icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background:url('assets/photo.jpg') center center fixed;
            background-size: cover;
        }

        .card {
            width: 400px;
            border-radius: 15px;
            box-shadow: 10px 10px 20px rgba(0, 0, 0, 0.1);
        }

        .login-content {
            padding: 30px;
            background-color: white; /* Set background color to white */
            border-radius: 15px;
        }

        .form-control {
            background-color: rgba(240, 240, 240, 0.8); /* Set background color with transparency */
            border: none;
            border-radius: 10px;
            box-shadow: inset 5px 5px 10px rgba(0, 0, 0, 0.1), 
                        inset -5px -5px 10px rgba(255, 255, 255, 0.5);
        }

        .form-select {
            background-color: rgba(240, 240, 240, 0.8); /* Set background color with transparency */
            border: none;
            border-radius: 10px;
            box-shadow: inset 5px 5px 10px rgba(0, 0, 0, 0.1), 
                        inset -5px -5px 10px rgba(255, 255, 255, 0.5);
        }

        .btn-primary {
            background-color: #1e90ff;
            border: none;
            border-radius: 10px;
            box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.1), 
                        -5px -5px 10px rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body>

<div class="card">
    <div class="login-content">
        <h2 class="text-center mb-4">Login Kasir</h2>
        <?php
        if(isset($_GET['pesan']) && $_GET['pesan'] == "gagal"){
            echo "<div class='alert alert-danger'>Username dan Password tidak sesuai!</div>";
        }
        ?>
        <form class="login-form" method="post" action="cek_login.php">
    <div class="mb-3 input-group">
        <span class="input-group-text"><i class="fa fa-user"></i></span>
        <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" required>
    </div>
    <div class="mb-3 input-group">
        <span class="input-group-text"><i class="fa fa-lock"></i></span>
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
    </div>
    <div class="mb-3 input-group">
        <span class="input-group-text"><i class="fa fa-users"></i></span>
        <select class="form-select" id="level" name="level" required>
            <option value="user">Admin</option>
            <option value="admin">Petugas</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary w-100">Login</button>
</form>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>
</html>
