<!DOCTYPE html>
<?php
	require("conn_manager.php");
	$trolley_no = $_GET["TrolleyNo"];
	//$trolley_no = 1;
	$conn = connect();
	$query = "select IName , des, cost, qty, TrolleyNo from transactions, Items " . 
	    " where trolleyno = ". $trolley_no ." and paid = 0 and Items.Id = Transactions.Iid;";
	$result = mysqli_query($conn, $query);
	if (!$result) {
	    echo "Could not successfully run query ($query) from DB: " . mysql_error();
	    exit;
	}
	
	if (mysqli_num_rows($result) == 0) {
	    echo "Trolley Empty.";
	    exit;
	    
	}   
	/*while($r = mysqli_fetch_assoc($result)) {
	    $rows[] = $r;
	}*/
	
	//$bill =  mysqli_fetch_assoc($result);
	
	$q = "select Tid from Trolleys where TrolleyNo = ". $trolley_no;
	$res = mysqli_query($conn, $q);
	$tid = mysqli_fetch_assoc($res)["Tid"][0];
	?>
<html lang="en">
	<head>
		<title>checkout.php </title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="css/bootstrap.css">
        <script src="js/jquery.js"></script>
        <script src="js/bootstrap.js"></script>
  
        <style>
			body {
			font: 20px Montserrat, sans-serif;
			line-height: 1.8;
			color: #f5f6f7;
			}
			p {font-size: 16px;}
			.margin {margin-bottom: 45px;}
			.bg-1 { 
			background-color: #1abc9c; /* Green */
			color: #ffffff;
			}
			.bg-2 { 
			background-color: #474e5d; /* Dark Blue */
			color: #ffffff;
			}
			.bg-3 { 
			background-color: #ffffff; /* White */
			color: #555555;
			}
			.bg-4 { 
			background-color: #2f2f2f; /* Black Gray */
			color: #fff;
			}
			.container-fluid {
			padding-top: 70px;
			padding-bottom: 70px;
			height: 100%;
			}
			.navbar {
			padding-top: 15px;
			padding-bottom: 15px;
			border: 0;
			border-radius: 0;
			margin-bottom: 0;
			font-size: 12px;
			letter-spacing: 5px;
			}
			.navbar-nav  li a:hover {
			color: #1abc9c !important;
			}
			#myModal {
			color: mediumblue;   
			}
            
		</style>
	</head>
	<body>
		<!-- Navbar -->
		<nav class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
					</button>
					<a class="navbar-brand" href="#">Shopping Center</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="#">.</a></li>
						<li><a href="#"></a></li>
						<li><a href="#"></a></li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- First Container -->
		<div class="container-fluid bg-4">
			<div class="row text-center">
				<h1> Invoice </h1>
				<br/><br/>
			</div>
			<div class="row">
				<div class="col-sm-4">
					Bill No: <?php echo $trolley_no . $tid; ?> 
					<br/>
					Trolley Number: <?php echo $trolley_no; ?>
					<br/>
				</div>
				<div class="col-sm-8 text-right">
					Date : <?php echo date("d/m/Y"); ?>
				</div>
			</div>
			<br/><br/>
			<table class="table">
				<!--Table head-->
				<thead>
					<tr>
						<th>#</th>
						<th>Item</th>
						<th>Desc</th>
						<th>Qty</th>
						<th>Cost</th>
						<th>Total</th>
					</tr>
				</thead>
				<!--Table head-->
				<!--Table body-->
				<tbody>
					<?php 
						$no = 1;
						$grandTotal = 0;
						while ($row = mysqli_fetch_assoc($result)) { ?> 
					<tr>
						<th scope="row"><?php echo $no; ?></th>
						<td><?php echo $row["IName"]; ?></td>
						<td><?php echo $row["des"]; ?></td>
						<td><?php echo $row["qty"]; ?></td>
						<td><?php echo $row["cost"]; ?></td>
						<td><?php echo $row["qty"] * $row["cost"]; ?></td>
					</tr>
					<?php 
						$grandTotal = $grandTotal +  $row["qty"] * $row["cost"];                             
						$no++; } 
						?>
					<tr>
						<th scope="row"></th>
						<td></td>
						<td></td>
						<td></td>
						<td class="text-center"><b>Grand Total: </b></td>
						<td><?php echo $grandTotal; ?></td>
					</tr>
				</tbody>
				<!--Table body-->
			</table>
			<br/>
			<div class="row">
				<div class="col-sm-4"></div>
				<div class="col-sm-4">
					<button type="button" id="checkoutbutton" data-toggle="modal" data-target="#myModal" class="btn-lg btn-primary center-block">Checkout</button>    
				</div>
				<div class="col-sm-4"></div>
			</div>
            
			<!-- Modal -->
			<div id="myModal" class="modal" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content" style="background: #fff">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Checkout</h4>
						</div>
						<div class="modal-body">
							<p>Are you sure you want to checkout this bill?</p>
						</div>
						<div class="modal-footer">
							<button type="button" id="modalok" class="btn btn-default" data-dismiss="modal">OK</button>
						</div>
					</div>
				</div>
			</div>
			<!-- Modal ends -->
			
		</div>
		<script>
            $(document).ready(function(){
                var modalOkButton = document.getElementById("modalok");
                modalOkButton.addEventListener('click', function(event) {
                   $.post("clearbill.php", {TrolleyNo: <?php echo $trolley_no;?> }, function(data, status, xhr) {
                        console.log("POST Successful.");
                        alert("Bill Cleared");    
                        $("clearedModal").modal("show");
                        document.location = "index.php";
                    });
                });
            });
		</script>
    </body>
</html>