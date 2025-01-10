<?php 
ob_start();
session_start();
if(!isset($_SESSION['user_name'])){
        header('Location:login.php');
    }
require_once('inc/top.php');

$fee = "SELECT * FROM result";
$fee_run = mysqli_query($con,$fee);
$row_fee = mysqli_num_rows($fee_run);


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
                        <h2 class="text-white text-center bg-primary">Add Result For Student</h2>
                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Student Name</label>
                                <div class="col-sm-10">
                                   
                                    <input type="text" class="form-control" placeholder="Enter Student Name"
                                        name="studentName" required style="border: 1px solid black;padding:10px;">
                                      
                                </div>
                            </div>

                           

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">For Class</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="class" required
                                        style="border: 1px solid black;padding:10px;">
                                        <option value="1">Class 1 </option>
                                        <option value="2">Class 2 </option>
                                        <option value="3">Class 3 </option>
                                        <option value="4">Class 4 </option>
                                        <option value="5">Class 5 </option>
                                        <option value="6">Class 6 </option>
                                        <option value="7">Class 7 </option>
                                        <option value="8">Class 8 </option>
                                        <option value="9">Class 9 </option>
                                        <option value="10">Class 10 </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Batch</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="batch" required
                                        style="border: 1px solid black;padding-left:10px;">
                                        <?php echo get_option_list('courses','course_id','course_name');?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Medium</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="medium" required
                                        style="border: 1px solid black;padding:10px;">
                                        <option value="Marathi">Marathi</option>
                                        <option value="Semi">Semi</option>
                                        <option value="CBSE">CBSE</option>
                                        <option value="Gujarati">GUJARATI</option>
                                        
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Gender</label>
                                <div class="col-sm-10">
                                    <select class="form-control" name="gender" required
                                        style="border: 1px solid black;padding:10px;">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Total Marks</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" placeholder="Enter Total Mark Here" name="tm"
                                        required style="border: 1px solid black;padding:10px;">
                                </div>
                            </div>

                           

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Obtained Marks</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" placeholder="Enter Total Obtained Mark  Here"
                                        name="om" required style="border: 1px solid black;padding:10px;">
                                </div>
                            </div>

                           <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Subject</label>
                                <div class="col-sm-10">
                                    <?php
                                    $subject = "SELECT * FROM subject ";
                                    $runSubject = mysqli_query($con, $subject);
                                    while($rowSubject = mysqli_fetch_array($runSubject)){
                                            $id = $rowSubject['id'];
                                            $subjectName = $rowSubject['subjectName'];

                                    ?>
                                    <div class="form-check form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="checkbox" name="sub[]"
                                                value="<?php echo $subjectName;?>"> <?php echo $subjectName;?>
                                        </label>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label text-dark">Date Of Birth</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control datepicker" data-date-format="dd/mm/yyyy"
                                        name="date" placeholder="Choose Date"
                                        style="border: 1px solid black;padding:10px;">
                                </div>
                            </div>
                           
                            <div class="form-group row">
                                <div class="offset-sm-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary" name="submit">Add Result</button>
                                </div>
                            </div>
                        </form>
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
    <script>
    $(function() {
        $('.datepicker').datepicker();
    });
    </script>
    <script>
    CKEDITOR.replace('prodata');
    </script>
    <?php
  if(isset($_POST['submit'])){
      $studentName = $_POST['studentName'];
      $date = $_POST['date'];
      $tm = $_POST['tm']; 
      $om = $_POST['om']; 
    
      $medium = $_POST['medium'];
      $batch = $_POST['batch'];
      $class = $_POST['class'];
      $gender = $_POST['gender'];
      $sub = implode(",",$_POST['sub']); 
      
      
      
    
      
      
      $sql = "INSERT INTO result(studentId,batchId,classId,date,subject,totalMarks,obtainmark) VALUES('".$student_id."','".$batchId."','".$classId."','".$date."','".$subject."','".$tmarks."','".$omarks."')";
		mysqli_query($con,$sql);
    
      
            
                
          
	   echo"<script>alert('Welcome, You have added a new Result !')</script>";
	   echo"<script>window.open('mark.php','_self')</script>";
        }
  echo $row_fee;
    
?>