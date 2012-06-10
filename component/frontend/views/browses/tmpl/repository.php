<?php
/**
 * @package AkeebaReleaseSystem
 * @copyright Copyright (c)2010-2012 Nicholas K. Dionysopoulos
 * @license GNU General Public License version 3, or later
 */

defined('_JEXEC') or die();

$this->loadHelper('router');
$this->loadHelper('chameleon');

$Itemid = FOFInput::getInt('Itemid', 0, $this->input);
?>
<?php if($this->params->get('show_page_heading', 1)): ?>
	<h2 class="componentheading<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>"><?php echo $this->escape($this->params->get('page_title')); ?></h2>
<?php endif; ?>

<?php if( array_key_exists('all', $this->items) ): ?>
<div id="ars-categories-all">
	<?php if(!empty($this->items)): ?>
	<?php foreach($this->vgroups as $vgroupID => $vgroupTitle): ?>
	<?php $echoedVgroupTitle = false; ?>
	<?php
		foreach($this->items['all'] as $id => $item):
			if($item->vgroup_id != $vgroupID) continue;
			if(!$echoedVgroupTitle) {
				$echoedVgroupTitle = true;
				if($vgroupTitle):?>
<h3><?php echo $vgroupTitle; ?></h3>
				<?php endif;
			}
			$catURL = AKRouter::_('index.php?option=com_ars&view=category&id='.$item->id.'&Itemid='.$Itemid);
			$title = "<a href=\"$catURL\">{$item->title}</a>";
			$params = ArsHelperChameleon::getParams('category');
			@ob_start();
			@$this->loadAnyTemplate('site:com_ars/browses/category');
			$contents = ob_get_clean();
			$module = ArsHelperChameleon::getModule($title, $contents, $params);
			echo JModuleHelper::renderModule($module, $params);
		endforeach;
	?>
	<?php endforeach; ?>
	<?php else: ?>
	<div class="ars-nocategories">
		<?php echo JText::_('ARS_NO_CATEGORIES'); ?>
	</div>
	<?php endif; ?>
</div>
<?php else: ?>
<div id="ars-categories-normal">
	<h2><?php echo JText::_('ARS_CATEGORY_NORMAL'); ?></h2>

	<?php if(!empty($this->items['normal'])): ?>
	<?php foreach($this->vgroups as $vgroupID => $vgroupTitle): ?>
	<?php $echoedVgroupTitle = false; ?>
	<?php
		foreach($this->items['normal'] as $id => $item):
			if($item->vgroup_id != $vgroupID) continue;
			if(!$echoedVgroupTitle) {
				$echoedVgroupTitle = true;
				if($vgroupTitle):?>
<h3><?php echo $vgroupTitle; ?></h3>
				<?php endif;
			}
			$catURL = AKRouter::_('index.php?option=com_ars&view=category&id='.$item->id.'&Itemid='.$Itemid);
			$title = "<a href=\"$catURL\">{$item->title}</a>";
			$params = ArsHelperChameleon::getParams('category');
			@ob_start();
			@$this->loadAnyTemplate('site:com_ars/browses/category');
			$contents = ob_get_clean();
			$module = ArsHelperChameleon::getModule($title, $contents, $params);
			echo JModuleHelper::renderModule($module, $params);
		endforeach;
	?>
	<?php endforeach; ?>
	<?php else: ?>
	<div class="ars-noitems">
		<?php echo JText::_('ARS_NO_CATEGORIES'); ?>
	</div>
	<?php endif; ?>
</div>

<div id="ars-categories-bleedingedge">
	<h2><?php echo JText::_('ARS_CATEGORY_BLEEDINGEDGE'); ?></h2>

	<?php if(!empty($this->items['bleedingedge'])): ?>
	<?php foreach($this->vgroups as $vgroupID => $vgroupTitle): ?>
	<?php $echoedVgroupTitle = false; ?>
	<?php
		foreach($this->items['bleedingedge'] as $id => $item):
			if($item->vgroup_id != $vgroupID) continue;
			if(!$echoedVgroupTitle) {
				$echoedVgroupTitle = true;
				if($vgroupTitle):?>
<h3><?php echo $vgroupTitle; ?></h3>
				<?php endif;
			}
			$catURL = AKRouter::_('index.php?option=com_ars&view=category&id='.$item->id.'&Itemid='.$Itemid);
			$title = "<a href=\"$catURL\">{$item->title}</a>";
			$params = ArsHelperChameleon::getParams('category', true);
			@ob_start();
			@$this->loadAnyTemplate('site:com_ars/browses/category');
			$contents = ob_get_clean();
			$module = ArsHelperChameleon::getModule($title, $contents, $params);
			echo JModuleHelper::renderModule($module, $params);
		endforeach;
	?>
	<?php endforeach; ?>
	<?php else: ?>
	<div class="ars-noitems">
		<?php echo JText::_('ARS_NO_CATEGORIES'); ?>
	</div>
	<?php endif; ?>
</div>

<?php endif; ?>