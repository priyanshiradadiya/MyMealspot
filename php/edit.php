<html>
    <head>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    </head>
    <body>

    <?php
          $conn=mysqli_connect('localhost','root','','testing1');
          $sql='select * from user where id='.$_GET['id'];
          $res=mysqli_query($conn,$sql);
          $row=mysqli_fetch_assoc($res);
          echo $row['id'];
         
         
          if(isset($_POST['update'])){
        
            $username=$_POST['username'];
            $email=$_POST['email'];
            $mobile=$_POST['mobile'];
            $password=$_POST['password'];
            $id=$_POST['txtid'];

            $sql="update user set username='$username',email='$email',mobile='$mobile',password='$password' where id=".$_GET['id'];

            if(mysqli_query($conn,$sql))
            {
                header('location:index.php');
            }
            else{
                echo "error.....";
            }
        }
    ?>
    <div class="container">
    <center><h1> Update User</h1></center>
    <form method="POST">

    <div class ="sm-3">
        <label class="form-label">Userame</label>
        <input type="text"  class="form-control" name="username" value="<?php echo $row['username']?>"/>
    </div>
    <div class ="sm-3">
        <label class="form-label">Email</label>
        <input type="text" class="form-control" name="email" value="<?php echo $row['email']?>"/>
    </div>
    <div class ="sm-3">
        <label class="form-label">Mobile</label>
        <input type="text" class="form-control" name="mobile" value="<?php echo $row['mobile']?>"/>
    </div>
    <div class ="sm-3">
        <label class="form-label">Password</label>
        <input type="text" class="form-control" name="password" value="<?php echo $row['password']?>"/>
    </div>
    <div>
        <button type="submit" class="btn btn-success" name="update">update</button>
    </div>
</form>
</div>
    </body>
</html>
