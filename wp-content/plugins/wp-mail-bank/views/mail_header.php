<?php
switch($role)
{
	case "administrator":
		$user_role_permission = "manage_options";
	break;
	case "editor":
		$user_role_permission = "publish_pages";
	break;
	case "author":
		$user_role_permission = "publish_posts";
	break;
}

if (!current_user_can($user_role_permission))
{
	return;
}
else
{
	?>
	<img style="margin-top: 15px;" src="<?php echo plugins_url("/assets/images/logo.png" , dirname(__FILE__)); ?>" />
	<h2 class="nav-tab-wrapper">
		<a class="nav-tab " id="smtp_mail" href="admin.php?page=smtp_mail"><?php _e("Settings", mail_bank);?></a>
		<a class="nav-tab " id="send_test_email" href="admin.php?page=send_test_email"><?php _e("Send Test Email", mail_bank);?></a>
		<a class="nav-tab" id="recommended_plugins" href="admin.php?page=recommended_plugins"><?php _e("Recommendations", mail_bank);?></a>
		<a class="nav-tab" id="other_services" href="admin.php?page=other_services"><?php _e("Our Other Services", mail_bank);?></a>
	</h2>
	<?php
	if($_REQUEST["page"] != "mail_feature_requests")
	{
		?>
		<div class="custom-message green" style="display: block;margin-top:30px;max-width:965px;">
			<div style="padding: 4px 0;">
				<p style="font:12px/1.0em Arial !important;font-weight:bold;">If you don't find any features you were looking for in this Plugin, 
					please write us <a target="_self" href="admin.php?page=mail_feature_requests">here</a> and we shall try to implement this for you as soon as possible! We are looking forward for your valuable <a target="_self" href="admin.php?page=mail_feature_requests">Feedback</a></p>
			</div>
		</div>
		<?php
	}
	?>
	<script>
	
	jQuery(document).ready(function()
	{
		jQuery(".nav-tab-wrapper > a#<?php echo $_REQUEST["page"];?>").addClass("nav-tab-active");
	});
	
	</script>
<?php 
}
?>