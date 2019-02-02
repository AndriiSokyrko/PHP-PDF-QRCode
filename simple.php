<?php //  session_start();
?>
<div  id="block_simple" class="col-md-6  col-md-offset-3 well class_hide
<?php  $_SESSION['error']=='true'? '.class_hide' : '.class_show';  ?>">
	<h3 class="text-primary">PHP - Simple Barcode Generator<br>(QRCODE library)</h3>
	<h3 class="text-primary">PHP - Simple Transformer to PDF Through(FPDF Library)</h3>
	<hr style="border-top:1px dotted #ccc;"/>
	<div class="col-md-2"></div>
	<div class="col-md-8">
		<form method="POST" action="generate_.php">
			<div class="form-group">

				<?php  if($_SESSION['error_']=='true') {?>
					<label class="alert-danger">Enter text for QRCode</label>
				<?php  }  else { ?>
					<label class="alert-info">Enter text for QRCode</label>

				<?php  }    ?>
				<input type="text" class="form-control" name="barcode_"  placeholder="FLYERALARM1">
				<br />
				<center> <button type="submit" class="btn btn-primary">Generate</button></center>
				<!--					<center><button class="btn btn-primary" name="CreatePDF">Create PDF</button></center>-->
				<br />
				<!--					--><?php //include 'generate.php';?>

			</div>
		</form>
	</div>
</div>