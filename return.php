<!DOCTYPE html>
<html>
<head>
    <title>Payment Status detail</title>
     <?php //require_once('includesheader.php'); ?>
</head>
<body>
	<?php  
		// $secretKey = "23035751f192511b20ed11cbe4ea0b4ea25e3f2b"; // test secret key
  		$secretKey = "6e7c203e5d7350d0e87964df705432d4fa856adc"; // production secret key
		$orderId = $_POST["orderId"];
		$orderAmount = $_POST["orderAmount"];
		$referenceId = $_POST["referenceId"];
		$txStatus = $_POST["txStatus"];
		$paymentMode = $_POST["paymentMode"];
		$txMsg = $_POST["txMsg"];
		$txTime = $_POST["txTime"];
		$signature = $_POST["signature"];
		$data = $orderId.$orderAmount.$referenceId.$txStatus.$paymentMode.$txMsg.$txTime;
		$hash_hmac = hash_hmac('sha256', $data, $secretkey, true) ;
		$computedSignature = base64_encode($hash_hmac);

	//	$arrId = explode("-",$orderId);
  	//	$puid = $arrId[1];

		$pay_data = "Ref.Id: ".$referenceId."<br>Status: ".$txStatus."<br>Message: ".$txMsg."<br>Time:".$txTime;
		
		if ($signature == $computedSignature && $txStatus=="SUCCESS") {

	  		// $que3 = $DB_CON->prepare("UPDATE users_tbl SET balance = balance+'$orderAmount' WHERE uid='$puid'");
	    //   	$que3->execute();

	    //   	$bonusChk = $DB_CON->prepare("SELECT * FROM bonus_tbl where uid='$puid'"); 
		   //  $bonusChk->execute();
		   //  $bonusRow = $bonusChk->fetch();
	      
	?>
	<div class="container"> 
	<div class="panel panel-success">
	  <div class="panel-heading">Your Recharge is Successful</div>
	  <div class="panel-body">
	  	<!-- <div class="container"> -->
	 		<table class="table table-hover">
			    <tbody>
			      <tr>
			        <td>Order ID</td>
			        <td><?php echo $orderId; ?></td>
			      </tr>
			      <tr>
			        <td>Order Amount</td>
			        <td><?php echo $orderAmount; ?></td>
			      </tr>
			      <tr>
			        <td>Reference ID</td>
			        <td><?php echo $referenceId; ?></td>
			      </tr>
			      <tr>
			        <td>Transaction Status</td>
			        <td><?php echo $txStatus; ?></td>
			      </tr>
			      <tr>
			        <td>Payment Mode </td>
			        <td><?php echo $paymentMode; ?></td>
			      </tr>
			      <tr>
			        <td>Message</td>
			        <td><?php echo $txMsg; ?></td>
			      </tr>
			      <tr>
			        <td>Transaction Time</td>
			        <td><?php echo $txTime; ?></td>
			      </tr>
			    </tbody>
			</table>
		<!-- </div> -->
	   </div>
	</div>
	</div>
	 <?php } else { 

	 		// $up_payment = $DB_CON->prepare("UPDATE `payment_tbl` SET `pmethod`='$paymentMode',`pdetails`='$pay_data',`pstatus`='2' WHERE ord_id='$orderId' AND `puid`='$puid'");
	  	// 	$up_payment->execute();
	 	?>
	<div class="container"> 
	<div class="panel panel-danger">
	  <div class="panel-heading">Your Recharge is failed</div>
	  <div class="panel-body">
	  	<!-- <div class="container"> -->
	 		<table class="table table-hover">
			    <tbody>
			      <tr>
			        <td>Order ID</td>
			        <td><?php echo $orderId; ?></td>
			      </tr>
			      <tr>
			        <td>Order Amount</td>
			        <td><?php echo $orderAmount; ?></td>
			      </tr>
			      <tr>
			        <td>Reference ID</td>
			        <td><?php echo $referenceId; ?></td>
			      </tr>
			      <tr>
			        <td>Transaction Status</td>
			        <td><?php echo $txStatus; ?></td>
			      </tr>
			      <tr>
			        <td>Payment Mode </td>
			        <td><?php echo $paymentMode; ?></td>
			      </tr>
			      <tr>
			        <td>Message</td>
			        <td><?php echo $txMsg; ?></td>
			      </tr>
			      <tr>
			        <td>Transaction Time</td>
			        <td><?php echo $txTime; ?></td>
			      </tr>
			    </tbody>
			</table>
		<!-- </div> -->
	  </div>	
	</div>	
	</div>
	<?php	
	 	} 
	 	
	 	header( "refresh:2;url=ku.php" );
	 ?>

	 <center>
	 	<a href="ku.php" class="btn btn-primary"> Close </a>
	 </center>
</body>
</html>
