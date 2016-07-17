<?php include "header.php"; ?>
<div class="row" style="background:#eee">
	<div class="col-9 col-sl-9 center-col">
		<div class="space">
			<div class="copyright text-big">
				SHOPPING CART
			</div>
		</div>
	</div>
</div>
<?php 
	if(!isset($_SESSION['cart']['items'])){
		$_SESSION['cart']['items'] = [];
	}
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		if(!isset($_SESSION['cart']['items'][$id])){
			$product = $database->select("*","ref_products","","","product_id = '$id'");
			$product = $product[0];
			$item = [];
			$item['id'] = $product['product_id'];
			$item['name'] = $product['name'];
			$item['price'] = $product['price'];
			$item['image'] = $product['image'];
			$item['qty'] = 1;
			$_SESSION['cart']['items'][$id] = $item;
		}
		
	}
	if(isset($_GET['delete'])){
		$id = $_GET['delete'];
		if(isset($_SESSION['cart']['items'][$id])){
			unset($_SESSION['cart']['items'][$id]);
		}
	}
	if(isset($_GET['qty'])){
		$items = [];
		$i = 0 ;
		foreach($_SESSION['cart']['items'] as $item){
			$item['qty'] = $_GET['qty'][$i];
			$items[$item['id']] = $item;
			$i++;
		}
		$_SESSION['cart']['items'] = $items;
	}
	if(isset($_GET['coupon'])){
		$code = $_GET['coupon'];
		$voucher = $database->select("*","ref_voucher","","","code = '$code'");
		if(!$voucher){
			$_SESSION['messages']['coupon'] = "Coupon Not Found";
		}else{
			$voucher = $voucher[0];
			$expired_date = $voucher['expired'];
			$current_date = date("Y-m-d");
			if($expired_date < $current_date){
				$_SESSION['messages']['coupon'] = "Coupon Expired";
			}else{
				$_SESSION['messages']['coupon'] = "Coupon Applied";

			}
		}
	}
?>
<div class="row">
	<div class="col-9 col-sl-9 center-col">
		<div class="space">
			<div class="space">
				You Have Picked 
				<span class="text-green"><?php echo count($_SESSION['cart']['items']);?> Items </span>
				 In Your cart
			</div>
			<form class="form" action="cart.php">
			<div>
				<table class="table">
					<tr class="table-title">
						<td>Image</td>
						<td>Product Name</td>
						<td>Price</td>
						<td>QTY</td>
						<td>Total Price</td>
						<td>Action</td>
					</tr>
					<?php 
						foreach($_SESSION['cart']['items'] as $product){
							$view->cart($product);
						}
					?>
				</table>
				<div class="space">
					<div class="col-3 col-sl-6"><a href="index.php" class="btn">Continue Shopping</a></div>
					<div class="col-3 col-sl-6">&nbsp;</div>
					<div class="col-3 col-sl-6">&nbsp;</div>
					<div class="col-3 col-sl-6"><button typc="submit" class="btn btn-green update-cart">Update Cart</button></div>
				</div>
			</div>
			</form>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-9 col-sl-9 center-col">
		<div class="space">
			<div class="col-4 col-sl-6">
				<div class="panel-header">
					<span class="text-bold">
						ESTIMATE SHIPPING TAX
					</span>
					<div class="space">
					Enter Your Destination For Shipping Tax
					</div>
					<form>
						<div class="form-row">
							<label>Country</label>
							<input class="form-control">
						</div>
						<div class="form-row">
							<label>State/Province</label>
							<input class="form-control">
						</div>
						<div class="form-row">
							<label>Postal Code</label>
							<input class="form-control">
						</div>
						<br>
						<div class="col-4 col-sl-6"><button typc="submit" class="btn">Apply Coupon</button></div>
					</form>	
				</div>
			</div>
			<div class="col-4 col-sl-6">
				<div class="panel-header">
					<span class="text-bold">
						DISCOUNT CODE
					</span>
					<div class="space">
					Enter Your Coupon Code If You Have One
					</div>
					<form class="coupon" action="cart.php">
						<input class="form-control" name="coupon">
						<br>
						<div class="row">
						<div class="col-4 col-sl-6"><button typc="submit" class="btn">Apply Coupon</button></div>
						</div>
					</form>
				</div>
					<?php
						if(isset($_SESSION['messages']['coupon'])){
							echo '<div class="">'.$_SESSION['messages']['coupon'].'</div>';
						}
					?>
			</div>
			<div class="col-4 col-sl-6">
				<div class="box">
					<div class="text-bold space sub_total">SUB TOTAL : </div>
					<div class="text-bold ">SHIPPING PRICE : FREE</div>
					<div class="text-bold space sub_total">Grand Total : </div>
					<a href="checkout.php" class="btn btn-green">Process To Checkout</a>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.coupon').submit(function (){
		var input = $(this).child("input");
		console.log(input);
	});
	var total = $('.total_price');
	var sub_total = 0;
	for(var i=0;i<total.length;i++){
		sub_total += Math.round(total[i]['innerHTML']);
	}
	$('.sub_total').append(sub_total);
	console.log(sub_total);
	$('.qty').change(function (){
		var td_qty = $(this).parent().parent();
		var qty = $(this).val();
		var price = td_qty.prev("td").html();
		var total_price = price*qty;
		td_qty.next("td").html(total_price);
	});
</script>
<?php include "footer.php"; ?>