<?php
session_start();
include ('myconnect.php');
include ('function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Complete</title>
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
        .qty{
            font-weight: bold;
            color: green;
            font-size: 17px;
        }
        .price{
            font-size: 17px;
            font-weight: bold;
            color: blue;
        }
        .boxphp{
            padding: 20px;
            box-shadow: 10px 10px 5px grey;
            border: grey solid 1px;
        }
        @media (max-width: 992px) {
            .ordergroup h5{
                font-size: 95%;
            }
            .label{
                width:150px;
            }
            .orderinput{
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
<script src="../js/navbar.js"></script>
<div class="container " style="padding: 40px; margin: auto">
    <div class="col-lg-7 col-md-9 col-sm-12" style="margin: auto">
        <div class="boxphp">
            <h4 style="color: green">Your Order have been successful</h4>
            <?php
            $query = "SELECT * FROM tbtropical ORDER BY id DESC";
            $result=mysqli_query($dbc,$query);
            check_querry($result,$query);
            if ($listuser=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
                ?>

                <p>Username: <span style="font-weight: bold"><?php echo $listuser['username']; ?></span></p>
                <p>Email: <span style="font-weight: bold"><?php echo $listuser['email']; ?></span></p>
                <p>Birthday: <span style="font-weight: bold"><?php print_r(date("d F", strtotime($listuser['birthday']))); ?></span></p>
                <p>Contact number:<span style="font-weight: bold"><?php echo $listuser['mobile']; ?></span></p>
                <p>Address: <span style="font-weight: bold"><?php echo $listuser['address']; ?></span></p>
            <?php } ?>
            <label>Your order items: </label>
            <p ><span class="qty"><?php echo $_SESSION["qty1"]?></span><span class="price"><?php echo $_SESSION['price1']?></span></p>
            <p ><span class="qty"><?php echo $_SESSION["qty2"]?></span><span class="price"><?php echo $_SESSION['price2'];?></span></p>
            <p ><span class="qty"><?php echo $_SESSION["qty3"]?></span><span class="price"><?php echo $_SESSION['price3'];?></span></p>
            <p ><span class="qty"><?php echo $_SESSION["qty4"]?></span><span class="price"><?php echo $_SESSION['price4'];?></span></p>
            <p ><span class="qty"><?php echo $_SESSION["qty5"]?></span><span class="price"><?php echo $_SESSION['price5'];?></span></p>
            <p ><span class="qty"><?php echo $_SESSION["qty6"]?></span><span class="price"><?php echo $_SESSION['price6'];?></span></p><br>
            <p>Total: <span class="price">$<?php

                            if($_SESSION['price1'] == ""){$price1 = 0;}else{$price1 = $_SESSION['price1'];}
                            if($_SESSION['price2'] == ""){$price2 = 0;}else{$price2 = $_SESSION['price2'];}
                            if($_SESSION['price3'] == ""){$price3 = 0;}else{$price3 = $_SESSION['price3'];}
                            if($_SESSION['price4'] == ""){$price4 = 0;}else{$price4 = $_SESSION['price4'];}
                            if($_SESSION['price5'] == ""){$price5 = 0;}else{$price5 = $_SESSION['price5'];}
                            if($_SESSION['price6'] == ""){$price6 = 0;}else{$price6 = $_SESSION['price6'];}
                            $total = $price1 + $price2 + $price3 + $price4 + $price5 + $price6;
                            echo  $total;
                    ?></span></p>
            <a href="../index.html"><button type="submit" class="btn btn-primary" name="submit" value ="0">Back to Home Page</button></a>
            <a href="order.php"><button type="submit" class="btn btn-secondary" name="submit" value ="0">Back to Order Page</button></a>
        </div>
    </div>
</div>
<script src="../js/footer.js"></script>
</body>
</html>