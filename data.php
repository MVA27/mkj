<!DOCTYPE html>
<html>
	<head>

		<link rel="stylesheet" type="text/css" href="data.css">
		<title>Data</title>

	</head>

	<body>
		<header>
			<h1 id="header_title"> Jewellery Store Management System </h1>
		</header>
		
		<table id="main_table_id">	
		<?php 
			$query = "SELECT IMAGE_PATH,SRNO,TYPE,PRICE FROM PRODUCTS WHERE ";
			$originalLength = strlen($query);
			
			$reqSRNO = $_REQUEST['productID'];
			if($reqSRNO) $query = $query."SRNO='$reqSRNO' AND ";
			
			$reqCUSTOMER_NAME = $_REQUEST['productCustomerName'];
			if($reqCUSTOMER_NAME) $query = $query."CUSTOMER_NAME='$reqCUSTOMER_NAME' AND ";
			
			$reqCUSTOMER_NUMBER = $_REQUEST['productCustomerNumber'];
			if($reqCUSTOMER_NUMBER) $query = $query."CUSTOMER_NUMBER='$reqCUSTOMER_NUMBER' AND ";
			
			$reqPRICE = $_REQUEST['productPrice'];
			if($reqPRICE) $query = $query."PRICE='$reqPRICE' AND ";
			
			$reqWEIGHT = $_REQUEST['productWeight'];
			if($reqWEIGHT) $query = $query."WEIGHT='$reqWEIGHT' AND ";
			
			$reqPURITY = $_REQUEST['productPurity'];
			if($reqPURITY) {
				if($reqPURITY != -1) $query = $query."PURITY='$reqPURITY' AND ";
			}
			
			$reqSELLING_DATE = $_REQUEST['productSellingDate'];
			if($reqSELLING_DATE) $query = $query."SELLING_DATE='$reqSELLING_DATE' AND ";
			
			$newLength = strlen($query);
			
			if($originalLength == $newLength){ //Query didnt change
				$query = "SELECT IMAGE_PATH,SRNO,TYPE,PRICE FROM PRODUCTS";
			}
			else{ //Query Changed
				$query = trim($query," AND ");
			}

			$connection = mysqli_connect("localhost","root","","WT_PROJECT");
			if($connection) {
				$table = mysqli_query($connection,$query);
				$numRows = mysqli_num_rows($table);

				if($table){
					$colCount = 1;

					while($row = mysqli_fetch_array($table)){
						$SRNO =  $row['SRNO'];
						$TYPE =  $row['TYPE'];
						$PRICE =  $row['PRICE'];
						$image_path =  $row['IMAGE_PATH'];
						$image_path =  "http://localhost/EXP/EXP7/PHP/".$image_path;

						if($colCount == 1) echo "<tr>";
							echo "<td>";
								echo "<img src='$image_path'>";
								echo "<div>";
									echo "<p>product type : '$TYPE'</p>";
									echo "<p>product id : '$SRNO'</p>";
									echo "<p>product price : '$PRICE'</p>";
								echo "</div>";
							echo "</td>";
						
						if($colCount == 3){
							echo "</tr>";
							$colCount = 0;
						}
						$colCount++;
					}
				}
			}
		?>
		</table>

	</body>
</html>