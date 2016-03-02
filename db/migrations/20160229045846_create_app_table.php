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

        $this->execute("
            INSERT INTO `ph_app` (
                `a_api_key`,
                `a_redirect_url`,
                `a_permissions`,
                `a_shared_secret`
            )
            VALUES (
                '2f473d7bb160533c9535985ff068cc56',
                'https://haraapp.dev/import/install',
                'read_products, write_products',
                'a2215c821d61d89169d51eccfa9d8341'
            );
        ");
    }
}
