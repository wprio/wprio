<?php
//--------------------------------------------------------------------------------------------------------------//
// CODE FOR CREATING MENUS
//---------------------------------------------------------------------------------------------------------------//
if (!is_user_logged_in())
{
	return;
}
else
{
	switch($role)
	{
		case "administrator":
			add_menu_page("WP Mail Bank", __("WP Mail Bank", mail_bank), "read", "smtp_mail","", plugins_url("/assets/images/mail.png" , dirname(__FILE__)));
			add_submenu_page("smtp_mail", "Settings", __("Settings", mail_bank), "read", "smtp_mail","smtp_mail");
			add_submenu_page("smtp_mail", "Send Test Email", __("Send Test Email", mail_bank), "read", "send_test_email","send_test_email");
			add_submenu_page("", "", "", "read", "send_test_email",  "send_test_email");
			add_submenu_page("smtp_mail", "Plugin Updates", __("Plugin Updates",mail_bank), "read", "mail_plugin_updates", "mail_plugin_updates");
			add_submenu_page("smtp_mail", "Feature Requests", __("Feature Requests",mail_bank), "read", "mail_feature_requests", "mail_feature_requests");
			add_submenu_page("smtp_mail", "Recommendations", __("Recommendations", mail_bank), "read", "recommended_plugins", "recommended_plugins" );
			add_submenu_page("smtp_mail", "Our Other Services", __("Our Other Services", mail_bank), "read", "other_services", "other_services" );
			add_submenu_page("smtp_mail", "System Status", __("System Status", mail_bank), "read", "mail_system_status", "mail_system_status" );
		break;
		case "editor":
			add_menu_page("WP Mail Bank", __("WP Mail Bank", mail_bank), "read", "smtp_mail","", plugins_url("/assets/images/mail.png" , dirname(__FILE__)));
			add_submenu_page("smtp_mail", "Settings", __("Settings", mail_bank), "read", "smtp_mail","smtp_mail");
			add_submenu_page("smtp_mail", "Send Test Email", __("Send Test Email", mail_bank), "read", "send_test_email","send_test_email");
			add_submenu_page("", "", "", "read", "send_test_email",  "send_test_email");
			add_submenu_page("smtp_mail", "Plugin Updates", __("Plugin Updates",mail_bank), "read", "mail_plugin_updates", "mail_plugin_updates");
			add_submenu_page("smtp_mail", "Feature Requests", __("Feature Requests",mail_bank), "read", "mail_feature_requests", "mail_feature_requests");
			add_submenu_page("smtp_mail", "Recommendations", __("Recommendations", mail_bank), "read", "recommended_plugins", "recommended_plugins" );
			add_submenu_page("smtp_mail", "Our Other Services", __("Our Other Services", mail_bank), "read", "other_services", "other_services" );
			add_submenu_page("smtp_mail", "System Status", __("System Status", mail_bank), "read", "mail_system_status", "mail_system_status" );
		break;
		case "author":
			add_menu_page("WP Mail Bank", __("WP Mail Bank", mail_bank), "read", "smtp_mail","", plugins_url("/assets/images/mail.png" , dirname(__FILE__)));
			add_submenu_page("smtp_mail", "Settings", __("Settings", mail_bank), "read", "smtp_mail","smtp_mail");
			add_submenu_page("smtp_mail", "Send Test Email", __("Send Test Email", mail_bank), "read", "send_test_email","send_test_email");
			add_submenu_page("", "", "", "read", "send_test_email",  "send_test_email");
			add_submenu_page("smtp_mail", "Plugin Updates", __("Plugin Updates",mail_bank), "read", "mail_plugin_updates", "mail_plugin_updates");
			add_submenu_page("smtp_mail", "Feature Requests", __("Feature Requests",mail_bank), "read", "mail_feature_requests", "mail_feature_requests");
			add_submenu_page("smtp_mail", "Recommendations", __("Recommendations", mail_bank), "read", "recommended_plugins", "recommended_plugins" );
			add_submenu_page("smtp_mail", "Our Other Services", __("Our Other Services", mail_bank), "read", "other_services", "other_services" );
			add_submenu_page("smtp_mail", "System Status", __("System Status", mail_bank), "read", "mail_system_status", "mail_system_status" );
		break;
	}
	
	//--------------------------------------------------------------------------------------------------------------//
	// CODE FOR CREATING PAGES
	//---------------------------------------------------------------------------------------------------------------//
	
	if(!function_exists( "smtp_mail" ))
	{
		function smtp_mail()
		{
			global $wpdb,$current_user,$user_role_permission;
			if(is_super_admin())
			{
				$role = "administrator";
			}
			else
			{
				$role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$role);
				$role = $current_user->role[0];
			}
			include_once MAIL_BK_PLUGIN_DIR ."/views/mail_header.php";
			include_once MAIL_BK_PLUGIN_DIR ."/views/mail_settings.php";
		}
	}
	if(!function_exists( "mail_system_status" ))
	{
		function mail_system_status()
		{
			global $wpdb,$current_user,$user_role_permission,$wp_version;
			if(is_super_admin())
			{
				$role = "administrator";
			}
			else
			{
				$role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$role);
				$role = $current_user->role[0];
			}
			include_once MAIL_BK_PLUGIN_DIR ."/views/mail_header.php";
			include_once MAIL_BK_PLUGIN_DIR . "/views/wp_system_status.php";
		}
	}
	if(!function_exists( "send_test_email" ))
	{
		function send_test_email()
		{
			global $wpdb,$current_user,$user_role_permission,$wp_version;
			if(is_super_admin())
			{
				$role = "administrator";
			}
			else
			{
				$role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$role);
				$role = $current_user->role[0];
			}
			include_once MAIL_BK_PLUGIN_DIR ."/views/mail_header.php";
			include_once MAIL_BK_PLUGIN_DIR . "/views/test_email.php";
		}
	}
	if(!function_exists( "recommended_plugins" ))
	{
		function recommended_plugins()
		{
			global $wpdb,$current_user,$user_role_permission,$wp_version;
			if(is_super_admin())
			{
				$role = "administrator";
			}
			else
			{
				$role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$role);
				$role = $current_user->role[0];
			}
			if(file_exists(MAIL_BK_PLUGIN_DIR."/views/mail_header.php"))
			{
				include_once MAIL_BK_PLUGIN_DIR."/views/mail_header.php";
			}
			if (file_exists(MAIL_BK_PLUGIN_DIR ."/views/recommended-plugins.php"))
			{
				include_once MAIL_BK_PLUGIN_DIR ."/views/recommended-plugins.php";
			}
		}
	}
	if(!function_exists( "other_services" ))
	{
		function other_services()
		{
			global $wpdb,$current_user,$user_role_permission,$wp_version;
			if(is_super_admin())
			{
				$role = "administrator";
			}
			else
			{
				$role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$role);
				$role = $current_user->role[0];
			}
			if(file_exists(MAIL_BK_PLUGIN_DIR."/views/mail_header.php"))
			{
				include_once MAIL_BK_PLUGIN_DIR."/views/mail_header.php";
			}
			if (file_exists(MAIL_BK_PLUGIN_DIR ."/views/other-services.php"))
			{
				include_once MAIL_BK_PLUGIN_DIR ."/views/other-services.php";
			}
		}
	}
	if(!function_exists( "mail_plugin_updates" ))
	{
		function mail_plugin_updates()
		{
			global $wpdb,$current_user,$user_role_permission,$wp_version;
			if(is_super_admin())
			{
				$role = "administrator";
			}
			else
			{
				$role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$role);
				$role = $current_user->role[0];
			}
			if(file_exists(MAIL_BK_PLUGIN_DIR."/views/mail_header.php"))
			{
				include_once MAIL_BK_PLUGIN_DIR."/views/mail_header.php";
			}
			if (file_exists(MAIL_BK_PLUGIN_DIR ."/views/automatic-plugin-update.php"))
			{
				include_once MAIL_BK_PLUGIN_DIR ."/views/automatic-plugin-update.php";
			}
		}
	}
	
	if(!function_exists( "mail_feature_requests" ))
	{
		function mail_feature_requests()
		{
			global $wpdb,$current_user,$user_role_permission,$wp_version;
			if(is_super_admin())
			{
				$role = "administrator";
			}
			else
			{
				$role = $wpdb->prefix . "capabilities";
				$current_user->role = array_keys($current_user->$role);
				$role = $current_user->role[0];
			}
			if(file_exists(MAIL_BK_PLUGIN_DIR."/views/mail_header.php"))
			{
				include_once MAIL_BK_PLUGIN_DIR."/views/mail_header.php";
			}
			if (file_exists(MAIL_BK_PLUGIN_DIR ."/views/mail-feedback.php"))
			{
				include_once MAIL_BK_PLUGIN_DIR ."/views/mail-feedback.php";
			}
		}
	}
}
?>