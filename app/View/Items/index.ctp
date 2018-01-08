
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
										<?php
											$path = WWW_URL."files/".$product['Product']['user_id']."/".$product['Product']['id']."/".$product['Product']['image'];
											$file_headers = @get_headers($path);
										;?>
										<?php if((!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found' ) || $product['Product']['image'] == ""){
											$path = "http://placehold.it/700x500" ;
										};?>
                    <div class="col-lx-3 col-lg-3 col-md-3 col-sm-6 col-12 mb-4">
											<a href="/whatshulb/items/view/<?php echo $product['Product']['id'];?>" >
                        <div class="card h-100 card-products"
													style="background-image: url('<?php echo $path;?>')">
                            <div class="card-block">
                                <h4 class="card-title">
																	<?php echo $product['Product']['name'];?>
																</h4>
                                <h5>$<?php echo $product['Product']['price'];?></h5>
                            </div>
                        </div>
											</a>
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
