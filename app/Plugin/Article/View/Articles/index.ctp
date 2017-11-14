<div class="container">
	<h2>
		<?php echo __('Article Manager'); ?>
	</h2>
	<div class="row-fluid show-grid" id="tab_user_manager">
		<div class="span12">
			<ul class="nav nav-tabs">
				<?php if ($this->Acl->check('Categories','index','Article') == true){?>
					<li><?php echo $this->Html->link(__('Category'), array('plugin' => 'article','controller' => 'categories','action' => 'index')); ?></li>
				<?php } ?>
				<?php if ($this->Acl->check('Articles','index','Article') == true){?>
					<li class="active"><?php echo $this->Html->link(__('Article'), array('plugin' => 'article','controller' => 'articles','action' => 'index')); ?></li>
				<?php }?>
			</ul>
		</div>
	</div>
	<div class="row-fluid show-grid">
		<?php if ($this->Acl->check('Articles','add','Article') == true){?>
		<div class="span12" style="text-align: right;">
			<button class="btn btn-success" type="button"
				onclick="showAddArticlePage();">
				<i class="icon-plus icon-white"></i>
				<?php echo __('Article'); ?>
			</button>
		</div>
		<?php }?>
	</div>
	<?php echo $this->Form->create('Article', array('action' => 'index','class'=>' form-signin form-horizontal')); ?>
	<div class="row-fluid show-grid">
		<div class="span12">
			<div class="input-append">
				<?php echo $this->Form->input('filter',array('div' => false,'label'=>false,'placeholder'=>"Search Article title",'class'=>'input-xlarge')); ?>
				<button class="btn" type="submit">
					<?php echo __('Search'); ?>
				</button>
				<button class="btn" type="button" onclick="cancelSearch();">
					<i class="icon-remove-sign"></i>
				</button>
			</div>
		</div>
	</div>
	<?php echo $this->Form->end(); ?>
	<div class="row-fluid show-grid">
		<div class="span12">
		<div class="pagination">
				<ul>
					<?php
					echo $this->Paginator->prev('&larr; ' . __('previous'),array('tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag'=>'li'));
					echo $this->Paginator->next(__('next') . ' &rarr;', array('tag' => 'li','escape' => false));
					?>
				</ul>
			</div>
			<table class="table table-bordered table-hover list table-condensed table-striped">
				<thead>
					<tr>
						<th style="width: 30px;"><?php echo $this->Paginator->sort('id','ID'); ?>
						</th>
						<th style="text-align: center; width:230px;"><?php echo $this->Paginator->sort('article_title','Article Title'); ?>
						</th>
						<th style="text-align: center;"><?php echo $this->Paginator->sort('category_name','Category'); ?>
						</th>
						<th style="text-align: center; width:80px;"><?php echo $this->Paginator->sort('article_date','Date'); ?>
						</th>
						<th style="text-align: center;"><?php echo $this->Paginator->sort('article_summary','Article Summary'); ?>
						</th>
						<?php if ($this->Acl->check('Articles','view','Article') == true || $this->Acl->check('Articles','edit','Article') == true || $this->Acl->check('Articles','delete','Article') == true){?>
						<th style="text-align: center; width: 130px;"><?php echo __('Actions'); ?>
						</th>
						<?php } ?>
					</tr>
				</thead>
				<?php
	foreach ($articles as $article): ?>
				<tr>
					<td><?php echo h($article['Article']['id']); ?>&nbsp;</td>
					<td><?php echo h($article['Article']['article_title']); ?>&nbsp;</td>
					<td style="text-align: center;"><?php echo h($article['Category']['category_name']); ?></td>
					<td><?php echo h($article['Article']['article_date']); ?>&nbsp;</td>
					<td><?php echo $article['Article']['article_summary']; ?>&nbsp;</td>
					<?php if ($this->Acl->check('Articles','view','Article') == true || $this->Acl->check('Articles','edit','Article') == true || $this->Acl->check('Articles','delete','Article') == true){?>
					<td style="text-align: center;">
						<?php echo $this->Acl->link(__('View'), array('action' => 'view', $article['Article']['id']),array('class'=>'btn btn-mini')); ?>
						<?php echo $this->Acl->link(__('Edit'), array('action' => 'edit', $article['Article']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
						<?php echo $this->Acl->link(__('Delete'), array('action' => 'delete', $article['Article']['id']),array('class'=>'btn btn-mini btn-danger','onclick' =>'delArticle("'.h($article['Article']['id']).'","'.h($article['Article']['article_title']).'");return false;')); ?>
					</td>
					<?php } ?>
				</tr>
				<?php endforeach; ?>
			</table>
			<p>
				<?php
				echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>
			</p>

			<div class="pagination">
				<ul>
					<?php
					echo $this->Paginator->prev('&larr; ' . __('previous'),array('tag' => 'li','escape' => false));
					echo $this->Paginator->numbers(array('separator' => '','tag'=>'li'));
					echo $this->Paginator->next(__('next') . ' &rarr;', array('tag' => 'li','escape' => false));
					?>
				</ul>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
function cancelSearch(){
	removeUserSearchCookie();
	window.location = '<?php echo Router::url(array('plugin' => 'article','controller' => 'articles','action' => 'index')); ?>';
}
function showAddArticlePage() {
	window.location = "<?php echo Router::url(array('plugin' => 'article','controller' => 'articles','action' => 'add')); ?>";
}
function delArticle(article_id, name) {
    $.sModal({
        image: '<?php echo $this->webroot; ?>img/icons/error.png',
        content: '<?php echo __('Are you sure you want to delete'); ?>  <b>' + name + '</b>?',
        animate: 'fadeDown',
        buttons: [{
            text: ' <?php echo __('Delete'); ?> ',
            addClass: 'btn-danger',
            click: function(id, data) {
                $.post('<?php echo Router::url(array('plugin' => 'article','controller' => 'articles','action' => 'delete')); ?>/' + article_id, {}, function(o) {
	                    $('#container').load('<?php echo Router::url(array('plugin' => 'article','controller' => 'articles','action' => 'index')); ?>', function() {
                        $.sModal('close', id);
                        $('#tab_user_manager').find('a').each(function(){
                    		$(this).click(function(){
                    			removeUserSearchCookie();
                    		});
                    	});
                    });
                }, 'json');
            }
        }, {
            text: ' <?php echo __('Cancel'); ?> ',
            click: function(id, data) {
                $.sModal('close', id);
            }
        }]
        });
}
$(document).ready(function() {
	$('.pagination > ul > li').each(function() {
		if ($(this).children('a').length <= 0) {
			var tmp = $(this).html();
			if ($(this).hasClass('prev')) {
				$(this).addClass('disabled');
			} else if ($(this).hasClass('next')) {
				$(this).addClass('disabled');
			} else {
				$(this).addClass('active');
			}
			$(this).html($('<a></a>').append(tmp));
		}
	});
});
</script>
