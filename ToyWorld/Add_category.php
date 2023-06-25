<?php
include_once 'Header.php';
?>
<!-- Sidebar -->
<!-- div content -->
    <div id="main" class="container">     
        <div className="page-heading pb-2 mt-4 mb-2 ">
        <h1>Product Category</h1>
        </div>
        <?php
           //put your code here
        include_once './connect.php';
        
        $conn = new Connect();
        $dblink = $conn->connectToPDO();
        if(isset($_POST['cID']) && isset($_POST['cName'])):
                $cID = $_POST['cID'];
                $cName = $_POST['cName'];

                if(isset($_POST['btnAdd'])): //Add action
                        $sqlInsert = "INSERT INTO `category`(`cID`, `cName`) VALUES (?,?)";
                        $stmt = $dblink->prepare($sqlInsert);
                        $execute = $stmt->execute(array("$cID","$cName"));
                        
                        if($execute){
                                header("Location: Category_management.php");
                        }
                        else{
                                echo "Failed".$execute;
                        }
                        
                else:
                    //Update action
                    $sqlUpdate = "UPDATE `category` SET `cID` = ?, `cName` = ? WHERE `cID` = ?";
                    $stmt = $dblink->prepare($sqlUpdate);
                    $execute = $stmt->execute(array("$cID", "$cName", "$cID"));
                    if($execute){
                        header("Location: Category_management.php");
                    }
                    else{
                        echo "Failed".$execute;
                    }
                endif;
        endif;
        ?>
        <form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
            <div class="form-group pb-3">
                <label for="txtTen" class="col-sm-2 control-label">Category ID(*): </label>
                <div class="col-sm-10">
                    <input type="text" name="cID" id="cID" class="form-control" placeholder="Category ID" value='<?php echo isset($_GET["cID"])?($_GET["cID"]):"";?>'>
                </div>
            </div>

            <div class="form-group pb-3">
                <label for="txtTen" class="col-sm-2 control-label">Category Name(*): </label>
                <div class="col-sm-10">
                    <input type="text" name="cName" id="cName" class="form-control" placeholder="Category Name" value="<?php echo isset($cName)?($cName):"";?>">
                </div>
            </div>

            <div class="form-group pb-3">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" class="btn btn-primary" 
                        name="<?php echo isset($_GET["cID"])?"btnEdit":"btnAdd";?>"id="btnAction" 
                        value='<?php echo isset($_GET["cID"])?"Edit":"Add new";?>'>
                    <input type="button" class="btn btn-primary" name="btnIgnore" id="btnIgnore" value="Back to list" onclick="window.location.href='./Category_management.php'">
                </div>
            </div>
        </form>
    </div> <!--main-->


