<?php
if($_SERVER["REQUEST_METHOD"]=="POST")
{
	$con=mysqli_connect("localhost","s_akantumuchu","xjPEaXYx","s_akantumuchu");
	if(mysqli_connect_errno())
	{
		echo "failed to connect to MySQL:"+mysqli_connect_error();
		die();
	}
	$contents=file_get_contents($_FILES["importFile"]["tmp_name"]);
	$lines=explode("\n",$contents);

	foreach($lines as $line)
	{
		switch(substr($line,0,2))
		{
			case "IN":
				  $invoiceNumber=trim(substr($line,2,10));
				  $invoiceFactoryCode=trim(substr($line,12,3));
				  $invoiceSupplierCode=trim(substr($line,15,3));
				  $invoiceYear=trim(substr($line,18,4));
				  $invoiceMonth=trim(substr($line,22,2));
				  $invoiceDay=trim(substr($line,24,2));
				  $invoicePONumber=trim(substr($line,26,10));
				  $invoiceLineNo=trim(substr($line,36,10));
				  $invoiceLineDescription=trim(substr($line,46,200));
				  $invoiceLineQuantity=trim(substr($line,246,10));
				  $invoiceLineUnitPrice=trim(substr($line,256,12));
				  $invoiceLineCurrencyCode=trim(substr($line,268,3));
				  
				  $resultInvoice = mysqli_num_rows(mysqli_query($con,"SELECT * FROM Invoice WHERE InvoiceNumber = '$invoiceNumber'"));
				  if($resultInvoice >= 1)
				  {
					  mysqli_query($con,"UPDATE Invoice SET InvoicePONumber='$invoicePONumber',InvoiceFactoryCode='$invoiceFactoryCode',SupplierCode='$invoiceSupplierCode',InvoiceYear='$invoiceYear',
					  InvoiceMonth='$invoiceMonth',InvoiceDay='$invoiceDay' WHERE InvoiceNumber='$invoiceNumber'");
				  }
				  else
				  {
					mysqli_query($con,"INSERT INTO Invoice (InvoiceNumber,InvoicePONumber,InvoiceFactoryCode,SupplierCode,InvoiceYear,InvoiceMonth,InvoiceDay)"
				  ."VALUES('".$invoiceNumber."','".$invoicePONumber."','".$invoiceFactoryCode."','".$invoiceSupplierCode."','".$invoiceYear."','".$invoiceMonth."'
				  ,'".$invoiceDay."');");  
				  }
				  
				  $resultInvoiceLine = mysqli_num_rows(mysqli_query($con,"SELECT * FROM InvoiceLine WHERE InvoiceNumber = '$invoiceNumber' AND InvoiceLineNumber='$invoiceLineNo'"));
				  if($resultInvoiceLine >= 1)
				  {
					mysqli_query($con,"UPDATE InvoiceLine SET InvoiceLineDescription='$invoiceLineDescription',InvoiceLineQuantity='$invoiceLineQuantity',InvoiceLineUnitPrice='$invoiceLineUnitPrice',
					InvoiceLineCurrencyCode='$invoiceLineCurrencyCode' WHERE InvoiceNumber='$invoiceNumber' AND InvoiceLineNumber='$invoiceLineNo'");
				  }
				  else
				  {
					mysqli_query($con,"INSERT INTO InvoiceLine (InvoiceNumber,InvoiceLineNumber,InvoiceLineDescription,InvoiceLineQuantity,InvoiceLineUnitPrice,InvoiceLineCurrencyCode)"
				  ."VALUES('".$invoiceNumber."','".$invoiceLineNo."','".$invoiceLineDescription."','".$invoiceLineQuantity."','".$invoiceLineUnitPrice."','".$invoiceLineCurrencyCode."');");  
				  }
			      break;
			case "PO":
			      $PONo=trim(substr($line,2,10));
				  $POBuyingFactoryCode=trim(substr($line,12,3));
				  $POReceivingFactoryCode=trim(substr($line,15,3));
				  $POSupplierCode=trim(substr($line,18,3));
				  $POIssueYear=trim(substr($line,21,4));
				  $POIssueMonth=trim(substr($line,25,2));
				  $POIssueDay=trim(substr($line,27,2));
				  $POLineNo=trim(substr($line,29,10));
				  $POLineDescription=trim(substr($line,39,200));
				  $POLineQuantity=trim(substr($line,239,10));
				  $POLineUnitPrice=trim(substr($line,249,12));
				  $POLineCurrencyCode=trim(substr($line,261,3));
				  
				  $resultPO = mysqli_num_rows(mysqli_query($con,"SELECT * FROM PO WHERE PONumber = '$PONo'"));
				  if($resultPO >= 1)
				  {
					  mysqli_query($con,"UPDATE PO SET POBuyingFactoryCode='$POBuyingFactoryCode',POReceivingFactoryCode='$POReceivingFactoryCode',
					  POIssueYear='$POIssueYear',POIssueMonth='$POIssueMonth',POIssueDay='$POIssueDay',SupplierCode='$POSupplierCode' WHERE PONumber='$PONo'");
				  }
				  else
				  {
					  mysqli_query($con,"INSERT INTO PO (PONumber,POBuyingFactoryCode,POReceivingFactoryCode,POIssueYear,POIssueMonth,POIssueDay,SupplierCode)"
				  ."VALUES('".$PONo."','".$POBuyingFactoryCode."','".$POReceivingFactoryCode."'
				  ,'".$POIssueYear."','".$POIssueMonth."','".$POIssueDay."','".$POSupplierCode."');");
				  }
				  $resultPOLine = mysqli_num_rows(mysqli_query($con,"SELECT * FROM POLine WHERE PONumber='$PONo' AND POLineNumber='$POLineNo'"));
				  if($resultPOLine >= 1)
				  {
					  mysqli_query($con,"UPDATE POLine SET POLineDescription='$POLineDescription',POLineQuantity='$POLineQuantity',POLineUnitPrice='$POLineUnitPrice',
					  POLineCurrencyCode='$POLineCurrencyCode' WHERE PONumber='$PONo' AND POLineNumber='$POLineNo'");
				  }
				  else
				  {
					mysqli_query($con,"INSERT INTO POLine (PONumber,POLineNumber,POLineDescription,POLineQuantity,POLineUnitPrice,POLineCurrencyCode)"
				  ."VALUES('".$PONo."','".$POLineNo."','".$POLineDescription."','".$POLineQuantity."','".$POLineUnitPrice."','".$POLineCurrencyCode."');");  
				  }
			      break;
			case "SP":
			      $supplierCode=trim(substr($line,2,3));
			      $supplierName=trim(substr($line,5,50));
				  $supplierAddress1=trim(substr($line,55,50));
				  $supplierAddress2=trim(substr($line,105,50));
				  $supplierCity=trim(substr($line,155,50));
				  $supplierState=trim(substr($line,205,2));
				  $supplierZip=trim(substr($line,207,10));
				  $supplierCountry=trim(substr($line,217,2));
				  $supplierPhone=trim(substr($line,219,16));
				  $supplierFax=trim(substr($line,235,16));
				  //ask db if supplier code is already there?
				  // if so, update all the other fields for that supplier code
				  // if not, insert a record
				  $result = mysqli_num_rows(mysqli_query($con,"SELECT * FROM Supplier WHERE SupplierCode = '$supplierCode'"));
				  if($result >= 1)
				  {
					  mysqli_query($con,"UPDATE Supplier SET SupplierName='$supplierName',Address1='$supplierAddress1',Address2='$supplierAddress2',City='$supplierCity',State='$supplierState',Zip='$supplierZip',Country='$supplierCountry',SupplierPhone='$supplierPhone',SupplierFax='$supplierFax' WHERE SupplierCode = '$supplierCode'");
				  }
				  else
				  {
					  mysqli_query($con,"INSERT INTO Supplier (SupplierCode,SupplierName,Address1,Address2,City,State,Zip,Country,SupplierPhone,SupplierFax)"
			      ."VALUES('".$supplierCode."','".$supplierName."','".$supplierAddress1."','".$supplierAddress2."','".$supplierCity."','".$supplierState."','".$supplierZip."','".$supplierCountry."','".$supplierPhone."','".$supplierFax."');");
				  }
			      break;
		        default:
			      break;

		}
	}
}
?>


<!DOCTYPE html>
<html>
<style>
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
	width: 10px;
	height: 10px;
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
    background-color: #b399ff;
}
  
.inputfile + label {
	cursor: pointer; /* "hand" cursor */
}

</style>
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
<br>
<br>
<p style="color:white">Centipede Company, the management of the flow of goods and services,involves the 
movement and storage of raw materials, of work-in-process inventory, and of finished goods from point of origin to point of 
consumption. Interconnected or interlinked networks, channels and node businesses combine in the provision of products 
and services required by end customers in a supply chain.It executes "design, planning, execution, control, and monitoring 
of supply chain activities with the objective of creating net value, building a competitive infrastructure, leveraging worldwide logistics, 
synchronizing supply with demand and measuring performance globally.
It is a cross-functional approach that includes managing the movement of raw materials into an 
organization, certain aspects of the internal processing of materials into finished goods, and the movement of finished goods 
out of the organization and toward the end consumer. As organizations strive to focus on core competencies and become more 
flexible, they reduce their ownership of raw materials sources and distribution channels. These functions are increasingly 
being outsourced to other firms that can perform the activities better or more cost effectively. The effect is to increase 
the number of organizations involved in satisfying customer demand, while reducing managerial control of daily logistics 
operations. Less control and more supply chain partners lead to the creation of the concept of supply chain management. 
The goal of Centipede is to improve trust and collaboration among supply chain partners, thus improving 
inventory visibility and the velocity of inventory movement.</p>
<form method="post" enctype="multipart/form-data">
<input type="file" name="importFile" id="file" class="inputfile" style="background-color: #4d4d4d; color:white; font-size: 16px text-align:center" />
<label for="file" style= "background-color: grey; color:black; font-size: 20px; align:center">Choose a file</label>
</label>
<br/>
<br/>
<input type="submit" onClick="showAlert()" style= "background-color: #4d4d4d; color:white; font-size: 16px"/>
</form>
<script>
function showAlert()
{
	alert("Operation Performed Succesfully");
}
</script>
</body>
</html>