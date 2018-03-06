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
				<div class="col-lg-4 col-md-4 col-sm-12 col-12 text-center">
					<div class="mgz-content-box">
						<img class="rounded-circle" src="https://graph.facebook.com/1306405324/picture?type=large&width=150&height=150"/>
					</div>
				</div>
				<div class="col-lg-8 col-md-8 col-sm-12 col-12 center">
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
			原因很簡單，因為機械錶是一種浪漫。」憑著這個信念，Prenda Qui 將會先主打機械錶，希望年青一代對錶這個產品會有更深的認識。
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
	<div class="mgz mgz-3" v-bind:style="{height: height + 'px'}">
		<div class="mgz-box left-mgz-box">

		</div>
	</div>
	<div class="mgz mgz-6" v-bind:style="{height: height + 'px'}">
		<div class="mgz-box right-mgz-box">

		</div>
	</div>
	<div class="mgz mgz-4" v-bind:style="{height: height + 'px'}">
		<div class="mgz-box left-mgz-box">

		</div>
	</div>
	<div class="mgz mgz-7" v-bind:style="{height: height + 'px'}">
		<div class="mgz-box mid-mgz-box">

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
