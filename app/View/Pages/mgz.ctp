<div id="app">
	<div class="mgz mgz-1" v-bind:style="{height: height + 'px'}">
		<div class="mgz-title right-mgz-box">
			<font class="big-title">情有獨鐘</font><br />
			<font class="small-title">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Derek & Prenda Qui</font>
		</div>
	</div>
	<div class="mgz mgz-content">
		<div class="container">
			<div class="row">
				<div class="col-12 center">
					<div class="mgz-box mgz-content-box">
						近年全球手錶市場衰退，經營越來越困難，但Derek 卻偏偏在這個時間成立Prenda Qui，希望繼承父業，運用大學學到的人體工學技巧。「現在的鐘錶市場越來越沉悶，每個款式也一式一樣，希望Prenda Qui能為市場帶來新的沖擊。」
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="mgz mgz-2" v-bind:style="{height: height + 'px'}">
		<div class="mgz-box left-mgz-box">
			市場上的鐘錶一方面缺乏新意，另一方面以低成本高價錢來銷售。<br /><br />
			而Prenda Qui 的路線一方面希望以突出玩味的風格突破傳統，另一方面也以合理的售價來吸引僱客，為的只是為了推廣父親傳授的機械錶工藝及藝術。<br /><br />
			「石英錶雖然便宜準確，但機械錶還是在市場充滿地位。
			原因很簡單，因為機械錶是一種浪漫。」憑著這個信念，Prenda Qui 將會先主打機械錶，希望年青一代對錶這個產品會有更深的認識。」
		</div>
	</div>
	<div class="mgz mgz-5" v-bind:style="{height: height + 'px'}">
		<div class="mgz-box right-mgz-box">
			這次推出的Prenda Qui first watch serious有幾個特點。首先，錶面會完全透明，令到每一隻錶也會跟著配載者的皮膚顏色而不同，
			反映你的獨特性。另外，顏色配搭也是比較鮮明突出，這種青春感覺的手錶在市場是很少見。
			<br /><br />
			最後，設計也以人體工學為基礎，經過多次既平衡防水及設計測試，決定出最適合的大小重量，令配載者感覺舒服。
			而所有的部份也是經過高要求的嚴格品質保証，親自把關！
		</div>
	</div>
	<div class="mgz mgz-4" v-bind:style="{height: height + 'px'}">
		<div class="mgz-box left-mgz-box">
			對於未來鐘錶的願景，Derek 就有以下看法:
			<br /><br />
			 「未來的鐘錶行業也將會是越來越困難。一方面是智能手錶的不確定因素，另一方面是錶的品質要越來越高，但價錢卻越來越便宜，還有一點是政府對環保安全的標準越來越嚴格。
			<br /><br />
			這令到不少的鐘錶廠商經營越來越困難，越來越多成本去生產及設計，但利潤卻越來越少。相信這個情況會持續一段情況。」
		</div>
	</div>
	<div class="mgz mgz-6" v-bind:style="{height: height + 'px'}">
		<div class="mgz-box right-mgz-box">
			但無論市埸如何，Derek 還是希望會繼承父業，為鐘錶行業出一分力。
			<br /><br />
			<b>「我始終認為機械錶的手藝是不可以流失，所以我希望可以跟父親一樣，為自己喜歡的行業持續下去!」</b>
		</div>
	</div>
</div>
<script src="<?php echo $this->webroot; ?>js/vue.min.js"></script>
<script>
var app = new Vue({
	el: '#app',
	data: {
		height: 0,
	},
	mounted: function() {
		this.height = ($(window).height() - $("#header.front-end-header").height());
	}
});
$(window).resize(function(){
	app.height = ($(window).height() - $("#header.front-end-header").height());
});
</script>
