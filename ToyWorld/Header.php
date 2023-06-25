<?php
    session_start(); //khởi động các session
    ob_start(); //bật bộ nhớ đệm
    /* Hide all errors */
    error_reporting(0);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <title>Toy World</title>
        <link rel="stylesheet" href="index.css">

        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->

    </head>
    <body>
        <div class="header">
            <div class="container">
                <div class="navbar">
                    <div class="logo">
                        <a href="index.php"><img src="./Images/LOGO.png" width="200px"></a>
                    </div>
                    <nav>
                        <ul id="MenuItems">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="UploadImage.php">Add Product</a></li>
                            <div class="dropdown" style="background: none">
                                <button class="dropbtn">
                                    <li><a href="#C">Categories</a></li>
                                </button>

                                <div class="dropdown-content" style="margin-left: 2px; margin-top:8px; border-top: 1px solid white">
                                    <a href="./Category_management.php">Manage</a>
                                </div>
                            </div> 
                            <li><a href="#A">About</a></li>
                        </ul>
                    </nav>

                    <div class="search">
                        <form class="formSearch" action="index.php">
                            <input type="search" class="form-control" name="search" placeholder="Search...">
                            <button class="btn-search" name="btnSearch">Search</button>
                        </form>
                    </div>

                    <div class="login" style="display: flex">
                        <a href="Register.php"><img src="./Images/person-circle.svg" width="30px" style="margin-top: 10px"></a>
                        <div class="dropdown">
                            <button class="dropbtn">
                                <a href="Register.php" style="text-decoration: none; color: black">
                                    <?php
                                        // hàm isset được dùng để kiểm tra biến đó đã được tạo hay chưa
                                        // $_SESSION chứa thông tin người dùng cho đến khi đóng trình duyệt
                                        if (isset($_SESSION['user_name'])){
                                            $display = $_SESSION['user_name'];
                                            echo $display;
                                        }
                                        else{
                                            $display = NULL;
                                            echo "Log In";
                                        }
                                    ?>
                                </a>
                            </button>

                            <div class="dropdown-content">  
                                <a href="./Logout.php">Log out</a>  
                            </div>
                        </div>

                    </div>
                    
                    <!---->
                    <a href="Cart.php"><img src="./Images/bag.svg" width="30px" style="margin-top: 7px"></a>

                    <img src="./Images/menu.svg" class="menu" onclick="menutoggle()">
                </div>