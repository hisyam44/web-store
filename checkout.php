<?php 
	include "header.php";
?>
<div class="row" style="background:#eee">
	<div class="col-9 col-sl-9 center-col">
		<div class="space">
			<div class="text-big copyright">CHECKOUT 1</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-9 col-sl-9 center-col">
		<div class="space">
			<div class="col-3 col-sl-6"><div class="icon-checkout"><img class="active" src="assets/icons/15_Checkout_Step_01_03.png"></div></div>
			<div class="col-3 col-sl-6"><div class="icon-checkout"><img src="assets/icons/15_Checkout_Step_01_05.png"></div></div>
			<div class="col-3 col-sl-6"><div class="icon-checkout"><img src="assets/icons/15_Checkout_Step_01_07.png"></div></div>
			<div class="col-3 col-sl-6"><div class="icon-checkout"><img src="assets/icons/15_Checkout_Step_01_09.png"></div></div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-9 col-sl-9 center-col">
		<div class="space">
			<div class="col-9">
				<form class="form" method="post" action="checkout2.php">
					<div class="form-row text-green">BILLING ADDRESS</div>
					<div class="form-row">Already Registered?. Please Login Below</div>
					<div class="row">
						<div class="col-6">
							<div class="form-row">
								<label>First Name*</label>
								<input class="form-control" name="first_name" required>
							</div>
						</div>
						<div class="col-6">
							<div class="form-row">
								<label>Last Name*</label>
								<input class="form-control" name="last_name" required>
							</div>
						</div>
					</div>
					<div class="form-row">
						<label>Email*</label>
						<input class="form-control" name="email" required></input>
					</div>
					<div class="form-row">
						<label>Address*</label>
						<textarea class="form-control" rows="6" name="biling_address" required></textarea>
					</div>
					<div class="row">
						<div class="col-6">
							<div class="form-row">
								<label>Phone*</label>
								<input class="form-control" name="phone" required></input>
							</div>
						</div>
						<div class="col-6">
							<div class="form-row">
								<label>Fax</label>
								<input class="form-control" name="fax" required></input>
							</div>
						</div>
					</div>
					<div class="form-row">
						<div class="col-3">
							<button class="btn" type="submit">CONTINUE</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<?php 
	include "footer.php";
?>