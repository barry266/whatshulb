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
	<div class="row-fluid show-grid" id="tab_user_manager">
		<div class="span12">
			<ul class="nav nav-tabs">
				<?php if ($this->Acl->check('Categories','index','Product') == true){?>
					<li><?php echo $this->Html->link(__('Category'), array('plugin' => 'product','controller' => 'categories','action' => 'index')); ?></li>
				<?php } ?>
				<?php if ($this->Acl->check('Products','index','Product') == true){?>
					<li class="active"><?php echo $this->Html->link(__('Product'), array('plugin' => 'product','controller' => 'products','action' => 'index')); ?></li>
				<?php }?>
			</ul>
		</div>
	</div>
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
					<label class="control-label"><?php echo __('Product Title'); ?>
					</label>
					<div class="controls">
						<?php echo h($product['Product']['product_title']); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Category'); ?>
					</label>
					<div class="controls">
						<?php echo $product['Category']['category_name']; ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Product Date'); ?>
					</label>
					<div class="controls">
						<?php echo h($product['Product']['product_date']); ?>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label"><?php echo __('Product Summary'); ?>
					</label>
					<div class="controls">
						<?php echo h($product['Product']['product_summary']); ?>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label"><?php echo __('Product Content'); ?>
					</label>
					<div class="controls">
						<?php echo $product['Product']['product_content']; ?>
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
