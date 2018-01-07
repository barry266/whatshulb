<!--Script-->
<script>
	$('li.nav-item.home').addClass('active');

	$(document).on('ready', function() {
		$(".regular").slick({
			dots: false,
			infinite: true,
			slidesToShow: 4,
			slidesToScroll: 3
		});
	});
</script>

<div class="container">

		<div class="img-bg-div">
			<img src="img/banner.png" class="img-fluid">
			<div class="img-bg-div-inside">
				<font class="title">
				New <br>
				Collection <br>
				Arrivals</font>
				<font class="sub-title">Available Now! </font><br><br>
					<?php echo $this->Html->link("View Collection",
						array(
							 'controller' => 'creators', 'action' => 'view', 1
						),array('class' => 'btn btn-wh')
					);?>
			</div>
		</div>

		<br>

		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 display-box left-box text-center">
				<img src="img/like.gif" class="box-img">
				<br><br>
				<h4>
				<b>
				WhatsHulb<br>
				Best Seller<br>
				</b>
				"Prenda Qui" Collection
				</h4>
				<?php echo $this->Html->link("Buy Now",
					array(
						 'controller' => 'creators', 'action' => 'view', 1
					),array('class' => 'btn btn-wh')
				);?>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 display-box ">
				<img src="img/watch2.jpeg" class="img-fluid">
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 display-box right-box text-center">
				<img src="img/ship.gif" class="box-img">
				<br><br>
				<h4>
				<b>
				Free<br>
				Shipping<br>
				</b>
				Only this weekend
				</h4>
			</div>
		</div>

		<br>

		<div class="row slider-div">
			<div class="col-lg-12  text-center">
			<br>
			<h3><b>Pick Your Shop</b></h3>
			<br>
			<section class="regular slider">
				<?php foreach($products as $product):?>
				<div>
					<a href="<?php echo WWW_URL."items/view/".$product['Product']['id'] ;?>">
					<?php
						$path = "files/".$product['Product']['user_id']."/".$product['Product']['id']."/".$product['Product']['image'];
						echo '<img class="img-fluid" src="'.WWW_URL.$path.'" />'
					;?>
					</a>
				</div>
				<?php endforeach;?>
			</section>
			</div>
		</div>


	</div>
	<!-- /.container -->
