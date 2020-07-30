<?php
session_start();
include ('myconnect.php');
include ('function.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>List User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Marck+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:900&display=swap" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <link rel="stylesheet" href="../css/mycss.css">
</head>
<body>
<script src="../js/navbar.js"></script>
<div class="container" >
    <div style="margin: 70px auto 100px; display: block">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <h3>List of users</h3>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Birthday</th>
                            <th>Contact Number</th>
                            <th>Address</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "SELECT * FROM tbtropical ORDER BY id DESC";
                        $result=mysqli_query($dbc,$query);
                        check_querry($result,$query);
                        while ($listuser=mysqli_fetch_array($result,MYSQLI_ASSOC))
                        {
                            ?>
                            <tr>
                                <td><?php echo $listuser['id'];?></td>
                                <td><?php echo $listuser['username'];?></td>
                                <td><?php echo $listuser['email'];?></td>
                                <td><?php echo date("d F",strtotime($listuser['birthday']));?></td>
                                <td><?php echo $listuser['mobile'];?></td>
                                <td><?php echo $listuser['address'];?></td>
                                <td align="center"><a href="edit_user.php?id=<?php echo $listuser['id']?>" ><img  width="16" src="../images/edit-icon.png"></a> </td>
                                <td align="center"><a onclick="return confirm('Do you want to delete ?')" href="delete_user.php?id=<?php echo $listuser['id'] ?>" ><img  width="16" src="../images/457802_delete-icon-png.png"></a></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table><br><br>
                <a href="../index.html"><button type="submit" class="btn btn-primary"> Back to Home Page</button></a>
                <a href="signup.php"><button type="submit" class="btn btn-secondary"> Back to Sign Up Page</button></a>
            </div>
        </div>
    </div>
</div>
<script src="../js/footer.js"></script>
</body>
</html>
