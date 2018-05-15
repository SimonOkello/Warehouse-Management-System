<?php include('header_dashboard.php');
include('admin/dbcon.php');
    $start = isset($_REQUEST['from'])?$_REQUEST['from']:'';
    $end =isset($_REQUEST['to'])?$_REQUEST['to']:'';
 ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('sidebar.php'); ?>
                <div class="span9" id="content">
                     <div class="row-fluid">
					    <!-- breadcrumb -->	
					     <ul class="breadcrumb">
								<li><a href="#"><b>WAREHOUSE</b></a><span class="divider">/</span></li>
								
								<li><a href="#">Reports: </a></li>
						</ul>
						 <!-- end breadcrumb -->
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left"></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  								<h3>SALE REPORTS</h3>
<!--<form class=" form-inline" method="post" action="">
    <div class="control-group">
        <input type="submit" class="btn btn-info" value="Get Records">
    </div>
</form>-->
<table class="table table-hover table-striped table-condensed table-bordered">
    <thead class="" >
    <th>#</th>
    <th>Sale ID:</th>
    <th>Product Name:</th>
    <th>Total Sold:</th>
   </thead>
<tbody>
    <?php
    //if(isset($_POST['from'])){
   // $start = mysql_real_escape_string( $_REQUEST['from']);
   // $end = mysql_real_escape_string($_REQUEST['to']);

    $farmers = mysql_query("SELECT user_id,firstname,lastname FROM tbluser WHERE category='farmer'") or die("unable to fetch records" . mysql_error($conn));
    $i = 0;
    $total=0;
    while ($farmer = mysql_fetch_array($farmers)) {
        //$i+=1;
        $user_id = $farmer['user_id'];

        $query = mysql_query("SELECT kg FROM delivery WHERE user_id='$user_id'")or die(mysql_error());


        $farmer_total = 0;
        while ($row = mysql_fetch_array($query)) {
            foreach ($row AS $key => $value) {$row[$key] = stripslashes($value);}

            $farmer_total+=$row['kg'];
        }
        $i+=1;
        $total+=$farmer_total;
            echo "<tr>";
            echo '<td>' . $i . '</td>';
            //echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";  
            echo "<td valign='top'>" . ($farmer['user_id']) . "</td>";
            echo "<td valign='top'>" . ($farmer['firstname'])."  ".($farmer['lastname']). "</td>";
            echo "<td valign='top'>" . $farmer_total . "</td>";
            echo "</tr>";
        }
        echo "<tr class='success'><td><strong>Total</strong></td><td><strong>All</strong><td>--</td><td>$total Litres</td></tr>";
   // }
    ?>
</tbody>
</table>
 <a href='reportAllFarmers.php'><button class="btn btn-primary"><span> Print Report</span></button></a>


<script type="text/javascript">
    $(document).ready(function() {
        $(function() {
            $('#datetimepicker1,#datetimepicker2').datetimepicker({
                language: 'pt-BR',
                pickTime: false,
                format:'yyyy-MM-dd'
            });
        });
    });
</script>


                            </div>
                        </div>
                        <!-- /block -->
                    </div>

                </div>
	
            </div>
		
        </div>
        <?php include('footer.php'); ?>
		<?php include('script.php'); ?>
		
    </body>
</html>
