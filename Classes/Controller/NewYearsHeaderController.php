<?php

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2015 Jari-Hermann Ernst <jari-hermann.ernst@bad-gmbh.de>, B·A·D GmbH
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 *
 *
 * @package jhe_newyearsheader
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class Tx_JheNewyearsheader_Controller_NewYearsHeaderController extends Tx_Extbase_MVC_Controller_ActionController {

	/**
	 * action index
	 *
	 * @return void
	 */
	public function indexAction() {

		$arrGreetingsUnexploded = explode(',', $this->settings['greetings']['value']);

		$strLang = '';

		foreach($arrGreetingsUnexploded as $greeting){
			$arrGreeting = explode('|', $greeting);

			if($arrGreeting[0] && $arrGreeting[1]) {
				$arrGreetingsForSettings[] = array('lang' => trim($arrGreeting[0]), 'text' => trim($arrGreeting[1]));
				$strLang .= trim($arrGreeting[0] . ',');
			}
		}

		$this->settings['greetings'] = $arrGreetingsForSettings;
		$this->settings['languages'] = $strLang;


		//integrate jquery.countdown and other necessary modules
		$GLOBALS['TSFE']->additionalHeaderData['tx_jhenewyearsheader'] = '
			<script type="text/javascript" src="' . t3lib_extMgm::siteRelPath($this->request->getControllerExtensionKey()) . 'Resources/Public/JavaScript/fireworks.js"></script>
			<script type="text/javascript" src="' . t3lib_extMgm::siteRelPath($this->request->getControllerExtensionKey()) . 'Resources/Public/JavaScript/newyearsheader.js"></script>
			<link rel="stylesheet" type="text/css" href="' . t3lib_extMgm::siteRelPath($this->request->getControllerExtensionKey()) . 'Resources/Public/Css/newyearsheader.css" media="screen" />
			<link rel="stylesheet" type="text/css" href="' . t3lib_extMgm::siteRelPath($this->request->getControllerExtensionKey()) . 'Resources/Public/Css/fireworks.css" media="screen" />
		';

		$this->view->assign(settings, $this->settings);
	}

}
?>