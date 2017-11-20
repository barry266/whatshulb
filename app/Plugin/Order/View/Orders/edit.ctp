<div class="container">
	<h2>
		<?php echo __('Order Manager: Order (Edit)'); ?>
	</h2>
	<div class="row-fluid show-grid">
		<div class="span12">
			<?php if (count($errors) > 0){ ?>
			<div class="alert alert-error">
				<button data-dismiss="alert" class="close" type="button">×</button>
				<?php foreach($errors as $error){ ?>
				<?php foreach($error as $er){ ?>
				<strong><?php echo __('Error!'); ?> </strong>
				<?php echo h($er); ?>
				<br />
				<?php } ?>
				<?php } ?>
			</div>
			<?php } ?>
			<?php echo $this->Form->create('Order',array('class'=>'form-horizontal')); ?>

			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#menu0">Order</a></li>
				<li><a data-toggle="tab" href="#menu1">Consumer</a></li>
				<li><a data-toggle="tab" href="#menu2">Creator</a></li>
				<li><a data-toggle="tab" href="#menu3">Product</a></li>
			</ul>

			<div class="tab-content">
				<div id="menu0" class="tab-pane fade in active">
					<div class="control-group">
						<label class="control-label"><?php echo __('Price'); ?>
						</label>
						<div class="controls">
							<?php echo $this->Form->input('price',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge','readonly'=>"readonly")); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo __('Address'); ?>
						</label>
						<div class="controls">
							<?php echo $this->Form->input('address',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge','readonly'=>"readonly")); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo __('Status'); ?>
						</label>
						<div class="controls">
							<select name="data[Order][status]" class="form-control" id="nationality">
								<option value="Paid">Paid</option>
								<option value="Shipping">Shipping</option>
								<option value="Lose">Lost</option>
								<option value="Closed">Closed</option>
							</select>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo __('Special Instruction'); ?>
						</label>
						<div class="controls">
							<?php echo $this->Form->input('instruction',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge','readonly'=>"readonly")); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo __('Order Date'); ?>
						</label>
						<div class="controls">
							<?php echo $this->Form->input('created',array('div' => false,'label'=>false,'error'=>false,'readonly'=>"readonly",'type'=>'date')); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo __('Promise Date'); ?>
						</label>
						<div class="controls">
							<?php echo $this->Form->input('promise',array('div' => false,'label'=>false,'error'=>false,'type'=>'date')); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo __('Shipping Proof'); ?>
						</label>
						<div class="controls">

						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo __('BH Receive Date'); ?>
						</label>
						<div class="controls">
							<?php echo $this->Form->input('bh_receive',array('div' => false,'label'=>false,'error'=>false,'type'=>'date')); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo __('BH Ship Date'); ?>
						</label>
						<div class="controls">
							<?php echo $this->Form->input('bh_ship',array('div' => false,'label'=>false,'error'=>false,'type'=>'date')); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo __('Tracking ID'); ?>
						</label>
						<div class="controls">
							<?php echo $this->Form->input('tracking_id',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge','type'=>'text')); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label"><?php echo __('Receive Date'); ?>
						</label>
						<div class="controls">
							<?php echo $this->Form->input('receive',array('div' => false,'label'=>false,'error'=>false,'type'=>'date')); ?>
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
				<input type="submit" class="btn btn-primary"
					value="<?php echo __('Save Order'); ?>" /> <input type="button"
					class="btn" value="<?php echo __('Cancel'); ?>"
					onclick="cancel_edit();" />
			</div>
			<?php echo $this->Form->end(); ?>




		</div>
	</div>
</div>
