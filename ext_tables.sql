#
# Table structure for table 'tx_lzlinks_links'
#
CREATE TABLE tx_lzlinks_links (
	uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
	pid int(11) unsigned DEFAULT '0' NOT NULL,
	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	title varchar(255) DEFAULT '' NOT NULL,
	type int(11) unsigned DEFAULT '0' NOT NULL,
	url tinytext NOT NULL,
	image blob NOT NULL,
	auth varchar(10) DEFAULT '' NOT NULL,
	parent varchar(30) DEFAULT '0' NOT NULL,
	PRIMARY KEY (uid),
	KEY parent (pid)
);
