<?php
	session_start();
include 'phpqrcode/qrlib.php';

		if ( isset( $_POST['barcode']) && !empty($_POST['barcode'])  ) {
		$code = $_POST['barcode'];
		QRcode::png( $code, 'img/qrcode.png' );
			foreach ( $_POST as $name => $val )
			{
			if(!empty($val)) $_SESSION[ $name ] = $val;
			}
//			 echo count( $_POST );
			header( "location: http://DemoPDF/demo.php" );
			return;
	}
	$_SESSION['error']='true';
	unset($_SESSION['error_']);
	header('Location: index.php#block_notsimple ');

?>