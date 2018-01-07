<div class="container">
	<h2>
		<?php echo __('Product Manager'); ?>
	</h2>

	<div class="row-fluid show-grid">
		<?php if ($this->Acl->check('Products','add','Product') == true){?>
		<div class="span12" style="text-align: right;">
			<button class="btn btn-success" type="button"
				onclick="showAddProductPage();">
				<i class="icon-plus icon-white"></i>
				<?php echo __('Product'); ?>
			</button>
		</div>
		<?php }?>
	</div>
	<?php echo $this->Form->create('Product', array('action' => 'index','class'=>' form-signin form-horizontal')); ?>
	<div class="row-fluid show-grid">
		<div class="span12">
			<div class="input-append">
				<?php echo $this->Form->input('filter',array('div' => false,'label'=>false,'placeholder'=>"Search Product name",'class'=>'input-xlarge')); ?>
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
						<th style="text-align: center; width:60px;"><?php echo $this->Paginator->sort('name','Product Name'); ?>
						</th>
						<th style="text-align: center;"><?php echo $this->Paginator->sort('description','Description'); ?>
						</th>
						<th style="text-align: center;"><?php echo $this->Paginator->sort('category','Category'); ?>
						</th>
						<th style="text-align: center; width:10px;"><?php echo $this->Paginator->sort('price','Price'); ?>
						</th>
						<!--
						<th style="text-align: center; width:10px;"><?php echo $this->Paginator->sort('orders','Order'); ?>
						</th>
						<th style="text-align: center; width:10px;"><?php echo $this->Paginator->sort('sales','Sales'); ?>
						</th>
						-->
						<th style="text-align: center; width:10px;"><?php echo $this->Paginator->sort('active','Active'); ?>
						</th>
						<?php if ($this->Acl->check('Products','view','Product') == true || $this->Acl->check('Products','edit','Product') == true || $this->Acl->check('Products','delete','Product') == true){?>
						<th style="text-align: center; width: 130px;"><?php echo __('Actions'); ?>
						</th>
						<?php } ?>
					</tr>
				</thead>
				<?php
	foreach ($products as $product): ?>
				<tr>
					<td><?php echo h($product['Product']['id']); ?>&nbsp;</td>
					<td><?php echo h($product['Product']['name']); ?>&nbsp;</td>
					<td><?php echo $product['Product']['description']; ?>&nbsp;</td>
					<td><?php echo ($product['Product']['category']); ?>&nbsp;</td>
					<td><?php echo ($product['Product']['price']); ?>&nbsp;</td>
					<!--
					<td><?php echo ($product['Product']['orders']); ?>&nbsp;</td>
					<td><?php echo $product['Product']['sales']; ?>&nbsp;</td>
					-->
					<td><?php echo $product['Product']['active']?"Yes":"NO"; ?>&nbsp;</td>
					<?php if ($this->Acl->check('Products','view','Product') == true || $this->Acl->check('Products','edit','Product') == true || $this->Acl->check('Products','delete','Product') == true){?>
					<td style="text-align: center;">
						<?php echo $this->Acl->link(__('View'), array('action' => 'view', $product['Product']['id']),array('class'=>'btn btn-mini')); ?>
						<?php echo $this->Acl->link(__('Edit'), array('action' => 'edit', $product['Product']['id']),array('class'=>'btn btn-mini btn-primary')); ?>
						<?php echo $this->Acl->link(__('Delete'), array('action' => 'delete', $product['Product']['id']),array('class'=>'btn btn-mini btn-danger','onclick' =>'delProduct("'.h($product['Product']['id']).'","'.h($product['Product']['name']).'");return false;')); ?>
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
	window.location = '<?php echo Router::url(array('plugin' => 'product','controller' => 'products','action' => 'index')); ?>';
}
function showAddProductPage() {
	window.location = "<?php echo Router::url(array('plugin' => 'product','controller' => 'products','action' => 'add')); ?>";
}
function delProduct(product_id, name) {
    $.sModal({
        image: '<?php echo $this->webroot; ?>img/icons/error.png',
        content: '<?php echo __('Are you sure you want to delete'); ?>  <b>' + name + '</b>?',
        animate: 'fadeDown',
        buttons: [{
            text: ' <?php echo __('Delete'); ?> ',
            addClass: 'btn-danger',
            click: function(id, data) {
                $.post('<?php echo Router::url(array('plugin' => 'product','controller' => 'products','action' => 'delete')); ?>/' + product_id, {}, function(o) {
	                    $('#container').load('<?php echo Router::url(array('plugin' => 'product','controller' => 'products','action' => 'index')); ?>', function() {
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
