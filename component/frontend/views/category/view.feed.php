<?php
/**
 * @package AkeebaReleaseSystem
 * @copyright Copyright (c)2010 Nicholas K. Dionysopoulos
 * @license GNU General Public License version 3, or later
 * @version $Id$
 */

defined('_JEXEC') or die('Restricted Access');

jimport('joomla.application.component.view');

class ArsViewCategory extends JView
{
	function  display($tpl = null) {
		$model  = $this->getModel();

		$document = JFactory::getDocument();
		$document->setLink(JRoute::_('index.php?option=com_ars&view=category&id='.$model->item->id));

		if(empty($model->itemList)) return;
		foreach($model->itemList as $rel)
		{
			$item = new JFeedItem();
			$user = JFactory::getUser($rel->created_by);

			$item->author = $user->name;
			$item->title = $this->escape($model->item->title.' '.$rel->version);
			$item->category = $this->escape($model->item->title);
			$item->date = date('r', strtotime($rel->created));
			$item->description = $rel->notes;
			$item->link = $this->escape(JRoute::_(JURI::base().'index.php?option=com_ars&view=release&id='.$rel->id));
			$item->pubDate = date('r');

			$document->addItem($item);
		}
	}
}