
	<!--Script-->
	<script>
		$('li.nav-item.creators').addClass('active');
	</script>
	<div class="container home">
			<div class="padding-helper">
			<div class="card">
						<div class="row" style="padding-left: 30px; padding-right: 30px;">
            <div class="col-lg-8 col-md-8 col-sm-8 hidden-xs-down my-4">
									Designer Profolio/ Brand Story
									<p>
										<?php echo ("words");?>
									</p>
            </div>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 my-4">
									<p>
										<img class="img-fluid" src="http://placehold.it/500x500" alt="">
									</p>
						</div>
						<div class="col-lg-8 col-md-8 col-sm-8 hidden-sm-up visible-xs my-4">
									Designer Profolio/ Brand Story
									<p>
										<?php echo ("words");?>
									</p>
            </div>
						</div>
	            <!-- /.col-lg-8 -->
						<h3 class="padding-helper" style="padding-left: 30px; padding-right: 30px;">Product Name</h3>
						<div class="row" style="padding-left: 30px; padding-right: 30px;">
						<?php for($i=0; $i<rand(3,9); $i++):?>
							<div class="col-lg-3 col-md-6 mb-4">
									<div class="card h-100">
										<?php echo $this->Html->image("http://placehold.it/700x400", array(
											"alt" => "",
											"class" => "card-img-top img-fluid",
											'url' => array('controller' => 'pages', 'action' => 'item')))
										;?>
											<div class="card-block">
													<h4 class="card-title">
														<?php echo $this->Html->link('Item','/pages/item',
															array('class' => '', 'target' => ''))
														;?>
													</h4>
													<h5>$24.99</h5>
													<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
											</div>
									</div>
							</div>
						<?php endfor;?>
					</div>
      </div>
			</div>
</div>
    <!-- /.container -->
