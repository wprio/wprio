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
		$email_data=$wpdb->get_row
		(
			"SELECT * FROM ".wp_mail_bank()
		);
		$admin_email = get_option( 'admin_email' );
		
	?>
	<form id="ux_frm_email" class="layout-form" style="max-width:1000px;">
		<div id="message" class="top-right message" style="display: none;">
			<div class="message-notification"></div>
			<div class="message-notification ui-corner-all growl-success" >
				<div onclick="message_close();" id="close-message" class="message-close">x</div>
				<div class="message-header"><?php _e("Success!",  mail_bank); ?></div>
				<div class="message-message"><?php _e("Settings has been successfully saved.",  mail_bank); ?></div>
			</div>
		</div>
		<div class="fluid-layout">
			<div class="layout-span12 responsive">
				<div class="widget-layout">
					<div class="widget-layout-title">
						<h4><?php _e( "Settings - WP Mail Bank", mail_bank ); ?></h4>
					</div>
					<div class="widget-layout-body">
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e("From Name", mail_bank); ?> : <span class="error">*</span></label>
								<div class="layout-controls">
									<input type="text" name="ux_email_from_name" class="layout-span12" id="ux_email_from_name" placeholder="Please enter your From Name" value="<?php echo isset($email_data->from_name) ? stripcslashes(htmlspecialchars_decode($email_data->from_name)) : "WordPress" ;?>"/><br>
									<p class="wpib-desc-italic"><?php _e("You can specify the name that emails should be sent from.", mail_bank); ?></p>
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e("From Email", mail_bank); ?> : <span class="error">*</span></label>
								<div class="layout-controls">
									<input type="text" name="ux_email_from_email" class="layout-span12" id="ux_email_from_email" placeholder="Please enter your From Email" value="<?php echo isset($email_data->from_email) ? $email_data->from_email : $admin_email ;?>"/><br>
									<p class="wpib-desc-italic"><?php _e("You can specify the email that emails should be sent from.", mail_bank); ?></p>
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label"><?php _e("Mailer Type", mail_bank); ?> : <span class="error">*</span></label>
								<div class="layout-controls rdl_mail_bank">
									<?php
									$rdl_value = isset($email_data->mailer_type) ? $email_data->mailer_type : "1" ;
									if($rdl_value == 1)
									{
									?>
									<input type="radio" onclick="backup_rdl();"  id="ux_rdl_off" name="ux_rdl_ends" value="0" /><?php _e("Send all emails via SMTP", mail_bank); ?>
									<input type="radio" onclick="backup_rdl();" checked="checked" id="ux_rdl_on" style="margin-left: 10px;" name="ux_rdl_ends" value="1"/><?php _e("Use the PHP mail() function to send emails.", mail_bank); ?>
									<?php
									}
									else {
									?>
									<input type="radio" onclick="backup_rdl();" checked="checked" id="ux_rdl_off" name="ux_rdl_ends" value="0" /><?php _e("Send all emails via SMTP", mail_bank); ?>
									<input type="radio" onclick="backup_rdl();"  id="ux_rdl_on" style="margin-left: 10px;" name="ux_rdl_ends" value="1"/><?php _e("Use the PHP mail() function to send emails.", mail_bank); ?>
									<?php
									}
									?>
									<p class="wpib-desc-italic"><?php _e("You can specify the transporder to be used for sending out emails from your WordPrss site.", mail_bank); ?></p>
								</div>
							</div>
							<div class="layout-control-group">
								<label class="layout-control-label" ><?php _e("Return Path", mail_bank); ?> :</label>
								<div class="layout-controls rdl_mail_bank">
									<?php
										$chk_path=isset($email_data->return_path) ? $email_data->return_path : "1";
										if($chk_path == "1")
										{
										?>
											<input type="checkbox" id="ux_chk_return_path" checked="checked" name="ux_chk_return_path" value="1" onclick="show_return_path();"/><?php _e("Set the return-path to match the From Email", mail_bank); ?>
										<?php
										}
										else
										{
										?>
											<input type="checkbox" id="ux_chk_return_path" name="ux_chk_return_path" value="1" onclick="show_return_path();"/><?php _e("Set the return-path to match the From Email", mail_bank); ?>
										<?php
										}
									?>
									<p class="wpib-desc-italic"><?php _e("Tick the checkbox if you want to set the return path same as your from email address.", mail_bank); ?></p>
								</div>
							</div>
							<div id="return_path" style="display: none">
								<div class="layout-control-group">
									<label class="layout-control-label"><?php _e("Return Email", mail_bank); ?> : <span class="error">*</span></label>
									<div class="layout-controls">
										<input type="text" name="ux_return_email" placeholder="Please enter your Return Email" class="layout-span12" id="ux_return_email" value="<?php echo isset($email_data->return_email) ? $email_data->return_email : "" ;?>"/><br>
										<p class="wpib-desc-italic"><?php _e("You can specify the email address that should be set as tghe return path for your emails.", mail_bank); ?></p>
									</div>
								</div>
							</div>
							<div class="layout-control-group">
									<label class="layout-control-label"><?php _e("Word Wrap", mail_bank); ?> :</label>
									<div class="layout-controls">
										<input type="text" name="ux_word_wrap" class="layout-span12" id="ux_word_wrap" placeholder="Please enter wordwrap" value="<?php echo isset($email_data->word_wrap) ? $email_data->word_wrap : "50" ;?>"/><br>
										<p class="wpib-desc-italic"><?php _e("The number of characters at which the string will be wrapped.", mail_bank); ?></p>
									</div>
								</div>
							<div id="ux_smtp_host" style="display: none">
								<div class="layout-control-group">
									<label class="layout-control-label"><?php _e("SMTP Host", mail_bank); ?> : <span class="error">*</span></label>
									<div class="layout-controls">
										<input type="text" name="ux_smtp_host" class="layout-span12" id="ux_smtp_host" placeholder="Please enter your SMTP Host" value="<?php echo isset($email_data->smtp_host) ? $email_data->smtp_host : "" ;?>"/><br>
										<p class="wpib-desc-italic"><?php _e("You can specify the smtp host for sending your emails.", mail_bank); ?></p>
									</div>
								</div>
								<div class="layout-control-group">
									<label class="layout-control-label"><?php _e("SMTP Port", mail_bank); ?> : <span class="error">*</span></label>
									<div class="layout-controls">
										<input type="text" name="ux_smtp_port" class="layout-span12"  id="ux_smtp_port" placeholder="Please enter your SMTP Port" value="<?php echo isset($email_data->smtp_port) ? $email_data->smtp_port : "25" ;?>"/><br>
										<p class="wpib-desc-italic"><?php _e("You can specify the smtp port for sending your emails.", mail_bank); ?></p>
									</div>
								</div>
								<div class="layout-control-group">
									<label class="layout-control-label"><?php _e("Encryption", mail_bank); ?> : <span class="error">*</span></label>
									<div class="layout-controls rdl_mail_bank">
										<?php
										$rdl_data = isset($email_data->encryption) ? $email_data->encryption : "0" ;
										if($rdl_data == 0)
										{
										?>
										<input type="radio" checked="checked" id="ux_rdl_encrption_no" name="ux_rdl_encrption" value="0" /><?php _e("No Encryption", mail_bank); ?>
										<input type="radio" id="ux_rdl_encrption_ssl" name="ux_rdl_encrption" style="margin-left: 10px;" value="1"/><?php _e("Use SSL Encryption", mail_bank); ?>
										<input type="radio" id="ux_rdl_encrption_tls" name="ux_rdl_encrption" style="margin-left: 10px;" value="2"/><?php _e("Use TLS Encryption", mail_bank); ?>
										<?php
										}
										else if($rdl_data == 1)
										{
											?>
										<input type="radio"  id="ux_rdl_encrption_no" name="ux_rdl_encrption" value="0" /><?php _e("No Encryption", mail_bank); ?>
										<input type="radio" checked="checked" id="ux_rdl_encrption_ssl" style="margin-left: 10px;" name="ux_rdl_encrption" value="1"/><?php _e("Use SSL Encryption", mail_bank); ?>
										<input type="radio" id="ux_rdl_encrption_tls" name="ux_rdl_encrption" style="margin-left: 10px;" value="2"/><?php _e("Use TLS Encryption", mail_bank); ?>
										<?php
										}
										else if($rdl_data == 2)
										{
											?>
										<input type="radio"  id="ux_rdl_encrption_no" name="ux_rdl_encrption" value="0" /><?php _e("No Encryption", mail_bank); ?>
										<input type="radio"  id="ux_rdl_encrption_ssl" style="margin-left: 10px;" name="ux_rdl_encrption" value="1"/><?php _e("Use SSL Encryption", mail_bank); ?>
										<input type="radio" checked="checked" id="ux_rdl_encrption_tls" style="margin-left: 10px;" name="ux_rdl_encrption" value="2"/><?php _e("Use TLS Encryption", mail_bank); ?>
										<?php
										}
										?>
										<p class="wpib-desc-italic"><?php _e("You can specify the encryption type of your emails.", mail_bank); ?></p>
									</div>
								</div>
								<div class="layout-control-group">
									<label class="layout-control-label"><?php _e("Authentication", mail_bank); ?> : <span class="error">*</span></label>
									<div class="layout-controls rdl_mail_bank">
										<?php
										$rdl_value = isset($email_data->authentication) ? $email_data->authentication : "" ;
										if($rdl_value == 1)
										{
										?>
										<input type="radio" onclick="smtp_username();" id="ux_rdl_authentication" name="ux_rdl_authentication_bank" value="0" /><?php _e("Do not use SMTP Authentication", mail_bank); ?>
										<input type="radio" onclick="smtp_username();" style="margin-left: 10px;" checked="checked" id="ux_rdl_authentication_use" name="ux_rdl_authentication_bank" value="1"/><?php _e("Use SMTP Authentication", mail_bank); ?>
										<?php
										}
										else {
										?>
										<input type="radio" onclick="smtp_username();" checked="checked" id="ux_rdl_authentication" name="ux_rdl_authentication_bank" value="0" /><?php _e("Do not use SMTP Authentication", mail_bank); ?>
										<input type="radio" onclick="smtp_username();" style="margin-left: 10px;" id="ux_rdl_authentication_use" name="ux_rdl_authentication_bank" value="1"/><?php _e("Use SMTP Authentication", mail_bank); ?>
										<?php
										}
										?>
										<p class="wpib-desc-italic"><?php _e("You can specify the authentication type of your emails.", mail_bank); ?></p>
									</div>
								</div>
								<div id="ux_smtp" style="display:none">
									<div class="fluid-layout">
										<div class="layout-span5">
											<div class="layout-control-group">
												<label class="layout-control-label"><?php _e("SMTP Username", mail_bank); ?> : <span class="error">*</span></label>
												<div class="layout-controls">
													<input type="text" id="ux_txt_username" name="ux_txt_username" placeholder="Please enter Username"  class="layout-span12"  value="<?php echo isset($email_data->smtp_username) ? stripslashes($email_data->smtp_username) : "" ;?>"/>
												</div>
											</div>
										</div>
										<div class="layout-span5">
											<div class="layout-control-group">
												<label class="layout-control-label"><?php _e("SMTP Password", mail_bank); ?> : <span class="error">*</span></label>
												<div class="layout-controls">
													<input type="password" id="ux_txt_password" placeholder="Please enter Password"   name="ux_txt_password" style="margin-left: -26px;" class="layout-span12"  value="<?php echo isset($email_data->smtp_password) ? stripcslashes(htmlspecialchars_decode($email_data->smtp_password)) : "" ;?>">
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="layout-control-group" style="margin-top: 10px;">
									<label class="layout-control-label"><?php _e("SMTP Keep Alive", mail_bank); ?> : </label>
									<div class="layout-controls rdl_mail_bank">
										<?php
										$smtp_alive = isset($email_data->smtp_keep_alive) ? $email_data->smtp_keep_alive : "1" ;
										if($smtp_alive == 0)
										{
										?>
										<input type="radio" checked="checked" id="ux_rdl_smtp_enable" name="ux_rdl_smtp_alive" value="0" /><?php _e("Enable", mail_bank); ?>
										<input type="radio" style="margin-left: 10px;" id="ux_rdl_smtp_disable" name="ux_rdl_smtp_alive" value="1"/><?php _e("Disable", mail_bank); ?>
										<?php
										}
										else 
										{
										?>
										<input type="radio" id="ux_rdl_smtp_enable" name="ux_rdl_smtp_alive" value="0" /><?php _e("Enable", mail_bank); ?>
										<input type="radio" checked="checked" style="margin-left: 10px;" id="ux_rdl_smtp_disable" name="ux_rdl_smtp_alive" value="1"/><?php _e("Disable", mail_bank); ?>
										<?php
										}
										?>
										<p class="wpib-desc-italic"><?php _e("You can enable Smtp Keep Alive to keep the SMTP Authentication Session Open.", mail_bank); ?></p>
									</div>
								</div>
							</div>
						<input type="submit" id="ux_btn_action" name="ux_btn_action" class="btn btn-danger" style="margin-left: 178px; margin-top: 10px;" value="<?php _e("Save Changes", mail_bank); ?>">
					</div>
				</div>
			</div>
		</div>
	</form>
	<?php
	}
?>
<script>

jQuery(document).ready(function()
{
	backup_rdl();
	show_return_path();
	smtp_username();

});

jQuery("#ux_frm_email").validate
({	
	rules:
	{	
		ux_email_from_name:
		{ 
			required: true
		},
		ux_email_from_email:
		{ 
			required: true,
			email: true
		},
		ux_return_email:
		{ 
			required: true,
			email: true
		},
		ux_smtp_port:
		{ 
			required: true,
			digits: true
		},
		ux_smtp_host:
		{ 
			required: true
		},
		ux_txt_username:
		{ 
			required: true
		},
		ux_rdl_ends:
		{ 
			required: true
		},
		ux_rdl_encrption:
		{ 
			required: true
		},
		ux_rdl_authentication_bank:
		{ 
			required: true
		},
		ux_txt_password:
		{ 
			required: true
		},
		ux_word_wrap:
		{
			digits: true
		}
	},
	errorPlacement: function(error, element)
	{
		if((jQuery(element).attr("id") == "ux_txt_username") || (jQuery(element).attr("id") == "ux_txt_password"))
		{
			error.insertAfter(element.parent());
		}
		else
		{
			var ctrl = element.next();
			if(ctrl != undefined)
			error.insertAfter(ctrl);
			jQuery(".error_field").css("float","left");
			jQuery(".error_field").css("position","static");
		}
	},
	submitHandler: function(form)
	{
		var overlay_opacity = jQuery("<div class=\"opacity_overlay\"></div>");
		jQuery("body").append(overlay_opacity);
		var overlay = jQuery("<div class=\"loader_opacity\"><div class=\"processing_overlay\"></div></div>");
		jQuery("body").append(overlay);
		
		var password= encodeURIComponent(jQuery("#ux_txt_password").val());
		var from_name= encodeURIComponent(jQuery("#ux_email_from_name").val());	
		jQuery("#form_success_message").css("display","block");
		jQuery.post(ajaxurl, jQuery(form).serialize() +"&password="+password+"&from_name="+from_name+"&param=add_mail_detail&action=add_mail_library", function(data)
		{
			setTimeout(function () {
				jQuery("#message").css("display", "block");
				jQuery(".loader_opacity").remove();
				jQuery(".opacity_overlay").remove();
			}, 2000);
			setTimeout(function () {
				jQuery("#message").css("display", "none");
				window.location.reload();
			}, 4000)
		});
	}
});

function message_close()
{
	jQuery("#message").css("display", "none");
}

function backup_rdl ()
{
	var value = jQuery("#ux_rdl_on").prop("checked");
	if(value == false)
	{
		jQuery("#ux_smtp_host").css("display","block");
	}
	else
	{
		jQuery("#ux_smtp_host").css("display","none");
	}
}

function show_return_path()
{
	if(jQuery("#ux_chk_return_path").prop("checked") == "0")
	{
		jQuery("#return_path").css("display","block");
	}
	else
	{
		jQuery("#return_path").css("display","none");
	}
}

function smtp_username ()
{
	var value = jQuery("#ux_rdl_authentication_use").prop("checked");
	if(value == false)
	{
		jQuery("#ux_smtp").css("display","none");
	}
	else
	{
		jQuery("#ux_smtp").css("display","block");
	}
}
</script>