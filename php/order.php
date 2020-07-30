<?php
session_start();
include ('myconnect.php');
include ('function.php');
if(!empty($_POST)){
//    $_SESSION["username"] = $_POST["username"];
//    $_SESSION["email"] = $_POST["email"];
//    $_SESSION["birthday"] = $_POST["birthday"];
//    $_SESSION["mobile"]= $_POST["mobile"];
//    $_SESSION["address"] = $_POST["address"];
    $_SESSION["price1"] = (!empty($_POST["qty1"])) ? $_SESSION["price1"] =0:"";
    $_SESSION["price2"] = (!empty($_POST["qty2"])) ? $_SESSION["price2"] =0:"";
    $_SESSION["price3"] = (!empty($_POST["qty3"])) ? $_SESSION["price3"] =0:"";
    $_SESSION["price4"] = (!empty($_POST["qty4"])) ? $_SESSION["price4"] =0:"";
    $_SESSION["price5"] = (!empty($_POST["qty5"])) ? $_SESSION["price5"] =0:"";
    $_SESSION["price6"] = (!empty($_POST["qty6"])) ? $_SESSION["price6"] =0:"";
    $_SESSION["qty1"] = (!empty($_POST["qty1"])) ? $_POST["qty1"]." x Caramel slice: $" : "";
    $_SESSION["qty2"] = (!empty($_POST["qty2"])) ? $_POST["qty2"]." x Cherry ripe slice: $" : "";
    $_SESSION["qty3"] = (!empty($_POST["qty3"])) ? $_POST["qty3"]." x Raspberry cheesecake: $" : "";
    $_SESSION["qty4"] = (!empty($_POST["qty4"])) ? $_POST["qty4"]." x Chocolate chip muffin: $" : "";
    $_SESSION["qty5"] = (!empty($_POST["qty5"])) ? $_POST["qty5"]." x Blueberry muffin: $" : "";
    $_SESSION["qty6"] = (!empty($_POST["qty6"])) ? $_POST["qty6"]." x Lemon meringue pie: $" : "";
    $i=1;
    if(!empty($_SESSION["qty1"]))
    {
        while($i <= $_SESSION["qty1"]){
            $_SESSION["price1"] = $_SESSION["price1"] + 3.38;
            $i += 1;
        }
    }
    $i=1;
    if(!empty($_SESSION["qty2"]))
    {
        while($i <= $_SESSION["qty2"]){
            $_SESSION["price2"] = $_SESSION["price2"] + 3.38;
            $i += 1;
        }
    }
    $i=1;
    if(!empty($_SESSION["qty3"]))
    {
        while($i <= $_SESSION["qty3"]){
            $_SESSION["price3"] = $_SESSION["price3"] + 2.99;
            $i += 1;
        }
    }
    $i=1;
    if(!empty($_SESSION["qty4"]))
    {
        while($i <= $_SESSION["qty4"]){
            $_SESSION["price4"]= $_SESSION["price4"] + 2.99;
            $i += 1;
        }
    }
    $i=1;
    if(!empty($_SESSION["qty5"]))
    {
        while($i <= $_SESSION["qty5"]){
            $_SESSION["price5"] = $_SESSION["price5"] + 5.5;
            $i += 1;
        }
    }
    $i=1;
    if(!empty($_SESSION["qty6"]))
    {
        while($i <= $_SESSION["qty6"]){
            $_SESSION["price6"] = $_SESSION["price6"] + 5.5;
            $i += 1;
        }
    }
    $errors=array();
//    if (empty($_POST["username"])) {
//        $errors[0] = "<p class='required'>Please enter your name!</p>";
//    }
/*    if (preg_match('~[0-9]~', $_POST["username"]) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['username'])){*/
//        $errors[0] = "<p class='required'>Your name must include only letters and whitespace!</p>";
//    }
//    if (empty($_POST['email'])) {
//        $errors[1] = "<p class='required'>Please enter your email!</p>";
//    }
//    if (!filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) && !empty($_POST['email'])) {
//        $errors[1] = "<p class='required'>Your email is wrong format!</p>";
//    }
//    if ((empty($_POST['birthday']))) {
//        $errors[2] = "<p class='required'>Please enter your birthday!</p>";
//    }
//    if ((empty($_POST['mobile']))) {
//        $errors[3] = "<p class='required'>Please enter your contact number!</p>";
//    }elseif(strlen($_POST['mobile'])!=8){
//        $errors[3] = "<p class='required'>Contact number must include only 8 digits!</p>";
//    }
//    if ((empty($_POST['address']))) {
//        $errors[4] = "<p class='required'>Please enter your address!</p>";
//    }
    if(empty($_POST["qty1"]) && empty($_POST["qty2"]) && empty($_POST["qty3"]) && empty($_POST["qty4"]) && empty($_POST["qty5"]) && empty($_POST["qty6"])){
        $errors[5] = "<p class='required'>Please choose the item to order!</p>";
    }
    if (empty($errors) && isset($_POST["submit"])) {
        header('Location: buy.php');
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Page</title>
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
        .ordergroup{
            width: 90%;
            margin: 30px 20px
        }
        .orderinput{
            text-align: center;
            border-top: none;
            border-left: none;
            border-right: none;
            border-bottom: 1px solid;
            margin-top: 7px;
            width: 30px;
            height: 30px;
        }
        .ordergroup h5, p{
            display: inline;
        }
        .value_price1, .value_price2, .value_price3, .value_price4, .value_price5, .value_price6 ,.value_price{
            color: blue;
            font-size: 20px;
        }
        span{
            font-weight: bold;
        }
        @media (max-width: 992px) {
            .ordergroup h5, p{
                display: block;
            }
            .value_price1, .value_price2, .value_price3, .value_price4, .value_price5, .value_price6 , .value_price{
                text-align: center;
                font-size: 95%;
            }
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
<div class="container" style="padding:40px 10px">
    <div class="col-lg-7 col-md-9 col-sm-12" style="margin: auto">
        <div style="box-shadow: 10px 10px 5px grey; padding: 20px; border: 1px solid grey">
            <?php $query = "SELECT * FROM tbtropical ORDER BY id DESC";
            $result = mysqli_query($dbc, $query);
            check_querry($result, $query);
            if ($listuser=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
            ?>
            <h3>Order</h3>

<!--            <div class="form-group">-->
<!--                <label for="username">Username:</label>-->
<!--                <input type="text" class="form-control" placeholder="Enter username" name="username" id="username" value="--><?php //if(isset($_POST['username'])){echo $_POST['username'];} ?><!--">-->
<!--                --><?php
//                if (!empty($errors[0])) {
//                    echo $errors[0];
//                }
//                ?>
<!--            </div>-->
<!--            <div class="form-group">-->
<!--                <label for="email">Email:</label>-->
<!--                <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="--><?php //if(isset($_POST['email'])){echo $_POST['email'];} ?><!--">-->
<!--                --><?php
//                if (!empty($errors[1])) {
//                    echo $errors[1];
//                }
//                ?>
<!--            </div>-->
<!--            <div class="form-group">-->
<!--                <label for="birthday">Birthday:</label>-->
<!--                <input type="date" class="form-control" placeholder="Enter birthday" name="birthday" id="birthday" value="--><?php //if(isset($_POST['birthday'])){echo $_POST['birthday'];} ?><!--">-->
<!--                --><?php
//                if (!empty($errors[2])) {
//                    echo $errors[2];
//                }
//                ?>
<!--            </div>-->
            <div style="line-height: 50px">
                Welcome back: <span><?php echo $listuser['username']; ?></span><br>
                Your email address is:  <span><?php echo $listuser['email']; ?></span><br>
                your birthday is:  <span><?php print_r(date("d F", strtotime($listuser['email']))); ?></span><br>
                Your contact number is:  <span><?php echo $listuser['mobile']; ?></span><br>
                Your address is: <span><?php echo $listuser['address'];; ?></span><br>
            </div>
<!--            <div class="form-group">-->
<!--                <label for="mobile">Contact number:</label>-->
<!--                <input type="number" class="form-control" placeholder="Enter contact number" name="mobile" id="mobile" value="--><?php //if(isset($_POST['mobile'])){echo $_POST['mobile'];} ?><!--">-->
<!--                --><?php
//                if (!empty($errors[3])) {
//                    echo $errors[3];
//                }
//                ?>
<!--            </div>-->
<!--            <div class="form-group">-->
<!--                <label for="address">Address:</label>-->
<!--                <input type="text" class="form-control" placeholder="Enter your address" name="address" id="address" value="--><?php //if(isset($_POST['address'])){echo $_POST['address'];} ?><!--">-->
<!--                --><?php
//                if (!empty($errors[4])) {
//                    echo $errors[4];
//                }
//                ?>
<!--            </div>-->
        <form method="POST">
            <div class="form-group">
                <label>What your order?</label>
                <div class="ordergroup clearfix">
                    <div class="label float-left">
                        <img src="../images/menu/fixing/caramel.png" width="100">
                        <label for="qty1"><h5>Caramel Slice </h5><p class="value_price1"></p></label>
                    </div>
                    <div class="float-right">
                        <input type="number" min="0" class="orderinput" id="qty1" name="qty1" value="<?php if(isset($_POST['qty1'])){echo $_POST['qty1'];} ?>">
                    </div>
                </div>
                <div class="ordergroup clearfix">
                    <div class="label float-left">
                        <img src="../images/menu/fixing/cherry-ripe-slice-109308-1.png" width="100">
                        <label  for="qty2"><h5>Cherry Ripe Slice </h5><p class="value_price2"></p></label>
                    </div>
                    <div class="float-right ">
                        <input type="number" min="0" class="orderinput" id="qty2" name="qty2" value="<?php if(isset($_POST['qty2'])){echo $_POST['qty2'];} ?>">
                    </div>
                </div>
                <div class="ordergroup clearfix">
                    <div class="label float-left">
                        <img src="../images/menu/fixing/chocolatechipmuffins19a.png" width="100">
                        <label  for="qty3"><h5>Chocolate Muffin </h5><p class="value_price3"></p></label>
                    </div>
                    <div class="float-right ">
                        <input type="number" min="0" class="orderinput" id="qty3" name="qty3" value="<?php if(isset($_POST['qty3'])){echo $_POST['qty3'];} ?>">
                    </div>
                </div>
                <div class="ordergroup clearfix">
                    <div class="label float-left">
                        <img src="../images/menu/fixing/blueberry.png" width="100">
                        <label  for="qty4"><h5>Blueberry Muffin </h5><p class="value_price4"></p></label>
                    </div>
                    <div class="float-right ">
                        <input type="number" min="0" class="orderinput" id="qty4" name="qty4" value="<?php if(isset($_POST['qty4'])){echo $_POST['qty4'];} ?>">
                    </div>
                </div>
                <div class="ordergroup clearfix">
                    <div class="label float-left">
                        <img src="../images/menu/fixing/raspberrycheesecake.png" width="100">
                        <label  for="qty5"><h5>Raspberry Cheese Cake </h5><p class="value_price5"></p></label>
                    </div>
                    <div class="float-right ">
                        <input type="number" min="0" class="orderinput" id="qty5" name="qty5" value="<?php if(isset($_POST['qty5'])){echo $_POST['qty5'];} ?>">
                    </div>
                </div>
                <div class="ordergroup clearfix">
                    <div class="label float-left">
                        <img src="../images/menu/fixing/lemon_meringue_pie_02330_16x9.png" width="100">
                        <label  for="qty6"><h5>Lemon Meringue Pie </h5><p class="value_price6"></p></label>
                    </div>
                    <div class="float-right ">
                        <input type="number" min="0" class="orderinput" id="qty6" name="qty6" value="<?php if(isset($_POST['qty6'])){echo $_POST['qty6'];} ?>">
                    </div>
                </div>
                <?php
                if (!empty($errors[5])) {
                    echo $errors[5];
                }
                ?>
                <div class="ordergroup clearfix">
                    <div class="label float-left">
                        <label><h5>Total: </h5></label>
                    </div>
                    <div class="float-right">
                        <div class="value_price"></div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="submit" value ="0">Order</button><br><br>

                <a href="edit_user.php?id=<?php echo $listuser['id']?>" >Edit your info</a>
            <?php } ?>



        </form>

        </div>

    </div>
</div>
<script>
    var total_1 = 0;
    var total_2 = 0;
    var total_3 = 0;
    var total_4 = 0;
    var total_5 = 0;
    var total_6 = 0;

    document.querySelector('#qty1').addEventListener('input', function (input) {
        let total1 =0;
        let value = input.target.value;
        let price = document.createElement('p');
        price.textContent = `( $${parseFloat(value * 3.38).toFixed(2)} )`;
        document.querySelector('.value_price1').innerHTML = "";
        document.querySelector('.value_price1').appendChild(price);
        let price1 = value * 3.38;
        total1 = total1 + price1;
        document.querySelector('.value_price').innerHTML = "";
        total_1 = total1;
        total = total_1 + total_2 + total_3 + total_4 +total_5+total_6;
        document.querySelector('.value_price').innerHTML =` $${parseFloat(total).toFixed(2)} `;

    });
    document.querySelector('#qty2').addEventListener('input', function (input) {
        let value = input.target.value;
        let price = document.createElement('p');
        price.textContent = `( $${parseFloat(value * 3.38).toFixed(2)} )`;
        document.querySelector('.value_price2').innerHTML = "";
        document.querySelector('.value_price2').appendChild(price);
        let total1 = 0;
        let price1 = value * 3.38;
        total1 = total1 + price1;
        document.querySelector('.value_price').innerHTML = "";
        total_2 = total1;
        total = total_1 + total_2 + total_3 + total_4 +total_5+total_6;
        document.querySelector('.value_price').innerHTML = ` $${parseFloat(total).toFixed(2)} `;
    });
    document.querySelector('#qty3').addEventListener('input', function (input) {
        let value = input.target.value;
        let price = document.createElement('p');
        price.textContent = `( $${parseFloat(value * 2.99).toFixed(2)} )`;
        document.querySelector('.value_price3').innerHTML = "";
        document.querySelector('.value_price3').appendChild(price);
        let total1 = 0;
        let price1 = value * 2.99;
        total1 = total1 + price1;
        document.querySelector('.value_price').innerHTML = "";
        total_3 = total1;
        total = total_1 + total_2 + total_3 + total_4 +total_5 + total_6;
        document.querySelector('.value_price').innerHTML = ` $${parseFloat(total).toFixed(2)} `;
    });
    document.querySelector('#qty4').addEventListener('input', function (input) {
        let value = input.target.value;
        let price = document.createElement('p');
        price.textContent = `( $${parseFloat(value * 2.99).toFixed(2)} )`;
        document.querySelector('.value_price4').innerHTML = "";
        document.querySelector('.value_price4').appendChild(price);
        let total1 = 0;
        let price1 = value * 2.99;
        total1 = total1 + price1;
        total = total_1 + total_2 + total_3 + total_4 +total_5+total_6;
        document.querySelector('.value_price').innerHTML = "";
        total_4 = total1;
        total = total_1 + total_2 + total_3 + total_4 +total_5+total_6;
        document.querySelector('.value_price').innerHTML = ` $${parseFloat(total).toFixed(2)} `;
    });
    document.querySelector('#qty5').addEventListener('input', function (input) {
        let value = input.target.value;
        let price = document.createElement('p');
        price.textContent = `( $${parseFloat(value * 5.5).toFixed(2)} )`;
        document.querySelector('.value_price5').innerHTML = "";
        document.querySelector('.value_price5').appendChild(price);
        let total1 = 0;
        let price1 = value * 5.5;
        total1 = total1 + price1;
        document.querySelector('.value_price').innerHTML = "";
        total_5 = total1;
        total = total_1 + total_2 + total_3 + total_4 +total_5+total_6;
        document.querySelector('.value_price').innerHTML = ` $${parseFloat(total).toFixed(2)} `;
    });
    document.querySelector('#qty6').addEventListener('input', function (input) {
        let value = input.target.value;
        let price = document.createElement('p');
        price.textContent = `( $${parseFloat(value * 5.5).toFixed(2)} )`;
        document.querySelector('.value_price6').innerHTML = "";
        document.querySelector('.value_price6').appendChild(price);
        let total1 = 0;
        let price1 = value * 5.5;
        total1 = total1 + price1;
        document.querySelector('.value_price').innerHTML = "";
        total_6 = total1;
        total = total_1 + total_2 + total_3 + total_4 +total_5+total_6;
        document.querySelector('.value_price').innerHTML = ` $${parseFloat(total).toFixed(2)} `;
    });
    total = total_1 + total_2 + total_3 + total_4 +total_5+total_6;
</script>
<script src="../js/footer.js"></script>
</body>
</html>
