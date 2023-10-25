<!DOCTYPE html>
<?php
include "rmsdbcon.php";
session_start();
if (isset($_SESSION["admin"])) {
    $user = $_SESSION["admin"];
    $r = mysqli_query($con, "SELECT * FROM `rms_admin` WHERE `id`='$user'");
    $roww = mysqli_fetch_array($r);
    $n = $roww["name"];
}
else{
    header("location:rmslogout.php");
}
if (isset($_SESSION["tn"])) {
    $tn = $_SESSION["tn"];
}
if (isset($_SESSION["cn"])) {
    $cn = $_SESSION["cn"];
}

if (isset($_POST['submit'])) {
    $name = $_POST["Item_name"];
    $k = mysqli_query($con, "SELECT * FROM `items` where id = $name");
    $l = mysqli_fetch_array($k);
    $p = $l["item_price"];

    $quant =  $_POST['Quant'];
    $price1 =  $p;
    $pr = $price1 * $_POST['Quant'];
    $date = date('y-m-d');
    $status =  "UNPAID";

    $sql = "INSERT INTO `rms_order`(`table_name`, `item`, `quantity`, `price`, `order_date`, `payment_status`, `manage_by`) VALUES ('$tn','$name','$quant','$pr','$date','$status','$user')";

    $q = mysqli_query($con, $sql);
    if ($q > 0) {
?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <?php echo  " Order Placed "  ?><br>
        </div>
    <?php  } else { ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            <?php echo "We have found " . mysqli_error($con); ?><br>
        </div>
<?php }
}
?>
<html lang="en">

<head>
    <title>Place Order</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>


    <!-- header -->
    <header>
        <nav class="navbar navbar-light bg-dark">
            <a class="navbar-brand" href="#">
                <img src="images/food-mania-logo.png" width="180" height="60" class="d-inline-block align-top" alt="">

            </a>

            <div id="page-content-wrapper">

                <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">

                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">

                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle second-text text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user me-2"></i><?php echo "Hello " . $n; ?>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <li><a class="dropdown-item" href="rmslogout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </nav>
    </header>
    <!-- Sidebar -->
    <div style="background-color: azure; height: 650px;" class="d-flex" id="wrapper">
        <div style="background-color: #354259; width: 200px;" class="" id="sidebar-wrapper">


            <div class="list-group list-group-flush my-3 ">

                <a href="index.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                    <i class="fa fa-tachometer p-2" aria-hidden="true"></i>Dashboard</a>


                <a href="admindetails.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                    <i class="fa fa-user p-2" aria-hidden="true"></i>Profile</a>


                <a href="displaystaff.php" class="list-group-item list-group-item-action bg-transparent text-white second-text">
                    <i class="fa fa-users p-2" aria-hidden="true"></i>Staff</a>

                    <a href="displayjobrole.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                    <i class="fas fa-user-graduate p-2" aria-hidden="true"></i>Job Role</a>


                <a href="displayitemcatagory.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                    <i class="fa fa-th-large p-2" aria-hidden="true"></i>Category</a>

                <a href="menu.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                    <i class="fa fa-cutlery p-2" aria-hidden="true"></i>Items</a>

                <a href="rmsmanagetable.php" class="list-group-item list-group-item-action bg-transparent text-white second-text">
                    <i class="fa fa-braille p-2" aria-hidden="true"></i>Tables</a>


                <a href="displaytodaysorder.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                    <i class="fa fa-clipboard p-2" aria-hidden="true"></i>Orders</a>

                    <a href="dailyreport.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                    <i class="fa fa-bar-chart p-2" aria-hidden="true"></i>Instant Report</a>


                <a href="billgenerate.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                    <i class="fa fa-file-pdf-o p-2" aria-hidden="true"></i>Generate Bill</a>
 
                <a href="rmslogout.php" class="list-group-item list-group-item-action bg-transparent text-white second-text ">
                <i class="fa fa-logout p-2" aria-hidden="true"></i>Logout</a> 

            </div>
        </div>
        <!-- sidebar -->
        <div class="container-fluid">
            <center>
                <div class="col-lg-6 mt-5">
                    <div class="card bg-white mb-3 text-center shadow p-3 mb-3 rounded h-50">
                        <div class="container-fluid mt-3">
                            <form action="" method="POST">
                                <div class="form-group "><label for="item" class="form-label">
                                        <h3>Please Select Item </h3>
                                    </label></div>
                                <div class="form-group column col-md-12"><select class="form-select" name="Item_name" required>
                                        <?php $cat = mysqli_query($con, "SELECT * FROM `items` where `item_catagory`='$cn' and `status`='Available'");
                                        $k = 0;
                                        while ($row = mysqli_fetch_array($cat)) {
                                            $id = $row["id"];
                                            $name = $row["item_name"];
                                        ?>
                                            <option value='<?php echo $id; ?>'><?php echo $name; ?></option><?php }
                                                                                                        $k++;
                                                                                                            ?>

                                    </select></div>
                                <div class="form-group column col-md-12 mt-3"><label for="catagory" class="form-label">
                                        <h5>Select Quantity</h5>
                                    </label></div>
                                <select class="form-select" name="Quant" required>
                                    <option value='<?php echo 1; ?>'>1</option>
                                    <option value='<?php echo 2; ?>'>2</option>
                                    <option value='<?php echo 3; ?>'>3</option>
                                    <option value='<?php echo 4; ?>'>4</option>
                                    <option value='<?php echo 5; ?>'>5</option>
                                    <option value='<?php echo 0.5; ?>'>HALF-PLATE</option>
                                </select>
                                <?php

                                ?>
                                <!-- <div>
                                    <div class="row" style="margin-left:30px ;">
                                        <div class="form-group col-md-4 ml-5">
                                            <input type="submit" name="submit" value="Place Order" class="btn btn-success mt-3" style="margin-left:150px ;"></input>
                            </form>
                        </div>
                        <a href="orderselectcatagori.php" style="margin-left:100px ;" class="btn btn-success col-lg-2 mt-3" role="button">Back</a>
                    </div> -->
                    <div class="row" style="margin-left:30px ;">
                                     <div class="form-group col-md-4 ml-5">
                                         <input type="submit" style="margin-left: 80px;" class="btn btn-success mt-3" name="submit" value="SELECT">
                                     </div>
                             </form>
                             <a style="margin-left:100px ;" href="orderselectcatagori.php" class="btn btn-success col-lg-2 mt-3" role="button">Back</a>
                         </div>
                         </form>
                    <!--  -->
                </div>
            </center>    
        </div>
    </div>
    </div>

</body>

</html>