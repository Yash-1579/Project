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
                        <h2 class="text-center text-white bg-primary">Teacher Details</h2>
                    </div>
                    <div class="col-md-4 table-responsive">
                        <hr>
                        <?php
                            $user_id = $_GET['id'];
                            $select = "SELECT * FROM teacher WHERE id='$user_id'";
                            $run = mysqli_query($con,$select);
                            $row = mysqli_fetch_array($run);

                            $id= $row['id'];
                            $name= $row['name'];
                            $address= $row['address'];
                            $class= $row['class'];
                            $batch= $row['batch'];
                            $medium= $row['medium'];
                            $gender= $row['gender'];
                            $mobile= $row['mobile'];
                            $email= $row['email'];
                            
                            $salary= $row['salary'];
                            $password= $row['password'];
                            $subject= $row['subject'];
                            $cexam= $row['cexam'];
                            $dob= $row['dob'];
                            $image= $row['image'];
                            $date= $row['date'];
                        
                        
                            $courses = "SELECT * FROM courses WHERE course_id = '$batch' ";
                            $run_courses = mysqli_query($con, $courses);
                            $row_courses = mysqli_fetch_array($run_courses);

                            $course_id = $row_courses['course_id'];
                            $course_name = $row_courses['course_name'];
                            ?>
                        <table class="table table-bordered table-condensed ">
                            <tbody>
                                <tr class="info">
                                    <th class="bg-dark text-white">Name</th>
                                    <th><?php echo $name;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Address</th>
                                    <th><?php echo $address;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Class</th>
                                    <th>Class <?php echo $class;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Batch</th>
                                    <th><?php echo $course_name;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Medium</th>
                                    <th><?php echo $medium;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Gender</th>
                                    <th><?php echo $gender;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Mobile</th>
                                    <th><?php echo $mobile;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">E-mail</th>
                                    <th><?php echo $email;?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 table-responsive">
                        <hr>
                        <table class="table table-bordered table-condensed ">
                            <tbody>
                                
                                <tr class="info">
                                    <th class="bg-dark text-white">Salary</th>
                                    <th><?php echo $salary;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Password</th>
                                    <th> <?php echo $password;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Subject</th>
                                    <th><?php echo $subject;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Compititive Exam</th>
                                    <th><?php echo $cexam;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Date Of Birth</th>
                                    <th><?php echo $dob;?></th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Registration Date</th>
                                    <th><?php echo $date;?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-testimonial text-center">
                            <div class="card-header red accent-3 ">
                                <img src="../images/teacher/<?php echo $image;?>" alt="Card image cap">
                            </div>
                            <div class="card-body">
                                <h4 class="card-title mt-5"><?php echo $name;?></h4>
                                <hr>
                              
                            </div>
                        </div>
                       
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center text-white bg-primary">Salary Details</h2><hr>
                    </div>
                    <div class="col-md-4 table-responsive">
                        <table class="table table-bordered table-condensed ">
                            <tbody>
                                <?php
                                $salaryteacher = "SELECT * FROM salary WHERE teacherId = '$id' ";
                                $runPaidteacher = mysqli_query($con, $salaryteacher);
                                $tsalary = 0;
                                $salaryPaid=0;
                                while($rowPaidteacher = mysqli_fetch_array($runPaidteacher)){
                                $salaryPaid = $rowPaidteacher['salary'];
                                $paidDate = $rowPaidteacher['date'];
                                $rNo = $rowPaidteacher['rNo'];
                                
                                $tsalary += $salaryPaid;
                                ?>
                                <tr class="info">
                                    <th class="bg-dark text-white"><?php echo $paidDate;?></th>
                                    <th> Rs <?php echo $saalryPaid;?> </th>
                                    <th>Voucher No. <?php echo $rNo;?></th>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4 table-responsive">
                        <table class="table table-bordered table-condensed ">
                            <tbody>
                                <tr class="info">
                                    <th class="bg-dark text-white">Total Fees</th>
                                    <th> Rs <?php echo $salary;?> </th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-dark text-white">Paid Fees</th>
                                    <th> Rs <?php echo $tsalary;?> </th>
                                </tr>
                                <tr class="info">
                                    <th class="bg-danger text-white">Balance</th>
                                    <th> Rs <?php echo $salary-$salaryPaid;?> </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="text-center text-white bg-primary">Attendance Details</h2>
                        <hr>
                        <div class="row">
                            <?php
                                $present = "SELECT * FROM attendanceteacher WHERE teacherId = '$user_id' && attendance='Present' ";
                                $present_run = mysqli_query($con,$present);
                                $row_present = mysqli_num_rows($present_run);
                            
                                $absent = "SELECT * FROM attendanceteacher WHERE teacherId = '$user_id' && attendance='Absent' ";
                                $absent_run = mysqli_query($con,$absent);
                                $row_absent = mysqli_num_rows($absent_run);
                            ?>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-secondary btn-block">
                                  Present Days <span class="badge badge-light"><?php echo $row_present;?></span>
                                </button><hr>
                            </div>
                            <div class="col-md-12">
                                <button type="button" class="btn btn-danger btn-block">
                                  Absent Days <span class="badge badge-light"><?php echo $row_absent;?></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <hr><h2 class="text-center text-white bg-primary">Messages to <?php echo $name;?></h2><hr>
                        <table class="table table-bordered display" id="table2excel2">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Sr No</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                   $msg = "SELECT * FROM msgteacher WHERE teacherId = '$user_id' ORDER BY id DESC ";
                    $run_msg = mysqli_query($con, $msg);
                            $ia=0;
                            while($row_msg = mysqli_fetch_array($run_msg)){
                                $id = $row_msg['id'];
                                $teacherId = $row_msg['teacherId'];
                                $message = $row_msg['message'];
                                $date = $row_msg['date'];
                                 $ia=$ia+1;
                
                ?>
                                <tr>
                                    <th scope="row"><?php echo $ia;?></th>
                                    <td> <?php echo $date; ?></td>
                                    <td> <?php echo $message; ?></td>
                                </tr>
                                <?php } ?>
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
    <!------------------------------------------------------>
    <script>
        CKEDITOR.replace('post-data');
    </script>
    <script>
        $(document).ready(function() {
            $('#table2excel').DataTable();
        });
    </script>
<script>
        $(document).ready(function() {
            $('#table2excel2').DataTable();
        });
    </script>
    <script>
        $("#but").click(function() {
            $("#table2excel").table2excel({
                // exclude CSS class
                exclude: ".noExl",
                name: "Worksheet Name",
                filename: "customer_name.xls" //do not include extension
            });
        });
    </script>
    <?php
  if(isset($_POST['addFees'])){
      $feepaid = $_POST['feepaid'];
      $rNo = $_POST['rNo'];
            
      $insert_news = "INSERT INTO fee (studentId,classId,batchId,fees,rNo,date) VALUES ('$id','$class','$batch','$feepaid','$rNo',NOW())";
      
      $insert_pro = mysqli_query($con,$insert_news);
      
      if($insert_pro){
                  
	   echo"<script>alert('Welcome, You have added Fees !')</script>";
	   echo"<script>window.open('fee.php','_self')</script>";
        }
  } 
    
?>