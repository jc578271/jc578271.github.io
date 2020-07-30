<?php ob_start();
include ('myconnect.php');
include ('function.php');
if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1)))
{
    $id=$_GET['id'];
}
else
{
    header('Location: list_user.php');
    exit();
}
if (!empty($_POST)) {
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["birthday"] = $_POST["birthday"];
    $_SESSION["mobile"]= $_POST["mobile"];
    $_SESSION["address"] = $_POST["address"];
//    if ((!isset($_POST["meal1"])) && (!isset($_POST["meal2"])) && (!isset($_POST["meal3"])) && (!isset($_POST["meal4"])) && (!isset($_POST["meal5"])) && (!isset($_POST["meal6"]))) {
//        $_SESSION["checkbox"] = "None";
//    }
//    else {
//        $_SESSION["checkbox"] = "";
//    }
//    $_SESSION["meal1"] = (isset($_POST["meal1"])) ? "Caremel slice" : "";
//    $_SESSION["meal2"] = (isset($_POST["meal2"])) ? "Cherry ripe slice" : "";
//    $_SESSION["meal3"] = (isset($_POST["meal3"])) ? "Raspberry cheesecake" : "";
//    $_SESSION["meal4"] = (isset($_POST["meal4"])) ? "Chocolate chip muffin" : "";
//    $_SESSION["meal5"] = (isset($_POST["meal5"])) ? "Blueberry muffin" : "";
//    $_SESSION["meal6"] = (isset($_POST["meal6"])) ? "Lemon meringue pie" : "";
    $errors=array();
    if (empty($_POST["username"])) {
        $errors[0] = "<p class='required'>Please enter your name!</p>";
    }
    if (preg_match('~[0-9]~', $_POST["username"]) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['username'])){
        $errors[0] = "<p class='required'>Your name is invalid!</p>";
    }
    if (empty($_POST['email'])) {
        $errors[1] = "<p class='required'>Please enter your email!</p>";
    }
    if (!filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) && !empty($_POST['email'])) {
        $errors[1] = "<p class='required'>Your email is invalid!</p>";
    }
    if ((empty($_POST['birthday']))) {
        $errors[2] = "<p class='required'>Please enter your birthday!</p>";
    }
    if ((empty($_POST['mobile']))) {
        $errors[3] = "<p class='required'>Please enter your contact number!</p>";
    }elseif(strlen($_POST['mobile'])!=8){
        $errors[3] = "<p class='required'>Contact number must include only 8 digits!</p>";
    }
    if ((empty($_POST['address']))) {
        $errors[4] = "<p class='required'>Please enter your address!</p>";
    }
    if (empty($errors)) {
        $query="UPDATE tbtropical
                    SET username='{$_POST["username"]}',
                        email='{$_POST["email"]}',
                        birthday='{$_POST["birthday"]}',
                        mobile={$_POST["mobile"]},
                        address='{$_POST["address"]}'
                    WHERE 
                        id={$id}
                        ";
        $result = mysqli_query($dbc, $query);
        check_querry($result,$query);
        if (mysqli_affected_rows($dbc) == 1) {
            $message_edit = "<p style='color: green'>Edit Successful</p>";
        }
        else
        {
            $message_edit="<p class='required'>Edit fail</p>";
        }
        if(isset($_POST["submit1"])){header('Location: order.php');}
        if(isset($_POST["submit2"])){header('Location: list_user.php');}
    }
}
$query_id="SELECT username,email,birthday,mobile,address FROM tbtropical WHERE id={$id}";
$result_id=mysqli_query($dbc,$query_id);
check_querry($result_id,$query_id);
if(mysqli_num_rows($result_id)==1)
{
    list($username,$email,$birthday,$mobile,$address)=mysqli_fetch_array($result_id,MYSQLI_NUM);
}
else{
    $message = "<p class='required'>ID's user is not existed</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User's Info</title>
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
        .boxphp{
            padding: 20px;
            box-shadow: 10px 10px 5px grey;
            border: grey solid 1px;
        }
    </style>
</head>
<body>
<script src="../js/navbar.js"></script>
<div class="container" style="padding: 40px 10px">
    <div class="boxphp">
    <form method="POST">
        <?php
        if (isset($message_edit)) {
            echo $message_edit;}
        if (isset($message)) {
            echo $message;
        }
        ?>
        <h3>Edit User's Info: <?php if(isset($username) && isset($id)){echo $username.'<br/>id: '.$id;} ?></h3>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" placeholder="Enter username" name="username" id="username" value="<?php if(isset($username)){echo $username;} ?>">
            <?php
            if (!empty($errors[0])) {
                echo $errors[0];
            }
            ?>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php if(isset($email)){echo $email;} ?>">
            <?php
            if (!empty($errors[1])) {
                echo $errors[1];
            }
            ?>
        </div>
        <div class="form-group">
            <label for="birthday">Birthday:</label>
            <input type="date" class="form-control" placeholder="Enter birthday" name="birthday" id="birthday" value="<?php if(isset($birthday)){echo $birthday;} ?>">
            <?php
            if (!empty($errors[2])) {
                echo $errors[2];
            }
            ?>
        </div>
        <div class="form-group">
            <label for="mobile">Contact number:</label>
            <input type="number" class="form-control" placeholder="Enter contact number" name="mobile" id="mobile" value="<?php if(isset($mobile)){echo $mobile;} ?>">
            <?php
            if (!empty($errors[3])) {
                echo $errors[3];
            }
            ?>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" class="form-control" placeholder="Enter your address" name="address" id="address" value="<?php if(isset($address)){echo $address;} ?>">
            <?php
            if (!empty($errors[4])) {
                echo $errors[4];
            }
            ?>
        </div>
        <button type="submit" class="btn btn-primary" name="submit1" value ="0">Back to Order Page</button><br><br>
        <button type="submit" class="btn btn-secondary" name="submit2" value ="0">Back to Users'List Page</button><br><br>
    </form>
    </div>
</div>
<script src="../js/footer.js"></script>
</body>
</html>
<?php ob_flush(); ?>
