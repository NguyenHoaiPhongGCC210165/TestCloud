<?php
include_once 'Header.php';
?>
<!-- Sidebar -->
<!-- div content -->
    <div id="main" class="container">  

        <h2 class="title" style="margin-bottom: 30px; margin-top: 150px;font-size: 30px" >Product Categories</h2>

        <form name="frm" method="post" action="">
      
        <p>
            <a href="./Add_category.php" class="text-decoration-none" 
                style=" font-size: 25px; 
                        border: 1px solid ; 
                        border-radius: 5px;
                        background: pink;
                        color: white;
                ">Add</a>
        </p>
        <table id="tablecategory" class="tablecategory" style="border: 1px solid; font-size: 20px; margin-top: 5px" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>Category ID</strong></th>
                    <th><strong>Category Name</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
             </thead>
			<tbody>
                <?php
                //put your code here
                    include_once './connect.php';

                    $conn = new Connect();
                    $dblink = $conn->connectToMySQL();
                    $sql = "SELECT * FROM category";
                    $re = $dblink->query($sql);

                    //fetch_assoc trả về dữ liệu dạng mảng (tên cột của bảng trong csdl)
                    while($row = $re->fetch_assoc()):
                ?>
			<tr>
              <td style="text-align: center"><?=$row['cID']?></td>
              <td style="text-align: center"><?=$row['cName']?></td>
              <td style='text-align:center'><a href="./Add_category.php?cID=<?=$row['cID']?>" class="text-decoration-none"> Edit</a></td>
              <td style='text-align:center'><a href="./Delete_category.php?cID=<?=$row['cID']?>" class="text-decoration-none"> Delete</a></td>
            </tr>
            <?php
                //put your code here
                endwhile;
            ?>
			</tbody>
        </table>  
        </form>
    </div> <!--main-->
<?php
// include_once 'Footer.php';
?>