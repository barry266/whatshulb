
	<!--Script-->
	<script>

	</script>
	<div class="container">

			<div class="row padding-helper">

            <div class="col-lg-12 row">

								<div class="row-products col-lg-5">
									<div class="card mt-4 ">
										<div class="card-block">
											<h4 class="bold text-center">
												<?php echo $product['Product']['name'];?>
												<?php echo ($product['Product']['price']!="" && $product['Product']['price']!="0")?" - $".$product['Product']['price']:"";?>
											</h4>
											<p class="card-text"><?php echo $product['Product']['description'];?></p>
										</div>
									</div>
									<div class="card mt-4 ">
										<div class="card-block">
											<h4 class="bold text-center">
												Progress
											</h4>
											<div class="progress-container">
    										<div class="progress progress-striped active">
        									<div class="progress-bar progress-bar-success" style="width:0%">
														<font></font>
														<?php echo $product['Product']['progress']."%";?>
													</div>
    										</div>
											</div>
											<br />
											<div class="text-center">
												<?php
													$name = $product['Product']['url']!=""?'Buy Now':'Unbegun Sale';
													$classes = $product['Product']['url']!=""?'btn btn-basic width-90 center':'btn btn-disable width-90 center';
													echo $this->Html->link($name,
													$product['Product']['url']!=""?$product['Product']['url']:"javascript:void(0)",
                          	array('class' => $classes,
														'target' => '_blank')
													)
                        ;?>
											</div>
										</div>
									</div>
								</div>

								<div class="row-products col-lg-7">
                <div class="card mt-4 ">
                    <!--<img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">-->
                    <div class="card-block">
										<?php
											$path = WWW_URL."files/".$product['Product']['user_id']."/".$product['Product']['id']."/".$product['Product']['image'];
											$file_headers = @get_headers($path);
										;?>
										<?php if((!$file_headers || $file_headers[0] != 'HTTP/1.1 404 Not Found' ) && $product['Product']['image'] != ""):?>
												<div class="img-holder img-fluid img-blur"
												style="background-image: url('<?php echo $path;?>')">

												<?php
													$tag = (unserialize($product['Product']['tag_multiple']));
													$relX = (unserialize($product['Product']['relX_multiple']));
													$relY = (unserialize($product['Product']['relY_multiple']));
												?>

												<?php for ($i=0;$i<5;$i++):?>
													<?php if($tag[$i] != ""):?>
													<a class="hashtag hashtag<?php echo $i;?> wait-in-out" href="#" style="left: <?php echo $relX[$i];?>%; top: <?php echo $relY[$i];?>%;">
														<span class="hashtag-text">
															<div class="hashtag-tri">
															</div>
															<?php echo $tag[$i];?>
														</span>
													</a>
												<?php endif;?>
												<?php endfor;?>

												</div>
										<?php endif;?>
                    </div>
                </div>
								</div>
                <!-- /.card -->
								<div class="row-products col-lg-12">
                	<div class="card mt-4 ">
										<div class="card-block">
											hello
										</div>
									</div>
								</div>






					<!--
								<br><br>
								<h4>Other Products</h4>
								<br>
								<div class="row">
								<?php for($i=0; $i<4; $i++):?>
									<div class="col-lg-3 col-md-6 mb-4">
										<div class="card h-100 ShowPic" style="position: relative;">
											<?php echo $this->Html->image("http://placehold.it/700x500", array(
												"alt" => "",
												"class" => "card-img-top img-fluid",
												'url' => array('controller' => 'pages', 'action' => 'item')))
											;?>
												<h5 class="ShowText" style="position: absolute; right: 5px; bottom: 0px;">Product Name</h5>
										</div>
									</div>
								<?php endfor;?>
								</div>
								<br><br>
								<h4>Co-Creation Review</h4>
								<br>
								<div class="row">
								<?php for($i=0; $i<4; $i++):?>
									<div class="col-lg-3 col-md-6 mb-4">
										<div class="card h-100 ShowPic" style="position: relative;">
											<?php echo $this->Html->image("http://placehold.it/700x500", array(
												"alt" => "",
												"class" => "card-img-top img-fluid",
												'url' => array('controller' => 'pages', 'action' => 'cocreation')))
											;?>
												<small class="text-warning" style="position: absolute; right: 5px; bottom: 0px;">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
										</div>
									</div>
								<?php endfor;?>
								</div>

						-->

            </div>
            <!-- /.col-lg-9 -->

        </div>

    </div>
    <!-- /.container -->


<script>
var current = true
$('.img-holder').click(function(e){
	if (current){
		$('.wait-in-out').fadeIn('slow');
		current = false;
	} else {
		$('.wait-in-out').fadeOut('slow');
		current = true;
	}
});

$(".progress-bar").animate({
  width: "<?php echo $product['Product']['progress'];?>%"
}, 2500);

</script>
