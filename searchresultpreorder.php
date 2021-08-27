<?php 
	include("header.php"); 

	// if(isset($_POST['Search'])){
	// 	$pid=$_POST['Search'];
	//  	$sql = select("SELECT * FROM inventory WHERE pid=".$pid);
	 // 	print_r($sql);
		// die();
		// while($row=mysqli_fetch_array($sql)){


	global $con;
    if (isset($_POST["Search_PO"])) {
        $search = mysqli_real_escape_string($con, $_POST['Search_PO']);
        $sql = "SELECT * FROM preorder WHERE cname LIKE '%$search%' OR OID LIKE '%$search%' OR pname LIKE '%$search%' OR date LIKE '%$search%' or location LIKE '%$search%'";
        $result = mysqli_query($con, $sql);
        $queryResult = mysqli_num_rows($result);
        if ($queryResult > 0) {
            
?>

<div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1>Search Result : Pre-Order List</h1>

            <div class="row" id="main" style="width: 1650px;">
                <div class="col-sm-12 col-md-12 well" id="content">
                    <form action="searchresult.php" method="post">
	                    <div class="container" style="float: left !important;">
	                        <div class="row">
	                            <div id="custom-search-input">
	                                <div class="input-group col-md-4">
	                                    <input type="text" class="search-query form-control" name="Search_PO" placeholder="Search">
	                                    <span class="input-group-btn">
	                                        <button class="btn btn-danger" type="button">
	                                            <span class=" glyphicon glyphicon-search"></span>
	                                        </button>
	                                    </span>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
                    </form>
                    <br>
                    <br>
                    <br>
                    <!-- eikhane theke table start -->
                    <div class="container" style="margin-left: -20px;">
                        <div class="row" style="width: 1600px;">   
                            <div class="col-md-12">
                                <div class="table-responsive">
  
                                    <table id="mytable" class="table table-bordred table-striped">
                                        <thead>                                            
                                            <th style="text-align: center;"><input type="checkbox" id="checkall" /></th>
                                            <th style="text-align: center;">OID</th>
                                            <th style="text-align: center;">Date</th>
                                            <th style="text-align: center;">Customer Name</th>
                                            <th style="text-align: center;">Phone</th>
                                            <th style="text-align: center;">Product</th>
                                            <th style="text-align: center;">Units</th>
                                            <th style="text-align: center;">Selling Price</th>
                                            <th style="text-align: center;">Advance</th>                                                 
                                            <th style="text-align: center;">Bkash</th>
                                            <th style="text-align: center;">Deliver</th>
                                            <th style="text-align: center;">Remaining Balance</th>
                                            <th style="text-align: center;">Order Status</th>
                                            <th style="text-align: center;">Location</th>
                                            <th style="text-align: center;">Edit</th>                                                 
                                            <th style="text-align: center;">Delete</th>
                                        </thead>

                                        <?php 
	                                        while ($row = mysqli_fetch_assoc($result)) {
	                                    ?>
                                        <tbody style="text-align: center;">
                                            <tr>
                                            <td><input type="checkbox" class="checkthis" /></td>
                                            <td><?php echo $row['OID']; ?></td>
                                            <td><?php echo $row['date']; ?></td>
                                            <td><?php echo $row['cname']; ?></td>
                                            <td><?php echo $row['phone']; ?></td>
                                            <td><?php echo $row['pname']; ?></td>
                                            <td><?php echo $row['unit']; ?></td>
                                            <td><?php echo $row['totalprice']; ?></td>
                                            <td><?php echo $row['advance']; ?></td>
                                            <td><?php echo $row['bkashfee']; ?></td>
                                            <td><?php echo $row['deliveryfee']; ?></td>
                                            <td><?php echo $row['rembalance']; ?></td>
                                            <td><i><?php echo $row['orderstatus']; ?></i></td>
                                            <td><?php echo $row['location']; ?></td>

                                            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                            </tr>       
                                        </tbody>

                                        <?php
                                            }
								        } else {
								            echo "No Such Entries Found!";
								        }
								    } else {
								        echo "No Such Entries Found!";
								    }
								    ?>

                                    </table>

                                    


                                    <div class="clearfix"></div>
                                    <ul class="pagination pull-right">
                                        <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                                    </ul>    
                                </div> 
                            </div>
                        </div>
                    </div>
  

                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    <?php include("footer.php"); ?>