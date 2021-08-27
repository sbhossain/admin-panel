<?php 
	include("header.php"); 

	// if(isset($_POST['Search'])){
	// 	$pid=$_POST['Search'];
	//  	$sql = select("SELECT * FROM inventory WHERE pid=".$pid);
	 // 	print_r($sql);
		// die();
		// while($row=mysqli_fetch_array($sql)){


	global $con;
    if (isset($_POST["Search"])) {
        $search = mysqli_real_escape_string($con, $_POST['Search']);
        $sql = "SELECT * FROM inventory WHERE name LIKE '%$search%' OR pid LIKE '%$search%'";
        $result = mysqli_query($con, $sql);
        $queryResult = mysqli_num_rows($result);
        if ($queryResult > 0) {
            
?>

<div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1>SEARCH RESULT</h1>

            <div class="row" id="main" style="width: 1180px;">
                <div class="col-sm-12 col-md-12 well" id="content">
                    <form action="searchresult.php" method="post">
	                    <div class="container" style="float: left !important;">
	                        <div class="row">
	                            <div id="custom-search-input">
	                                <div class="input-group col-md-4">
	                                    <input type="text" class="search-query form-control" name="Search" placeholder="Search Product ID">
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
                        <div class="row">   
                            <div class="col-md-12">
                                <div class="table-responsive">
  
                                    <table id="mytable" class="table table-bordred table-striped">
                                        <thead>                                            
                                            <th style="text-align: center;"><input type="checkbox" id="checkall" /></th>
                                            <th style="text-align: center;">PID</th>
                                            <th style="text-align: center;">Name</th>
                                            <th style="text-align: center;">Buying Price</th>
                                            <th style="text-align: center;">Selling Price</th>
                                            <th style="text-align: center;">Total Units</th>
                                            <th style="text-align: center;">Units Sold</th>
                                            <th style="text-align: center;">Units in Hand</th>
                                            <th style="text-align: center;">Edit</th>                                                 
                                            <th style="text-align: center;">Delete</th>
                                        </thead>

                                        <?php 
	                                        while ($row = mysqli_fetch_assoc($result)) {
	                                    ?>
                                        <tbody style="text-align: center;">
                                            <tr>
                                            <td><input type="checkbox" class="checkthis" /></td>
                                            <td><?php echo $row['pid']; ?></td>
                                            <td style="text-align: left; padding-left: 100px;"><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['bprice']; ?></td>
                                            <td><?php echo $row['sprice']; ?></td>
                                            <td><?php echo $row['tunits']; ?></td>
                                            <td><?php echo $row['sunits']; ?></td>
                                            <td><?php echo $row['unitsinhand']; ?></td>
                                            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                            </tr>       
                                        </tbody>

                                        <?php
                                            }
								        } else {
								            echo "There are no articles.";
								        }
								    } else {
								        echo "There are no results!";
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