
	<!--Script-->
	<script>
		$('li.nav-item.products').addClass('active');
	</script>

	<div class="container home">

			<div class="row padding-helper">
            <div class="col-lg-12">
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
									     src="<?php echo $path;?>"
									     data-image="<?php echo $path;?>"
									     data-description="<?php echo $product['Product']['description'];?>"
									     style="display:none">
									</a>
									<?php endforeach;?>

								</div>
                <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

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
