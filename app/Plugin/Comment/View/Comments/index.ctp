<div class="container">
	<h2>
		<?php echo __('Comment Manager'); ?>
	</h2>
	<?php echo $this->Form->create('Comment', array('action' => 'index','class'=>' form-signin form-horizontal')); ?>
	<div class="row-fluid show-grid">
		<div class="span12">
			<div class="input-append">
				<?php echo $this->Form->input('filter',array('div' => false,'label'=>false,'placeholder'=>"Search Comment title",'class'=>'input-xlarge')); ?>
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
						<th style=""><?php echo $this->Paginator->sort('active','Active'); ?>
						</th>
						<th style="text-align: center;"><?php echo $this->Paginator->sort('user_id','User'); ?>
						</th>
						<th style="text-align: center;"><?php echo $this->Paginator->sort('poduct_id','Product'); ?>
						</th>
						<th style="text-align: center;"><?php echo $this->Paginator->sort('name','Tag'); ?>
						</th>
						<th style="text-align: center;"><?php echo $this->Paginator->sort('content','Content'); ?>
						</th>
						<th style="text-align: center;"><?php echo $this->Paginator->sort('created','Created'); ?>
						</th>
						<?php if ($this->Acl->check('Comments','view','Comment') == true || $this->Acl->check('Comments','edit','Comment') == true || $this->Acl->check('Comments','delete','Comment') == true){?>
						<th style="text-align: center; width: 30px;"><?php echo __('Actions'); ?>
						</th>
						<?php } ?>
					</tr>
				</thead>
				<?php
	foreach ($comments as $comment): ?>
				<tr>
					<td><?php echo h($comment['Comment']['active'])=="1"?"Y":"N"; ?>&nbsp;</td>
					<td><?php echo h($users[$comment['Comment']['user_id']]); ?>&nbsp;</td>
					<td><?php echo h($products[$comment['Comment']['product_id']]); ?>&nbsp;</td>
					<td><?php echo h($comment['Comment']['name']); ?>&nbsp;</td>
					<td><?php echo h($comment['Comment']['content']); ?>&nbsp;</td>
					<td><?php echo $comment['Comment']['created']; ?>&nbsp;</td>
					<?php if ($this->Acl->check('Comments','view','Comment') == true || $this->Acl->check('Comments','edit','Comment') == true || $this->Acl->check('Comments','delete','Comment') == true){?>
					<td style="text-align: center;">
						<?php echo $this->Acl->link(__('View'), array('action' => 'view', $comment['Comment']['id']),array('class'=>'btn btn-mini')); ?>
						<?php echo $this->Acl->link(__('Edit'), array('action' => 'edit', $comment['Comment']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
						<?php echo $this->Acl->link(__('Delete'), array('action' => 'delete', $comment['Comment']['id']),array('class'=>'btn btn-mini btn-danger','onclick' =>'delComment("'.h($comment['Comment']['id']).'");return false;')); ?>
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
	window.location = '<?php echo Router::url(array('plugin' => 'comment','controller' => 'comments','action' => 'index')); ?>';
}
function delComment(comment_id) {
    $.sModal({
        image: '<?php echo $this->webroot; ?>img/icons/error.png',
        content: '<?php echo __('Are you sure you want to delete?'); ?> ',
        animate: 'fadeDown',
        buttons: [{
            text: ' <?php echo __('Delete'); ?> ',
            addClass: 'btn-danger',
            click: function(id, data) {
                $.post('<?php echo Router::url(array('plugin' => 'comment','controller' => 'comments','action' => 'delete')); ?>/' + comment_id, {}, function(o) {
	                    $('#container').load('<?php echo Router::url(array('plugin' => 'comment','controller' => 'comments','action' => 'index')); ?>', function() {
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
