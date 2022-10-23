<?php
    //database connectivity
    $conn=pg_connect("host=localhost port=5432 dbname=student_db user=postgres password=4189");

    if(isset($_GET['delete_student'])){
        $delete=$_GET['delete_student'];

        $query="select * from student_detail where st_id='$delete'";
        $rs=pg_query($conn,$query);
        while($row=pg_fetch_assoc($rs)){
            $image=$row['photo'];

        }
        unlink('student_image/'.$image);
        

        $sql="delete from student_detail where st_id= '$delete'";
        $run=pg_query($conn,$sql);
        if($run){
            echo "<script>window.open('view_student.php?delete_msg=Data deleted successfully','_self')</script>";
        }
    }
?>