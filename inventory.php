<!-- Sayeed Bin Hossain -->
<?php include("header.php"); ?>

<div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <h1>INVENTORY</h1>

            <div class="row" id="main" style="width: 1180px;">
                <div class="col-sm-12 col-md-12 well" id="content">
                    <!-- search box start-->
                    <form action="searchresult.php" method="post">
                    <div class="container" style="float: left !important;">
                        <div class="row">
                            <div id="custom-search-input">
                                <div class="input-group col-md-4">
                                    <input type="text" class="search-query form-control" name="Search" placeholder="Search">
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger" type="button">
                                            <span class=" glyphicon glyphicon-search"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div style="float: right !important; margin-top: -33px !important; margin-right: 45px; height: 31px;>
                            <button type="button" class="btn btn-success"><span class="glyphicon glyphicon-plus-sign"></span>  Add</button>
                        </div>
                    </div>
                    </form>

                    <!-- search box end -->
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
                                            $i = 1;
                                            $run = sql("SELECT * FROM inventory");
                                            while($row=mysqli_fetch_array($run)){
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
                                            <input type="text" name="globalvariable" hidden="true" value="globvar">
                                            <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit"><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                            <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" name="delete" ><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                            </tr>       
                                        </tbody>

                                        <?php
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
                    
                    <form action="" method="post">
                        <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content"> 
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                        <h4 class="modal-title custom_align" id="Heading">Edit</h4>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input class="form-control " type="text" name="" value="<?php echo $row['pid']; ?>">
                                        </div>
                                        <div class="form-group">                                
                                            <input class="form-control " type="text" value="<?php echo $row['name']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control " type="text" value="<?php echo $row['bprice']; ?>"> 
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control " type="text" value="<?php echo $row['sprice']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control " type="text" value="<?php echo $row['tunits']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control " type="text" value="<?php echo $row['sunits']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <input class="form-control " type="text" value="<?php echo $row['unitsinhand']; ?>">
                                        </div>
                                    </div>
                                    <div class="modal-footer ">
                                        <a href="inventory.php?udt=<?php echo $row['pid']; ?>"><button type="submit" value="udt" name=" update" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button></a>
                                    </div>
                                </div>
                            <!-- /.modal-content --> 
                            </div>
                              <!-- /.modal-dialog --> 
                        </div>
                    </form>

                    <form action="" method="post">
                        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                                    </div>
                                    <div class="modal-body">      
                                        <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
                                    </div>
                               
                                    <div class="modal-footer ">
                                        <a href="inventory.php?del=<?php echo $row['pid']; ?>"><button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button></a>
                                        <a href="inventory.php>"><button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button></a>
                                    </div>

                                </div>
                                <!-- /.modal-content --> 
                            </div>
                                <!-- /.modal-dialog --> 
                        </div>
                    </form>


                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->

    <?php include("footer.php"); ?>