<?php
/**
 * @copyright	Copyright (C) 2013 Cook Self Service. All rights reserved.
 * @author		J. HUARD (http://j-cook.pro) - G. Tomaselli (http://bygiro.com)
 * @license     MIT License (MIT)
 */
 
defined('_JEXEC') or die;

@define("DS", DIRECTORY_SEPARATOR);
@define('PATH_LIBRARY_JDOM', JPATH_SITE . DS . 'libraries' . DS . 'jdom');

jimport('joomla.version');
$version = new JVersion();

if (!class_exists('CkJLoader'))
{
	// Joomla! 1.6 - 1.7
	if (version_compare($version->RELEASE, '2.5', '<'))
	{
		// Load the missing class file
		require_once(PATH_LIBRARY_JDOM .DS. 'legacy' .DS. 'loader.php');
				
		// Register the autoloader functions.
		CkJLoader::setup();
	}
	
	
	//Joomla! 2.5 and later
	else
	{	
		class CkJLoader extends JLoader{}
	}
}



/**
 * Jdom plugin class.
 *
 * @package     Joomla.plugin
 * @subpackage  System.jdom
 */ 
class plgSystemJdom extends JPlugin
{
    public function onAfterInitialise()
    {
		JLoader::register('JDom', JPATH_SITE . DS . 'libraries' . DS . 'jdom' . DS . 'dom.php');
    }
}