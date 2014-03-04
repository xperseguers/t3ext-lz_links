<?php
if (!defined ('TYPO3_MODE'))    die ('Access denied.');

/**
 * Example of how to configure a class for extension of another class:
 */


$TYPO3_CONF_VARS['BE']['XCLASS']['t3lib/class.t3lib_loadmodules.php']=t3lib_extMgm::extPath($_EXTKEY).'class.ux_t3lib_loadmodules.php';

?>
