<?php include "header.php"; ?> 
	<div class="row">
		<div class="space">
			<div class="slider">
				<img class="img" src="assets/slider/slider1.jpg">
				<img class="img" src="assets/slider/slider2.jpg">
				<img class="img" src="assets/slider/slider3.jpeg">
			</div>
			<div class="col-9 col-sl-9 center-col">
				<div class="caption">
					<div class="text-big">EXPLORE THE TASTE OF QUALITY</div>
					<div class="text">100% MADE WITH PASSION</div>
					<div class="col-2">
						<a href="#" class="btn btn-dark">SHOP NOW</a>
					</div>
					<div class="col-1">&nbsp;</div>
					<div class="col-2">
						<a href="#" class="btn">LEARN MORE</a>
					</div>

				</div>
			</div>
			<img class="img" src="assets/slider/slider1.jpg">
		</div>
		<script type="text/javascript">
			$(function (){
				$('.slider img:gt(0)').hide();
				setInterval(function (){
					var first_img = $('.slider :first-child');
					first_img.fadeOut();
					first_img.next('img').fadeIn();
					first_img.appendTo('.slider');
				},2000);
			});
		</script>
	</div>
	<div class="row" id="product1">
		<div class="col-9 col-sl-9 center-col">
			<div class="space">
				<div class="col-9 menu">
					<ul>
						<li><a href="?product=new_arrival#product1">New Arrival</a></li>
						<li><a href="?product=best_seller#product1">Best Seller</a></li>
						<li><a href="?product=sale_off#product1">Sale Off</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row" style="background:#eee">
		<div class="col-9 col-sl-9 center-col">
			<div class="space">
				<div class="wrapper">
				<?php
					if(isset($_GET['product'])){
						switch ($_GET['product']) {
							case 'new_arrival':
								$results = $database->select("*","ref_products","insert_date desc","4");
								break;
							
							case 'best_seller':
								$results = $database->select("*","ref_products","sales_count desc","4");
								break;

							default:
								$results = $database->select("*","ref_products","discount desc","4");
								break;
						}
					}else{
						$results = $database->select("*","ref_products","discount desc","4");
					}

					foreach ($results as $result){
						echo '<div class="col-3 col-sl-6">';
						$view->product($result);
						echo '</div>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-9 col-sl-9 center-col">
			<div class="space">
				<div class="col-8">
					<?php
						$videos = $database->select("*","ref_videos","video_id asc","1","featured = 'Y'");
						foreach ($videos as $video) {
							$view->video($video);
						}
					?>
				</div>
				<div class="col-4">
					<?php
						$videos = $database->select("*","ref_videos","video_id asc","2","featured = 'N'");
						foreach ($videos as $video) {
							$view->video($video);
						}
					?>	
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-9 col-sl-9 center-col">
			<div class="space">
				<div class="col-9">
					<div class="panel-header">FEATURED PRODUCTS<hr></div>
					<div class="row">
						<?php 
							$products = $database->select("*","ref_products","insert_date desc","3","featured = 'Y'");
							foreach ($products as $product) {
								echo '<div class="col-4">';
								$view->product($product);
								echo '</div>';
							}
						?>
					</div>
				</div>
				<div class="col-3">
					<div class="panel-header">HOT DEALS<hr></div>
					<?php
						$products = $database->select("*","ref_products","","1");
						foreach($products as $product){
							$view->product($product);
						}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="row testimoni-background">
		<div class="highlight">
		<div class="row">
		<div class="space">
			<div class="col-9 col-sl-9 center-col">
				<div class="col-6">
					<div class="panel-header">NEWS & BLOG <hr></div>
					<?php
						$newses = $database->select("*","ref_news");
						foreach($newses as $news){
							$view->news($news);
						}
					?>
				</div>
				<div class="col-6">
					<div class="panel-header">WHAT CLIENT SAY ? <hr></div>
					<?php
						$newses = $database->select("*","ref_testimoni");
						foreach($newses as $news){
							$view->testimoni($news);
						}
					?>
				</div>
			</div>
		</div>
		</div>
		</div>
	</div>
<?php include "footer.php"; ?>