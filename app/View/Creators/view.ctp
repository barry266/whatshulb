	<!--Script-->
	<script>
		$('li.nav-item.creators').addClass('active');
		$(document).ready(function(){

		});

	</script>
	<div class="container home">
			<div class="padding-helper">
			<div class="card">
						<div class="row" style="padding-left: 30px; padding-right: 30px;">
            <div class="col-lg-8 col-md-8 col-sm-8 hidden-xs-down my-4">
							<b><?php echo $user['User']['user_name'];?></b> Profolio/ Brand Story
									<p>
										<?php echo ("words");?>
									</p>
            </div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 my-4">
									<p>
										<img class="img-fluid" src="<?php echo $user['User']['user_fb']?"http://graph.facebook.com/".$user['User']['user_fb']."/picture?type=large":($this->webroot)."/img/photo.jpg";?>">
									</p>
						</div>
						</div>
	            <!-- /.col-lg-8 -->
						<h3 class="padding-helper" style="padding-left: 30px; padding-right: 30px;">Product Name</h3>
						<div class="row" style="padding-left: 30px; padding-right: 30px;">
							<?php if(!empty($products) || isset($products[0])):?>
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
								<img alt="<?php echo $product['Product']['name'];?>"
										 src="<?php echo $path."?c=".$product['Product']['category'];?>"
										 data-image="<?php echo $path;?>"
										 data-description="<?php echo $product['Product']['description'];?>"
										 style="display:none">
								</a>
								<?php endforeach;?>
							</div>
							<?php else:?>
							<div>
								<small><?php echo $user['User']['user_name'];?> has no products...</small>
							</div>
							<?php endif;?>
					</div>
					<br />
					<br />
					<br />
      </div>
			</div>
</div>
    <!-- /.container -->
