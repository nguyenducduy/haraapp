<?php

use Phinx\Migration\AbstractMigration;

class CreateStoreTable extends AbstractMigration
{
    public function up()
    {
		$this->execute("
			CREATE TABLE `ph_store` (
				`st_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				`st_name` varchar(100) DEFAULT NULL,
				`st_access_token` text,
				`st_status` tinyint(2) DEFAULT NULL,
				`st_config` tinyint(2) DEFAULT NULL,
				`st_mapped` tinyint(2) DEFAULT NULL,
				`st_datecreated` int(10) DEFAULT NULL,
				`st_datemodified` int(10) DEFAULT NULL,
				PRIMARY KEY (`st_id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;
		");
    }
}
