<?php session_start();
include ('myconnect.php');
include ('function.php');
if (!empty($_POST)) {
    $_SESSION["username"] = $_POST["username"];
    $_SESSION["email"] = $_POST["email"];
    $_SESSION["birthday"] = $_POST["birthday"];
    $_SESSION["mobile"]= $_POST["mobile"];
    $_SESSION["address"] = $_POST["address"];
    if ((!isset($_POST["meal1"])) && (!isset($_POST["meal2"])) && (!isset($_POST["meal3"])) && (!isset($_POST["meal4"])) && (!isset($_POST["meal5"])) && (!isset($_POST["meal6"]))) {
        $_SESSION["checkbox"] = "None";
    }
    else {
        $_SESSION["checkbox"] = "";
    }
    $_SESSION["meal1"] = (isset($_POST["meal1"])) ? "Caremel slice" : "";
    $_SESSION["meal2"] = (isset($_POST["meal2"])) ? "Cherry ripe slice" : "";
    $_SESSION["meal3"] = (isset($_POST["meal3"])) ? "Raspberry cheesecake" : "";
    $_SESSION["meal4"] = (isset($_POST["meal4"])) ? "Chocolate chip muffin" : "";
    $_SESSION["meal5"] = (isset($_POST["meal5"])) ? "Blueberry muffin" : "";
    $_SESSION["meal6"] = (isset($_POST["meal6"])) ? "Lemon meringue pie" : "";
    $errors=array();
    if (empty($_POST["username"])) {
        $errors[0] = "<p class='required'>Please enter your name!</p>";
    }
    if (preg_match('~[0-9]~', $_POST["username"]) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $_POST['username'])){
        $errors[0] = "<p class='required'>Your name must include only letters and whitespace!</p>";
    }
    if (empty($_POST['email'])) {
        $errors[1] = "<p class='required'>Please enter your email!</p>";
    }
    if (!filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL ) && !empty($_POST['email'])) {
        $errors[1] = "<p class='required'>Your email is wrong format!</p>";
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

    if (empty($errors) && isset($_POST["submit"])) {
        $query = "INSERT INTO tbtropical(username,email,birthday,mobile,address) 
                    VALUES('{$_SESSION["username"]}','{$_SESSION["email"]}','{$_SESSION["birthday"]}',{$_SESSION["mobile"]},'{$_SESSION["address"]}') ";
        $result = mysqli_query($dbc, $query);check_querry($result,$query);
        header('Location: action_php.php');
    }
}
?>
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
        .boxphp{
            padding: 20px;
            box-shadow: 10px 10px 5px grey;
            border: grey solid 1px;
        }


    </style>
</head>
<body>
<script src="../js/navbar.js"></script>
<div class="container " style="padding: 40px 10px">

    <div class="col-lg-7 col-md-9 col-sm-12" style="margin: auto">
        <div class="boxphp">
            <form method="POST">
                <h3>Sign Up</h3>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" placeholder="Enter username" name="username" id="username" value="<?php if(isset($_POST['username'])){echo $_POST['username'];} ?>">
                    <?php
                    if (!empty($errors[0])) {
                        echo $errors[0];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter email" name="email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>">
                    <?php
                    if (!empty($errors[1])) {
                        echo $errors[1];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="birthday">Birthday:</label>
                    <input type="date" class="form-control" placeholder="Enter birthday" name="birthday" id="birthday" value="<?php if(isset($_POST['birthday'])){echo $_POST['birthday'];} ?>">
                    <?php
                    if (!empty($errors[2])) {
                        echo $errors[2];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="mobile">Contact number:</label>
                    <input type="number" class="form-control" placeholder="Enter contact number" name="mobile" id="mobile" value="<?php if(isset($_POST['mobile'])){echo $_POST['mobile'];} ?>">
                    <?php
                    if (!empty($errors[3])) {
                        echo $errors[3];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" class="form-control" placeholder="Enter your address" name="address" id="address" value="<?php if(isset($_POST['address'])){echo $_POST['address'];} ?>">
                    <?php
                    if (!empty($errors[4])) {
                        echo $errors[4];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>What your interests?</label>
                    <div style="margin: 0 20px">
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck1" name="meal1" <?php echo isset($_POST["meal1"]) ? 'checked' : '';?>>
                            <label class="custom-control-label" for="customCheck1">Caramel slice</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="meal2" <?php echo isset($_POST["meal2"]) ? 'checked' : '';?>>
                            <label class="custom-control-label" for="customCheck2">Cherry ripe slice</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck3" name="meal3" <?php echo isset($_POST["meal3"]) ? 'checked' : '';?>>
                            <label class="custom-control-label" for="customCheck3">Chocolate chip muffin</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck4" name="meal4" <?php echo isset($_POST["meal4"]) ? 'checked' : '';?>>
                            <label class="custom-control-label" for="customCheck4">Blueberry muffin</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck5" name="meal5" <?php echo isset($_POST["meal5"]) ? 'checked' : '';?>>
                            <label class="custom-control-label" for="customCheck5">Raspberry cheesecake</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-3">
                            <input type="checkbox" class="custom-control-input" id="customCheck6" name="meal6" <?php echo isset($_POST["meal6"]) ? 'checked' : '';?>>
                            <label class="custom-control-label" for="customCheck6">Lemon meringue cheesecake</label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="submit" value ="0">Submit</button>
            </form>
        </div>
    </div>
</div>
<script src="../js/footer.js"></script>
</body>
</html>
