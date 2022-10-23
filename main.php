<?php

$conn=pg_connect("host=localhost port=5432 dbname=student_db user=postgres password=4189");

    session_start();
    if(!$_SESSION['email']){
        $_SESSION['login_first']="Please login first";
        header('Location:index.php');

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
            <p class="text-center">Manage School</p>
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
            <h2 class="text-center text-danger pt-3 font-weight-bold">School management system</h2>
            <div class="container bg-danger" id="formsetting">
                <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">Welcome to dashboard</h3>

                <div class="row">
                    <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                        <a href="add_student.php" class="text-white text-center">
                            <i class="fa fa-user"></i>
                            <h3>Add student detail</h3>
                        </a>
                    </div>

                    <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                        <a href="view_student.php" class="text-white text-center">
                            <i class="fa fa-eye"></i>
                            <h3>View student detail</h3>
                        </a>
                    </div>

                    <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                        <a href="view_student.php" class="text-white text-center">
                            <i class="fa fa-pencil"></i>
                            <h3>Edit student detail</h3>
                        </a>
                    </div>

                   
                </div>
                
                <hr>
                
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                        <a href="add_teacher.php" class="text-white text-center"><i class="fa fa-user"></i>>
                               <h3>Add teacher detail</h3> 
                         </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                        <a href="view_teacher.php" class="text-white text-center"><i class="fa fa-eye"></i>>
                               <h3>view teacher detail</h3> 
                         </a>
                    </div>
                    <div class="col-md-4 col-sm-4 col-12 m-auto icon">
                        <a href="view_teacher.php" class="text-white text-center"><i class="fa fa-pencil"></i>>
                               <h3>Edit teacher detail</h3> 
                         </a>
                    </div>
                </div>

            </div>
        </section>




    </div>
    </div>
    </body>
</html> 
