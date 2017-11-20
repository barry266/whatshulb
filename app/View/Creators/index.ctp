
	<!--Script-->
	<script>
		$('li.nav-item.creators').addClass('active');
	</script>

	<div class="container home">

			<div class="row padding-helper justify-content-end">

            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 padding-helper">
                <div class="row">

									<?php foreach($users as $user):?>
                    <div class="col col-6 mb-4">
												<a href="creators/view/<?php echo $user['User']['id'];?>">
                        <div class="card h-100">
                            <div class="card-block">
                                <h4 class="card-title">
																	<?php echo $user['User']['user_name']
																	;?>
																</h4>
                                <h5>product/ photo</h5>
                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur!</p>
																<img class="img-fluid" src="http://placehold.it/300x300" alt="">
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
