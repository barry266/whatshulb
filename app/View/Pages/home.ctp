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
									<?php echo $product['Product']['url']!=""?"HKD $".$product['Product']['price']:"";?>
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

<div class="container">
<?php $ramdoms = array_rand($creators,4);?>
<div class="row">
	<div class="col-lg-4 col-md-6 col-sm-6 col-12 hidden-xs-down ">
		<br>
		<h4><b>{{creators[counter].name}}</b></h4>
		<br>
		<font v-html="creators[counter].content">
		</font>
	</div>
	<div class="col-lg-8 col-md-6 col-sm-6 col-12">
		<br>
		<h3><b>Meet Our Designers</b></h3>
		<br>
		<?php $i = 1;?>
		<div class="row">
			<?php foreach($ramdoms as $ramdom):?>
				<?php if ($creators[$ramdom]['User']['profile']){
					$img = $creators[$ramdom]['User']['profile'];
				} else {
					if ($creators[$ramdom]['User']['user_fb']) {
						$img =  "http://graph.facebook.com/".$creators[$ramdom]['User']['user_fb']."/picture?type=large";
					} else {
						$img =  (WWW_URL)."/img/photo.jpg";
					}
				}
				;?>
				<div class="col-lg-3 col-md-6 col-xs-6 col-6 mb-4">
					<a href="creators/view/<?php echo $creators[$ramdom]['User']['id'];?>">
						<img class="img-fluid" src="<?php echo $img;?>">
						<div v-on:mouseover="mouseOver(<?php echo $i;?>)" class="overlay">
							<div class="creator-text">
								<h6>
									<b><?php echo $creators[$ramdom]['User']['user_name'];?></b>
								</h6>
							</div>
						</div>
					</a>
				</div>
				<?php $i++ ;?>
			<?php endforeach;?>
			<div class="col-lg-12 mb-4">
				<?php echo $this->Html->link('More...','/creators',
					array('class' => 'btn btn-basic center', 'target' => ''))
				;?>
			</div>
		</div>
	</div>
</div>
</div>
<br /><br />
	</div>
	<!-- #app -->
	<script src="<?php echo $this->webroot; ?>js/vue.min.js"></script>
	<script>
	var app = new Vue({
		el: '#app',
		data: {
			height: 0,
			number: 0,
			counter: 0,
			creators: [{name: 'WhatsHulb', content: 'A platform that enable creators to commercialize any authentic ideas and enable consumers to co-create. We aim to shape future trends through this platform by creating consumer demands that are predicted by big data analytics.'},
									<?php foreach($ramdoms as $ramdom):?>
										{name: "<?php echo $creators[$ramdom]['User']['user_name'];?>", content: "<?php echo str_replace('"',"'",preg_replace("/(\r\n)+|\r+|\n+|\t+/i", " ", $creators[$ramdom]['User']['story']));?>"},
									<?php endforeach;?>
								]
		},
		mounted: function() {
			//slider setup
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
		methods: {
			mouseOver: function (counter) {
					this.counter = Number(counter);
			}
		}
	});
	$(window).resize(function(){
		app.height = ($(window).height() - $("#header.front-end-header").height())*0.8;
	});
	</script>
