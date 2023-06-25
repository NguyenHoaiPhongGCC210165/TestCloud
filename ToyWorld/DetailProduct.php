<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale = 1.0">
        <title>Toy World</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
    </head>
    
    <body>
        <div class ="container px-4 py-4" 
             style="
                    background: radial-gradient(#fff,#ffd6d6);
                    margin-top: 80px;    
                    border-radius: 10px;
                    width: 60%;
                    font-family: 'Times New Roman', Times, serif;
                    font-size: 20px;
                ">
            <?php
            if(isset($_GET['id'])):
                $pid = $_GET['id'];
                include_once './connect.php';
                $conn = new Connect();
                $db_link = $conn->connectToPDO();
                $sql= "SELECT * FROM product WHERE pID = ?";
                $stmt = $db_link->prepare($sql);
                $stmt->execute(array($pid));
                $re = $stmt->fetch(PDO::FETCH_BOTH);
            ?>
                <h2 style="margin-left: 20px"><?=$re['pName']?></h2>
                <div style="display: flex; font-weight:bold;">
                    <div class="picture" style="display: contents;">
                        <img 
                        style="
                                border-radius: 20px;
                                width: 60%;
                                padding-right: 50px;
                         "   
                        src="./Images/<?=$re['pImage']?>" 
                        />
                    </div>
                        <ul
                        style = "
                            list-style-type:none;
                            margin: auto;
                            width: 50%;
                            font-size: 25px;
                            margin-top: 50px;
                        " 
                    class="list-group">   
                    Price:<li class="list-group-item" 
                              style="border-radius: 10px; 
                                     width: fit-content; 
                                     font-size: 20px; 
                                     border-bottom: 1px solid">
                                     <?=$re['pPrice']?>&#8363;
                            </li>
                    Quantity:<li class="list-group-item" 
                                 style="border-radius: 10px; 
                                        width: fit-content; 
                                        font-size: 20px; 
                                        border-bottom: 1px solid">
                                        <?=$re['pQuantity']?>
                            </li>
                    Description:<li class="list-group-item" 
                                    style="border-radius: 10px; 
                                           width: fit-content; 
                                           font-size: 20px; 
                                           border-bottom: 1px solid">
                                           <?=$re['pDesc']?>
                                </li>
                    <hr>
                    <form action ="Cart.php" method="GET">
                        <div class="col-lg-9">
                            <input type="hidden" name="pid" value="<?=$pID?>">
                            <input type="submit" class="btn btn-primary shop-button" 
                                   style="font-size: 25px; 
                                          border-radius: 20px; 
                                          color: black; 
                                          background: pink; font-weight: 
                                          bold; border: none; 
                                          border-bottom: 1px solid rgb(215, 107, 125); 
                                          padding: 10px; padding-right: 50px; padding-left: 50px; 
                                          margin-left: 65px"
                                   name="btnAdd" id="btnAdd" value="Add to cart"/>
                        </div>
                    </form> 
                </ul>
            </div>
            <?php
                else:
                ?>
                <h2>Nothing to show</h2>
                <?php
            endif;
            ?>
        </div>
    </body>
</html>