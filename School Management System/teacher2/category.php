<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');
if(isset($_GET['del'])){
    $del_id = $_GET['del'];
    
    $del_query = "DELETE  FROM category WHERE cat_id = '$del_id'";
    $del_run = mysqli_query($con,$del_query);
    if($del_run)
    {
       echo "<script>alert('You have been deleted successfully')</script>";
        echo "<script>window.open('category.php','_self')</script>";  
    }
}

?>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <?php include('inc/navbar.php');?>
            </div>
        
        </div>
		<div class="row" style="margin-top:10px;">
			<div class="col-md-3">
                <?php include('inc/sidebar.php');?>
            </div>
			<div class="col-md-9">
           
            <div class="row">
                <div class="col-md-12">
                  <h1 class="text-center bg-secondary text-white">View all Category</h1>
                    <div align="right">
                    <a href="addAdType.php" class="btn btn-outline-primary" >Add Category</a><hr>
                    </div>
                    <div id="product_table">
                     <table class="table table-bordered display" id="table2excel">
                      <thead  class="thead-dark">
                        <tr>
                          <th scope="col">Sr No</th>
                          <th scope="col">Category Name</th>
                          
                          <th scope="col"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
</th>
                          <th scope="col"><i class="fa fa-trash-o" aria-hidden="true"></i>
</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                   $adtype = "SELECT * FROM category ";
                    $runAdType = mysqli_query($con, $adtype);
                            $ia=0;
                            while($rowAdType = mysqli_fetch_array($runAdType)){
                                $cat_id = $rowAdType['cat_id'];
                                $cat_name = $rowAdType['cat_name'];

                                 $ia=$ia+1;
                ?> 
                        <tr>
                          <th scope="row"><?php echo $ia;?></th>
                          <td><?php echo ucfirst($cat_name); ?></td>
                            <td><a href="editCategory.php?id=<?php echo $cat_id;?>" class="btn btn-warning" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                          <td><a href="category.php?del=<?php echo $cat_id;?>" class="btn btn-danger" ><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                        </tr>
                     <?php } ?>   
                      </tbody>
                    </table>
                        <hr>
                    </div>
                    <button type="button" class="btn btn-warning offset-md-4" id="but">Export to Excel</button><hr>
                    
                </div>
            </div>
            </div>
        </div>
    
    
<!--------------------Footer---------------------------------->
   <div class="container-fluid">
        <div class="row bg-dark" style="padding-top:20px;">
            <?php include('inc/footer.php');?>
        </div>
    </div>
<!--------------------Footer---------------------------------->
</div>
 </html>
<!------------------View Product----------------------------------->


<!----------------------------------------------------->

<!------------------------------------------------------>
<script>
CKEDITOR.replace( 'post-data' ); 
</script>
<script>
$(document).ready(function(){
    $('#table2excel').DataTable();
});
</script>
<script>
$("#but").click(function(){
  $("#table2excel").table2excel({
    // exclude CSS class
    exclude: ".noExl",
    name: "Worksheet Name",
    filename: "customer_name.xls" //do not include extension
  }); 
});
</script>






