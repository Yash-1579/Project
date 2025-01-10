<?php

$gallery = "SELECT * FROM gallery";
$gallery_run = mysqli_query($con,$gallery);
$row_gallery = mysqli_num_rows($gallery_run);

$student = "SELECT * FROM student";
$student_run = mysqli_query($con,$student);
$row_student = mysqli_num_rows($student_run);

$result = "SELECT * FROM result";
$result_run = mysqli_query($con,$result);
$row_result = mysqli_num_rows($result_run);


$courses = "SELECT * FROM courses";
$courses_run = mysqli_query($con,$courses);
$row_courses = mysqli_num_rows($courses_run);



$category = "SELECT * FROM category";
$category_run = mysqli_query($con,$category);
$row_category = mysqli_num_rows($category_run);


$exam = "SELECT * FROM exam";
$eexam = mysqli_query($con,$exam);
$row_exam = mysqli_num_rows($eexam);

$msg = "SELECT * FROM msg";
$fee_msg = mysqli_query($con,$msg);
$row_msg = mysqli_num_rows($fee_msg);
?>

<div class="list-group" class="justify">
    <a href="index.php" class="list-group-item list-group-item-action active"> <i class="fa fa-tachometer"
            aria-hidden="true"></i>
        Dashboard</a>

    <a href="gallery.php" class="list-group-item list-group-item-action"> <i class="fa fa-camera "
            aria-hidden="true"></i> Gallery <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-secondary"><?php echo $row_gallery;?></span></button></a>


    <a href="student.php" class="list-group-item list-group-item-action"> <i class="fa fa-user" aria-hidden="true"></i>
        Students <button type="button" class="btn btn-danger pull-right btn-sm">
            <span class="badge badge-light text-secondary"><?php echo $row_student;?></span></button></a>

    <a href="course.php" class="list-group-item list-group-item-action"> <i class="fa fa-life-ring"
            aria-hidden="true"></i> Batches <button type="button" class="btn btn-dark pull-right btn-sm">
            <span class="badge badge-light text-secondary"><?php echo $row_courses;?></span></button></a>

   

    <a href="category.php" class="list-group-item list-group-item-action"> <i class="fa fa-sort" aria-hidden="true"></i>
        Category <button type="button" class="btn btn-danger pull-right btn-sm">
            <span class="badge badge-light text-secondary"><?php echo $row_category;?></span></button></a>

      <a href="exam.php" class="list-group-item list-group-item-action"> <i class="fa fa-question" aria-hidden="true"></i>
        Exam <button type="button" class="btn btn-primary pull-right btn-sm">
            <span class="badge badge-light text-secondary"><?php echo $row_exam;?></span></button></a>

            <a href="mark.php" class="list-group-item list-group-item-action"> <i class="fa fa-money" aria-hidden="true"></i> 
            Result  <button type="button" class="btn btn-warning pull-right btn-sm">
            <span class="badge badge-light text-secondary"><?php echo $row_result;?></span></button></a>

            <a href="https://classroom.google.com/?emr=0&pli=1" class="list-group-item list-group-item-action"> <i class="fa fa-money" aria-hidden="true"></i> 
            Study Materials <button type="button" class="btn btn-warning pull-right btn-sm" <img src="logo.jpg" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt="">>
            </button></a>



</div>