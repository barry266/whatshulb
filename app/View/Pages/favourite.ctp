	<script>
		$('li.nav-item.favourite').addClass('active');
	</script>
	<div class="container">

			<div class="row">

            <div class="col-lg-12 my-4">
                <div class="card row">
									<div class="row " style="padding: 30px;">

										<?php for($i=0; $i<rand(3,9); $i++):?>
	                    <div class="col-lg-6 col-md-6 mb-4">
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
	                            <div class="card-footer">
	                                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
	                            </div>
	                        </div>
	                    </div>
										<?php endfor;?>

	                </div>
                </div>
                <!-- /.card -->

            </div>
            <!-- /.col-lg-12 -->

        </div>

    </div>
    <!-- /.container -->
