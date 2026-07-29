<?php
          $conn=mysqli_connect('localhost','root','','testing1');
          $sql='delete from user where id='.$_GET['id'];
          $res=mysqli_query($conn,$sql);
          header('location:index.php')
    ?>