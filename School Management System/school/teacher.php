<?php 
$page_title = "Home Pages";
$page_key = "";
$page_desc = "";
include('inc/top.php');
?>
<!-- Start from here-->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <?php include('inc/navbar.php');?>
        </div>
    </div>
    <div class="row" style="margin-top:10px;">
        <div class="col-md-9">
           
            <small class="text-center text-secondary">
                <h3>Some Of Our Successful Teacher ..... </h3>
            </small>
            <hr>
            <table class="table table-bordered display" id="table2excel">
                      <thead  class="thead-dark">
                        <tr>
                          <th scope="col">Sr No</th>
                          <th scope="col">Teacher Name</th>
                          <th scope="col">Class</th>
                          <th scope="col">Batch</th>
                          <th scope="col">Image</th>
                        </tr>
                         </thead>
                      <tbody>
                         <?php
                   $teacher = "SELECT * FROM teacher ORDER BY id DESC ";
                    $run_teacher = mysqli_query($con, $teacher);
                            $ia=0;
                            while($row_teacher = mysqli_fetch_array($run_teacher)){
                                $id = $row_teacher['id'];
                                $name = $row_teacher['name'];
                                $class = $row_teacher['class'];
                                $batch = $row_teacher['batch'];
                                $image = $row_teacher['image'];
                                
                                 $ia=$ia+1;
                                
                            $courses = "SELECT * FROM courses WHERE course_id = '$batch' ";
                            $run_courses = mysqli_query($con, $courses);
                            $row_courses = mysqli_fetch_array($run_courses);

                            $course_id = $row_courses['course_id'];
                            $course_name = $row_courses['course_name'];
                
                ?> 
                        <tr>
                          <th scope="row"><?php echo $ia;?></th>
                            <td><?php echo ucfirst($name); ?></td>
                          <td>Class <?php echo $class; ?></td>
                          <td><?php echo $course_name; ?></td>
                          <td><img src="images/Teacher/<?php echo $image;?>" class="img-fluid" width="100px" ></td>
                            
                        </tr>
                     <?php } ?>   
                      </tbody>
                    </table>
            <hr>
            <button type="button" class="btn btn-warning offset-md-4">Export to Excel</button>

        </div>
         <div class="col-md-3">
          
            <img src="images/schol.jpeg" class="img-fluid"><hr>
            <img src="images/ram.jpg" class="img-fluid"><hr>
            <img src="images/jain.jpg" class="img-fluid"><hr>
            
        </div> 
    </div>
    <hr>



    <!--------------------Footer---------------------------------->
    <div class="container-fluid">

        <div class="row bg-dark" style="padding-top:20px;">

            <?php include('inc/footer.php');?>

        </div>
    </div>
    <!--------------------Footer---------------------------------->
</div>
</body>

</html>
<script>
    $(document).ready(function() {
        $('#table2excel').DataTable();
    });
</script>
<script>
    $("button").click(function() {
        $("#table2excel").table2excel({
            // exclude CSS class
            exclude: ".noExl",
            name: "Worksheet Name",
            filename: "customer_name.xls" //do not include extension
        });
    });
</script>