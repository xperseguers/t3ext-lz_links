<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

if (TYPO3_MODE=='BE')	include_once(t3lib_extMgm::extPath('lz_links').'class.tx_lzlinks_modules.php');

$TCA['tx_lzlinks_links'] = Array (
	'ctrl' => Array (
		'title' => 'LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links',		
		'label' => 'title',	
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'type' => 'type',	
		'default_sortby' => 'ORDER BY crdate',	
		'delete' => 'deleted',	
		'enablecolumns' => Array (		
			'disabled' => 'hidden',
		),
		'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY)."tca.php",
		'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY)."icon_tx_lzlinks_links.png",
	),
	'feInterface' => Array (
		'fe_admin_fieldList' => 'hidden, title, type, url, image, auth, parent',
	)
);
?>
