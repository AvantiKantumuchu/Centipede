<!DOCTYPE html>
<html>
<style type="text/css">
	@import url(http://fonts.googleapis.com/css?family=Cabin:400);
@import 'https://fonts.googleapis.com/css?family=Open+Sans';
body {
    font-family: 'Arial',sans-serif;
    
    background: url('bg.jpg') no-repeat center center fixed; 
   -webkit-background-size: cover;
   -moz-background-size: cover;
   -o-background-size: cover;
   background-size: cover;
   font-family: 'Noto Sans', sans-serif;
    
}

header {
    
    height: 100px;
    padding: 0px;
}

header h1 {
   text-transform: uppercase;
    text-align:center;
    color:white;
    line-height: 100px;
}
.button {
    position: relative;
    background-color: #4CAF50;
    border: none;
    font-size: 28px;
    color: #FFFFFF;
    padding: 20px;
    width: 200px;
    text-align: center;
    -webkit-transition-duration: 0.6s; /* Safari */
    transition-duration: 0.4s;
    text-decoration: none;
    overflow: hidden;
    cursor: pointer;
}

.button {
  padding: 5px 5px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color:darkslategray;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px white;
}

.button:hover {background-color:#99bbff}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

ul.main_menu
{
    margin-top: 0px;
}
 
.main_menu li 
{
    display: inline;
    padding: 0 10px 0 10px;
    font-size: 16px;
}

.main_menu a{
    text-decoration: none;
    color: #fff;
    padding: 8px;
    font-variant: small-caps;
}
.main_menu a:hover {
    color:aqua;
}


.inputfile {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}

.inputfile + label {
    font-size: 1.0em;
    font-weight: 700;
    color: black;
    background-color: white;
    display: inline-block;
}

.inputfile:focus + label,
.inputfile + label:hover {
    background-color: red;
}
  
.inputfile + label {
	cursor: pointer; /* "hand" cursor */
}


.webdesigntuts-workshop input {
	background: #222;	
	background: linear-gradient(#333, #222);	
	border: 1px solid #444;
	border-radius: 5px 0 0 5px;
	box-shadow: 0 2px 0 #000;
	color: #888;
	display: block;
	float: left;
	font-family: 'Cabin', helvetica, arial, sans-serif;
	font-size: 13px;
	font-weight: 400;
	height: 40px;
	margin: 0;
	padding: 10px 10px;
	text-shadow: 0 -1px 0 #000;
	width: 200px;
}

.ie .webdesigntuts-workshop input {
	line-height: 45px;
}

.webdesigntuts-workshop input::-webkit-input-placeholder {
   color: #888;
}

.webdesigntuts-workshop input:-moz-placeholder {
   color: #888;
}

.webdesigntuts-workshop input:focus {
	animation: glow 800ms ease-out infinite alternate;
	background: #222922;
	background: linear-gradient(#333933, #222922);
	border-color: #393;
	box-shadow: 0 0 5px rgba(0,255,0,.2), inset 0 0 5px rgba(0,255,0,.1), 0 2px 0 #000;
	color: #efe;
	outline: none;
}

.webdesigntuts-workshop input:focus::-webkit-input-placeholder { 
	color: #efe;
}

.webdesigntuts-workshop input:focus:-moz-placeholder {
	color: #efe;
}

.webdesigntuts-workshop button {
	background: #222;
	background: linear-gradient(#333, #222);
	box-sizing: content-box;
	border: 1px solid #444;
	border-left-color: #000;
	border-radius: 0 5px 5px 0;
	box-shadow: 0 2px 0 #000;
	color: #fff;
	display: block;
	float: left;
	font-family: 'Cabin', helvetica, arial, sans-serif;
	font-size: 13px;
	font-weight: 400;
	height: 40px;
	line-height: 40px;
	margin: 0;
	padding: 0;
	position: relative;
	text-shadow: 0 -1px 0 #000;
	width: 80px;
}	

.webdesigntuts-workshop button:hover,
.webdesigntuts-workshop button:focus {
	background: #292929;
	background: linear-gradient(#393939, #292929);
	color: #5f5;
	outline: none;
}

.webdesigntuts-workshop button:active {
	background: #292929;
	background: linear-gradient(#393939, #292929);
	box-shadow: 0 1px 0 #000, inset 1px 0 1px #222;
	top: 1px;
}

@keyframes glow {
    0% {
		border-color: #393;
		box-shadow: 0 0 5px rgba(0,255,0,.2), inset 0 0 5px rgba(0,255,0,.1), 0 2px 0 #000;
    }	
    100% {
		border-color: #6f6;
		box-shadow: 0 0 20px rgba(0,255,0,.6), inset 0 0 10px rgba(0,255,0,.4), 0 2px 0 #000;
    }
}
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}


</style>

<head>
	<head>
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700,700i" rel="stylesheet">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Centipede </title>
        <meta name="viewpoint" content="width=device-width; initial-scale=1; maximum scale=1">
    </head>
    <body>
        <div id="wrapper">
            <header>
     <a href="#" id= "logo"> </a>
            <h1>Centipede</h1>
            </header>

            <nav>
                <a href="#" id = "menu_icon"></a>
            <ul class ="main_menu">
                <li><a href="input.php"><button class="button">Home</button></a></li>
                <li><a href="supplier.php"><button class="button">Supplier Report</button></a></li>
                <li><a href="PO.php"><button class="button">PO Report</button></a></li>
                <li><a href="Invoice.php"><button class="button">Invoice Report</button></a></li>
                <li><a href="OutstandingPO.php"><button class="button">Outstanding PO</button></a></li>
                </ul>
            </nav>
     
</div>
</head>
</head>
<body>
<div>
		<section class="webdesigntuts-workshop">
	<form action="Invoice.php" method="post">		    
		<input type="search" name="valueToSearch" placeholder="Enter Invoice Number">		    	
		<button>Search</button>
</form>
<form action="Invoice.php" method="POST">		    	
                <input type= "submit" value="View Full Data" style="background-color: #4d4d4d; color:white; font-size: 16px">
	</form>
</section>
</div>
<div><br><br>
<h1 align="center" style="color:white">INVOICE REPORT</h1>
<h2 style="color:white">INVOICE DETAILS</h2>
<table bgcolor="#b3cccc">
<thead>
<tr>
	<th>
		Invoice No
	</th>
	<th>
		Invoice PO No
	</th>
	<th>
		Invoice Factory Code
	</th>
	<th>
		Invoice Year
	</th>
	<th>
		Invoice Month
	</th>
	<th>
		Invoice Day
	</th>
	<th>
		Supplier Code
	</th>

</tr>
</thead>

<tbody>
	<?php
										$con=mysqli_connect("localhost","s_akantumuchu","xjPEaXYx","s_akantumuchu");
										if(isset($_POST['valueToSearch']))
										{
											$valueToSearch = $_POST['valueToSearch'];
											$query = "SELECT * FROM Invoice WHERE InvoiceNumber LIKE '%".$valueToSearch."'";
											$searchResult = mysqli_query($con,$query);
										}
										else
										{
											$searchResult = mysqli_query($con,"SELECT * FROM Invoice");
										}
										while($row = mysqli_fetch_array($searchResult))
										{
											echo"<tr>
												<td>".$row['InvoiceNumber']."</td>
												<td>".$row['InvoicePONumber']."</td>
												<td>".$row['InvoiceFactoryCode']."</td>
												<td>".$row['InvoiceYear']."</td>
												<td>".$row['InvoiceMonth']."</td>
												<td>".$row['InvoiceDay']."</td>
												<td>".$row['SupplierCode']."</td>

											</tr>";
										}
									?>
</tbody>
</div>
</table>
<h2 style="color:white"> INVOICE LINE DETAILS </h2>
<table bgcolor="#b3cccc">
<thead>
<tr>
	<th>
		Invoice No
	</th>
	<th>
		Invoice Line No
	</th>
	<th>
		Invoice Line Description
	</th>
	<th>
		Invoice Line Quantity
	</th>
	<th>
		Invoice Line Unit Price
	</th>
	<th>
		Invoice Currency Code
	</th>

</tr>
</thead>

<tbody>
	<?php
										$con=mysqli_connect("localhost","s_akantumuchu","xjPEaXYx","s_akantumuchu");
										if(isset($_POST['valueToSearch']))
										{
											$valueToSearch = $_POST['valueToSearch'];
											$query = "SELECT * FROM InvoiceLine WHERE InvoiceNumber LIKE '%".$valueToSearch."'";
											$searchResult = mysqli_query($con,$query);
										}
										else
										{
											$searchResult = mysqli_query($con,"SELECT * FROM InvoiceLine");
										}
										while($row = mysqli_fetch_array($searchResult))
										{
											echo"<tr>
												<td>".$row['InvoiceNumber']."</td>
												<td>".$row['InvoiceLineNumber']."</td>
												<td>".$row['InvoiceLineDescription']."</td>
												<td>".$row['InvoiceLineQuantity']."</td>
												<td>".$row['InvoiceLineUnitPrice']."</td>
												<td>".$row['InvoiceLineCurrencyCode']."</td>
											</tr>";
										}
									?>
</tbody>
</div>
</table>
</body>
</html>