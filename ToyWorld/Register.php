<!DOCTYPE html>
<html>
    <head>
        <title>Register Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width:device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Register.css">
    </head> 
    <body>
        <div class="register">
            <div id="login-form" class="login-page">
                <div class="form-box">
                    <div class="button-box">
                        <div id="btn"></div>
                        <button type="button" onclick="login()" class="toggle-btn">Log In</button>
                        <button type="button" onclick="register()" class="toggle-btn">Register</button>
                    </div>
                    
                    <?php
                        include_once './connect.php';
                        session_start();

                        if(isset($_POST['btnLogin'])){
                            if(isset($_POST['txtPass']) && isset($_POST['txtEmail'])){
                                $email = $_POST['txtEmail'];
                                $pwd = $_POST['txtPass'];
                    
                                $c = new Connect();
                                $dblink = $c->connectToPDO();
                                $sql = "SELECT * FROM user WHERE Email = ? and Password = ?";
                                $stmt = $dblink->prepare($sql);
                                $re = $stmt->execute(array("$email", "$pwd"));
                                $numrow = $stmt->rowCount();
                                $row = $stmt->fetch(PDO::FETCH_BOTH);

                                if($numrow == 1){
                                    $_SESSION['user_name'] = $row['Username'];
                                    $_SESSION['user_email'] = $row['Email'];
                                    $_SESSION['user_id'] = $row['UserID'];
                                    header("Location: ./index.php");
                                }
                                else{
                                    echo "<script> alert('Login Failed') </script>";
                                }
                            }else{
                                echo "<script> alert('Please Enter Your Info') </script>";
                            }
                        }
                    ?>

                    <!--Create login form-->
                    <form id="login" class="input-group-login" method="POST" action="RegisterForm.php">
                        <input type="email" name="txtEmail" id="txtEmail" class="input-field" placeholder="Email Id" value="" required>
                        <input type="password" name="txtPass" id="txtPass" class="input-field" placeholder="Enter Password" value="" required>
                        <button type="submit" name="btnLogin" id="btnLogin" class="submit-btn">Log in</button>
                    </form>

                    <?php
                        if(isset($_POST['btnRegister'])){
                            $username = $_POST['username'];
                            $userphone = $_POST['userphone'];
                            $email = $_POST['useremail'];
                            $password = $_POST['password'];

                            $c = new Connect();
                            $dblink = $c->connectToPDO();
                            $sql = "INSERT INTO `user`(`Username`, `Phone`, `Email`, `Password`) VALUES (?,?,?,?)";
                            $re = $dblink->prepare($sql);
                            $stmt = $re->execute(array("$username","$userphone","$email","$password"));
                            
                            if($stmt == TRUE){
                                echo "<script> alert('Register Successfully!') </script>";
                            }
                            else{
                                echo "<script> alert('Register Failed!') </script>";
                            }
                        }
                    ?>

                    <!--Create register form-->
                    <form id="register" class="input-group-register" method="POST">
                        <input type="text" name="username" id="username" class="input-field" placeholder="Username" required>
                        <input type="text" name="userphone" id="userphone" class="input-field" placeholder="Phone" required>
                        <input type="email" name="useremail" id="useremail" class="input-field" placeholder="Email" required>
                        <input type="password" name="password" id="password" class="input-field" placeholder="Enter password" required>
                        <input type="password" name="confirmpassword" id="confirmpassword" class="input-field" placeholder="Confirm password" required>
                        <button type="submit" name="btnRegister" id="btnRegister" class="submit-btn">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script>
        var x=document.getElementById('login');
		var y=document.getElementById('register');
		var z=document.getElementById('btn');
		function register()
		{
			x.style.left='-400px';
			y.style.left='50px';
			z.style.left='110px';
		}
		function login()
		{
			x.style.left='50px';
			y.style.left='450px';
			z.style.left='0px';
		}
	</script>
</html>