<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');


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
                </div>
            </div>
            <div class="row">
            <div class="col-md-12 mb-2">
          
    <h2 class="text-center text-white bg-primary">Marks Details</h2>
    <hr>
    
    <table class="table table-bordered display" id="table2excel">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Student ID</th>
                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Subject</th>
                <th scope="col">Medium</th>
                <th scope="col">Batch</th>
                <th scope="col">Total Marks</th>
                <th scope="col">Obtained Marks</th>
                <th scope="col">Image</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $student_query = "SELECT * FROM student";
            $student_result = mysqli_query($con, $student_query);

            while($row_student = mysqli_fetch_array($student_result)) {
                $id = $row_student['id'];
                $name = $row_student['name'];
                $batch = $row_student['batch'];
                $image = $row_student['image'];
                $medium = $row_student['medium'];

                $result_query = "SELECT * FROM result WHERE studentId = '$id'";
                $result_result = mysqli_query($con, $result_query);

                while($row_result = mysqli_fetch_array($result_result)) {
                    $date = $row_result['date'];
                    $subject = $row_result['subject'];
                    $totalMarks = $row_result['totalMarks'];
                    $obtainmark = $row_result['obtainmark'];
                    $batchId = $row_result['batchId'];

                    echo "<tr>";
                    echo "<td>$id</td>";
                    echo "<td>" . ucfirst($name) . "</td>";
                    echo "<td>$date</td>";
                    echo "<td>$subject</td>";
                    echo "<td>$medium</td>";
                    echo "<td>$batchId</td>";
                    echo "<td>$totalMarks</td>";
                    echo "<td>$obtainmark</td>";
                    echo "<td><img src='../images/student/$image' class='img-fluid' width='100px'></td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
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






