<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Menu</title>
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

<div class="menuheader">
    <h3 class="font-weight-bold text-center">Tropical Treats</h3>
    <h1 class="text-white text-center">MENU</h1>
</div>
<ul class="breadcrumb" style="margin: 0">
    <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
    <li class="breadcrumb-item active">Menu</li>
</ul>
<div class="menubody">
    <div class="container">
        <div class="row">
            <div class="card col-xl-5 col-lg-5 col-md-11 col-sm-11" >
                <a href="caramelslice.html"><img class="card-img-top" src="../images/menu/fixing/caramel.png" alt="caramel slice" style="width: 100%;"></a>
                <div class="card-body">
                    <h4 class="card-title text-center">Caramel Slice</h4>
                    <img src="../images/menu/fixing/black-line.png" style="width: 100% ;height: 10px">
                    <p class="price text-center">$ 4.50</p>
                    <div class="menualign">
                        <a href="" id="addcart1" class="btn btn-outline-dark product-id-1" style="width: 100%">Order</a>
                    </div>
                </div>
            </div>
            <div class="card col-xl-5 col-lg-5 col-md-11 col-sm-11" >
                <a href="CherryRipeSlice.html"><img class="card-img-top" src="../images/menu/fixing/cherry-ripe-slice-109308-1.png" alt="image" style="width: 100%; "></a>
                <div class="card-body">
                    <h4 class="card-title text-center">Cherry Ripe Slice</h4>
                    <img src="../images/menu/fixing/black-line.png" style="width: 100% ;height: 10px">
                    <p class="price text-center">$ 4.50</p>
                    <div class="menualign">
                        <a href="" id="addcart2" class="btn btn-outline-dark product-id-2" style="width: 100%">Order</a>
                    </div>
                </div>
            </div>
            <div class="card col-xl-5 col-lg-5 col-md-11 col-sm-11" >
                <a href="chocolatechipmuffin.html"><img class="card-img-top" src="../images/menu/fixing/chocolatechipmuffins19a.png" alt="image" style="width: 100%; "></a>
                <div class="card-body">
                    <h4 class="card-title text-center">Chocolate Chip Muffin</h4>
                    <img src="../images/menu/fixing/black-line.png" style="width: 100% ;height: 10px">
                    <p class="price text-center">$ 3.95</p>
                    <div class="menualign">
                        <a href="" id="addcart3" class="btn btn-outline-dark product-id-3" style="width: 100%">Order</a>
                    </div>
                </div>
            </div>
            <div class="card col-xl-5 col-lg-5 col-md-11 col-sm-11" >
                <a href="bluemuffin.html"><img class="card-img-top" src="../images/menu/fixing/blueberry.png" alt="image" style="width: 100%; "></a>
                <div class="card-body">
                    <h4 class="card-title text-center">Blueberry Muffin</h4>
                    <img src="../images/menu/fixing/black-line.png" style="width: 100% ;height: 10px">
                    <p class="price text-center">$ 3.95</p>
                    <div class="menualign">
                        <a href="" id="addcart4" class="btn btn-outline-dark product-id-4" style="width: 100%">Order</a>
                    </div>
                </div>
            </div>
            <div class="card col-xl-5 col-lg-5 col-md-11 col-sm-11" >
                <a href="raspberryCheesecake.html"><img class="card-img-top" src="../images/menu/fixing/raspberrycheesecake.png" alt="image" style="width: 100%; "></a>
                <div class="card-body">
                    <h4 class="card-title text-center">Raspberry Cheesecake</h4>
                    <img src="../images/menu/fixing/black-line.png" style="width: 100% ;height: 10px">
                    <p class="price text-center">$ 5.50</p>
                    <div class="menualign">
                        <a href="" id="addcart5" class="btn btn-outline-dark product-id-5" style="width: 100%">Order</a>
                    </div>
                </div>
            </div>
            <div class="card col-xl-5 col-lg-5 col-md-11 col-sm-11" >
                <a href="lemonMeringuePie.html"><img class="card-img-top" src="../images/menu/fixing/lemon_meringue_pie_02330_16x9.png" alt="image" style="width: 100%; "></a>
                <div class="card-body">
                    <h4 class="card-title text-center">Lemon Meringue Pie</h4>
                    <img src="../images/menu/fixing/black-line.png" style="width: 100% ;height: 10px">
                    <p class="price text-center">$ 5.50</p>
                    <div class="menualign">
                        <a href="" id="addcart6" class="btn btn-outline-dark product-id-6" style="width: 100%">Order</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $("#addcart1").click(function () {
            var id=$(".product-id-1").attr('addcart1');
            $.ajax({
                type:"POST",
                url:"addcart.php",
                data:{id:id},
                cache:false,
                success:function (results) {
                    alert(results);
                    // window.location.reload();
                }
            });
        });
        $("#addcart2").click(function () {
            alert('ok');
        });
        $("#addcart3").click(function () {
            alert('ok');
        });
        $("#addcart4").click(function () {
            alert('ok');
        });
        $("#addcart5").click(function () {
            alert('ok');
        });
        $("#addcart6").click(function () {
            alert('ok');
        });
    });
</script>
<script src="../js/footer.js"></script>
</body>
</html>
