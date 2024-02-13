<?php 
    session_start();
 
    // cek apakah yang mengakses halaman ini sudah login
    if($_SESSION['level']==""){
        header("location:../index.php?pesan=gagal");
    }
 
?>
<!DOCTYPE html>
<html>
<head>
    <title>KASIR | PREMIUM </title>
    <!-- Favicons -->
    <link href="../assets/kasir.png" rel="icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <style>
        body {
            background-color: #f2f2f2; /* Set background color to gray */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #333;
            color: #fff;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .menu-icon {
            font-size: 24px;
            cursor: pointer;
        }
        .menu {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #222;
            padding-top: 60px;
        }
        .menu ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .menu ul li {
            padding: 15px;
            border-bottom: 1px solid #444;
        }
        .menu ul li:last-child {
            border-bottom: none;
        }
        .menu ul li a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>

    <script>
        function toggleMenu() {
            var menu = document.getElementById("menu");
            if (menu.style.display === "block") {
                menu.style.display = "none";
            } else {
                menu.style.display = "block";
            }
        }
    </script>
</body>
</html>
