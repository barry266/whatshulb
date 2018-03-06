<div id="app">
	<div class="mgz mgz-1" v-bind:style="{height: height + 'px'}">

	</div>
	<div class="mgz mgz-2" v-bind:style="{height: height + 'px'}">

	</div>
	<div class="mgz mgz-3" v-bind:style="{height: height + 'px'}">

	</div>
	<div class="mgz mgz-4" v-bind:style="{height: height + 'px'}">

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
		this.height = ($(window).height() - $("#header.front-end-header").height())*0.8;
	}
});
$(window).resize(function(){
	app.height = ($(window).height() - $("#header.front-end-header").height())*0.8;
});
</script>
