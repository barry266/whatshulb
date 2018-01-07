
	<!--Script-->
	<script>

	</script>
	<div class="container">

			<div class="row padding-helper">

            <div class="col-lg-12">

                <div class="card mt-4">
                    <!--<img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">-->
                    <div class="card-block">
										<?php
											$path = WWW_URL."files/".$product['Product']['user_id']."/".$product['Product']['id']."/".$product['Product']['image'];
											$file_headers = @get_headers($path);
										;?>
										<?php if((!$file_headers || $file_headers[0] != 'HTTP/1.1 404 Not Found' ) && $product['Product']['image'] != ""):?>
												<div class="img-holder"
												style="background-image: url('<?php echo $path;?>')">

												<?php
													$tag = (unserialize($product['Product']['tag_multiple']));
													$relX = (unserialize($product['Product']['relX_multiple']));
													$relY = (unserialize($product['Product']['relY_multiple']));
												?>

												<?php for ($i=0;$i<5;$i++):?>
													<?php if($tag[$i] != ""):?>
													<a class="hashtag" href="#" style="left: <?php echo $relX[$i];?>%; top: <?php echo $relY[$i];?>%;">
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
                        <h3 class="card-title"><?php echo $product['Product']['name'];?></h3>
                        <h4>$<?php echo $product['Product']['price'];?></h4>
                        <p class="card-text"><?php echo $product['Product']['description'];?></p>
                    </div>
                </div>
                <!-- /.card -->
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
