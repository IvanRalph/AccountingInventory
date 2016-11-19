<?php
    session_start();
    if($_SESSION['isLogged'] == false){
        header("location: ../index.php");
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Accounting Inventory System</title>

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


    <!--  Fonts and icons-->
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/themify-icons.css" rel="stylesheet">




</head>
<body>
<!--ADD ITEM MODAL-->

<div class="modal fade" id="add-modal" tab-index="-1" role="dialog" aria-labelledby="add-item">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="add-item">Add Item</h4>
                    </div>

                    <div class="modal-body">
                        
                        <div class="container-fluid">
                            <table>
                                <form>
                                    <tr>
                                        <div class="form-group">
                                            <th>
                                                <label>Item Name</label>
                                            </th>
                                            <td>
                                                <input type="text" Placeholder="Enter Name" class="form-control">
                                            </td>
                                        </div>
                                    </tr>

                                    <tr>
                                        <div class="form-group">
                                            <th>
                                                <label>Item Price</label>
                                            </th>
                                            <td>
                                                <input type="number" Placeholder="Enter Price" class="form-control">
                                            </td>
                                        </div>
                                    </tr>

                                    <tr>
                                        <div class="form-group">
                                            <th>
                                                <label>Item Stock</label>
                                            </th>
                                            <td>
                                                <input type="number" Placeholder="Enter Stock" class="form-control">
                                            </td>
                                        </div>
                                    </tr>
                                </form>
                            </table>
                        </div>
                        
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-danger">Add</button>
                    </div>
                </div>
            </div>
        </div>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

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
                <li class="active">
                    <a href="items.php">
                        <p>Items</p>
                    </a>
                </li>
                <li>
                    <a href="stocks.html">
                        <p>Stocks</p>
                    </a>
                </li>
                <li>
                    <a href="sales.html">
                        <p>Sales</p>
                    </a>
                </li>
                <li>
                    <a href="help.html">
                        <p>Help</p>
                    </a>
                </li>
                <li>
                    <a href="export-database.html">
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
                    <a class="navbar-brand" href="#">Items</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p><?php echo $_SESSION['user-name']; ?></p>
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Logout</a></li>
                              </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <div class="col-md-12">
            <div class="card">
                <div class="header">
                    <h4 class="title">Item Details</h4>
                </div>
                <div class="content table-responsive table-full-width">
                    <table class="table table-striped">
                        <thead>
                            <th></th>
                            <th>ID</th>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input type="checkbox" name="item"></td>
                                <td>1</td>
                                <td>Ballpen</td>
                                <td>PHP 20</td>
                                <td>50</td>
                                <td><a href="#"><u>Edit Item</u></a></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="item"></td>
                                <td>2</td>
                                <td>Yellow Pad</td>
                                <td>PHP 100</td>
                                <td>50</td>
                
                                <td><a href="#"><u>Edit Item</u></a></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="item"></td>
                                <td>3</td>
                                <td>Notebook</td>
                                <td>PHP 100</td>
                                <td>80</td>
            
                                <td><a href="#"><u>Edit Item</u></a></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="item"></td>
                                <td>4</td>
                                <td>Scientific Calculator</td>
                                <td>PHP 850</td>
                                <td>400</td>
                
                                <td><a href="#"><u>Edit Item</u></a></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="item"></td>
                                <td>5</td>
                                <td>Folder</td>
                                <td>PHP 10</td>
                                <td>1000</td>
                        
                                <td><a href="#"><u>Edit Item</u></a></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="item"></td>
                                <td>6</td>
                                <td>ID Lace</td>
                                <td>PHP 100</td>
                                <td>50</td>  
                                <td><a href="#"><u>Edit Item</u></a></td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>


        <div class="container-fluid">

            <div class="col-md-12">
                <button class="btn btn-default" data-target="#add-modal" data-toggle="modal">Add Item</button>
                <button class="btn btn-danger">Delete Item</button>
            </div>

        </div>

        <!--ADD ITEM MODAL-->

        <div class="modal-fade">

        </div>
        
    <div class="row">
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                </nav>
            </div>
        </footer>
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