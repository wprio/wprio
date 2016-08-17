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
	$admin_email = get_option( 'admin_email' );
	?>
	<form id="ux_frm_test_email" class="layout-form" style="max-width:1000px;">
		<div class="fluid-layout">
			<div id="ux_test_mail" style="display: block">
				<div class="layout-span12 responsive">
					<div class="widget-layout">
						<div class="widget-layout-title">
							<h4><?php _e( "Send Test Email - WP Mail Bank", mail_bank ); ?></h4>
						</div>
						<div class="widget-layout-body">
							<div class="fluid-layout">
								<div class="layout-control-group">
									<label class="layout-control-label"><?php _e("To", mail_bank); ?> : <span class="error">*</span></label>
									<div class="layout-controls">
										<input type="text" name="ux_email_to" class="layout-span12" placeholder="Please enter Email" id="ux_email_to" value="<?php echo $admin_email?>"/><br>
										<p class="wpib-desc-italic"><?php _e("You can specify the email-address you want to send for testing.", mail_bank); ?></p>
									</div>
								</div>
								<div class="layout-control-group">
									<label class="layout-control-label"><?php _e("Subject", mail_bank); ?> : <span class="error">*</span></label>
									<div class="layout-controls">
										<input type="text" name="ux_email_subject" class="layout-span12" placeholder="Please enter Subject" id="ux_email_subject" value="Test Email"/><br>
										<p class="wpib-desc-italic"><?php _e("You can specify the subject of the email you want to send for testing.", mail_bank); ?></p>
									</div>
								</div>
								<div class="layout-control-group">
									<label class="layout-control-label"><?php _e("Message", mail_bank); ?> :</label>
									<div class="layout-controls">
										<div class="layout-span12">
											<?php
												$distribution = "Hello,
														This is a Test Email from WP Mail Bank.
														Thanks for using it!
														Best Regards
														<strong>WP Mail Bank</strong>"; 
												wp_editor( $distribution, $name ="uxEmailTemplate" ,array("media_buttons" => false, 
												"textarea_rows" => 8, "tabindex" => 4,"tinymce" =>false ));  
											?>
											<p class="wpib-desc-italic"><?php _e("You can specify the message of the email you want to send for testing.", mail_bank); ?></p>
										</div>
									</div>
								</div>
								<div class="layout-control-group">
									<div class="layout-controls">
										<input type="submit" id="ux_btn_action" name="ux_btn_action" onclick="console_log();" class="btn btn-danger" value="<?php _e("Send Test Email", mail_bank); ?>">
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
			<div id="ux_mail_console" style="display: none">
				<div class="layout-span12 responsive">
					<div class="widget-layout">
						<div class="widget-layout-title">
							<h4><?php _e( "Send Test Email - WP Mail Console Log", mail_bank ); ?></h4>
						</div>
						<div class="widget-layout-body">
							<div class="fluid-layout">
							<div class="layout-control-group">
								<input type="button" id="ux_btn_action" name="ux_btn_action" onclick="back_settings();" class="btn btn-danger" value="<?php _e("Go Back to Settings", mail_bank); ?>">
								<input type="button" id="ux_btn_action" name="ux_btn_action" onclick="send_test_email();" class="btn btn-danger" value="<?php _e("Send Another Test Email", mail_bank); ?>" style="float:Right;">
							</div>
							<div class="separator-doubled" style="padding: 4px;"></div>
								<div class="layout-control-group" id="result_div" style="display:none;">
									<label class="layout-control-label"><?php _e("Result ", mail_bank); ?>:</label>
									<div class="layout-controls">
										<textarea name="ux_result_log"  class="layout-span12" id="ux_result_log" rows="5" readonly="readonly" ></textarea>
									</div>
								</div>
								<div class="layout-control-group" id="console_log_div">
									<label class="layout-control-label"><?php _e("SMTP Debugging Output", mail_bank); ?> :</label>
									<div class="layout-controls">
										<textarea name="ux_console_log"  class="layout-span12" id="ux_console_log" rows="15" readonly="readonly"><?php _e("Kindly be Patient! We are sending the Test Email!", mail_bank); ?></textarea>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<?php
}
?>
<script type="text/javascript">
jQuery(document).ready(function()
{
	jQuery("label ").css("margin-left","6px");
});
jQuery("#ux_frm_test_email").validate
({	
	rules:
	{	
		ux_email_to:
		{ 
			required: true,
			email: true
		},
		ux_email_subject:
		{ 
			required: true
		}
	},
	errorPlacement: function(error, element)
	{
		var ctrl = element.next();
		if(ctrl != undefined)
		error.insertAfter(ctrl);
		jQuery(".error_field").css("float","left");
		jQuery(".error_field").css("position","static");
		
	},
	submitHandler: function(form)
	{
		if (jQuery("#wp-uxEmailTemplate-wrap").hasClass("tmce-active"))
		{
			var uxEmailTemplate  = encodeURIComponent(tinyMCE.get("uxEmailTemplate").getContent());
		}
		else
		{
			var uxEmailTemplate  = encodeURIComponent(jQuery("#uxEmailTemplate").val());
		}
		jQuery.post(ajaxurl, jQuery(form).serialize() +"&message="+uxEmailTemplate+"&param=send_mail&action=add_mail_library", function(data)
		{
			if(data == "true" || data == "1")
			{
				jQuery("#result_div").css("display","block");
				jQuery("#console_log_div").css("display","none");
				jQuery("#ux_result_log").html("<?php _e("Test email was successfully sent!", mail_bank); ?>");
			}
			else
			{
				jQuery("#console_log_div").css("display","block");
				jQuery("#result_div").css("display","none");
				jQuery("#ux_console_log").html(data);
			}			
		});
	}
});jQuery("#return_path").css("display","block");
function console_log()
{
	jQuery("#ux_test_mail").css("display","none");
	jQuery("#ux_mail_console").css("display","block");
}
function back_settings()
{
	window.location.href = "admin.php?page=smtp_mail";
}
function send_test_email()
{
	jQuery("#ux_test_mail").css("display","block");
	jQuery("#ux_mail_console").css("display","none");
}
</script>