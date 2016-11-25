<?php
    session_start();
    if($_SESSION['isLogged'] == false){
        header("location: ../index.php");
    }

    include "../php/connect.php";
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Paper Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">

</head>
<body>

<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="info">

    <!--
        Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
        Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
    -->

        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Inventory System
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="dashboard.php">
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="items.php">
                        <p>Items</p>
                    </a>
                </li>
                <li class="active">
                    <a href="logs.php">
                        <p>Logs</p>
                    </a>
                </li>
                <li>
                    <a href="sales.php">
                        <p>Sales</p>
                    </a>
                </li>
                <li>
                    <a href="export-database.php">
                        <p>Export Database</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Logs</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p><?php echo $_SESSION['user-name']; ?></p>
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="../index.php">Logout</a></li>
                              </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row" style="padding-bottom: 10px;">
                    <div class="col-md-4">
                        <div class="form-group">
                            <select id="" class="form-control">
                                <option value="">Category</option>
                                <option value="">Test</option>
                                <option value="">Test</option>
                                <option value="">Test</option>
                                <option value="">Test</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="What are you looking for?">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <button type="button" id="button-submit" class="btn btn-success" style="margin-top:2px;">Search</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid" style="z-index:50;">
                <div class="row">
                    <div class="col-md-12">
                        <div id="my-table">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Items on Stock</h4>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <form method="post" action="" id="item-table">
                                    <table class="table table-striped">
                                        <thead>
                                            <th>Date Added</th>
                                            <th>ID</th>
                                            <th>Item Name</th>
                                            <th>Supplier</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Total</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $sql = "SELECT * FROM log_item ORDER BY log_id DESC";
                                                $result = mysqli_query($conn, $sql);
                                                $rows = mysqli_num_rows($result);
                                                while($rows = mysqli_fetch_array($result)){ ?>
                                                <tr>
                                                    <td><?php echo $rows['date_added']; ?></td>
                                                    <td id="item-id-<?php echo $rows['log_id']; ?>"><?php echo $rows['log_id']; ?></td>
                                                    <td id="item-name-<?php echo $rows['log_id']; ?>"><?php echo $rows['item_name']; ?></td>
                                                    <td id="supplier-name-<?php echo $rows['log_id']; ?>"><?php echo $rows['supplier_name']; ?></td>
                                                    <td id="price-<?php echo $rows['log_id']; ?>"><?php echo "PHP " . $rows['price']; ?></td>
                                                    <td><?php echo $rows['stock']; ?></td>
                                                    <td><?php echo "PHP " . ($rows['price'] * $rows['stock']); ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div id="my-table2">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Sold/Transferred Items</h4>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <form method="post" action="" id="item-table">
                                    <table class="table table-striped">
                                        <thead>
                                            <th>Date Sold</th>
                                            <th>Sales ID</th>
                                            <th>Item Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total</th>
                                            <th>Branch</th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $sql = "SELECT * FROM sales ORDER BY sales_id DESC";
                                                $result = mysqli_query($conn, $sql);
                                                $rows = mysqli_num_rows($result);
                                                while($rows = mysqli_fetch_array($result)){ ?>
                                                <tr>
                                                    <td><?php echo $rows['date_added']; ?></td>
                                                    <td><?php echo $rows['sales_id']; ?></td>
                                                    <td><?php echo $rows['item_name']; ?></td>
                                                    <td><?php echo $rows['qty']; ?></td>
                                                    <td><?php echo "PHP " . $rows['price']; ?></td>
                                                    <td><?php echo $rows['total']; ?></td>
                                                    <td><?php echo $rows['branch']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>




        

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
