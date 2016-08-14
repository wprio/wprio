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
	<div class="fluid-layout" style="width:1000px;">
		<div class="layout-span12">
			<div class="widget-layout">
				<div class="widget-layout-title">
					<h4><?php _e("Our Other Services", tech_bank); ?></h4>
				</div>
				<div class="widget-layout-body">
					<div class="fluid-layout wpcb-page-width">
						<div class="layout-span12">
							<div class="framework_tabs">
								<ul class="framework_tab-links">
									<li class="active">
										<a href="#WordPress_services"><?php _e("WordPress", tech_bank); ?></a>
									</li>
									<li>
										<a href="#websites_programming"><?php _e("Websites & Programming", tech_bank); ?></a>
									</li>
									<li>
										<a href="#ecommerce"><?php _e("E-Commerce", tech_bank); ?></a>
									</li>
									<li>
										<a href="#designs_graphics"><?php _e("Designs & Graphics", tech_bank); ?></a>
									</li>
									<li>
										<a href="#company_brand"><?php _e("Company Branding ", tech_bank); ?></a>
									</li>
								</ul>
								<div class="framework_tab-content">
									<div id="WordPress_services" class="framework_tab active">
										<div class="wp-list-table plugin-install">
											<div id="the-list">
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3>
																	<?php _e("WordPress Theme Installation & Demo Setup ( + Logo + Plugins + Optimization + Security)", tech_bank); ?>
																</h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We are specialized in WordPress Theme Installation, which includes : Installation of your purchased Theme.<br/> We cover various areas such as Personal Websites, Business Websites and much more.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?>
																	</a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/wordpress/wordpress-theme-installation-demo-setup/" target="_blank"><?php _e("Read More", tech_bank); ?>
																	</a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 49 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 2 Business Days and upto 5 Revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3>
																	<?php _e("WordPress Website Migration, Backup & Restore", tech_bank); ?>
																</h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("With Hundreds of Migrations under our belt, you can trust us.<br/> We can transfer your WordPress site to a new Host/Domain in 1 Business Day. We will make sure everything is transferred and works properly.", tech_bank); ?>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?>
																	</a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/wordpress/wordpress-migration-transfer-service-backup-restore/" target="_blank"><?php _e("Read More", tech_bank); ?>
																	</a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 49 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 1 Business Day.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3>
																	<?php _e("WordPress Virus Removal Services & Security Review", tech_bank); ?>
																</h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We will review the Security of your Website and make necessary changes as required. We will run virus scans and delete viruses and malicious softwares found.<br/> A detailed report would be submitted once we finish our job.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?></a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/wordpress/wordpress-virus-removal-services-security-review/" target="_blank"><?php _e("Read More", tech_bank); ?></a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 49 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 2 Business Days.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3>
																	<?php _e("WordPress Plugin Customization", tech_bank); ?>
																</h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We can customize your existing WordPress Plugin to match your goals. We will modify existing code with some new or modified features as required. We will make sure all functionality works properly once the customization is complete.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?>
																	</a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/wordpress/wordpress-plugin-customization/" target="_blank"><?php _e("Read More", tech_bank); ?>
																	</a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 499 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3>
																	<?php _e("Expert Custom WordPress Plugin Development", tech_bank); ?>
																</h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We are a Team of Experts in developing Custom WordPress Plugins.<br/>Our Goal is to provide you with the best, optimized and satisfactory results to your development needs. We ensure you with clean and optimized code increasing your plugin's efficiency.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?></a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/wordpress/expert-custom-wordpress-plugin-development/" target="_blank"><?php _e("Read More", tech_bank); ?></a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 799 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3><?php _e("WordPress Optimization", tech_bank); ?></h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We can Increase your site's traffic by improving search engine results. We will perform some actions such as HTML, CSS & JS Minification, Improve basic load time, Optimize images for SEO etc. to enhance your WordPress Website Speed.<br/>A detailed report would be submitted once we finish our job.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?></a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/wordpress/wordpress-seo-optimization/" target="_blank"><?php _e("Read More", tech_bank); ?></a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 99 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3><?php _e("HTML to WordPress", tech_bank); ?></h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We can convert your HTML into WordPress Theme as needed.<br/>We will provide you the User friendly Interface for Managing contents with an easily understandable documentation. We ensure you the clean and optimized code increasing your theme's efficiency.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?></a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/wordpress/html-wordpress/" target="_blank"><?php _e("Read More", tech_bank); ?></a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 499 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3><?php _e("PSD to WordPress (Responsive)", tech_bank); ?></h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We can convert your PSD Design into WordPress Theme as required.<br/>The code would be fully Responsive, Optimized and Cross Browser Compatible.<br/>A detailed report would be submitted once we finish our job.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?></a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/wordpress/psd-wordpress-responsive/" target="_blank"><?php _e("Read More", tech_bank); ?></a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 799 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3><?php _e("WordPress Theme Customization", tech_bank); ?></h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("You will get a theme modified to match your goals. The .zip pack will contain modified installable WordPress Theme.<br/>This is a completed website on a working host loaded with custom contact forms, SEO configuration & Page Speed Optimization.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?></a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/wordpress/wordpress-theme-customization/" target="_blank"><?php _e("Read More", tech_bank); ?></a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 499 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 10 Business Days and 5 Revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3>
																	<?php _e("WordPress Theme Development", tech_bank); ?>
																</h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We can professionally develop a responsive WordPress theme which would be unique for your company.<br/>It would be compatible with all web browsers, Optimized for small screen devices, Professional coding and SEO friendly.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?></a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/wordpress/wordpress-theme-development/" target="_blank"><?php _e("Read More", tech_bank); ?></a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="vers column-rating">
															
														</div>
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 799 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div id="designs_graphics" class="framework_tab">
										<div class="wp-list-table  plugin-install">
											<div id="the-list">
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3><?php _e("Creative & Professional Brochure Design", tech_bank); ?></h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("Our goal is to produce professional, amazing and high quality brochure designs to target your customers. The brochure could be Bi-fold, Trifold or Multi-page as per your requirement.<br/>Design brochures in any style to advertise your business, product or services.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?></a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/design-and-graphics/creative-professional-brochure-design/" target="_blank"><?php _e("Read More", tech_bank); ?></a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 399 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 10 Business Days and upto 5 Revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3><?php _e("E-Books & Digital Design ", tech_bank); ?></h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("Provide you with unique concepts and eye-catching E-Book designs. 100% satisfaction is guaranteed with the concept and designs provided for your company.<br/>Send us the designs which you like and dislike which help us to gauge a style which suit your needs.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?></a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/design-and-graphics/e-books-digital-design/" target="_blank"><?php _e("Read More", tech_bank); ?></a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 399 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 10 Business Days and 5 Revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3><?php _e("Photo Customization", tech_bank); ?></h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We can retouch or manipulate the Graphics for you easily as required. Customizations could be: redesign, color correction and retouch for the existing Photos or Graphics.<br/>Best quality Photos are delivered in the format like jpg, png, tiff, PDF and PSD with transparent background, to make it flexible.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?></a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/design-and-graphics/photo-customization/" target="_blank"><?php _e("Order Now", tech_bank); ?></a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 399 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 5 Business Days and 3 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3><?php _e("Caricatures & Cartoon Design", tech_bank); ?></h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We can design the most creative Caricatures and Cartoon for your business, advertisement, or mobile game. We focus on colors, line qualities and styles to describe our character and design to make it flexible. Designs can be delivered in JPEG, PNG and PSD with transparent background, to make it easier to apply on graphic material.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?></a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/design-and-graphics/caricatures-cartoon-design/" target="_blank"><?php _e("Read More", tech_bank); ?></a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 499 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 7 Business Days and upto 5 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3><?php _e("App Icon Design", tech_bank); ?></h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We design own unique app icon that will really make your app extra special!<br>Our goal is to give your app a professional look with a great and original icon. Let us know any ideas you may have in mind, it would help us to fulfill your requirements easily.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?></a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/design-and-graphics/app-icon-design/" target="_blank"><?php _e("Read More", tech_bank); ?></a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 499 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 8 Business Days and upto 5 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3><?php _e("Label & Packaging Design", tech_bank); ?></h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("Complete packaging design solution for your products such as Labels, packs, bags and much more. Unique and original design to suite your needs, products and target consumers.<br/>The final product will be delivered to you in AI, EPS, PSD or PDF format, all editable.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?></a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/design-and-graphics/label-packaging-design/" target="_blank"><?php _e("Read More", tech_bank); ?></a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 499 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 8 Business Days and upto 5 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3><?php _e("CD Cover Artwork", tech_bank); ?></h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("Professionally and Creatively designed CD Artwork & Designs are available here. We provide you with original cover artwork, with multiple formats and if desired multiple dimensions too.<br>Tell us some ideas and preferences so that we can meet your needs.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?></a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/design-and-graphics/cd-cover-artwork/" target="_blank"><?php _e("Read More", tech_bank); ?></a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 499 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 8 Business Days and upto 5 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3><?php _e("Banner Design & Customization", tech_bank); ?></h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We customize from existing banner templates or start banner making from scratch as required.<br/>The final product is delivered in the format like jpg, png and PSD with transparent background, to make it flexible with other graphics.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?></a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/design-and-graphics/banner-design-customization/" target="_blank"><?php _e("Order Now", tech_bank); ?></a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 499 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 8 Business Days and upto 5 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div id="websites_programming" class="framework_tab">
										<div class="wp-list-table  plugin-install">
											<div id="the-list">
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3>
																	<?php _e("Website Design & Development", tech_bank); ?>
																</h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We design and develop professional websites with pixel perfect work and guaranteed satisfaction.<br/>We provide high quality and responsive Website designs that represents perfect image to your customers.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?>
																	</a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/website-programming/website-design-development/" target="_blank"><?php _e("Read More", tech_bank); ?>
																	</a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 799 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3>
																	<?php _e("Website Re-design & Customization", tech_bank); ?>
																</h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We can re-design your website to give it a unique and attractive look.<br/>100% satisfaction is guaranteed with the concept and designs provided. For Modifications of layout and design, send us the ideas which would help us to meet your needs.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?>
																	</a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/website-programming/website-redesign-customization/" target="_blank"><?php _e("Read More", tech_bank); ?>
																	</a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 499 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3>
																	<?php _e("Landing Page Design & Development", tech_bank); ?>
																</h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We can Design and Develop unique home page which is related to creativity and expression of ideas. The professional custom design, created by considering all your requirements and adapted to all your needs.<br/>Final Product as Organized & grouped layered PSD file, JPG or PNG file and Optimized Code with friendly services.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?>
																	</a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/website-programming/landing-page-design-development/" target="_blank"><?php _e("Read More", tech_bank); ?>
																	</a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 799 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3>
																	<?php _e("PHP Programming & Web Development", tech_bank); ?>
																</h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We are PHP experts ready to work on your project and provides you with SQL Injection Security Protection.<br/>Creation of any php script with secure and optimized code, integration on your project and compatible with your needs.<br/>We will make sure all the functionality and features works properly once the development process is completed.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?>
																	</a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/website-programming/php-programming-web-development/" target="_blank"><?php _e("Read More", tech_bank); ?>
																	</a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 799 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3>
																	<?php _e("Server Configuration & Management", tech_bank); ?>
																</h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We are here to install, manage or optimize your server efficiently.<br/>We specialize in Cpanel Server Management, Website Migration to new dedicated server and much more.<br/>Also, we can Install a Corn Job to Check yours Databases and Tables as needed.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?>
																	</a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/website-programming/server-configuration-management/" target="_blank"><?php _e("Read More", tech_bank); ?>
																	</a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 499 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3>
																	<?php _e("Bug Fixes & Error Handling", tech_bank); ?>
																</h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We are specialized into Website Troubleshooting which includes:<br/>PHP errors, Database errors, JavaScript errors and CSS errors and much more.<br/>Provide us the detailed description of issue with the error messages or log files to speed up the fix process.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?>
																	</a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/website-programming/bug-fixes-error-handling/" target="_blank"><?php _e("Read More", tech_bank); ?>
																	</a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 299 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3>
																	<?php _e(".Net Programming & Development", tech_bank); ?>
																</h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We are expertise to develop perfect .NET product and can deliver real worth to you in succinct solution.<br/>Our Service includes: .NET Application Migration, Custom .NET Programming, .NET Web Services Development and .NET Ecommerce Solutions.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?></a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/website-programming/net-programming-develpoment/" target="_blank"><?php _e("Read More", tech_bank); ?></a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 1999 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 30 Business Days and upto 10 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3>
																	<?php _e("Desktop Application Development & Customization", tech_bank); ?>
																</h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We are into Windows Software Development over years with our extensive development exposure. We have great experience in developing desktop applications using wide range of technologies. Provide us the detailed description of your project to meet your needs.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?></a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/website-programming/desktop-applications/" target="_blank"><?php _e("Read More", tech_bank); ?></a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 1999 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 30 Business Days and upto 10 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div id="company_brand" class="framework_tab">
										<div class="wp-list-table  plugin-install">
											<div id="the-list">
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3><?php _e("Professional Logo Design", tech_bank); ?></h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We are here to create your brand with Unique, Creative and Professional Logo Designs which suits your requirement. Logos would be in different file formats such as .ai, .eps, .psd, .pdf, jpg and transparent .png.<br/>We hand over 100% Copyrights to the final logo designs.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?></a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/company-branding/professional-logo-design/" target="_blank"><?php _e("Read More", tech_bank); ?></a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 499 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 5 Business Days and upto 3 Revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3><?php _e("Logo Customization", tech_bank); ?></h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We can redesign your existing logos to give it a unique and attractive look. We guaranteed 100% satisfaction with the concept and designs provided for the Company.<br/>For Modifications of concept and design, send us the ideas which would help us to meet your needs.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?></a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/company-branding/logo-customization/" target="_blank"><?php _e("Read More", tech_bank); ?></a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="vers column-rating">
															
														</div>
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 499 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 5 Business Days and 3 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3><?php _e("Stunning Flyer Design", tech_bank); ?></h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We can design unique flyer designs to get your name and logo in the market. The Designs would be creative, professional and eye-catching to attract your customers.<br/>Let us know any ideas you may have in mind, it would help us to fulfill your requirements easily.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?></a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/company-branding/stunning-flyer-design/" target="_blank"><?php _e("Read More", tech_bank); ?></a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="vers column-rating">
															
														</div>
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 499 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 8 Business Days and upto 5 Revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3><?php _e("Brand Stationery Design", tech_bank); ?></h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We are experts in unique Design package that includes:<br/>Custom Business Card, Letterhead and Envelope Design which are compatible with your needs.<br/>We focuses on creating a robust brand image and converting Strangers into your Customers!", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?></a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/company-branding/brand-stationery-design/" target="_blank"><?php _e("Read More", tech_bank); ?></a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 499 Pounds.", tech_bank); ?></strong></br>
															<span><?php _e("The Time Frame would be 8 Business Days and upto 5 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div id="ecommerce" class="framework_tab">
											<div class="wp-list-table  plugin-install">
											<div id="the-list">
												
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3>
																	<?php _e("WooCommerce Service Addition (+Theme Installation + Theme Customization + Payment Gateway Setup)", tech_bank); ?>
																</h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We are here to add products to your existing website, increasing the market value of your business. We also offer you with WooCommerce Theme Installation, Theme Customization and Payment Gateway Setup for website.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?>
																	</a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/e-commerce/woocommerce-service-addition/" target="_blank"><?php _e("Read More", tech_bank); ?>
																	</a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 99 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 2 Business Days and upto 5 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3>
																	<?php _e("WooCommerce Theme Development", tech_bank); ?>
																</h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("Our goal is to provide you with Professional and Unique WordPress WooCommerce Theme. The code would be fully Responsive, Optimized and supports Cross Browser Compatible, increasing market targets. We have ability to provide the best ecommerce solutions for your business.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?>
																	</a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/e-commerce/woocommerce-theme-development/" target="_blank"><?php _e("Read More", tech_bank); ?>
																	</a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 799 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3>
																	<?php _e("WooCommerce Theme Customization", tech_bank); ?>
																</h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We are here to customize your theme to match your requirements. Our goal is to give your theme a unique and professional look with great features and functionality. Let us know some ideas and preferences so that we can meet your needs.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?>
																	</a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/e-commerce/woocommerce-theme-customization/" target="_blank"><?php _e("Read More", tech_bank); ?>
																	</a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="vers column-rating">
														</div>
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 499 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3>
																	<?php _e("WooCommerce Plugin Development", tech_bank); ?>
																</h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("A team of WordPress Experts, now offering WooCommerce Plugin development. We provide high quality plugin and ensure you with proper working functionality. A detailed report with documentation would be submitted once we finish the development process.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?>
																	</a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/e-commerce/woocommerce-plugin-development/" target="_blank"><?php _e("Read More", tech_bank); ?>
																	</a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 799 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 10 Business Days and upto 5 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3>
																	<?php _e("WooCommerce Plugin Customization", tech_bank); ?>
																</h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We can integrate and customize WooCommerce plugin with additional functionalities to meet your demands.<br/>We will ensure that all functionality works properly with complete optimization and documentation once the customization is complete.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?>
																	</a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/e-commerce/woocommerce-plugin-customization/" target="_blank"><?php _e("Read More", tech_bank); ?>
																	</a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 499 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 8 Business Days and upto 4 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3>
																	<?php _e("WooCommerce Plugin Installation & Optimization", tech_bank); ?>
																</h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We are specialized in WooCommerce Plugin which includes :<br/>Installation and Optimization purchased WooCommerce Plugin.<br/>We guarantee you with 100% satisfaction with the results as per your requirement to match your goals and market demands.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?>
																	</a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/e-commerce/woocommerce-plugin-installation-optimization/" target="_blank"><?php _e("Read More", tech_bank); ?>
																	</a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 299 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 5 Business Days and upto 3 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												
												
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3>
																	<?php _e("WooCommerce Payment Gateway Integration", tech_bank); ?>
																</h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("Provide you with Default Payment Gateway integration such as PayPal, Bank Transfer, Credit Card and much more.<br/>Let us know, if you need any other type of Payment Gateway Integration with your website for your customers.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?>
																	</a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/e-commerce/woocommerce-payment-gateway-integration/" target="_blank"><?php _e("Read More", tech_bank); ?>
																	</a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 399 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 5 Business Days and upto 3 revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
												<div class="service-div-settings">
													<div class="service-div-settings-top">
														<div class="service-div-inner-content">
															<div class="name column-name">
																<h3>
																	<?php _e("Complete Shopping Cart Setup", tech_bank); ?>
																</h3>
															</div>
															<div class="desc column-description">
																<p>
																	<?php _e("We are specialized in setting up complete shopping cart for your website. We provide you with basic uploading of files and making the database connection to a complete store set up, we have packages to meet your needs.", tech_bank); ?>
																</p>
															</div>
														</div>
														<div class="action-links">
															<ul class="plugin-action-buttons-custom">
																<li>
																	<a class="plugin-div-button btn btn-success" href="http://tech-banker.com/contact-us/" target="_blank"><?php _e("Send Enquiry", tech_bank); ?>
																	</a>
																	<a class="plugin-div-button btn btn-danger" href="http://tech-banker.com/shop/e-commerce/complete-shopping-cart-setup/" target="_blank"><?php _e("Read More", tech_bank); ?>
																	</a>
																</li>
															</ul>
														</div>
													</div>
													<div class="plugin-card-bottom_settings">
														<div class="column-downloaded">
															<strong><?php _e("Cost of this Service is 799 Pounds.", tech_bank); ?></strong><br/>
															<span><?php _e("The Time Frame would be 10 Business Days and upto 5 Revisions.", tech_bank); ?></span>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
	jQuery(".framework_tabs .framework_tab-links a").on("click", function(e)
		{
			var currentAttrValue = jQuery(this).attr("href");
			// Show/Hide Tabs
			jQuery(".framework_tabs " + currentAttrValue).show().siblings().hide();
			// Change/remove current tab to active
			jQuery(this).parent("li").addClass("active").siblings().removeClass("active");
			e.preventDefault();
		});
	</script>
<?php 
}
?>