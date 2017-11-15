<style>
<!--
.form-horizontal .control-label {
	padding-top: 0px;
}
-->
</style>
<div class="container">
	<h2>
		<?php echo __('Product Manager: Product (view)'); ?>
	</h2>
	<div class="row-fluid show-grid">
		<div class="span12">
			<form class="form-horizontal">
				<div class="control-group">
					<label class="control-label"><?php echo __('Id'); ?>
					</label>
					<div class="controls">
						<?php echo h($product['Product']['id']); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Product Name'); ?>
					</label>
					<div class="controls">
						<?php echo h($product['Product']['name']); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Description'); ?>
					</label>
					<div class="controls">
						<?php echo $product['Product']['description']; ?>
					</div>
				</div>
					
				<div class="control-group">
					<label class="control-label"><?php echo __('Price(HKD)'); ?>
					</label>
					<div class="controls">
						<?php echo ('$'.h($product['Product']['price'])); ?>
					</div>
				</div>
					
				<div class="control-group">
					<label class="control-label"><?php echo __('No. of Orders'); ?>
					</label>
					<div class="controls">
						<?php echo h($product['Product']['orders']); ?>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label"><?php echo __('No. of Sales'); ?>
					</label>
					<div class="controls">
						<?php echo $product['Product']['sales']; ?>
					</div>
				</div>
				<div class="form-actions">
					<?php echo $this->Acl->link(__('Edit'), array('action' => 'edit', $product['Product']['id']),array('class'=>'btn  btn-primary')); ?>
					<a class="btn " onclick="cancel_add();"><?php echo __('Cancel'); ?>
					</a>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	function cancel_add() {
		window.location = '<?php echo Router::url(array('plugin' => 'product','controller' => 'products','action' => 'index')); ?>';
	}
</script>
