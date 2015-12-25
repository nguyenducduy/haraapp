<?php

use Phinx\Migration\AbstractMigration;

class CreateUserTable extends AbstractMigration
{
    public function up()
    {
        $this->execute("
            CREATE TABLE `ph_user` (
                `u_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                `u_name` varchar(255) DEFAULT NULL,
                `u_email` varchar(100) DEFAULT NULL,
                `u_password` varchar(100) NOT NULL,
                `u_role` int(4) DEFAULT NULL,
                `u_avatar` varchar(155) DEFAULT '',
                `u_status` int(2) DEFAULT NULL,
                `u_datecreated` int(10) DEFAULT '0',
                `u_datemodified` int(10) DEFAULT '0',
                PRIMARY KEY (`u_id`),
                KEY `u_email` (`u_email`),
                KEY `u_password` (`u_password`),
                KEY `u_status` (`u_status`)
            ) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
        ");

        $this->execute("
            INSERT INTO `ph_user` (
                `u_name`,
                `u_email`,
                `u_password`,
                `u_role`,
                `u_avatar`,
                `u_status`,
                `u_datecreated`,
                `u_datemodified`
            )
            VALUES (
                'Administrator',
                'admin@gmail.com',
                '$2a$10\$PJehDw4B6307JZe4yCCWROxGEJd2h6lYrbBRO0oeWs/UmZp/Ksp0a',
                5,
                '',
                1,
                ". time() .",
                0
            );
        ");
    }
}
