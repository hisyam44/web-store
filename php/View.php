<?php
	class View {
		public function product($result){
			echo '<div class="box">
				<a href="cart.php?id='.$result['product_id'].'"><img class="img" src="assets/products/'.$result['image'].'"></img></a><br>
				<div class="space">
					<a href="cart.php?id='.$result['product_id'].'">'.strtoupper($result['name']).'</a>
				</div>
				<a href="cart.php?id='.$result['product_id'].'" class="text-green"> $ '.$result['price'].'</a>
			</div>';
		}
		public function video($video){
			echo '<div class="video">
				<video controls>
					<source src="assets/video/'.$video['filename'].'" type="video/webm">
				</video>
			</div>';
		}
		public function news($news){
			echo '<div class="row">
							<div class="space">
								<div class="col-3"><img class="img" src="assets/newsblog/'.$news['image'].'"></div>
								<div class="col-1">&nbsp;</div>
								<div class="col-8">
									<div class="">'.$news['title'].'</div>
									<br>
									<br>
									<div class="col-4"><a href="#" class="btn btn-dark">Read More >> </a></div>
								</div>
							</div>
						</div>';
		}
		public function testimoni($news){
			echo '<div class="row">
							<div class="space">
								<div class="col-3"><img class="img thumbnail" src="assets/testimoni/'.$news['photo'].'"></div>
								<div class="col-1">&nbsp;</div>
								<div class="col-8">
									<div class="">'.$news['quote'].'</div>
									<br>
									<br>
									<br>
									<div class="copyright">'.$news['name'].'<br>'.$news['name_description'].'</div>
								</div>
							</div>
						</div>';
		}
		public function cart($product){
			echo '<tr class="product" id="'.$product['id'].'">
						<td><img src="assets/products/'.$product['image'].'" class="img-cart"></td>
						<td>'.$product['name'].'</td>
						<td class="product-price">'.$product['price'].'</td>
						<td>
							<div>
								<input type="number" class="form-control qty" name="qty[]" value="'.$product['qty'].'">
							</div>
						</td>
						<td class="total_price">'.$product['price']*$product['qty'].'</td>
						<td><a href="cart.php?delete='.$product['id'].'" class="text-green">Delete</a></td>
					</tr>';
		}
	}

?>