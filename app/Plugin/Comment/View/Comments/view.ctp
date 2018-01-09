<style>
<!--
.form-horizontal .control-label {
	padding-top: 0px;
}
-->
</style>
<div class="container">
	<h2>
		<?php echo __('Comment Manager: Comment (view)'); ?>
	</h2>
	<div class="row-fluid show-grid">
		<div class="span12">
			<form class="form-horizontal">
				<div class="control-group">
					<label class="control-label"><?php echo __('Id'); ?>
					</label>
					<div class="controls">
						<?php echo h($comment['Comment']['id']); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Comment Title'); ?>
					</label>
					<div class="controls">
						<?php echo h($comment['Comment']['comment_title']); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Category'); ?>
					</label>
					<div class="controls">
						<?php echo $comment['Category']['category_name']; ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo __('Comment Date'); ?>
					</label>
					<div class="controls">
						<?php echo h($comment['Comment']['comment_date']); ?>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label"><?php echo __('Comment Summary'); ?>
					</label>
					<div class="controls">
						<?php echo h($comment['Comment']['comment_summary']); ?>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label"><?php echo __('Comment Content'); ?>
					</label>
					<div class="controls">
						<?php echo $comment['Comment']['comment_content']; ?>
					</div>
				</div>
				<div class="form-actions">
					<?php echo $this->Acl->link(__('Edit'), array('action' => 'edit', $comment['Comment']['id']),array('class'=>'btn  btn-primary')); ?>
					<a class="btn " onclick="cancel_add();"><?php echo __('Cancel'); ?>
					</a>
				</div>
			</form>
		</div>
	</div>
</div>
<script>
	function cancel_add() {
		window.location = '<?php echo Router::url(array('plugin' => 'comment','controller' => 'comments','action' => 'index')); ?>';
	}
</script>
