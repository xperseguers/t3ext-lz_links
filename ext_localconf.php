<?php
if (!defined ('TYPO3_MODE')) {
	die('Access denied.');
}

/**
 * Example of how to configure a class for extension of another class:
 */
// XCLASS
if (version_compare(TYPO3_version, '6.0.0', '>=')) {
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects']['TYPO3\\CMS\\Backend\\Module\\ModuleLoader'] = array(
		'className' => 'VanZelst\\LzLinks\\Xclass\\ModuleLoader',
	);
} else {
	$GLOBALS['TYPO3_CONF_VARS']['BE']['XCLASS']['t3lib/class.t3lib_loadmodules.php'] = t3lib_extMgm::extPath($_EXTKEY) . 'Classes/v4/class.ux_t3lib_loadmodules.php';
}
