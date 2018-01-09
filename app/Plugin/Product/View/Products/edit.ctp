<div class="container">
	<h2>
		<?php echo __('Product Manager: Product (Edit)'); ?>
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

			<?php echo $this->Form->input('id',array('div' => false,'label'=>false,'error'=>false)); ?>
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
					<?php echo $this->Form->input('description',array('div' => false,'label'=>false,'error'=>false,'rows' => '30', 'class'=>'input-xxlarge')); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label"><?php echo __('Price'); ?><span
					style="color: red;"> *</span>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('price',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label"><?php echo __('Progress in %'); ?><span
					style="color: red;"> *</span>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('progress',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label"><?php echo __('Shop Link'); ?><span
					style="color: red;"></span>
				</label>
				<div class="controls">
					<?php echo $this->Form->input('url',array('div' => false,'label'=>false,'error'=>false,'class'=>'input-xxlarge')); ?>
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

			<div class="control-group">
				<label class="control-label"><?php echo __('Active'); ?>
				</label>
				<div class="controls">
					<?php echo $this->Form->checkbox('active', array('hiddenField' => true)); ?>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label"><?php echo __('Add image detail'); ?>
				</label>
				<div class="controls" id="hashtag">
					<!-- image detail -->
					<input id="forShow" value="<?php echo $product['Product']['image'];?>" disabled="disabled" type="text">
					<button class="btn btn-primary edit-tags" data-toggle="modal" data-target="#myModal">
						<span>Edit Tags</span>
					</button>
					<?php
						echo $this->Form->input('image',array('type'=>'hidden'));
					;?>
				</div>
			</div>


<?php
	$tag = (unserialize($product['Product']['tag_multiple']));
	$relX = (unserialize($product['Product']['relX_multiple']));
	$relY = (unserialize($product['Product']['relY_multiple']));
?>
<?php for ($i=0;$i<5;$i++):?>
			<input placeholder="Name" class="tag-input tag<?php echo $i;?>" value="<?php echo $tag[$i];?>" type="hidden" name="data[Product][tag_multiple][]" value="">&nbsp;
			<input placeholder="X-index" class="tag-input relX<?php echo $i;?>" value="<?php echo $relX[$i];?>" type="hidden" name="data[Product][relX_multiple][]" value="">&nbsp;
			<input placeholder="Y-index" class="tag-input relY<?php echo $i;?>" value="<?php echo $relY[$i];?>" type="hidden" name="data[Product][relY_multiple][]" value="">
<?php endfor;?>


			<div id="fileupload" class="control-group">
				<label class="control-label"><?php echo __('Gallery'); ?></label>
		        <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
		        <div class="fileupload-buttonbar controls">
		            <div class="col-lg-7">
		                <!-- The fileinput-button span is used to style the file input field as button -->
		                <span class="btn btn-success fileinput-button">
		                    <i class="glyphicon glyphicon-plus"></i>
		                    <span><?php echo __('Add files...');?></span>
		                    <input type="file" name="files[]" multiple>
		                </span>
		                <button type="submit" class="btn btn-primary start">
		                    <i class="glyphicon glyphicon-upload"></i>
		                    <span><?php echo __('Start upload');?></span>
		                </button>
		                <button type="reset" class="btn btn-warning cancel">
		                    <i class="glyphicon glyphicon-ban-circle"></i>
		                    <span><?php echo __('Cancel upload');?></span>
		                </button>
										<!--
		                <button type="button" class="btn btn-danger delete del-all">
		                    <i class="glyphicon glyphicon-trash"></i>
		                    <span><?php echo __('Delete');?></span>
		                </button>
		                <input type="checkbox" class="toggle">
										-->
		                <!-- The global file processing state -->
		                <span class="fileupload-process"></span>
		            </div>
		            <!-- The global progress state -->
		            <div class="col-lg-5 fileupload-progress fade">
		                <!-- The global progress bar -->
		                <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
		                    <div class="progress-bar progress-bar-success" style="width:0%;"></div>
		                </div>
		                <!-- The extended global progress state -->
		                <div class="progress-extended">&nbsp;</div>
		            </div>
		        </div>
		        <!-- The table listing the files available for upload/download -->
		        <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
		    </div>





			<div class="form-actions">
				<input type="submit" class="btn btn-primary"
					value="<?php echo __('Save Product'); ?>" /> <input type="button"
					class="btn" value="<?php echo __('Cancel'); ?>"
					onclick="window.location='../../../product/products'" />
			</div>
			<?php echo $this->Form->end(); ?>




		</div>
	</div>
</div>

<!-- Modal -->
<div style="outline: 0px"class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<h4 class="modal-title" id="myModalLabel">Create Tags</h4>
</div>
<div class="modal-body">
	<div class="img-holder">
		<?php
			$tag = (unserialize($product['Product']['tag_multiple']));
			$relX = (unserialize($product['Product']['relX_multiple']));
			$relY = (unserialize($product['Product']['relY_multiple']));
		?>

		<?php for ($i=0;$i<5;$i++):?>
			<a class="hashtag hashtag<?php echo $i." "; echo ($tag[$i] == "")?"hidden":"";?>" href="#" style="left: <?php echo $relX[$i];?>%; top: <?php echo $relY[$i];?>%;">
				<span class="hashtag-text">
					<div class="hashtag-tri"></div>
					<font><?php echo $tag[$i];?></font>
				</span>
			</a>
		<?php endfor;?>
	</div><br />
	<div style="margin: 0 auto;">
		<select class="selectTags">
			<option value="0">1st</option>
			<option value="1">2nd</option>
			<option value="2">3rd</option>
			<option value="3">4th</option>
			<option value="4">5th</option>
		</select>
		<input class="selectTagsName" type="text" value="<?php echo $tag[0];?>">
	</div>
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>

<!-- The template to display files available for upload -->
<script id="template-upload" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-upload fade">
        <td>
            <span class="preview"></span>
        </td>
        <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
        </td>
        <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
        </td>
        <td>
            {% if (!i && !o.options.autoUpload) { %}
                <button class="btn btn-primary start" disabled>
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start</span>
                </button>
            {% } %}
            {% if (!i) { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
{% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
        <td>
            <span class="preview">
                {% if (file.thumbnail_url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnail_url%}"></a>
                {% } %}
            </span>
        </td>
        <td>
            <p class="name">
                {% if (file.url) { %}
                    <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                {% } else { %}
                    <span>{%=file.name%}</span>
                {% } %}
            </p>
            {% if (file.error) { %}
                <div><span class="label label-danger">Error</span> {%=file.error%}</div>
            {% } %}
        </td>
        <td>
            <span class="size">{%=o.formatFileSize(file.size)%}</span>
        </td>
        <td name="{%=file.name%}">
            {% if (file.deleteUrl) { %}
						<a class="btn btn-success add-tags" onmouseover="addTag()">
							<span>As Tag Image</span>
						</a>
                <button class="btn btn-danger delete del-tags" onmouseover="deleteTag()" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                    <i class="glyphicon glyphicon-trash"></i>
                    <span>Delete</span>
                </button>
                <!--<input type="checkbox" name="delete" value="1" class="toggle">-->
            {% } else { %}
                <button class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel</span>
                </button>
            {% } %}
        </td>
    </tr>
{% } %}
</script>

<script type="text/javascript">
var current = 0

$('#myModal').hide();

function addTag(){
	$(".add-tags").click(function(){
		var hashtag = $(this).parent().attr('name');
		$("input#ProductImage").attr("value",hashtag);
		$("input#forShow").attr("value",hashtag);
	});
}

function deleteTag(){
	$(".btn.btn-danger.delete.del-tags").click(function(){
		if ($(this).parent().attr('name') == $("input#forShow").attr("value")){
			$("input#ProductImage").attr("value","");
			$("input#forShow").attr("value","");
		}
	});
}

<?php $path = WWW_URL."files/".$product['Product']['user_id']."/".$product['Product']['id']."/";?>
$('.edit-tags').click(function(){
	$('#myModal').show();
	$('.img-holder').attr("style","margin: 0 auto;background-image: url('<?php echo $path;?>"+$("input#ProductImage").val()+"')")
});

$('.selectTags').on('change', function () {
    current = this.value
		$('.selectTagsName').val($('.hashtag'+current+' font').text());
});

$('.selectTagsName').on('change', function () {
    $('input.tag'+current).val($('input.selectTagsName').val());
		$('.hashtag'+current+' font').text($('input.selectTagsName').val());
});


$(".img-holder").click(function(e){
   var parentOffset = $(this).parent().offset();
   var relX = (e.pageX - parentOffset.left - ($(".hashtag"+current).width())/2-30)/$('.img-holder').width()*100;
	 var relY = (e.pageY - parentOffset.top - 20)/$('.img-holder').height()*100;
	 $('input.tag'+current).val($('input.selectTagsName').val());
   $('input.relX'+current).val(relX);
   $('input.relY'+current).val(relY);
	 $('.hashtag'+current+' font').text($('input.selectTagsName').val());
	 $('.hashtag'+current).attr("style","left: "+relX+"%; top: "+relY+"%");
	 if ($('input.selectTagsName').val() == "") {
		 $('.hashtag'+current).addClass("hidden");
	 } else {
		 $('.hashtag'+current).removeClass("hidden");
	 }
});


//$(".modal.fade").attr('style','outline: 0px; x-index=-1');
//$(".modal.fade").attr('style','outline: 0px;');
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
function cancel_edit() {
	window.location = '<?php echo Router::url(array('plugin' => 'product','controller' => 'products','action' => 'index')); ?>';
}
*/
</script>
