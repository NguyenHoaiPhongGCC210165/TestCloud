<?php
    include_once './Header.php';
    include_once './connect.php';

    if(isset($_POST['btnSubmit'])){
        $pID = $_POST['pID'];
        $pName = $_POST['pName'];
        $pImg = str_replace(' ','-',$_FILES['Pro_image']['name']);
        $pQuantity = $_POST['pQuantity'];
        $pPrice = $_POST['pPrice'];
        $eID = $_POST['eID'];
        $cID = $_POST['cID'];
        $supID = $_POST['supID'];

        /*lưu ảnh trong project, không lưu trong ổ c,d */
        $storedImage = "./Images/";

        $flag = move_uploaded_file($_FILES['Pro_image']['tmp_name'],$storedImage.$pImg);
        if($flag){
            $c = new Connect();
            $dblink = $c -> connectToPDO();

            $sql="INSERT INTO `product`(`pID`, `pName`, `pImage`, `pQuantity`, `pPrice`, `eID`, `cID`, `supID`) 
                VALUES(?,?,?,?,?,?,?,?)";
            $re = $dblink->prepare($sql);
            $stmt = $re->execute(array("$pID", "$pName", "$pImg", "$pQuantity", "$pPrice", "$eID", "$cID", "$supID"));

            // $sql = "INSERT INTO `image`(`iImage`) VALUES (?)";
            // $re = $dblink->prepare($sql);
            // $stmt = $re->execute(array("$pImg"));

            if($stmt == TRUE)
            {
                echo "<script> alert('Success!') </script>";
                header("Location: ./index.php");
            }else{
                echo "<script> alert('Failed!!!') </script>";
            }
        }
    }

?>
<div id="main" class="container mt-4">     
                        <form class="form form-vertical" method="POST" action="#"  
                        enctype="multipart/form-data">
                            <div class="form-body" style="font-size: 18px;">
                                <div class="rowAdd" style="padding-left:350px; height: 500px;">
                                    <!-- <div class="mb-3" style="padding-bottom: 5px;">
                                        <label for="exampleFormControlInput1" class="form-label" style="padding-left: 39px;">Product ID</label>
                                        <input type="text" class="form-control" name="pID" id="exampleFormControlInput1" placeholder="" style="width: 300px">
                                    </div> -->
                                    <div class="mb-3" style="padding-bottom: 5px;">
                                        <label for="exampleFormControlInput1" class="form-label" style="padding-left: 16px;">Product Name</label>
                                        <input type="text" class="form-control" name="pName" id="exampleFormControlInput1" placeholder="" style="width: 300px">
                                    </div>
                                    <div class="col-12" style="padding-bottom: 5px;">
                                        <div class="form-group">
                                            <label for="image-vertical" style="padding-left: 75px;">Image</label>
                                            <input type="file" name="Pro_image" id="Pro_image" 
                                            class="form-control" value="" style="width: 300px">
                                        </div>
                                    </div>
                                    <div class="mb-3" style="padding-bottom: 5px;">
                                        <label for="exampleFormControlInput1" class="form-label" style="padding-left: 57px;">Quantity</label>
                                        <input type="text" class="form-control" name="pQuantity" id="exampleFormControlInput1" placeholder="" style="width: 300px">
                                    </div>
                                    <div class="mb-3" style="padding-bottom: 5px;" >
                                        <label for="exampleFormControlInput1" class="form-label" style="padding-left: 83px;">Price</label>
                                        <input type="text" class="form-control" name="pPrice" id="exampleFormControlInput1" placeholder="" style="width: 300px">
                                    </div>
                                    <div class="mb-3" style="padding-bottom: 5px;">
                                        <label for="exampleFormControlInput1" class="form-label" >Employee Name</label>
                                        <input type="text" class="form-control" name="eID" id="exampleFormControlInput1" placeholder="" style="width: 300px">
                                    </div>
                                    <div class="mb-3" style="padding-bottom: 5px;">
                                        <label for="exampleFormControlInput1" class="form-label" style="padding-left: 55px;">Category</label>
                                        <input type="text" class="form-control" name="cID" id="exampleFormControlInput1" placeholder="" style="width: 300px">
                                    </div>
                                    <div class="mb-3" style="padding-bottom: 5px;">
                                        <label for="exampleFormControlInput1" class="form-label" style="padding-left: 60px;">Supplier</label>
                                        <input type="text" class="form-control" name="supID" id="exampleFormControlInput1" placeholder="" style="width: 300px">
                                    </div>
                                    <div class="col-12 d-flex mt-3 justify-content-center" style="padding-left: 220px;">
                                        <button type="submit" class="btn btn-warning me-1 mb-1 rounded-pill" 
                                        name="btnSubmit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form> 
    </div> <!--main-->

<?php
    // include_once 'Footer.php';
?>