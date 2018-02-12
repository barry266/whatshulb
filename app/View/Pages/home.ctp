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

<div class="">

	<div id="app" class="index-slider" v-bind:style="{'height': height + 'px'}">
	<div class="slider-container">
	<div class="slider-control left inactive"></div>
	<div class="slider-control right"></div>
	<ul class="slider-pagi"></ul>
	<div class="slider">
		<div class="slide slide-0 active">
			<div class="slide__bg"></div>
			<div class="slide__content">
				<svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
					<path class="slide__overlay-path" d="M0,0 250,0 250,405 0,405" />
				</svg>
				<div class="slide__text">
					<h2 class="slide__text-heading">WhatsHulb</h2>
					<p class="slide__text-desc">
						我們願景以「共創」孕育出更多創意 - 協助本土設計師把原創設計商業化，
						並鼓勵消費者分享對產品的個人意見或加上個人特色，
						與設計者於Whatshulb平台上共享 -
						<br /><br />我們相信只有創意才能改變世界
					</p>
					<a class="btn btn-wh" target="_blank" href="https://www.facebook.com/WhatsHulb/photos/a.2018777365078506.1073741828.1971474709808772/2019029438386632/?type=3&theater">
						Read More
					</a>
				</div>
			</div>
		</div>
		<div class="slide slide-1 ">
			<div class="slide__bg"></div>
			<div class="slide__content">
				<svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
					<path class="slide__overlay-path" d="M0,0 250,0 250,405 0,405" />
				</svg>
				<div class="slide__text">
					<h2 class="slide__text-heading">Co-Creation</h2>
					<p class="slide__text-desc">
						Whatshulb 以「共創」(Co-creation) 為大前提，
						鼓勵設計師與消費者或其他設計師於Whatshulb 平台分享，共同創造更多可能。
						當產品著眼於原創性和獨特性，價格隨之提高令消費者卻步而令創意被殺。但因平台招聚一群為創意而生的消費群，
						透過設計師與消費者或其他設計師的協同效應令創意價格調低，除去設計師的經營成本讓創意產物得以存活。
						<br /><br />
						Whatshulb<br />相信只有創意才能改變世界
					</p>
					<a class="btn btn-wh" target="_blank" href="https://www.facebook.com/WhatsHulb/photos/rpp.1971474709808772/2026847627604813/?type=3&theater">
						Read More
					</a>
				</div>
			</div>
		</div>
		<div class="slide slide-2">
			<div class="slide__bg"></div>
			<div class="slide__content">
				<svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
					<path class="slide__overlay-path" d="M0,0 250,0 250,405 0,405" />
				</svg>
				<div class="slide__text">
					<h2 class="slide__text-heading">營銷策略</h2>
					<p class="slide__text-desc">
						Whatshulb 提供一個協助本土設計師把設計商業化的平台，建立全新消費模式及營銷策略。
						我們以「共創」(Co-creation) 為大原則，
						鼓勵設計師與消費者或其他設計師於Whatshulb 平台分享，共同創造更多可能。
						<br /><br />
						Whatshulb<br />相信只有創意才能改變世界
					</p>
					<a class="btn btn-wh" target="_blank" href="https://www.facebook.com/WhatsHulb/photos/rpp.1971474709808772/2023174691305440/?type=3&theater">
						Read More
					</a>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>


		<br>

		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 display-box left-box text-center">
				<img src="img/like.gif" class="box-img">
				<br><br>
				<h4 class="hidden-sm-down">
					<b>
					WhatsHulb<br>
					Best Seller<br>
					</b>
					"Prenda Qui" Collection
					</h4>
				<h6 class="hidden-md-up">
					<b>
					WhatsHulb<br>
					Best Seller<br>
					</b>
					"Prenda Qui" Collection
				</h6>
				<?php echo $this->Html->link("Buy Now",
					array(
						 'controller' => 'creators', 'action' => 'view', 1
					),array('class' => 'btn btn-wh width-90')
				);?>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 display-box mid-box">
				<img src="<?php echo $this->webroot; ?>img/watch2.jpeg" class="img-fluid">
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 display-box right-box text-center">
				<img src="<?php echo $this->webroot; ?>img/ship.gif" class="box-img">
				<br><br>
				<h4 class="hidden-sm-down">
				<b>
				Free<br>
				Shipping<br>
				</b>
				Only this weekend
				</h4>
				<h6 class="hidden-md-up">
				<b>
				Free<br>
				Shipping<br>
				</b>
				Only this weekend
			</h6>
			</div>
		</div>

		<br>

		<div class="row slider-div">
			<div class="col-lg-12  text-center">
			<br>
			<h3><b>Pick Your Shop</b></h3>
			<br>
			<section class="regular slider-product">
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
	<script src="<?php echo $this->webroot; ?>js/vue.min.js"></script>
	<script>
	var app = new Vue({
		el: '#app',
		data: {
			height: 0
		},
		mounted: function() {
			this.height = ($(window).height() - $("#header.front-end-header").height())*0.8;
		},
	});
	$(window).resize(function(){
		app.height = ($(window).height() - $("#header.front-end-header").height())*0.8;
	});
	</script>
