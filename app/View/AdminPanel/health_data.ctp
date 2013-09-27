<h1 class="module-title"><?php echo $this->Html->image('/img/Actions-view-list-icons-icon.png', array('alt' => "Admin Panel - Modules icon", 'escape' => false, 'class'=> 'img-thumbnail'));?>
Admin Panel - Module Data - <?php echo $module['Module']['name'];?></h1>
<?php
	echo $this->requestAction('/admin/'.$module['Module']['base_url'].'/module_data');
?>