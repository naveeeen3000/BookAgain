<?php include('adminconfig.php');include('planexpiry.php');
$admin_email= $_SESSION['admin_email'];
?>
<html>
<head>
<meta charset="utf-8">
<title>BookAgain | Admin</title>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>	
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>	
<link href="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">		
<link href="adminpreloader.css" rel="stylesheet">
<style>
		
body {
  font-family: arial !important;
  background-color: #E3F4FB;     	
  margin: 0;
  overflow-y: hidden;
	}


.sidenav {
	box-shadow: 0 1px 10px 2px black;
  background-color: #093F55;
  height: 100% !important;
  width: 225px !important;
  position: fixed !important;
  z-index: 1 !important;
  top: 0 !important;
  left: 0 !important;
  overflow: hidden !important;
  padding-top:10px !important;
  	
}
	
	.sidenav a {
  border: 0.1px solid #0A5B7A !important;		
  margin:4px 0 4px !important;
  position: relative !important;  
  padding: 3.5px 8px 3.5px 16px !important;		
  text-decoration: none !important;
  font-size: 20px !important;
  color: #CDEEFA !important;
  display: block !important;
}

.active, .btn:hover{
 box-shadow: 0px 0px 5px 1px #ADBFC6;
 background-color:#062A38;	
}	
		
		.fas {
		
			padding-right: 10px;
		}	
		
	
.main {
  margin-left: 225px; /* Same as the width of the sidenav */
  font-size: 28px; /* Increased text to enable scrolling */
 
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
		
@font-face {
  font-family: 'icomoon1';
  src:  url('fonts/icomoon1.eot?suge6d');
  src:  url('fonts/icomoon1.eot?suge6d#iefix') format('embedded-opentype'),
    url('fonts/icomoon1.ttf?suge6d') format('truetype'),
    url('fonts/icomoon1.woff?suge6d') format('woff'),
    url('fonts/icomoon1.svg?suge6d#icomoon1') format('svg');
  font-weight: normal;
  font-style: normal;
  font-display: block;
}

[class^="icon1-"], [class*=" icon1-"] {
  /* use !important to prevent issues with browser extensions that change fonts */
  font-family: 'icomoon1' !important;
  speak: never;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;

  /* Better Font Rendering =========== */
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}

.icon1-request-2:before {
  content: "\e900";
}
.icon1-group-2:before {
  content: "\e901";
}
.icon1-iconfinder-icon:before {
  content: "\e902";
  color: #cdeefa;
}
		
	.btn i{
			font-size: 18px;
		}
		.btn span{
			font-size: 18px;
		}	

.sidepanel  {
  width: 15% !important;	
  margin-top: 66px;
  height: 0;
  position: absolute;
  z-index: 9999;
  top: 0;  
  right: 0;	
  background-color: #FFFFFF;
  overflow-y: hidden;
  transition: 0.5s;
  box-shadow: 0 -6px 0 #fff, 0 1px 6px #093F55;
}

.sidepanel a {
  margin-left: 20px;  
  padding: 0px 0px 0px 32px;	
  text-decoration: none;
  font-size: 18px;
  color: #093F55;
  display: block;
 transition: 0.3s;
 	
  	
}

.sidepanel a:hover {
  color: #ED8155;
}


.dropdown:hover .sidepanel {height: 90%;}
		
.dropdown:hover button ::before{
			content: "\f0d8";
		}		

	
.some-page-wrapper {
  margin: 15px;
  padding-top: 18px;	
  background-color: #E3F4FB;
  }

.row {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  width: 100%;
  padding-top: 15px;	
  padding-bottom: 20px;	
}

.column {
  display: flex;
  flex-direction: column;
  flex-basis: 100%;
  flex: 1
}

.orange-column {
  background-color: orange;
  height: 300px;
}

.blue-column {
  background-color: blue;
  height: 300px;
}

.green-column {
  background-color: #E3F4FB;
  height: 350px;
}

.red-column {
  background-color: #E3F4FB;
  height: 350px;
}	

.double-column {
  display: flex;
  flex-direction: column;
  flex-basis: 100%;
  flex: 2;
}

.triple-column {
  display: flex;
  flex-direction: column;
  flex-basis: 100%;
  flex: 2;
}	
	


/* Style the counter cards */
.card {
  border-radius: 5px;	
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);	
  text-align: center;
  background-color: #FFFFFF;
  height: 110px;	
}	

	.card h3{
		padding-top: 10px;
		color: #093F55;
	}	
	.card span,h2{
		color: #ED8155;
	}
	
/* Float four columns side by side */
.column2 {
  float: left;
  width: 23.6%;
  padding: 0 5px;	
  padding-top: 10px;
}



/* Clear floats after the columns */
.row2:after {
  content: "";
  display: table;
  clear: both;	
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column2 {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}	
	</style>
</head>

<body>

	
<div id="preloader">
<div class="loading">	
<span></span>
<span></span>
<span></span>
</div></div>
	
	<div class="sidenav">
		
		<div class="sidebar">
  <div style="width: 205px;height: 90px;background-color: #CDEEFA;margin-left: 10px;box-shadow:0 0 3px 1px #CDEEFA;margin-bottom: 10px; ">		
  <img src="images/logo2.png" alt="" style="margin-left: 31.5px;margin-top: 5px">
			</div>	  <hr size="2" width="215px;">
  <div id="activepage">			
  <a href="dashboard.php" class="btn active"><i class="fas fa-chart-line"></i>Dashboard</a><hr size="2" width="215px;">
  <a href="addbook.php" class="btn"><i class="fas fa-plus"></i>New Book</a><hr size="2" width="210px;">
  <a href="managebooks.php" class="btn"><i class="fas fa-edit" style="padding-right: 6px;"></i>Manage Books</a><hr size="2" width="215px;">
  <a href="orders.php" class="btn"><i class="fas fa-shopping-bag"></i>Orders</a><hr size="2" width="215px;">	  
  <a href="manageusers.php" class="btn"><i class="fas fa-edit" style="padding-right: 6px;"></i>Manage Users</a><hr size="2" width="215px;">
  <a href="subscriptionrequests.php" class="btn"><span class="icon1-request-2" style="padding-right: 10px;"></span>Subscriptions</a><hr size="2" width="215px;">  	  
  <a href="bookrequests.php" class="btn"><span class="icon1-iconfinder-icon" style="padding-right: 10px;"></span>Book requests</a><hr size="2" width="215px;">
  <a href="viewfeedbacks.php" class="btn"><i class="fas fa-comments"></i>Feedbacks</a><hr size="2" width="215px;">
  <a href="contactsupport.php" class="btn"><i class="fas fa-address-card"></i>Contacts</a><hr size="2" width="215px;">
	  
  	  
		</div>
 
		</div>
</div>
	
	<main>
	<div class="topnav" style="width: 100%;height: 60px;background-color: #093F55;box-shadow: 0 0px 10px 1px black;position: sticky;top: 0;">
		
	<div class="dropdown" style="z-index: 9999999999999999999;">	
		
	<button class="openbtn" id="button" onclick="openNav()" style="cursor: pointer;float: right;font-size: 25px;background-color: #093F55;border: none;color: white; height: 60px;margin-top: 0;padding-top: 12px;"><i class="fas fa-caret-down"></i></button>
		
	<div id="mySidepanel" class="sidepanel">
       	 <h5 style="color: #093F55;padding: 10px;margin-top: -10px"><?php echo $admin_email; ?></h5>
		 <a href="adminlogout.php" style="margin-top: -25px;"><i class="fa fa-fw fa-sign-out"></i>LogOut</a>   
    </div>	
	
	</div>	
		
	<img src="images/adminicon.png" alt="adminicon" class="avatar" style="float: right;height: 40px;width: 40px;padding-top: 10px;"> 
	<p style="margin-left: 250px;margin-top: 0;padding-top:15px;font-size: 20px;color: white">Dashboard</p>	
	</div>		
	
	<div style="margin-bottom: 50px;margin-top: 20px;width: 80%;;height: 125%;background-color: #E3F4FB;margin-left: 240px;">
	
	
	<div class='some-page-wrapper'>
		
  <div class='row'>
  <div class="double-column" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);background-color: white;border-radius: 5px;">
	<div style="height: 98%;width:100%;margin-top: 5px;">
	   <div id="donutchart" style="width: 100%; height: 100%;"></div>
	  </div> 
	  
	  
	 </div> 
	 <div class="triple-column" >
	<div class='column'>
      <div class='green-column' style="background-color: #E3F4FB">
        
	<div style="height: 100%;width: 97.5%;background-color: white;border-radius: 5px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);margin-left: 10px;">
		
	
	<div id="myChart" style="width:98%;height:95%;border-radius: 5px;padding: 8px;position: relative;"></div>		
		
	</div>	  
		  
      </div>
    </div>  
	 </div> 
    
	 
  </div>
		
  

</div>	

	
<div class='some-page-wrapper' style="width: 99%;margin-top: -70px;">
<div class="row2">	
<div class="column2">
    <div class="card" style="padding-top: 0px;padding-bottom: 0px;margin-left: -5px;">

	  <h3>Total Users</h3>	
	  <h2><?php $result10=mysqli_query($conn,"SELECT * FROM users");echo mysqli_num_rows($result10)-1?></h2>	
	  </div>
	  </div>  
  
  <div class="column2">
    <div class="card" style="padding-top: 0px;padding-bottom: 0px;">
      <h3>Total Books</h3>
		
      <h2><?php $result11=mysqli_query($conn,"SELECT * FROM books");echo mysqli_num_rows($result11)?></h2>
	  </div>
	  </div>
  
  <div class="column2">
    <div class="card" style="padding-top: 0px;padding-bottom: 0px;">
<h3>Active subscribers</h3>
      <h2><?php $result13=mysqli_query($conn,"SELECT * FROM users WHERE membership=3 OR membership=4");echo mysqli_num_rows($result13)?></h2>
	  
    </div>
  </div>
  
  <div class="column2">
    <div class="card" style="padding-top: 0px;padding-bottom: 0px;">
		
	  <h3>Total Revenue</h3>
      
<!--
	  <h3 style="padding-top: 0;padding-left: 15px;margin-bottom: -10px;text-align: left"><span style="float: left;color: #555555">Sales</span><span style="float: right;padding-right: 15px;">₹<?php $result12=mysqli_query($conn,"SELECT SUM(grandtotal) AS total FROM orders");$row3 = mysqli_fetch_assoc($result12);$sum = floor($row3['total']);?></span></h3>
	  <h3 style="padding-top: 0;padding-left: 15px;text-align: left"><span style="float: left;color: #555555">Subscriptions</span><span style="float: right;padding-right: 15px;">₹<?php $result14=mysqli_query($conn,"SELECT SUM(subscription_price) AS total1 FROM membership");$row4 = mysqli_fetch_assoc($result14);$sum1 = floor($row4['total1']);?></span></h3>
	  <h3 style="padding-top: 0px;padding-left: 15px;text-align: left"><span style="float: left;color: #555555;">Total</span><span style="float: right;padding-right: 15px;">₹<?php $whole1 = floor($sum+$sum1);  ?></span></h3>
-->	  <h2><?php echo $whole1; ?></h2>
		
    </div>
  </div>
</div>
	
</div>		
		
		
	</div>	
		
	</main>
	
			
<script type=text/javascript>

</script>
	<script>
// Add active class to the current button (highlight it)
var header = document.getElementById("activepage");
var btns = header.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}

	
</script>
<script>
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
var data = google.visualization.arrayToDataTable([
['Books', 'Number of books sold',{ role: 'style' }],
<?php $result1=mysqli_query($conn,"SELECT DISTINCT book_isbn FROM order_items");
	  while($row=mysqli_fetch_assoc($result1)){
	  $isbn=$row['book_isbn'];	  
	  $result2=mysqli_query($conn,"SELECT * FROM books WHERE book_isbn='$isbn'"); 
	  $row2=mysqli_fetch_assoc($result2);	  
	  $result3=mysqli_query($conn,"SELECT * FROM order_items WHERE book_isbn='$isbn'"); 
	  $total=mysqli_num_rows($result3);	  
	?>
	['<?php echo $row2['book_title'] ?>', <?php echo $total; ?>,'color: #3283C4'],
<?php } ?>	
	
]);

var options = {	
  title:'Top selling Books',	
  legend: { position: 'bottom', alignment: 'start' },	
  titleTextStyle: {
        color: '#093F55', 
        fontSize: 18,
        bold: true,   
    }	
	
};

var chart = new google.visualization.BarChart(document.getElementById('myChart'));
  chart.draw(data, options);
}
</script>	
	<script src="preloader.js">
</script>
	<script src="https://kit.fontawesome.com/1ef47f1454.js" crossorigin="anonymous"></script>
	
<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Order Status', 'No. of Orders'],
		  <?php $result4=mysqli_query($conn,"SELECT * FROM trackorder WHERE order_status='Processing' OR order_status='Processing'"); ?>	
          ['Processing',    <?php echo mysqli_num_rows($result4) ?>],
		  <?php $result5=mysqli_query($conn,"SELECT * FROM trackorder WHERE order_status='Ready for packaging'"); ?>	
          ['Ready for Packaging',     <?php echo mysqli_num_rows($result5) ?> ],
		  <?php $result6=mysqli_query($conn,"SELECT * FROM trackorder WHERE order_status='Ready to deliver'"); ?>	
          ['Ready to deliver', <?php echo mysqli_num_rows($result6) ?>],
		  <?php $result7=mysqli_query($conn,"SELECT * FROM trackorder WHERE order_status='Delivered'"); ?>	
          ['Delivered', <?php echo mysqli_num_rows($result7) ?>],
		  <?php $result8=mysqli_query($conn,"SELECT * FROM trackorder WHERE order_status='Received'"); ?>	
          ['Received', <?php echo mysqli_num_rows($result8) ?>],
		  <?php $result9=mysqli_query($conn,"SELECT * FROM trackorder WHERE order_status='Not delivered'"); ?>	
          ['Not Delivered', <?php echo mysqli_num_rows($result9) ?>]
        ]);

        var options = {
          title: 'Orders',	
		  legend: { position: 'bottom',},	
          pieHole: 0.4,
		  titleTextStyle: {
        color: '#093F55', 
        fontSize: 18,
        bold: true, 		  
    }	
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>	
</body>
</html>
