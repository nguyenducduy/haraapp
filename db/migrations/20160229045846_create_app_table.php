<?php

use Phinx\Migration\AbstractMigration;

class CreateAppTable extends AbstractMigration
{
    public function up()
    {
		$this->execute("
			CREATE TABLE `ph_app` (
				`a_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
				`a_api_key` varchar(255) DEFAULT NULL,
				`a_redirect_url` varchar(255) DEFAULT NULL,
				`a_permissions` varchar(255) DEFAULT NULL,
				`a_shared_secret` varchar(255) DEFAULT NULL,
				PRIMARY KEY (`a_id`)
			) ENGINE=MyISAM DEFAULT CHARSET=utf8;
		");
    }
}
