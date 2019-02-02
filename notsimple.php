<?php //  session_start();
  ?>

<div id="block_notsimple" class="col-md-6 col-md-offset-3 well
<?php  $_SESSION['error_']=='true'? '.class_hide' : '.class_show';  ?>">
	<input id="gener" type="hidden" value="<?= $_SESSION['error']?>">
	<h3 class="text-primary">PHP - Complex Barcode Generator<br>(QRCODE library)</h3>
	<h3 class="text-primary">PHP - Complex Transformer to PDF Through(FPDF Library)</h3>
	<hr style="border-top:1px dotted #ccc;"/>
	<form class="main_form" method="POST" action="generate.php">

		<div class="form-group  ">

				<?php  if($_SESSION['error']=='true') {?>
					<label class="alert-danger">Enter text for QRCode and filds the table</label>
				<?php  }  else { ?>
					<label class="alert-info">Enter text for QRCode</label>

				<?php  }    ?>
				<input type="text" class="form-control" name="barcode" placeholder="FLYERALARM" \>


			<table class="table">
				<thead>
				<tr>
					<th>#</th>
					<th>Product</th>
					<th>Q1</th>
					<th>Q2</th>
					<th>Q3</th>
					<th>Q4</th>
				</tr>
				</thead>
				<tbody>
				<tr>
					<th scope="row">1</th>
					<th><input type="text" name="pr1" id="" placeholder="Name Product"></th>
					<th><input type="number" name="pr1q1" id="" placeholder=" some num12"></th>
					<th><input type="number" name="pr1q2" id="" placeholder=" some num14"></th>
					<th><input type="number" name="pr1q3" id="" placeholder=" some num16"></th>
					<th><input type="number" name="pr1q4" id="" placeholder=" some num18"></th>
				</tr>
				<tr>
					<th scope="row">2</th>
					<th><input type="text" name="pr2" id="" placeholder="Name Product"></th>
					<th><input type="number" name="pr2q1" id="" placeholder=" some num12"></th>
					<th><input type="number" name="pr2q2" id="" placeholder=" some num12"></th>
					<th><input type="number" name="pr2q3" id="" placeholder=" some num12"></th>
					<th><input type="number" name="pr2q4" id="" placeholder=" some num12"></th>
				</tr>
				<tr>
					<th scope="row">3</th>
					<th><input type="text" name="pr3" id="" placeholder="Name Product"></th>
					<th><input type="number" name="pr3q1" id="" placeholder=" some num12"></th>
					<th><input type="number" name="pr3q2" id="" placeholder=" some num12"></th>
					<th><input type="number" name="pr3q3" id="" placeholder=" some num12"></th>
					<th><input type="number" name="pr3q4" id="" placeholder=" some num12"></th>
				</tr>
				<tr>
					<th scope="row">4</th>
					<th><input type="text" name="pr4" id="" placeholder="Name Product"></th>
					<th><input type="number" name="pr4q1" id="" placeholder=" some num12"></th>
					<th><input type="number" name="pr4q2" id="" placeholder=" some num12"></th>
					<th><input type="number" name="pr4q3" id="" placeholder=" some num12"></th>
					<th><input type="number" name="pr4q4" id="" placeholder=" some num12"></th>
				</tr>
				</tbody>
			</table>
			<center>
				<button type="submit" class="btn btn-primary">Generate</button>
			</center>
		</div>
	</form>
</div>