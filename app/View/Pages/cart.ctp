	<script>
		$('li.nav-item.cart').addClass('active');
	</script>
	<div class="container">

			<div class="row">

            <div class="col-lg-12 my-4">
                <div class="card row">
                	<div style="padding: 30px;">
										<table class="table">
											<tbody>
											<tr>
												<td>
													Products
												</td>
												<td>
													Price
												</td>
												<td>
													&nbsp;
												</td>
											</tr>
											<?php for($i=1; $i<7 ;$i++):?>
												<tr>
													<td>
														Product_name
													</td>
													<td>
														$29.99
													</td>
													<td>
														<a href="#">
															Delete
														</a>
													</td>
												</tr>
											<?php endfor;?>
										</tbody>
										</table>
									</div>
									<button class="btn btn-primary">
										Check Out
									</button>
								</div>
      			</div>
      <!-- /.col-lg-12 -->

        </div>

  </div>
  <!-- /.container -->
