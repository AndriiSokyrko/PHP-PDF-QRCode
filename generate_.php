<?php
	session_start();
include 'phpqrcode/qrlib.php';
		if ( isset( $_POST['barcode_']) && !empty($_POST['barcode_'])  ) {
			$code = $_POST['barcode_'];
			QRcode::png( $code, 'img/qrcode.png' );
			header( "location: http://DemoPDF/demo_.php" );
			return;
		}
			$_SESSION['error_']='true';
			unset($_SESSION['error']);

			header( "location: index.php#block_simple" );
//	}
?>