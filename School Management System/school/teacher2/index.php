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
                        <!-- <h2 class="text-center text-white bg-primary">Statics OverView of Apex Acadamy</h2><hr> -->
                    </div>
                    <div class="col-md-3 ">
                        <div class="card text-primary border-primary">
                            <div class="card-header bg-primary text-white">Students</div>
                            <div class="card-body">
                                <table class="table table-bordered table-condensed ">
                                    <tbody>
                                        <?php
                                for($i=1; $i<=10; $i++){
                                    $student = "SELECT * FROM student WHERE class = '$i'";
                                    $student_run = mysqli_query($con,$student);
                                    $row_student = mysqli_num_rows($student_run);
                                ?>
                                        <tr class="info">
                                            <th class="bg-dark text-white">Class <?php echo  $i;?>:</th>
                                            <th> <?php echo $row_student;?> </th>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                      
                    <div class="col-md-5 ">
                        <img src="images/download.jpg"></img>
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