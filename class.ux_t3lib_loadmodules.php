<?php

/**
 * Extension of the t3lib_TStemplate class.
 *
 * This is just a simple example. The method printTitle() in t3lib_TStemplate is overridden 
 * by this method. The parent class' function called so the correct title is set, BUT the title
 * is wrapped with "::" both left and right. Just an example of how to extend classes in Typo3.
 */

require_once (t3lib_extMgm::extPath('lz_links') . '/class.tx_lzlinks_modules.php');
require_once (PATH_t3lib . 'class.t3lib_stdgraphic.php');
//require_once (PATH_site . 'tslib/class.tslib_gifbuilder.php');

class ux_t3lib_loadmodules extends t3lib_loadmodules {
	function load($modulesArray, $BE_USER='') {
		$auths = array(1=>'admin', 2=>'user,group',3=>'user',4=>'group');
		parent::load($modulesArray, $BE_USER);
		$modules_obj = t3lib_div::makeInstance('tx_lzlinks_modules');
		$modules = (array) $modules_obj->getModules();
			// get the image upload folder!
	 	t3lib_div::loadTCA('tx_lzlinks_links');
		$upfolder = $GLOBALS['TCA']['tx_lzlinks_links']['columns']['image']['config']['uploadfolder'];

			//prepare the stdgraphic object for downscaling images;
		$stdgraphic = t3lib_div::makeInstance("t3lib_stdgraphic");
		$stdgraphic->init();
		$stdgraphic->tempPath = PATH_site . $stdgraphic->tempPath;

		while(list(,$mod) = each($modules)) {
				// add the modules. checkaccess has to be called (it also adds the modules to the list (used for permissions))
			$mod['auth'] = $auths[$mod['auth']];
			if($mod['type'] == 1) {
				if(!$this->checkModAccess($name = 'txlzlinksM' . $mod['uid'], array('access' => $mod['auth']))) continue;
				$this->modules[$name]['name'] = $name;
				$this->modules[$name]['script'] = $mod['url'] ? '../' . t3lib_extMgm::siteRelPath('lz_links') . '/jump.php?url=' . rawurlencode($mod['url']): 'dummy.html';
			} else if(is_numeric($mod['parent'])) {
				if(!$this->checkModAccess($name =  'txlzlinksM' . $mod['parent'] . '_txlzlinksM' . $mod['uid'], array('access' => $mod['auth']))) continue;
				$name = $this->modules['txlzlinksM' . $mod['parent']]['sub']['txlzlinksM' . $mod['uid']]['name'] = $name;
				$this->modules['txlzlinksM' . $mod['parent']]['sub']['txlzlinksM' . $mod['uid']]['script'] = $mod['url'] ? '../' .t3lib_extMgm::siteRelPath('lz_links') . 'jump.php?url=' . rawurlencode($mod['url']): 'dummy.html';
			} else {
				if(!$this->checkModAccess($name =  $mod['parent'] . '_txlzlinksM' . $mod['uid'], array('access' => $mod['auth']))) continue;
				$name = $this->modules[$mod['parent']]['sub']['txlzlinksM' . $mod['uid']]['name'] = $mod['parent'] . '_txlzlinksM' . $mod['uid'];
				$this->modules[$mod['parent']]['sub']['txlzlinksM' . $mod['uid']]['script'] = $mod['url'] ? '../' . t3lib_extMgm::siteRelPath('lz_links') . 'jump.php?url=' . rawurlencode($mod['url']): 'dummy.html';
			}
			unset($MLANG);

				// downscale and add the icon
			$imgpath = PATH_site . $upfolder . '/' . $mod['image'];
			$icon = $stdgraphic->imageMagickConvert($imgpath,NULL,NULL,NULL,NULL,NULL,array('maxH' => '18', 'maxW' => '18'));
			$MLANG['default']['tabs_images']['tab'] = $icon[3];

				// add the labels
			$MLANG["default"]["labels"]["tablabel"] = $mod['title'];
			$MLANG["default"]["labels"]["tabdescr"] = $mod['title'];
			$MLANG["default"]["tabs"]["tab"] = $mod['title'];
//todo!!!
			if(@method_exists($GLOBALS['LANG'], 'addLanguage')) {	// if typo3 version 3.5.0 (and below?)
				$GLOBALS['LANG']->addLanguage($MLANG["default"],$name."_");
			} elseif(@method_exists($GLOBALS['LANG'], 'addModuleLabels')) {	// if typo3 version 3.6.0-dev (and above?)
				$GLOBALS['LANG']->addModuleLabels($MLANG["default"],$name."_"); 
			}
		}
		return;
	}
}
if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/lz_links/class.ux_t3lib_loadmodules.php"])       {
        include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/lz_links/class.ux_t3lib_loadmodules.php"]);
}

?>
