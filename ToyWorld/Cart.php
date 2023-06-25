<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <title>Toy World</title>
        <link rel="stylesheet" href="./index.css">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    </head>
</html>

<?php
include_once './Header.php';
include_once './connect.php';

    $c = new Connect();
    $dblink = $c->connectToPDO();
    if(isset($_SESSION['user_name'])){
        //check if user logged into website
        $username = $_SESSION['user_name'];
        $user = $_SESSION['user_id'];

        // $useremail = $_SESSION['user_email'];

        if(isset($_GET['pid'])){
            //when user add an item to shopping cart
            $p_id = $_GET['pid'];
            // $user_id = $_GET['UserID'];
            $sqlSelect1 = "SELECT pID FROM cart WHERE UserID = ? AND pID = ?";
            $re = $dblink->prepare($sqlSelect1);
            $re->execute(array("$user","$p_id"));

            //check if the item has been added
            if($re->rowCount() == 0){
                //The item could not be found in user's cart
                $query = "INSERT INTO cart (UserID, pID, pCount) VALUES (?,?,1)";
            }
            else{
                //Added by user
                $query = "UPDATE cart SET pCount = pCount + 1 WHERE UserID = ? AND pID = ?";
            }
            $stmt = $dblink->prepare($query);
            $stmt->execute(array("$user","$p_id"));
        }
        else if(isset($_GET['del_id'])){
            //when user want to delete an item to shopping cart
            $cart_del = $_GET['del_id'];
            $query = "DELETE FROM cart WHERE CartID = ?";
            $stmt = $dblink->prepare($query);
            $stmt->execute(array($cart_del));
        }
        //show a list to shopping cart
        $sqlSelect = "SELECT * FROM cart c, product p WHERE c.pID = p.pID AND UserID = ?";
        $stmt1 = $dblink->prepare($sqlSelect);
        $stmt1->execute(array($user));
        $rows = $stmt1->fetchAll(PDO::FETCH_BOTH);
    }
    else{
        header("Location: ./Register.php");
    }
?>

    <div class="container">
        <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
        <h6 classs="mb-0 text-muted"><?=$stmt1->rowCount()?> item(s)</h6>
        <table class="table">
            <tr>
                <th>Productname</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>

            <?php
                foreach($rows as $row){
                ?>
                <tr>
                    <td><?=$row['pName']?></td>
                    <td><input id="form1" min="0" name="quantity" value="<?=$row['pCount']?>" type="number" class="form-control form-control-sm"/></td>
                    <td><h6 class="mb-0"><span>&#8363;</span><?=$row['pCount']?> * <?=$row['pPrice']?></h6></td>
                    <td><a href="Cart.php?del_id=<?=$row['CartID']?>" class="text-muted text-decoration-none">x</a></td>
                </tr>

                <?php
                }
                ?>
        </table>
        <hr class="my-4">

        <div classs="pt-5">
            <h6 class="mb-0"><a href="./index.css" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
        </div>
    </div>
