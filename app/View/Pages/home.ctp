<!--Script-->
<script>
	$('li.nav-item.home').addClass('active');
</script>
<div class="" id="app">

	<div class="index-slider" v-bind:style="{'height': height + 'px'}">
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
						Whatshulb 以「共創」(Co-creation) 為大前提，
						鼓勵設計師與消費者或其他設計師於Whatshulb 平台分享，共同創造更多可能。
						當產品著眼於原創性和獨特性，價格隨之提高令消費者卻步而令創意被殺。但因平台招聚一群為創意而生的消費群，
						透過設計師與消費者或其他設計師的協同效應令創意價格調低，除去設計師的經營成本讓創意產物得以存活。
						<br /><br />
						Whatshulb<br />相信只有創意才能改變世界
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
					<h2 class="slide__text-heading">Prenda Qui</h2>
					<p class="slide__text-desc">
						Whatshulb 以「共創」(Co-creation) 為大前提，
						鼓勵設計師與消費者或其他設計師於Whatshulb 平台分享，共同創造更多可能。
						當產品著眼於原創性和獨特性，價格隨之提高令消費者卻步而令創意被殺。但因平台招聚一群為創意而生的消費群，
						透過設計師與消費者或其他設計師的協同效應令創意價格調低，除去設計師的經營成本讓創意產物得以存活。
						<br /><br />
						Whatshulb<br />相信只有創意才能改變世界
					</p>
					<a class="btn btn-wh" target="_blank" href="<?php echo WWW_URL;?>items/view/2">
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

<div class="container">
		<div class="row slider-div">
			<div class="col-lg-12  text-center">
			<br>
			<h3><b>Popular Right Now</b></h3>
			<br>
			<section class="regular slider-product">
				<?php foreach($products as $product):?>
				<div>
					<a href="<?php echo WWW_URL."items/view/".$product['Product']['id'] ;?>">
						<?php
							$path = "files/".$product['Product']['user_id']."/".$product['Product']['id']."/".$product['Product']['image'];
						;?>
						<div class="card-img-top" style="background: url(<?php echo WWW_URL.$path;?>) no-repeat center center">
						</div>
  					<div style="padding-top: 10px; text-align: left;">
    					<h5><?php echo $product['Product']['name'];?></h5>
    					<h6>
								<?php echo $users[$product['Product']['user_id']];?>
								<br />
								<strong>
									HKD $<?php echo $product['Product']['price'];?>
								</strong>
							</h6>
  					</div>
					</a>
				</div>
				<?php endforeach;?>
			</section>
			</div>
		</div>
</div>

<div class="row">
	<div class="col-lg-3 col-md-4 col-sm-6 col-12">

	</div>
	<div class="col-lg-9 col-md-8 col-sm-6 col-12">
		<br>
		<h3><b>Meet Our Designers</b></h3>
		<br>
		<div class="row">
			<?php foreach($creators as $creator):?>
				<div class="col-lg-2 col-md-3 col-xs-6 col-6 mb-4">
					<a href="creators/view/<?php echo $creator['User']['id'];?>">
						<img class="img-fluid" src="<?php echo $creator['User']['user_fb']?"http://graph.facebook.com/".$creator['User']['user_fb']."/picture?type=large":(WWW_URL)."/img/photo.jpg";?>">
						<div class="overlay">
							<div class="creator-text">
								<h6>
									<b><?php echo $creator['User']['user_name'];?></b>
								</h6>
							</div>
						</div>
					</a>
				</div>
			<?php endforeach;?>
		</div>
		<div class="text-center">

		</div>
	</div>

</div>


	</div>
	<!-- /.container -->
	<script src="<?php echo $this->webroot; ?>js/vue.min.js"></script>
	<script>
	var app = new Vue({
		el: '#app',
		data: {
			height: 0,
			number: 0
		},
		mounted: function() {
			this.height = ($(window).height() - $("#header.front-end-header").height())*0.8;
			if ($(window).width()<576) {
				this.number = 1
			} else if($(window).width()<768){
				this.number = 2
			} else if($(window).width()<992){
				this.number = 3
			} else {
				this.number = 5
			}
			$(".regular").slick({
				dots: false,
				infinite: true,
				slidesToShow: this.number,
				slidesToScroll: this.number
			});
		},
	});
	$(window).resize(function(){
		app.height = ($(window).height() - $("#header.front-end-header").height())*0.8;
	});
	</script>
