<?php
if (!defined ('TYPO3_MODE')) {
	die('Access denied.');
}

$GLOBALS['TCA']['tx_lzlinks_links'] = array(
	'ctrl' => $GLOBALS['TCA']['tx_lzlinks_links']['ctrl'],
	'interface' => array(
		'showRecordFieldList' => 'hidden,title,type,url,image,auth,parent'
	),
	'feInterface' => $GLOBALS['TCA']['tx_lzlinks_links']['feInterface'],
	'columns' => array(
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.php:LGL.hidden',
			'config' => array(
				'type' => 'check',
				'default' => '0'
			)
		),
		'title' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.title',
			'config' => array(
				'type' => 'input',
				'size' => '30',
				'eval' => 'required,trim',
			)
		),
		'type' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.type',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.type.I.1', '0'),
					array('LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.type.I.0', '1'),
				),
			)
		),
		'url' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.url',
			'config' => array(
				'type' => 'input',
				'size' => '30',
			)
		),
		'image' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.image',
			'config' => array(
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
		'auth' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.auth',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.auth.I.1', 2),
					array('LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.auth.I.0', 1),
					array('LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.auth.I.2', 3),
					array('LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.auth.I.3', 4),
				),
			)
		),
		'parent' => array(
			'exclude' => 0,
			'label' => 'LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('LLL:EXT:lz_links/locallang_db.php:tx_lzlinks_links.parent.I.0', '0'),
				),
				'itemsProcFunc' => 'tx_lzlinks_modules->parentmodules',
			)
		),
	),
	'types' => array(
		'1' => array('showitem' => 'hidden;;1;;1-1-1, title;;;;2-2-2, type;;;;3-3-3, url, image, auth'),
		'0' => array('showitem' => 'hidden;;1;;1-1-1, title;;;;2-2-2, type;;;;3-3-3, url, image, auth, parent')
	),
	'palettes' => array(
		'1' => array('showitem' => '')
	)
);
