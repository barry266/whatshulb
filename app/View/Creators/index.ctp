	<!--Script-->
	<script>
		$('li.nav-item.creators').addClass('active');
	</script>

	<div class="container home">

			<div class="row padding-helper justify-content-end">

            <div class="col-lg-11 padding-helper">
							Our Creators
							<hr />
                <div class="row">
									<?php foreach($users as $user):?>
                    <div class="col-lg-3 col-md-3 col-xs-6 col-6 mb-4">
											<a href="creators/view/<?php echo $user['User']['id'];?>">
												<img class="img-fluid" src="<?php echo $user['User']['user_fb']?"http://graph.facebook.com/".$user['User']['user_fb']."/picture?type=large":(WWW_URL)."/img/photo.jpg";?>">
												<div class="overlay">
													<div class="creator-text">
														<b><?php echo $user['User']['user_name'];?></b>
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
