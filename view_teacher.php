<?php
    //database connectivity
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
                event.preventhefault();
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
            <h3 class="text-center text-success"><?php echo @$_GET['update_success']; echo @$_GET['update_error']; echo @$_GET['delete_msg'];?></h3>
            <h2 class="text-center text-danger pt-3 font-weight-bold">Student management system</h2>
            <div class="container bg-danger" id="formsetting">
                <h3 class="text-center text-white pb-4 pt-2 font-weight-bold">View Teacher detail</h3>

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <table class="table table-bordered text-white table-responsive">
                            <thead>
                                <tr>
                                    <th>SNo.</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Qualification</th>
                                    <th>Gender</th>
                                    <th>Email</th>
                                    <th>Birthdate</th>
                                    <th>Mobile</th>
                                    <th>City</th>
                                    <th>District</th>
                                    <th>state</th>
                                    <th>Nationality</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php
                                $sql="select * from teacher_detail";
                                $run=pg_query($conn,$sql);
                                $i=1;
                                while($row=pg_fetch_assoc($run))
                                {
                            ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo $row['fname']; ?></td>
                                    <td><?php echo $row['lname']; ?></td>
                                    <td><?php echo $row['qualification']; ?></td>
                                    <td><?php echo $row['gender']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['birthdate']; ?></td>
                                    <td><?php echo $row['mobile']; ?></td>
                                    <td><?php echo $row['city']; ?></td>
                                    <td><?php echo $row['district']; ?></td>
                                    <td><?php echo $row['state']; ?></td>
                                    <td><?php echo $row['nation']; ?></td>
                                    <td>
                                        <a href="student_image/<?php echo $row['photo']; ?>">
                                            <img src="student_image/<?php echo $row['photo'];?>" width="50" height="50">
                                        </a>

                                    </td>
                                    <td>
                                        <a style="color: white; text-decoration:none;" href="edit_teacher_detail.php?edit_teacher=<?php echo $row['t_id']; ?>">Edit</a>
                                        <a style="color: white; text-decoration:none;" href="delete_teacher_detail.php?delete_teacher=<?php echo $row['t_id']; ?>">Delete</a>
                                    </td>

                                </tr>
                            </tbody>
                            <?php } ?>

                        </table>
                    </div>
                   
                </div>

            </div>
        </section>




    </div>
    </div>
    </body>
</html> 
