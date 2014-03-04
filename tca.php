<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');

$TCA['tx_lzlinks_links'] = Array (
	'ctrl' => $TCA['tx_lzlinks_links']['ctrl'],
	'interface' => Array (
		'showRecordFieldList' => 'hidden,title,type,url,image,auth,parent'
	),
	'feInterface' => $TCA['tx_lzlinks_links']['feInterface'],
	'columns' => Array (
		'hidden' => Array (		
			'exclude' => 1,	
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.hidden',
			'config' => Array (
				'type' => 'check',
				'default' => '0'
			)
		),
		'title' => Array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.title',		
			'config' => Array (
				'type' => 'input',	
				'size' => '30',	
				'eval' => 'required,trim',
			)
		),
		'type' => Array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.type',		
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.type.I.1', '0'),
					Array('LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.type.I.0', '1'),
				),
			)
		),
		'url' => Array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.url',		
			'config' => Array (
				'type' => 'input',	
				'size' => '30',
			)
		),
		'image' => Array (		
			'exclude' => 1,		
			'label' => 'LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.image',		
			'config' => Array (
				'type' => 'group',
				'internal_type' => 'file',
				'allowed' => 'gif,png,jpeg,jpg',	
				'max_size' => 100,	
				'uploadfolder' => 'uploads/tx_lzlinks',
				'show_thumbs' => 1,	
				'size' => 1,	
				'minitems' => 0,
				'maxitems' => 1,
			)
		),
		'auth' => Array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.auth',		
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.auth.I.1', 2),
					Array('LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.auth.I.0', 1),
					Array('LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.auth.I.2', 3),
					Array('LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.auth.I.3', 4),
				),
			)
		),
		'parent' => Array (		
			'exclude' => 0,		
			'label' => 'LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.parent',		
			'config' => Array (
				'type' => 'select',
				'items' => Array (
					Array('LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.parent.I.0', '0'),
				),
				'itemsProcFunc' => 'tx_lzlinks_modules->parentmodules',
			)
		),
	),
	'types' => Array (
		'1' => Array('showitem' => 'hidden;;1;;1-1-1, title;;;;2-2-2, type;;;;3-3-3, url, image, auth'),
		'0' => Array('showitem' => 'hidden;;1;;1-1-1, title;;;;2-2-2, type;;;;3-3-3, url, image, auth, parent')
	),
	'palettes' => Array (
		'1' => Array('showitem' => '')
	)
);
?>
