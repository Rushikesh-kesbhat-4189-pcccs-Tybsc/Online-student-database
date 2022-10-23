<?php

    session_start();

    
    $conn=pg_connect("host=localhost port=5432 dbname=student_db user=postgres password=4189");
    
    $email_err=$pws_err=$success=$error='';
    if(isset($_POST['submit'])){
        $fname=$_POST['fname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];

        //$pass=password_hash($password,PASSWORD_BCRYPT);
        //$cpass=password_hash($cpassword,PASSWORD_BCRYPT);

        $query="select * from register where email='$email'";
        $run=pg_query($conn,$query);
        $row=pg_num_rows($run);
        if($row>0){
            $email_err="Email id already exists. Please try with another email";
        }
        else if($password != $cpassword){
            $pws_err="Your password do not match";

        }
        else{
            $sql="insert into register(fname,email,password,cpassword) values('$fname','$email','$password','$cpassword')";
            $run=pg_query($conn,$sql);
            if($run){
                $success="Registered successfully";

            }
            else{
                $error="Unable to submit data. Please try again.......";
            }
        }
        }
?>
<!DOCTYPE html>
<html>
    <head>    
        <title>School management system</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>

<!-- Popper JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" type="text/css" href="style1.css">


        <script>
            function content1(){
                document.getElementById("div1").style.display="block";
                document.getElementById("div2").style.display="none";

            }

            function content2(){
                document.getElementById("div1").style.display="none";
                document.getElementById("div2").style.display="block";

            }

        </script>
    </head>

    <body>
        <section>
            <p class="text_center text-warning font-weight-bold"><?php echo @$_SESSION['login_first'];?> </p>
            <h2 class="text-center text-danger  pt-5 pb-4 font-weight-bold">School Management System</h2>
            <p class="text-center font-weight-bold text-danger"><?php echo @$_GET['error'] ?></p>
            <div class="container bg-danger" id="formsetting"><!--container starts here -->
                <h3 class="text-white text-center py-3">Admin Login | Register Panel</h3>

                <div class="row">  <!--row starts here -->
                    <div class="col-md-7 col-sm-7 col-12">
                        <img src="student_images/student1.png" class="img-fluid">
                     </div>

                     <div class="col-md-5 col-sm-5 col-12">
                         <button class="btn btn-info px-5" onclick="content1()">Register</button>
                         <button class="btn btn-info px-5" onclick="content2()">Login</button>


                         <div id="div1" style="display: block"class="mt-4">
                         <form method="post" action="">

                             <div class="form-group">
                                 <label class="text-white">Full name</label>
                                 <input type="text" name="fname" placeholder="Enter your name" class="form-control" required="required">    
                             </div>

                             <div class="form-group">
                                <label class="text-white">Email</label>
                                <span class="float-right text-white font-weight-bold"><?php echo $email_err;?></span>
                                <input type="email" name="email" placeholder="Enter your email" class="form-control"required="required">    
                            </div>

                            <div class="form-group">
                                <label class="text-white">Password</label>
                                <input type="password" name="password" placeholder="Enter your password" class="form-control"required="required">    
                            </div>

                            <div class="form-group">
                                <label class="text-white">Confirm Password</label>
                                <span class="float-right text-white font-weight-bold"><?php echo $pws_err;?></span>
                                <input type="password" name="cpassword" placeholder="RE-Enter your password" class="form-control"required="required">    
                            </div>

                            <input type="submit" name="submit" value="Register" class="btn btn-success px-5">
                            <span class="float-right text-white font-weight-bold"><?php echo $success; echo $error;?></span>

                         </form>
                        </div>

                        <div id="div2" style="display:none" class="mt-4">
                            <form method="post" action="">
                                <div class="form-group">
                                   <label class="text-white">Email</label>
                                   <input type="email" name="email" placeholder="Enter your email" class="form-control">    
                               </div>
   
                               <div class="form-group">
                                   <label class="text-white">Password</label>
                                   <input type="password" name="password" placeholder="Enter your password" class="form-control">    
                               </div>
   
                               
   
                               <input type="submit" name="submit1" value="Login" class="btn btn-success px-5">
   
                            </form>
                        

                        </div>

                         
                     </div>
                </div> <!--row ends here -->

            </div> <!-- Container ends here -->
        </section>
    </body>

</html>
        
<?php

    if(isset($_POST['submit1'])){
        $email=$_SESSION['email']=$_POST['email'];
        $pwd=$_POST['password'];
        $sql="select * from register where email='$email'";
        $run=pg_query($conn,$sql);
        $row=pg_fetch_assoc($run);

        $pwd_fetch=$row['password'];
       // $pwd_decode=password_verify($pwd,$pwd_fetch);
        if($pwd==$pwd_fetch){
            echo "<script>window.open('main.php?success=Loggedin successfully','_self')</script>";
        }
        else {
            echo "<script>window.open('index.php?error=Username or password is incorrect','_self')</script>";
        }
    }

?>