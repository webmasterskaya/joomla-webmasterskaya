<?php
/**
 * @package    System - Webmasterskaya
 * @version    1.0.0
 * @author     Artem Vasilev - webmasterskaya.xyz
 * @copyright  Copyright (c) 2018 - 2021 Webmasterskaya. All rights reserved.
 * @license    MIT, see LICENSE.txt
 * @link       https://webmasterskaya.xyz/
 */

defined('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;

class PlgSystemWebmasterskaya extends CMSPlugin
{
	/**
	 * Affects constructor behavior. If true, language files will be loaded automatically.
	 *
	 * @var    boolean
	 * @since  1.0.0
	 */
	protected $autoloadLanguage = true;

	public function onAfterInitialise()
	{
		$paths = [
			'ProductionCalendar' => JPATH_LIBRARIES
				. '/lib_production_calendar/ProductionCalendar',
		];
		foreach ($paths as $class => $path)
		{
			if (is_dir($path))
			{
				JLoader::registerNamespace(
					'Webmasterskaya\\' . $class,
					$path,
					false,
					false,
					'psr4'
				);
			}
		}
	}
}
