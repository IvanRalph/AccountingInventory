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

    <!-- SweetAlert-->
    <link href="../css/sweetalert.css" rel="stylesheet">




</head>
<body>

<!--ADD ITEM MODAL-->

<div class="modal fade" id="add-modal" tab-index="-1" role="dialog" aria-labelledby="add-item">
    <div class="modal-dialog" role="document" id="modal-window">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="add-item">Add Item</h4>
            </div>

            <form id="add-item-form">
                <div class="modal-body">
                    <div class="container-fluid">
                        <table>
                            <tr>
                                <div class="form-group">
                                    <th>
                                        <label>Item Name</label>
                                    </th>
                                    <td>
                                        <input type="text" Placeholder="Enter Name" class="form-control" id="name">
                                    </td>
                                    <td><p id="name_error"></p></td>
                                </div>
                            </tr>

                            <tr>
                                <div class="form-group">
                                    <th>
                                        <label>Supplier Name</label>
                                    </th>
                                    <td>
                                        <input type="text" Placeholder="Enter Name" class="form-control" id="supplier_name">
                                    </td>
                                    <td><p id="supname_error"></p></td>
                                </div>
                            </tr>

                            <tr>
                                <div class="form-group">
                                    <th>
                                        <label>Item Price</label>
                                    </th>
                                    <td>
                                        <input type="number" Placeholder="Enter Price" class="form-control" id="price">
                                    </td>
                                    <td><p id="price_error"></p></td>
                                </div>
                            </tr>

                            <tr>
                                <div class="form-group">
                                    <th>
                                        <label>Item Stock</label>
                                    </th>
                                    <td>
                                        <input type="number" Placeholder="Enter Stock" class="form-control" id="stock">
                                    </td>
                                    <td><p id="stock_error" style="color:red;"></p></td>
                                </div>
                            </tr>
                        </table>
                    </div>
                </div>
            </form>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="button-add">Add</button>
            </div>


        </div>
    </div>
</div>

<!-- EDIT MODAL -->
<div class="modal fade" id="edit-modal" tab-index="-1" role="dialog" aria-labelledby="edit-item">
    <div class="modal-dialog" role="document" id="modal-window">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="edit-item">Edit Item ID <span id="show-item-id">0</span></h4>
            </div>

            <form id="edit-item-form">
                <div class="modal-body">
                    <div class="container-fluid">
                        <table>
                            <tr>
                                <div class="form-group">
                                    <th>
                                        <label>Item Name</label>
                                    </th>
                                    <td>
                                        <input type="text" Placeholder="Enter Name" class="form-control" id="edit-name">
                                    </td>
                                    <td><p id="name_error"></p></td>
                                </div>
                            </tr>

                            <tr>
                                <div class="form-group">
                                    <th>
                                        <label>Supplier Name</label>
                                    </th>
                                    <td>
                                        <input type="text" Placeholder="Enter Name" class="form-control" id="edit-supplier-name">
                                    </td>
                                    <td><p id="supname_error"></p></td>
                                </div>
                            </tr>

                            <tr>
                                <div class="form-group">
                                    <th>
                                        <label>Item Price</label>
                                    </th>
                                    <td>
                                        <input type="number" Placeholder="Enter Price" class="form-control" id="edit-price">
                                    </td>
                                    <td><p id="price_error"></p></td>
                                </div>
                            </tr>
                        </table>
                    </div>
                </div>
            </form>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="button-save">Save</button>
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
                    <a href="sales.php">
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
                                <li><a href="../index.php">Logout</a></li>
                              </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div id="my-table">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">Item Details</h4>
                                </div>
                                <div class="content table-responsive table-full-width">
                                    <form method="post" action="" id="item-table">
                                    <table class="table table-striped">
                                        <thead>
                                            <th></th>
                                            <th>ID</th>
                                            <th>Item Name</th>
                                            <th>Supplier</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Total</th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $sql = "SELECT * FROM items";
                                                $result = mysqli_query($conn, $sql);
                                                $rows = mysqli_num_rows($result);
                                                while($rows = mysqli_fetch_array($result)){ ?>
                                                <tr>
                                                    <td><input name="checkbox[]" type="checkbox" id="checkbox[]" 
                                                    value="<?php echo $rows['item_id']; ?>"></td>
                                                    <td id="item-id-<?php echo $rows['item_id']; ?>"><?php echo $rows['item_id']; ?></td>
                                                    <td id="item-name-<?php echo $rows['item_id']; ?>"><?php echo $rows['item_name']; ?></td>
                                                    <td id="supplier-name-<?php echo $rows['item_id']; ?>"><?php echo $rows['supplier_name']; ?></td>
                                                    <td id="price-<?php echo $rows['item_id']; ?>"><?php echo "PHP " . $rows['price']; ?></td>
                                                    <td><?php echo $rows['stock']; ?></td>
                                                    <td><?php echo "PHP " . ($rows['price'] * $rows['stock']); ?></td>
                                                    <td><a href="#" data-target="#edit-modal" data-toggle="modal" onClick="editclick(this.id);" id="<?php echo $rows['item_id'] ?>">Edit Item</a></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <div class="container-fluid">

                                        <div class="col-md-12">
                                            <button type="button" class="btn btn-default" data-target="#add-modal" data-toggle="modal">Add Item</button>
                                            <button class="btn btn-danger" type="submit" name="delete" id="delete">Delete Item</button>
                                        </div>

                                    </div>
                                    </form>

                                    <?php
                                        if(isset($_POST['delete']) && isset($_POST['checkbox'])){
                                            for($i=0;$i<count($_POST['checkbox']);$i++){
                                                $del_id=$_POST['checkbox'][$i];
                                                $sql = "DELETE FROM items WHERE item_id='$del_id'";
                                                $result = mysqli_query($conn, $sql);
                                            }
                                            // if successful redirect to delete_multiple.php
                                            if($result)
                                            {
                                                echo "<meta http-equiv=\"refresh\" content=\"0;URL=items.php\">";
                                            }
                                        }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
</div>


</body>
    <!--   Core JS Files   -->
    <script
              src="https://code.jquery.com/jquery-3.1.1.min.js"
              integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
              crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="assets/js/sweetalert.min.js" type="text/javascript"></script>
   
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

    <!--Custom JS-->
    <script src="assets/js/add-item.js" type="text/javascript"></script>
    <script src="assets/js/edit-item.js" type="text/javascript"></script>

    <script>
        function editclick(myID){
            console.log(myID);
            var itemName = $("#item-name-"+myID).text();
            var supplierName = $("#supplier-name-"+myID).text();
            var price = $("#price-"+myID).text();
            var price = price.replace('PHP ','');
            console.log(price);
            $("#show-item-id").text(myID);
            $("#edit-name").val(itemName);
            $("#edit-supplier-name").val(supplierName);
            $("#edit-price").val(price);
        }
    </script>
</html>