<?php
    //database connectivity
    $conn=pg_connect("host=localhost port=5432 dbname=student_db user=postgres password=4189");

    session_start();
    if(!$_SESSION['email']){
        $_SESSION['login_first']="Please login first";
        header('Location:index.php');

    }
    
    
    if(isset($_POST['add'])){
        $fname=pg_escape_string($conn,$_POST['fname']);
        $lname=pg_escape_string($conn,$_POST['lname']);
        $email=pg_escape_string($conn,$_POST['email']);

        $qual=pg_escape_string($conn,$_POST['qualification']);
        $birthdate=pg_escape_string($conn,$_POST['birthdate']);
        $gender=pg_escape_string($conn,$_POST['gender']);
        $city=pg_escape_string($conn,$_POST['city']);
        $district=pg_escape_string($conn,$_POST['district']);
        $nationality=pg_escape_string($conn,$_POST['nationality']);
        $state=pg_escape_string($conn,$_POST['state']);
        $mobile=pg_escape_string($conn,$_POST['mobile']);
        $image=$_FILES['image']['name'];
        $image_type=$_FILES['image']['type'];
        $image_size=$_FILES['image']['size'];
        $image_tmp=$_FILES['image']['tmp_name'];

        /*if(($image_type!= "image/jpeg") or ($image_type != "image/png")){
            $type_error="Invalid image formate";
        }

        else if($image_size > 2000){
                $size_error="Image size is larger. Image size should be less than 2mb";
            }
        else{  */
            move_uploaded_file($image_tmp,"student_image/$image");
            $sql="insert into teacher_detail(fname,lname,qualification,email,mobile,birthdate,gender,district,city,state,nation,photo) values ('$fname','$lname','$qual','$email','$mobile','$birthdate','$gender','$district','$city','$state','$nationality','$image');";

            $run=pg_query($conn,$sql);
            if($run){
                $success="Teacher data submitted successfully";
            }
            else{
                $error="Unable to submit data. Please try again";
            }
       // }
        
        
    }
?>



<html>
    <head>
        <title>Responsive Menu</title>
         <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="style1.css">
<link rel="stylesheet" type="text/css" href="main.css">

<script>
    jQuery(document).ready(function($){
        $('#toggler').click(function(event){
            {
                event.preventDefault();
                $('#wrap').toggleClass('toggled');
            }
        });
    });
</script>

    </head>
    <body>

    <div class="d-flex" id="wrap">

    <div class="sidebar bg-light border-light">
        <div class="sidebar-heading">
            <p class="text-center">Manage Student</p>
        </div>
        <ul class="list-group list-group-flush">
                <a href="main.php" class="list-group-item list-group-item-action">
                <i class="fa fa-vcard-o"></i>DashBoard</a>
                
                <a href="add_student.php" class="list-group-item list-group-item-action">
                <i class="fa fa-user"></i>Add Student Detail</a>

                <a href="view_student.php" class="list-group-item list-group-item-action">
                <i class="fa fa-eye"></i>View Student Detail</a>

                <a href="view_student.php" class="list-group-item list-group-item-action">
                <i class="fa fa-pencil"></i>Edit Student Detail</a>

                <a href="add_teacher.php" class="list-group-item list-group-item-action">
                <i class="fa fa-user"></i>Add Teacher Detail</a>

                <a href="view_teacher.php" class="list-group-item list-group-item-action">
                <i class="fa fa-eye"></i>View Teacher Detail</a>

                <a href="view_teacher.php" class="list-group-item list-group-item-action">
                <i class="fa fa-pencil"></i>Edit Teacher Detail</a>

                <a href="logout.php" class="list-group-item list-group-item-action">
                <i class="fa fa-sign-out"></i>Logout</a>

        </ul>
    </div>



    <div class="main_body col-9">
        <button class="btn btn-outline-light bg-danger mt-3" id="toggler">
            <i class="fa fa-bars"></i>
        </button>


        <section id="main-form">

        <span class="text-center text-success font-weight-bold"><?php  echo @$size_error; echo @$match_err; ?></span>

            <h2 class="text-center text-danger pt-3 font-weight-bold">Student management system</h2>
            <div class="container bg-danger" id="formsetting">
                <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">Add Teacher Detail</h3>
                <form method="post" action="" enctype="multipart/form-data"> <!-- form starts from here-->
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-12 m-auto">
                        <div class="form-group">
                            <label class="text-white">First name</label>
                            <input type="text" name="fname" placeholder="Enter your first name" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label class="text-white">Email</label>
                            <input type="email" name="email" placeholder="Enter your email" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label class="text-white">Qualification</label>
                            <input type="text" name="qualification" placeholder="Enter your Qualification" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label class="text-white">Gender</label><br>
                            <input type="radio" name="gender" value="Male" class="form-check-input ml-2">
                            <label class="form-check-label text-white pl-4">Male</label>
                            <input type="radio" name="gender" value="Female" class="form-check-input ml-2">
                            <label class="form-check-label text-white pl-4">Female</label>
                        </div>
                        <div class="form-group">
                            <label class="text-white">City</label>
                            <input type="text" name="city" placeholder="Enter your City" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label class="text-white">Nationality</label>
                            <input type="text" name="nationality" placeholder="Enter your Nationality" class="form-control" required="required">
                        </div>
                    </div>




                    <div class="col-md-5 col-sm-5 col-12 m-auto">
                        <div class="form-group">
                            <label class="text-white">Last name</label>
                            <input type="text" name="lname" placeholder="Enter your last name" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label class="text-white">Birthdate</label>
                            <input type="date" name="birthdate" placeholder="Enter your Birthdate" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label class="text-white">Mobile</label>
                            <input type="text" name="mobile" placeholder="Enter your Mobile" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label class="text-white">District</label>
                            <input type="text" name="district" placeholder="Enter your District" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label class="text-white">State</label>
                            <input type="text" name="state" placeholder="Enter your State" class="form-control" required="required">
                        </div>
                        <div class="input-group">
                            <label class="text-white">Student Photo</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="image" required="required">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>

                        </div>
                        <input type="submit" name="add" value="Add detail" class="btn btn-success px-5 mt-2">
                        <span class="text-center text-success font-weight-bold"><?php echo @$success; echo @$error;  ?></span>
                    </div>
                </div>
                       
                </form>
            </div>
        </section>




    </div>
    </div>
    </body>
</html> 
