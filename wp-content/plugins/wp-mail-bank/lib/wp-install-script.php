<?php
if(!function_exists("create_table_mail_detail"))
{
	function create_table_mail_detail()
	{
		$sql = "CREATE TABLE ". wp_mail_bank()." (
				id INTEGER(10) NOT NULL AUTO_INCREMENT,
				from_name VARCHAR(100),
				from_email VARCHAR(100),
				mailer_type INTEGER(1),
				return_path INTEGER(1),
				return_email VARCHAR(100),
				smtp_host VARCHAR(100),
				smtp_port INTEGER(5),
				word_wrap INTEGER(10),
				encryption INTEGER(1),
				smtp_keep_alive INTEGER(5),
				authentication INTEGER(1),
				smtp_username VARCHAR(100),
				smtp_password VARCHAR(100),
				PRIMARY KEY (id)
				) DEFAULT CHARSET=utf8 COLLATE utf8_general_ci";
		dbDelta($sql);
	}
}
global $wpdb;
require_once(ABSPATH . "wp-admin/includes/upgrade.php");
if (count($wpdb->get_var("SHOW TABLES LIKE '" . wp_mail_bank() . "'")) == 0)
{
	create_table_mail_detail();
	$wpdb->query
	(
		$wpdb->prepare
		(
			"INSERT INTO " . wp_mail_bank() . " (from_name, from_email,mailer_type,return_path,return_email,smtp_host,smtp_port,word_wrap,encryption,smtp_keep_alive,authentication,smtp_username,smtp_password)
			VALUES(%s, %s, %d, %d, %s, %s, %d, %d, %d, %d, %d, %s, %s)",
			"Wordpress",
			get_option("admin_email"),
			1,
			1,
			"",
			"",
			25,
			50,
			0,
			1,
			0,
			"",
			""
		)
	);
}
$option_auto_update_mail = get_option("mail-bank-automatic-update");
if($option_auto_update_mail)
{
	update_option("mail-bank-automatic-update", "1");
}
?>