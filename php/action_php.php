<?php session_start();
include ('myconnect.php');
include ('function.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Marck+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Code+Pro:900&display=swap" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <link rel="stylesheet" href="../css/mycss.css">
    <style type="text/css">
        .required{
            color: red;
        }
        span{
            font-weight: bold;
        }
        .span{
            line-height: 20px;
            padding-left: 10px;
            font-weight: bold;
        }
        .signup{
            margin: 50px 100px;
            padding: 40px;
            display: block; 
            border: grey 1px solid;
            box-shadow: 10px 10px 5px grey;
        }
        @media (max-width: 992px) {
            .signup{
                margin:20px;
                padding:10px;
            }

        }
    </style>
</head>
<body>
<script src="../js/navbar.js"></script>
<div class="container boxphp">
    <div class="signup" >
    <div style=" line-height: 50px">
        <?php
        $query = "SELECT * FROM tbtropical ORDER BY id DESC";
        $result=mysqli_query($dbc,$query);
        check_querry($result,$query);
        if ($listuser=mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
        ?>
            Welcome <span><?php echo $listuser['username']; ?></span><br>
            Your email address is:  <span><?php echo $listuser['email']; ?></span><br>
            your birthday is:  <span><?php print_r(date("d F", strtotime($listuser['email']))); ?></span><br>
            Your contact number is:  <span><?php echo $listuser['mobile']; ?></span><br>
            Your address is: <span><?php echo $listuser['address'];; ?></span><br>
            you have indicated that you like:

        <div class="span">
            <p><?php print_r($_SESSION["meal1"]);?></p>
            <p><?php print_r($_SESSION["meal2"]);?></p>
            <p><?php print_r($_SESSION["meal3"]);?></p>
            <p><?php print_r($_SESSION["meal4"]);?></p>
            <p><?php print_r($_SESSION["meal5"]);?></p>
            <p><?php print_r($_SESSION["meal6"]);?></p>
            <p><?php print_r($_SESSION["checkbox"]);?></p>
        </div><br>
        <a href="../index.html"><button type="submit" class="btn btn-primary"> Back to Home Page</button></a>
        <a href="list_user.php"><button type="submit" class="btn btn-secondary"> List of Users (For Admin Only)</button></a><br>
            <a href="edit_user.php?id=<?php echo $listuser['id']?>">Edit your info</a>
        <?php } ?>
    </div>
    </div>
</div>
<script src="../js/footer.js"></script>
</body>
</html>
