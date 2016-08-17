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
	<form id="frm_system_status" class="layout-form wpib-page-width" method="post">
		<div class="fluid-layout">
			<div class="layout-span12 responsive">
				<div class="widget-layout">
					<div class="widget-layout-title">
						<h4>
							<?php _e("System Status - WP Mail Bank", mail_bank); ?>
						</h4>
					</div>
					<div class="widget-layout-body">
						<a class="btn btn-danger system-report" href="#"><?php _e("Get System Report", mail_bank); ?></a>
						<div id="wp-mail-system-report" class="layout-system-report">
							<textarea readonly="readonly"></textarea>
						</div>
						<a class="btn btn-danger close-report" href="#"><?php _e("Close System Report", mail_bank); ?></a>
						<div class="separator-doubled"></div>
						<div class="fluid-layout">
							<div class="layout-span6 responsive">
								<div class="widget-layout">
									<div class="widget-layout-title">
										<h4>Environment</h4>
									</div>
									<div class="widget-layout-body">
										<div class="fluid-layout">
											<div class="layout-span12 responsive">
												<div class="layout-control-group">
													<label class="layout-control-label">Home URL :</label>
													<div class="layout-controls wp_layout_control_mail_bank">
														<span><?php echo home_url(); ?></span>
													</div>
												</div>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">Site URL :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span><?php echo site_url(); ?></span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">WP Version :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span><?php bloginfo("version"); ?></span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">WP Multisite Enabled :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span><?php if (is_multisite()) echo "Yes"; else echo "No"; ?></span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">Web Server Info :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span><?php echo esc_html($_SERVER["SERVER_SOFTWARE"]); ?></span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">PHP Version :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span><?php if (function_exists("phpversion")) echo esc_html(phpversion()); ?></span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">MySQL Version :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span>
												<?php 
													global $wpdb;
													echo $wpdb->db_version();
												?>
												</span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">WP Debug Mode :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span><?php if (defined("WP_DEBUG") && WP_DEBUG) echo "Yes"; else echo "No"; ?></span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">WP Language :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span><?php if (defined("WPLANG") && WPLANG) echo WPLANG; else _e("Default"); ?></span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">PHP Post Max Size :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span>
												<?php 
													echo ini_get("post_max_size");
												?>
												</span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">WP Max Upload Size :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span><?php echo size_format(wp_max_upload_size()); ?></span>
											</div>
										</div>
									<?php
									$request["cmd"] = "_notify-validate";
									$params = array(
										"sslverify" 	=> false,
										"timeout" 		=> 60,
										"user-agent"	=> "wp-Instagram-Bank",
										"body"			=> $request
									);
									$response = wp_remote_post( "https://www.paypal.com/cgi-bin/webscr", $params );
									?>
										<div class="layout-control-group">
											<label class="layout-control-label">WP Remote Post :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span>
													<?php if ( ! is_wp_error( $response ))
													{
														echo "Success";
													}
													else
													{
														echo "Failed";
													}
													?>
												</span>
											</div>
										</div>
									<?php if (function_exists("ini_get")) : ?>
										<div class="layout-control-group">
											<label class="layout-control-label">PHP Max Script Execute Time :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span><?php echo ini_get("max_execution_time"); ?>s</span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">PHP Max Input Vars :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span><?php echo ini_get("max_input_vars"); ?></span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">SUHOSIN Installed" :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span><?php echo extension_loaded("suhosin") ? "Yes" : "No" ?></span>
											</div>
										</div>
									<?php endif; ?>
										<div class="layout-control-group">
											<label class="layout-control-label">Default Timezone :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span>
													<?php
													$timezone = date_default_timezone_get();
													if ("UTC" !== $timezone) {
														echo sprintf("Default timezone is %s - it should be UTC", $timezone);
													} else {
														echo sprintf("Default timezone is %s", $timezone);
													}
													?>
												</span>
											</div>
										</div>
									<?php
									global $wpdb, $gb;
									// Get MYSQL Version
									$sql_version = $wpdb->get_var("SELECT VERSION() AS version");
									// GET SQL Mode
									$my_sql_info = $wpdb->get_results("SHOW VARIABLES LIKE \"sql_mode\"");
									if (is_array($my_sql_info)) $sqlmode = $my_sql_info[0]->Value;
									if (empty($sqlmode)) $sqlmode = "Not set";
									// Get PHP Safe Mode
									if (ini_get("safemode")) $safemode = "On";
									else $safemode = "Off";
									// Get PHP allow_url_fopen
									if (ini_get("allow-url-fopen")) $allowurlfopen = "On";
									else $allowurlfopen = "Off";
									// Get PHP Max Upload Size
									if (ini_get("upload_max_filesize")) $upload_maximum = ini_get("upload_max_filesize");
									else $upload_maximum = "N/A";
									// Get PHP Output buffer Size
									if (ini_get("pcre.backtrack_limit")) $backtrack_lmt = ini_get("pcre.backtrack_limit");
									else $backtrack_lmt = "N/A";
									// Get PHP Max Post Size
									if (ini_get("post_max_size")) $post_maximum = ini_get("post_max_size");
									else $post_maximum = "N/A";
									// Get PHP Memory Limit
									if (ini_get("memory_limit")) $memory_limit = ini_get("memory_limit");
									else $memory_limit = "N/A";
									// Get actual memory_get_usage
									if (function_exists("memory_get_usage")) $memory_usage = round(memory_get_usage() / 1024 / 1024, 2) . " MByte";
									else $memory_usage = "N/A";
									// required for EXIF read
									if (is_callable("exif_read_data")) $exif = "Yes" . " ( V" . substr(phpversion("exif"), 0, 4) . ")";
									else $exif = "No";
									// required for meta data
									if (is_callable("iptcparse")) $iptc = "Yes";
									else $iptc = "No";
									// required for meta data
									if (is_callable("xml_parser_create")) $xml = "Yes";
									else $xml = "No";
									?>
										<div class="layout-control-group">
											<label class="layout-control-label">Operating System :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span>
													<?php echo PHP_OS; ?>&nbsp;(<?php echo(PHP_INT_SIZE * 8) ?>&nbsp;Bit)
												</span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">Memory usage :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span>
													<?php echo $memory_usage; ?>
												</span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">SQL Mode :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span>
													<?php echo $sqlmode; ?>
												</span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">PHP Safe Mode :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span>
													<?php echo PHP_VERSION; ?>
												</span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">PHP Allow URL fopen :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span>
													<?php echo $allowurlfopen; ?>
												</span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">PHP Memory Limit :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span>
													<?php echo $memory_limit; ?>
												</span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">PHP Max Post Size :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span>
													<?php echo $post_maximum; ?>
												</span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">PCRE Backtracking Limit :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span>
													<?php echo $backtrack_lmt; ?>
												</span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">PHP Exif support :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span>
													<?php echo $exif; ?>
												</span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">PHP IPTC support :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span>
													<?php echo $iptc; ?>
												</span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">PHP XML support :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span>
													<?php echo $xml; ?>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="layout-span6 responsive">
								<div class="widget-layout">
									<div class="widget-layout-title">
										<h4>Plugins</h4>
									</div>
									<div class="widget-layout-body">
										<div class="layout-control-group">
											<label class="layout-control-label">Installed Plugins :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span>
													<?php
													$active_plugins = (array)get_option("active_plugins", array());
													if (is_multisite())
													$active_plugins = array_merge($active_plugins, get_site_option("active_sitewide_plugins", array()));
													$get_plugins = array();
													foreach ($active_plugins as $plugin) {
														$plugin_data = @get_plugin_data(WP_PLUGIN_DIR . "/" . $plugin);
														$dirname = dirname($plugin);
														$version_string = "";
														if (!empty($plugin_data["Name"])) {
															$plugin_name = $plugin_data["Name"];
															if (!empty($plugin_data["PluginURI"])) {
																$plugin_name = "<a href=\"" . esc_url($plugin_data["PluginURI"]) . "\" title=\"" . "Visit plugin homepage" . "\">" . $plugin_name . "</a>";
															}
															if (strstr($dirname, mail_bank)) {
																if (false === ($version_data = get_transient($plugin . "_version_data"))) {
																	$changelog = wp_remote_get("http://dzv365zjfbd8v.cloudfront.net/changelogs/" . $dirname . "/changelog.txt");
																	$change_log = explode("\n", wp_remote_retrieve_body($changelog));
																	if (!empty($change_log)) {
																		foreach ($change_log as $line_num => $change_log_line) {
																			if (preg_match("/^[0-9]/", $change_log_line)) {
																				$date = str_replace(".", "-", trim(substr($change_log_line, 0, strpos($change_log_line, "-"))));
																				$version = preg_replace("~[^0-9,.]~", "", stristr($change_log_line, "version"));
																				$update = trim(str_replace("*", "", $change_log[$line_num + 1]));
																				$version_data = array("date" => $date, "version" => $version, "update" => $update, "changelog" => $changelog);
																				set_transient($plugin . "_version_data", $version_data, 60 * 60 * 12);
																				break;
																			}
																		}
																	}
																}
																if (!empty($version_data["version"]) && version_compare($version_data["version"], $plugin_data["Version"], "!="))
																	$version_string = " &ndash; <strong style=\"color:red;\">" . $version_data["version"] . " " . "is available" . "</strong>";
																}
															$get_plugins[] = $plugin_name . " " . "by" . " " . $plugin_data["Author"] . " " . "version" . " " . $plugin_data["Version"] . $version_string;
														}
													}
													if (sizeof($get_plugins) == 0)
														echo "-";
													else
														echo implode("<div class=\"separator-single\"></div>", $get_plugins);
													?>
												</span>
											</div>
										</div>
									</div>
								</div>
								<?php
								if($wp_version >= 3.4)
								{
									$active_theme = wp_get_theme();
								?>
								<div class="widget-layout">
									<div class="widget-layout-title">
										<h4>Themes</h4>
									</div>
									<div class="widget-layout-body">
										<div class="layout-control-group">
											<label class="layout-control-label">Theme Name :</label>
						
											<div class="layout-controls wp_layout_control_mail_bank">
												<span><?php echo $active_theme->Name; ?></span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">Theme Version :</label>
												<div class="layout-controls wp_layout_control_mail_bank">
												<span><?php
													echo $active_theme->Version;
													if (!empty($theme_version_data["version"]) && version_compare($theme_version_data["version"], $active_theme->Version, "!="))
														echo " &ndash; <strong style=\"color:red;\">" . $theme_version_data["version"] . " " . "is available" . "</strong>";?>
												</span>
											</div>
										</div>
										<div class="layout-control-group">
											<label class="layout-control-label">Author URL :</label>
											<div class="layout-controls wp_layout_control_mail_bank">
												<span><?php echo $active_theme->{"Author URI"}; ?></span>
											</div>
										</div>
									</div>
								</div>
								<?php 
								}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form>
	<script type="text/javascript">
		jQuery.getSystemReport = function (strDefault, stringCount, string, location) {
			var o = strDefault.toString();
			if (!string) {
				string = "0";
			}
			while (o.length < stringCount) {
				// empty
				if (location == "undefined") {
					o = string + o;
				} else {
					o = o + string;
				}
			}
			return o;
		};
	
		jQuery("a.system-report").click(function () {
			var report = "";
			jQuery(".layout-span6 .widget-layout").each(function () {
				jQuery(".widget-layout-title h4", jQuery(this)).each(function () {
					report = report + "\n### " + jQuery.trim(jQuery(this).text()) + " ###\n\n";
				});
				jQuery(".layout-control-group", jQuery(this)).each(function () {
					var the_name = jQuery.getSystemReport(jQuery.trim(jQuery(this).find("label").text()), 25, " ");
					var the_value = jQuery.trim(jQuery(this).find("span").text());
					var value_array = the_value.split(", ");
					if (value_array.length > 1) {
						var temp_line = "";
							jQuery.each(value_array, function (key, line) {
							var tab = ( key == 0 ) ? 0 : 25;
							temp_line = temp_line + jQuery.getSystemReport("", tab, " ", "f") + line + "\n";
						});
						the_value = temp_line;
					}
					report = report + "" + the_name + the_value + "\n";
				});
			});
			try {
				jQuery("#wp-mail-system-report").slideDown();
				jQuery("#wp-mail-system-report textarea").val(report).focus().select();
				jQuery(this).fadeOut();
				jQuery("a.close-report").fadeIn();
				return false;
			} catch (e) {
				console.log(e);
			}
			return false;
		});
		jQuery("a.close-report").click(function () {
			jQuery("#wp-mail-system-report").slideUp();
			jQuery(this).fadeOut();
			jQuery("a.system-report").fadeIn();
		})
		jQuery(document).ready(function() 
		{
			jQuery("#wp_system_status").addClass("nav-tab-active");
		});
	</script>
<?php 
}
?>