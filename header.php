<?php
    require("functions.php");

    if(isset($_GET['aout'])){
        session_unset();
        session_destroy();
        header("location: index.php");
    }
    if(!isset($_SESSION['ausr'])){
        session_unset();
        session_destroy();
        header("location: index.php");
    }

    if(isset($_REQUEST['save']) && $_REQUEST['save']=='ins'){
    create('inventory', $_POST);
    header("location: inventory.php");
    }

    if(isset($_REQUEST['update']) && $_REQUEST['update']=='udt'){

        update('inventory', $_POST, 'pid = '.$_POST['pid']);
        header("location: inventory.php");
    }


    if(isset($_GET['del'])){
        delete('inventory', 'pid='.$_GET['del']);
        header("location: inventory.php");
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="headerstyle.css">
    <link rel="stylesheet" type="text/css" href="homepagestyle.css">
    <link rel="stylesheet" type="text/css" href="inventorystyle.css">
    <link rel="stylesheet" type="text/css" href="add_into_inventory_style.css">
    <link rel="icon" href="images/favicon.png" type="image/png" sizes="16x16">
    <!-- Google Fonts -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'> -->


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <title>MystiK</title>
</head>
<body>


    <div id="throbber" style="display:none; min-height:120px;"></div>
        <div id="noty-holder"></div>
        <div id="wrapper">
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="homepage.php">
                        <img src="images/BrandLogo.png" alt="LOGO"">
                    </a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                        </a>
                    </li> 
                    <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Notification"><i class="fa fa-bell-o" aria-hidden="true"></i>
                        </a>
                    </li> 
                    <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Inbox"><i class="fa fa-commenting-o" aria-hidden="true"></i>
                        </a>
                    </li> 
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo $_SESSION['ausr']; ?> <b class="fa fa-angle-down"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                            <li><a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                            <li class="divider"></li>
                            <li><a href="homepage.php?aout=<?php echo $_SESSION['ausr']; ?>"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <!-- <li>
                            <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-search"></i> MENU 1 <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                            <ul id="submenu-1" class="collapse">
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 1.1</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 1.2</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 1.3</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-star"></i>  MENU 2 <i class="fa fa-fw fa-angle-down pull-right"></i></a>
                            <ul id="submenu-2" class="collapse">
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 2.1</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 2.2</a></li>
                                <li><a href="#"><i class="fa fa-angle-double-right"></i> SUBMENU 2.3</a></li>
                            </ul>
                        </li> -->
                        <li>
                            <a href="homepage.php"><i class="fa fa-home" aria-hidden="true"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="inventory.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i> Inventory</a>
                        </li>
                        <li>
                            <a href="preorder.php"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Pre Orders</a>
                        </li>
                        <li>
                            <a href="linkorders.php"><i class="fa fa-link" aria-hidden="true"></i> Link Orders</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cog" aria-hidden="true"></i> Store Config</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Sales</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-arrow-down" aria-hidden="true"></i> Receivings</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-usd" aria-hidden="true"></i> Expenses</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-credit-card" aria-hidden="true"></i> Income Statement</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </nav>

            
        








