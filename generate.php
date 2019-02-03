<?php
	session_start();
include 'phpqrcode/qrlib.php';

	if ( isset( $_POST['barcode'] ) && ! empty( $_POST['barcode'] ) ) {
		$code = $_POST['barcode'];
		QRcode::png( $code, 'img/qrcode.png' );
		$check_post=0;
		foreach ( $_POST as $name => $val ) {
			if ( ! empty( $val ) ) {
				$_SESSION[ $name ] = $val;
				$check_post +=$val;			}
		}
		if ($check_post==0){
			 
			$_SESSION['error']='true';
			unset($_SESSION['error_']);
			header('Location: index.php#block_notsimple ');
			return;
		}
		header( "location: http://DemoPDF/demo.php" );
		return;
	}
	$_SESSION['error']='true';
	unset($_SESSION['error_']);
	header('Location: index.php#block_notsimple ');

?>