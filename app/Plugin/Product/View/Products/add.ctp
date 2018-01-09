<div class="container">
	<h2>
		<?php echo __('Product Manager: Product (draft)'); ?>
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
			<?php echo $this->Form->create('Product',array('class'=>'form-horizontal')); ?>

			<div class="control-group">
				<label class="control-label"><?php echo __('Name'); ?><span
					style="color: red;"> *</span>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('name',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label"><?php echo __('Description'); ?><span style="color: red;"> * </span>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('description',array('div' => false,'label'=>false,'error'=>false,'rows' => '15', 'class'=>'input-xxlarge')); ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label"><?php echo __('Category'); ?></span>
				</label>
				<div class="controls">
						<?php
						$options = array(
									array('name' => 'Accessories', 'value' => 'accessories', 'class' => ''),
									array('name' => 'Fashion', 'value' => 'fashion', 'class' => ''),
									array('name' => 'Life-Style', 'value' => 'lifestyle', 'class' => ''),
									array('name' => 'Home Deco', 'value' => 'homedeco', 'class' => ''),
									array('name' => 'Tech.', 'value' => 'tech', 'class' => ''),
									array('name' => 'Games', 'value' => 'games', 'class' => ''),
							 );
						echo $this->Form->input('category',array('options'=>$options,'div' => false,'label'=>false,'error'=>false)); ?>
				</div>
			</div>

			<div class="form-actions">
				<input type="submit" class="btn btn-primary"
					value="<?php echo __('Save Product'); ?>" /> <input type="button"
					class="btn" value="<?php echo __('Cancel'); ?>"
					onclick="cancel_add();" />
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
</div>

<script type="text/javascript">

/*
tinyMCE.init({
    // General options
    mode : "exact",
    elements:"ProductDescription",
    theme : "advanced",
    gecko_spellcheck : true,
    plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks,spellchecker",

    // Theme options
    theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
    theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
    theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft,visualblocks",
    theme_advanced_toolbar_location : "top",
    theme_advanced_toolbar_align : "left",
    theme_advanced_statusbar_location : "bottom",
    theme_advanced_resizing : true
});
*/
function cancel_add() {
	window.location = '<?php echo Router::url(array('plugin' => 'product','controller' => 'products','action' => 'index')); ?>';
}
</script>
