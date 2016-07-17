	<div class="row">
		<div class="col-9 col-sl-9 center-col">
			<div class="space">
				<div class="col-1">&nbsp;</div>
			<?php
				$sponsores = $database->select("*","ref_sponsored");
				foreach($sponsores as $sponsor){
					echo '<div class="col-2"><a href="#"><img class="img logo" src="assets/logo/'.$sponsor['images'].'"></a></div>';
					
				}
			?>
				<div class="col-1">&nbsp;</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-9 col-sl-9 center-col">
			<div class="space">
				<div class="copyright">
					COPYRIGHT &copy;2016 <span class="text-green">ZIDANE</span> BY 
					<span class="text-green">HISYAM</span>. ALL RIGHT RESERVED</div>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="js/code.js"></script>
</body>
</html>