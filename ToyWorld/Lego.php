<?php
    include_once 'Header.php';
    include_once './connect.php';
    error_reporting(0);
?>

    <div class="categories">
        <div class="small-container">
            <h2 class="title" id="C">Categories</h2>
            <div class="row">
                <div class="col-3">
                    <a href="./Motor.php" style="text-decoration: none"><img src="./Images/Motor.webp">
                    <p>Motorcycle</p></a>
                </div>
                <div class="col-3">
                    <a href="./Car.php" style="text-decoration: none"><img src="./Images/Car.webp">
                    <p>Car</p></a>
                </div>
                <div class="col-3">
                    <a href="./Lego.php" style="text-decoration: none"><img src="./Images/Lego.jpg" height="309px">
                    <p>Lego</p></a>
                </div>
            </div>
        </div>
    </div>

<h2 class="title" style="margin-bottom: 30px; font-size: 30px" >Lego Category</h2>
<div class="row">
        <?php
            $c = new Connect();
            $dblink = $c->connectToPDO();
            $sql = "SELECT * FROM product WHERE cID LIKE ?";
            $re = $dblink->prepare($sql);
            $re->execute(array("C003"));
            $rows = $re->fetchAll(PDO::FETCH_BOTH);

            foreach($rows as $r):
        ?>           
        <div class="small-container">
            <div class="col-4">
                <div class="card">
                    <a href="DetailProduct.php?id=<?=$r['pID']?>"><img src="./Images/<?=$r['pImage']?>" class="card-img-top" alt="Product1" style="margin: auto; width: 300px; height: 300px; border-radius: 20px"></a>
                    <div class="card-body" style="text-decoration: none">
                        <a href="DetailProduct.php?id=<?=$r['pID']?>" class="text-decoration-none"><h5 class="card-title" style="font-size: 20px; margin-left: 15px"><?=$r['pName']?></h5></a>
                        <h6 class="card-subtitle mb-2 text-muted" style="margin-bottom: 20px; font-size: 15px; margin-left: 15px"><span>&#8363;</span><?=$r['pPrice']?></h6>
                        <!-- <a href="#" class="btn btn-primary">Add to cart</a> -->
                    </div>
                </div>
            </div>
        </div>
        <?php
            endforeach;
        ?>
    </div>
