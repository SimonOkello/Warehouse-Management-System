<?php
 include('header_dashboard.php'); 
 include('admin/dbcon.php'); ?>

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
                                <li><a href="#">Order Status: </a></li>
                        </ul>
                         <!-- end breadcrumb -->
                         
                     
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div id="" class="muted pull-left">
                                    
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                
      <canvas id="myChart" class="frm-wel" width="400" height="400"></canvas>
   
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.bundle.min.js"></script>
   <script>
      var ctx = document.getElementById("myChart").getContext('2d');
      
      <?php 
            $query = "SELECT COUNT(status) as result FROM orders GROUP BY status ORDER BY status DESC";
            $response = @mysql_query($query);
      ?>
      var labels = ["Delivered","Deleted","Undelivered"];
      var data = [
            <?php 
                  $count_rows = mysql_num_rows($response);
                  if($count_rows > 0) 
                  {
                        $count=0;
                        while($row = mysql_fetch_array($response)) 
                        {
                              $count++;
                              echo $row["result"];
                              if($count < $count_rows)
                              {
                                    echo ',';
                              }
                        }
                        
                  }
            ?>
      ];

      console.log(data);

      var myChart = new Chart(ctx, {
            type:"pie",
            data:{
                  labels: labels,
                  datasets:[{
                        label:"Order Status",
                        data:data,
                        backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                  }]
            },
            options:{
                  cutoutPercentage: 50,
                  responsive:false,
                  title:{
                        display:true,
                        fontSize:18,
                        text:"Orders' Status"
                  }
            }
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
