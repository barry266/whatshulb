<style>
<!--
.form-horizontal .control-label {
	padding-top: 0px;
}
-->
</style>
<div class="container">
	<h2>
		<?php echo __('Order Manager: Order (view)'); ?>
	</h2>
	<div class="row-fluid show-grid">
		<div class="span12">
			<form class="form-horizontal">

			<ul class="nav nav-tabs">
  			<li class="active"><a data-toggle="tab" href="#menu0">Order</a></li>
  			<li><a data-toggle="tab" href="#menu1">Consumer</a></li>
  			<li><a data-toggle="tab" href="#menu2">Creator</a></li>
				<li><a data-toggle="tab" href="#menu3">Product</a></li>
			</ul>

			<div class="tab-content">
  			<div id="menu0" class="tab-pane fade in active">
					<div class="control-group">
						<label class="control-label"><?php echo __('Id'); ?>
						</label>
						<div class="controls">
							<?php echo h($order['Order']['id']); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo __('Price'); ?>
						</label>
						<div class="controls">
							<?php echo '$ '.h($order['Order']['price']); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo __('Address'); ?>
						</label>
						<div class="controls">
							<?php echo h($order['Order']['address']); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo __('Status'); ?>
						</label>
						<div class="controls">
							<?php echo h($order['Order']['status']); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo __('Special Instruction'); ?>
						</label>
						<div class="controls">
							<?php echo h($order['Order']['instruction']); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo __('Order Date'); ?>
						</label>
						<div class="controls">
							<?php echo h($order['Order']['created']); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo __('Promise Date'); ?>
						</label>
						<div class="controls">
							<?php echo h($order['Order']['promise']); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo __('Shipping Proof'); ?>
						</label>
						<div class="controls">
							<?php echo h($order['Order']['proof']); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo __('BH Receive Date'); ?>
						</label>
						<div class="controls">
							<?php echo h($order['Order']['bh_receive']); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo __('BH Ship date'); ?>
						</label>
						<div class="controls">
							<?php echo h($order['Order']['bh_ship']); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo __('Tracking ID'); ?>
						</label>
						<div class="controls">
							<?php echo h($order['Order']['tracking_id']); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo __('Receive Date'); ?>
						</label>
						<div class="controls">
							<?php echo h($order['Order']['receive']); ?>
						</div>
					</div>

  			</div>
  			<div id="menu1" class="tab-pane fade">
				<div class="control-group">
					<label class="control-label"><?php echo __('Id'); ?>
					</label>
					<div class="controls">
						<?php echo h($order['Order']['buyer_id']); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Name'); ?>
					</label>
					<div class="controls">
						<?php echo h($buyer['User']['user_name']); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Email'); ?>
					</label>
					<div class="controls">
						<?php echo h($buyer['User']['user_email']); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Phone no.'); ?>
					</label>
					<div class="controls">
						<?php echo h($buyer['User']['phone']); ?>
					</div>
				</div>
  			</div>


  			<div id="menu2" class="tab-pane fade">
				<div class="control-group">
					<label class="control-label"><?php echo __('Creator Id'); ?>
					</label>
					<div class="controls">
						<?php echo h($order['Order']['owner_id']); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Name'); ?>
					</label>
					<div class="controls">
						<?php echo h($owner['User']['user_name']); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Email'); ?>
					</label>
					<div class="controls">
						<?php echo h($owner['User']['user_email']); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Phone no.'); ?>
					</label>
					<div class="controls">
						<?php echo h($owner['User']['phone']); ?>
					</div>
				</div>
  			</div>


				<div id="menu3" class="tab-pane fade">
				<table class="table">
    			<thead>
      			<tr>
        			<th>ID</th>
        			<th>Name</th>
        			<th>Price</th>
							<th>View</th>
      			</tr>
    			</thead>
    		<tbody>
				<?php foreach($products as $product):?>
      		<tr>
        		<td><?php echo $product['Product']['id'];?></td>
        		<td><?php echo $product['Product']['name'];?></td>
        		<td><?php echo '$'.$product['Product']['price'];?></td>
						<td><a href="/whatshulb/products/<?php echo $product['Product']['id'];?>" class="btn btn-mini">View</a></td>
      		</tr>
				<?php endforeach;?>
    		</tbody>
  </table>


  			</div>
			</div>

				<div class="form-actions">
					<?php echo $this->Acl->link(__('Edit'), array('action' => 'edit', $order['Order']['id']),array('class'=>'btn  btn-primary')); ?>
					<a class="btn " onclick="cancel_add();"><?php echo __('Cancel'); ?>
					</a>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	function cancel_add() {
		window.location = '<?php echo Router::url(array('plugin' => 'order','controller' => 'orders','action' => 'index')); ?>';
	}
</script>
