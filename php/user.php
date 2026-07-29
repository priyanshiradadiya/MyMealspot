<html>
   <head>
    <title>Restro & cafe</title>
   <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="style.css">
   </head>
   <body>
    <?php
          $conn=mysqli_connect('localhost','root','','testing1');
          $sql="select * from user";
          $res=mysqli_query($conn,$sql);
    ?>
      <header>
        <h2>Restro & Cafe
        </h2>
         <nav>
             <a href="index.php">HOME</a>
             <a href="menu.php">MENU</a>
             <a href="user.php">USER</a>
             
            
         </nav>
          
         <div class="sign-in-up">
         
             <button type="button" onclick="popup('register-popup')">REGISTER</button>

         </div>
</header >
    <div class="container">
        <table class="table table-bordered">
            <tr>
                <td>uid</td>
                <td>username</td>
                <td>email</td>
                <td>mobile</td>
            </tr>
            <?php
            if($res->num_rows>0):
                while($row=$res->fetch_assoc()):
            ?>   
            <tr>
                <td><?php echo $row['id'] ?></td> 
                <td><?php echo $row['username'] ?></td> 
                <td><?php echo $row['email'] ?></td> 
                <td><?php echo $row['mobile'] ?></td>     
                <td><a href="edit.php?id=<?php echo $row['id'] ?> ">Edit</a></td>
                <td><a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a></td>
                </tr>
                <?php
                endwhile;
            endif;
            ?>
        </table>
    </div>
    </body>


</html>