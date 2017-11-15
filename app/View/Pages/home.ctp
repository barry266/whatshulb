<?php print_r($users);exit();?>
<!--Script-->
<script>
	$('li.nav-item.home').addClass('active');
</script>

<div class="container">

		<div class="row">


					<div class="col-lg-12">

							<iframe class="padding-helper" src="https://www.youtube.com/embed/JGwWNGJdvx8" frameborder="0" allowfullscreen>
							</iframe>

							<div class="row padding-helper">
									<?php for($i=0; $i<rand(3,9); $i++):?>
									<?php if (rand(0,1)):?>
									<div class="col-lg-4 col-md-6 mb-4">
											<div class="card h-100">
												<?php echo $this->Html->image("http://placehold.it/700x500", array(
													"alt" => "",
													"class" => "card-img-top img-fluid",
													'url' => array('controller' => 'pages', 'action' => 'item')))
												;?>
													<div class="card-block">
															<h4 class="card-title">
																<?php echo $this->Html->link('Product_title','/pages/item',
				                          array('class' => '', 'target' => ''))
				                        ;?>
															</h4>
															<h5>$22.22</h5>
															<p class="card-text">Design is good, design tgt.Design is good, design tgt.Design is good, design tgt.Design is good, design tgt.</p>
													</div>
											</div>
									</div>
								<?php else:?>
									<div class="col-lg-4 col-md-6 mb-4">
											<div class="card h-100">
												<?php echo $this->Html->image("http://placehold.it/700x500", array(
													"alt" => "",
													"class" => "card-img-top img-fluid",
													'url' => array('controller' => 'pages', 'action' => 'cretor')))
												;?>
													<div class="card-block">
															<h4 class="card-title">
																<?php echo $this->Html->link('Creator_name','/pages/creator',
				                          array('class' => '', 'target' => ''))
				                        ;?>
															</h4>
															<h5>by consumer</h5>
															<p class="card-text">This product is good, buy tgt.This product is good, buy tgt.This product is good, buy tgt.This product is good, buy tgt.This product is good, buy tgt.</p>
													</div>
											</div>
									</div>
								<?php endif;?>
								<?php endfor;?>


							</div>
							<!-- /.row -->

					</div>
					<!-- /.col-lg-12 -->

			</div>
			<!-- /.row -->

	</div>
	<!-- /.container -->
