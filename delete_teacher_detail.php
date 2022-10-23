<?php
    //database connectivity
    $conn=pg_connect("host=localhost port=5432 dbname=student_db user=postgres password=4189");

    if(isset($_GET['delete_teacher'])){
        $delete=$_GET['delete_teacher'];

        $query="select * from teacher_detail where t_id='$delete'";
        $rs=pg_query($conn,$query);
        while($row=pg_fetch_assoc($rs)){
            $image=$row['photo'];

        }
        unlink('student_image/'.$image);
        

        $sql="delete from teacher_detail where t_id= '$delete'";
        $run=pg_query($conn,$sql);
        if($run){
            echo "<script>window.open('view_teacher.php?delete_msg=Data deleted successfully','_self')</script>";
        }
    }
?>