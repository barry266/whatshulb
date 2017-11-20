
	<!--Script-->
	<script>
		$('li.nav-item.products').addClass('active');
	</script>

	<div class="container home">

			<div class="row padding-helper">

            <div class="col-lg-12 padding-helper">
								<div class="row">
									<div class="col-lg-3 col-md-3 col-xs-3 col-xs-12">
												<select class="form-control">
													<option value="">All Type</option>
													<option value="accessories">Accessories</option>
													<option value="fashion">Fashion</option>
													<option value="lifestyle">Life-Style</option>
													<option value="homedeco">Home Deco</option>
													<option value="tech">Tech.</option>
													<option value="games">Games</option>
												</select>
									</div>
									<div class="col-lg-3 col-md-3 col-xs-3 col-xs-12">
												<select class="form-control">
													<option value="">All Gender</option>
													<option value="1">Men</option>
													<option value="0">Women</option>
												</select>
									</div>
									<div class="col-lg-6 col-md-6 col-xs-6 col-xs-12">
										<div class="input-group">
												<input type="text" class="form-control">
													<a class="btn btn-blue input-group-addon" >
														<!--<span class="glyphicon glyphicon-remove"></span>-->
														<b>Search</b>
													</a>
										</div>
									</div>
								</div>
								<br>
                <div class="row">

									<?php foreach($products as $product):?>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100">
													<?php echo $this->Html->image("http://placehold.it/700x400", array(
														"alt" => "",
														"class" => "card-img-top img-fluid",
														'url' => array('controller' => 'items', 'action' => 'view', $product['Product']['id'])))
													;?>
                            <div class="card-block">
                                <h4 class="card-title">
																	<?php echo $product['Product']['name'];?>
																</h4>
                                <h5>$<?php echo $product['Product']['price'];?></h5>
                                <p class="card-text"><?php echo $product['Product']['description'];?></p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                            </div>
                        </div>
                    </div>
									<?php endforeach;?>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
