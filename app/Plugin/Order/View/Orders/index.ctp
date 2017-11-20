<div class="container">
	<h2>
		<?php echo __('Order Manager'); ?>
	</h2>

	<div class="row-fluid show-grid">
		<?php if ($this->Acl->check('Orders','add','Order') == true){?>
		<div class="span12" style="text-align: right;">
			<button class="btn btn-success" type="button"
				onclick="showAddOrderPage();">
				<i class="icon-plus icon-white"></i>
				<?php echo __('Order'); ?>
			</button>
		</div>
		<?php }?>
	</div>
	<?php echo $this->Form->create('Order', array('action' => 'index','class'=>' form-signin form-horizontal')); ?>
	<div class="row-fluid show-grid">
		<div class="span12">
			<div class="input-append">
				<?php echo $this->Form->input('filter',array('div' => false,'label'=>false,'placeholder'=>"Search Order name",'class'=>'input-xlarge')); ?>
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
						<th style="width: 15px;"><?php echo $this->Paginator->sort('id','ID'); ?>
						</th>
						<?php if($role==1):?>
						<th style="text-align: center;"><?php echo $this->Paginator->sort('buyer_id','Buyer'); ?>
						</th>
						<th style="text-align: center;"><?php echo $this->Paginator->sort('owner_id','Owner'); ?>
						</th>
						<?php else:?>
						<th style="text-align: center;"><?php echo ('Role'); ?>
						<?php endif;?>
						<th style="text-align: center;"><?php echo ('Product'); ?>
						</th>
						<th style="text-align: center;"><?php echo $this->Paginator->sort('status','Status'); ?>
						</th>
						<th style="text-align: center; width:130px;"><?php echo $this->Paginator->sort('created','Created'); ?>
						</th>
						<?php if ($this->Acl->check('Orders','view','Order') == true || $this->Acl->check('Orders','edit','Order') == true || $this->Acl->check('Orders','delete','Order') == true){?>
						<th style="text-align: center; width: 130px;"><?php echo __('Actions'); ?>
						</th>
						<?php } ?>
					</tr>
				</thead>
				<?php
	foreach ($orders as $order): ?>
				<tr>
					<td><?php echo h($order['Order']['id']); ?>&nbsp;</td>
					<?php if($role==1):?>
					<td><?php echo h($order['Order']['buyer_id']); ?>&nbsp;</td>
					<td><?php echo h($order['Order']['owner_id']); ?>&nbsp;</td>
					<?php else:?>
					<td><?php echo ($order['Order']['owner_id']==$role?"Creator":"Consumer"); ?>&nbsp;</td>
					<?php endif;?>
					<td>
						<ul>
						<?php $matchs = explode(',',$order['Order']['product_id'],-1);?>
						<?php foreach($matchs as $match):?>
							<li>
							<?php echo $products[$match];?>
						</li>
						<?php endforeach;?>
						</ul>
					</td>


					<td><?php echo ($order['Order']['status']); ?>&nbsp;</td>
					<td><?php echo $order['Order']['created']; ?>&nbsp;</td>
					<?php if ($this->Acl->check('Orders','view','Order') == true || $this->Acl->check('Orders','edit','Order') == true || $this->Acl->check('Orders','delete','Order') == true){?>
					<td style="text-align: center;">
						<?php echo $this->Acl->link(__('View'), array('action' => 'view', $order['Order']['id']),array('class'=>'btn btn-mini')); ?>
						<?php if($order['Order']['owner_id']==$role || $role==1):?>
							<?php echo $this->Acl->link(__('Edit'), array('action' => 'edit', $order['Order']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
						<?php endif;?>
						<?php echo $this->Acl->link(__('Delete'), array('action' => 'delete', $order['Order']['id']),array('class'=>'btn btn-mini btn-danger','onclick' =>'delOrder("'.h($order['Order']['id']).'");return false;')); ?>
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
	window.location = '<?php echo Router::url(array('plugin' => 'order','controller' => 'orders','action' => 'index')); ?>';
}
function showAddOrderPage() {
	window.location = "<?php echo Router::url(array('plugin' => 'order','controller' => 'orders','action' => 'add')); ?>";
}
function delOrder(order_id, name) {
    $.sModal({
        image: '<?php echo $this->webroot; ?>img/icons/error.png',
        content: '<?php echo __('Are you sure you want to delete'); ?>  <b>' + name + '</b>?',
        animate: 'fadeDown',
        buttons: [{
            text: ' <?php echo __('Delete'); ?> ',
            addClass: 'btn-danger',
            click: function(id, data) {
                $.post('<?php echo Router::url(array('plugin' => 'order','controller' => 'orders','action' => 'delete')); ?>/' + order_id, {}, function(o) {
	                    $('#container').load('<?php echo Router::url(array('plugin' => 'order','controller' => 'orders','action' => 'index')); ?>', function() {
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
