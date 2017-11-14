
	<!--Script-->
	<script>
		$('li.nav-item.creators').addClass('active');
	</script>

	<div class="container home">

			<div class="row padding-helper justify-content-end">

            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padding-helper">
                <div class="row">

									<?php for($i=0; $i<rand(6,9); $i++):?>
                    <div class="col col-6 mb-4">
                        <div class="card h-100">
                            <div class="card-block">
                                <h4 class="card-title">
																	<?php echo $this->Html->link('Designer','/pages/creator',
																		array('class' => '', 'target' => ''))
																	;?>
																</h4>
                                <h5>product/ photo</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
																<img class="img-fluid" src="http://placehold.it/300x300" alt="">
                            </div>
                        </div>
                    </div>
									<?php endfor;?>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.col-lg-9 -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
