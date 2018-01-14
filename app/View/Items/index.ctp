
	<!--Script-->
	<script>
		$('li.nav-item.products').addClass('active');
	</script>

<?php
	$vipcheck = $this->Session->read('Auth.User.vip')==1?true:false;
?>

	<div class="container">
		<?php if($vipcheck):?>
		<div class="col-lg-12">
			<button class="btn btn-basic show-all show-public">Public</button>
			<button class="btn btn-basic show-all show-secert">Secert</button>
		</div>
		<?php endif ;?>
			<div class="row padding-helper">
            <div class="col-lg-12 show-public">
								<div id="gallery" style="display:none;">
									<?php foreach($products as $product):?>
										<?php
											$path = WWW_URL."files/".$product['Product']['user_id']."/".$product['Product']['id']."/".$product['Product']['image'];
											$file_headers = @get_headers($path);
										;?>
										<?php if((!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found' ) || $product['Product']['image'] == ""){
											$path = "http://placehold.it/700x500" ;
										};?>
									<a href="items/view/<?php echo $product['Product']['id'];?>" target="_self">
									<img alt="<?php echo $product['Product']['price']!=""?$product['Product']['name']." - $".$product['Product']['price']:$product['Product']['name'];?>"
									     src="<?php echo $path."?c=".$product['Product']['category'];?>"
									     data-image="<?php echo $path;?>"
									     data-description="<?php echo $product['Product']['description'];?>"
									     style="display:none">
									</a>
									<?php endforeach;?>

								</div>
            </div>
						<?php if($vipcheck):?>
						<div class="col-lg-12 show-secert" style="display:none;">
								<div id="gallery2" style="display:none;">
									<?php foreach($notactives as $notactive):?>
										<?php
											$path = WWW_URL."files/".$notactive['Product']['user_id']."/".$notactive['Product']['id']."/".$notactive['Product']['image'];
											$file_headers = @get_headers($path);
										;?>
										<?php if((!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found' ) || $notactive['Product']['image'] == ""){
											$path = "http://placehold.it/700x500" ;
										};?>
									<a href="items/view/<?php echo $product['Product']['id'];?>" target="_self">
									<img alt="<?php echo $notactive['Product']['price']!=""?$product['Product']['name']." - $".$notactive['Product']['price']:$notactive['Product']['name'];?>"
									     src="<?php echo $path."?c=".$notactive['Product']['active'];?>"
									     data-image="<?php echo $path;?>"
									     data-description="<?php echo $notactive['Product']['description'];?>"
									     style="display:none">
									</a>
									<?php endforeach;?>

								</div>
                <!-- /.row -->

            </div>
					<?php endif;?>



        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

<!--
<div class="input-group">
		<input type="text" class="form-control">
			<a class="btn btn-blue input-group-addon" >
				<b>Search</b>
			</a>
</div>
-->
<script>
$('button.show-all').click(function(){
	//adding filter class
	/*
	$('img.ug-thumb-image.ug-trans-enabled').each(function(){
	  var str = $(this).attr('src');
	  var n = str.lastIndexOf("?c=");
	  var res = str.substr(n+3);
		$(this).parent().addClass('filter-'+res);
	});
	*/
	if ($(this).hasClass('show-public')){
		$('div.show-secert').fadeOut(0);
		$('div.show-public').fadeIn(800);
	} else if ($(this).hasClass('show-secert')){
		$('div.show-public').fadeOut(0);
		$('div.show-secert').fadeIn(800);
	}
});

</script>
