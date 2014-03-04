<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2003 Luite van Zelst (luite@aegee.org)
*  All rights reserved
*
*  This script is part of the Typo3 project. The Typo3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
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
 * Class/Function which manipulates the item-array for table/field tx_lzlinks_links_parent.
 *
 * @author	Luite van Zelst <luite@aegee.org>
 */
class tx_lzlinks_modules {

	public function parentmodules(&$params, &$pObj) {
		$mods = $this->getModules();
		$tbe = $GLOBALS['TBE_MODULES'];
		reset($tbe);
		while (list($mod,) = each($tbe)) {
			if (!is_array($mod) && ! strstr($mod, '_') && !strstr($mod,'spacer')) {
				$params['items'][] = array($mod, $mod);
			}
		}
		while(list(,$mod) = each($mods)) {
			if ($mod['type'] && !$mod['parent']) {
				$params['items'][] = array($mod['title'], $mod['uid']);
			}
		}
	}

	/**
	 * Returns the modules.
	 *
	 * @return array
	 */
	public function getModules() {
		$modules = $GLOBALS['TYPO3_DB']->exec_SELECTgetRows(
			'uid, title, type, parent, url, image, auth',
			'tx_lzlinks_links',
			'hidden=0' . t3lib_BEfunc::deleteClause('tx_lzlinks_link')
		);
		return $modules;
	}
}


if (defined('TYPO3_MODE') && $GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/lz_links/class.tx_lzlinks_modules.php']) {
	include_once($GLOBALS['TYPO3_CONF_VARS'][TYPO3_MODE]['XCLASS']['ext/lz_links/class.tx_lzlinks_modules.php']);
}
