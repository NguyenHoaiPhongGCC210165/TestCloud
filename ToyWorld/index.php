<?php
    include_once 'Header.php';
    include_once './connect.php';
?>
            <div class="row">
                <div class="col-2">
                    <h1><span>(●'◡'●)</span><br>World of Toys for children</h1>
                    <!-- <a href="#" class="btn">Explore Now &#8594;</a> -->
                </div>
                <div class="col-2">
                    <img src="./Images/ToyWorld.jpg">
                </div>
            </div>
        </div>
    </div>

    <!--CATEGORIES-->
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

        <!--PRODUCTS-->
        <h2 class="title" style="margin-bottom: 30px; font-size: 30px" >All Products</h2>
    <div class="row">
        <!-- search -->
        <?php
            $c = new Connect();
            $dblink = $c->connectToPDO();

            // //phương thức GET hiển thị thông tin trên đường dẫn, POST dữ liệu được gửi ngầm
            $search = $_GET['search'];
            $sql = "SELECT * FROM product WHERE pName LIKE ?";
            $re = $dblink->prepare($sql);
            $re->execute(array("%$search%"));
            // PDO::FETCH_BOTH trả về dữ liệu dạng mảng (tên cột và số thứ tự của cột)
            $rows = $re->fetchAll(PDO::FETCH_BOTH);

            foreach($rows as $r):
        ?>           
            <!--product information-->
            <div class="small-container">
                <div class="col-4">
                    <div class="card">
                        <a href="./DetailProduct.php<?=$r['pID']?>"><img src="./Images/<?=$r['pImage']?>" class="card-img-top" alt="Product1" style="margin: auto; width: 300px; height: 300px; border-radius: 20px"></a>
                        <div class="card-body" style="text-decoration: none">
                            <a href="./DetailProduct.php?id=<?=$r['pID']?>" class="text-decoration-none"><h5 class="card-title" style="font-size: 20px; margin-left: 15px"><?=$r['pName']?></h5></a>
                            <h6 class="card-subtitle mb-2 text-muted" style="margin-bottom: 20px; font-size: 15px; margin-left: 15px"><?=$r['pPrice']?><span>&#8363;</span></h6>
                            <!-- <a href="../ASM2/Cart.php" class="btn btn-primary">Add to cart</a> -->
                        </div>
                    </div>
                </div>
            </div>

        <?php
            endforeach;
        ?>
    </div>


    <h2 class="title" id="A" style="margin-bottom: 30px; font-size: 30px" >About Us</h2>
    <div class="about-section">
        <p>This is a website that sells toys.</p>
        <p>Manager: Nguyen Hoai Phong</p>
        <p>Phone: 0927472176</p>
    </div>

<?php
    include_once './Footer.php';
?>