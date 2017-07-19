<?php 

add_action('admin_menu', 'add_contact_info_admin_page');
function add_contact_info_admin_page() {
	add_dashboard_page('Contact Info Menu', 'Contact Info', 'edit_posts', 'contact_info', 'contact_info_admin_page');
}

function contact_info_admin_page() {
?>
<div class="wrap">
	<div id="icon-options-general" class="icon32"><br></div>
	<h2>Contact Information</h2>
	<form action="options.php" method="post">
<?php settings_fields('contact_info_fields'); ?>
<?php do_settings_sections('contact_info'); ?>
		<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" /></p>
	</form>
</div>
<?php
}

function contact_info_default_section_description() {
	echo '';
}

add_action('admin_init', 'contact_info_admin_init');

function contact_info_admin_init(){
	add_settings_section('contact_info_default_section', '', 'contact_info_default_section_description', 'contact_info');
	register_setting('contact_info_fields', 'contact_info_email_address');
	add_settings_field('contact_info_email_address', 'Email Address', 'contact_info_email_address_field', 'contact_info', 'contact_info_default_section');
	register_setting('contact_info_fields', 'contact_info_phone_number');
	add_settings_field('contact_info_phone_number', 'Phone Number', 'contact_info_phone_number_field', 'contact_info', 'contact_info_default_section');
	register_setting('contact_info_fields', 'contact_info_address');
	add_settings_field('contact_info_address', 'Address', 'contact_info_address_field', 'contact_info', 'contact_info_default_section');
}

function contact_info_email_address_field() {
	echo '<input id="contact_info_email_address" name="contact_info_email_address" size=40 type="text" value="'.get_option('contact_info_email_address').'" class="code" />';
}

function contact_info_phone_number_field() {
	echo '<input id="contact_info_phone_number" name="contact_info_phone_number" size=20 type="text" value="'.get_option('contact_info_phone_number').'" class="code" /><span class="description">Ex: 123.456.7890</span>';
}

function contact_info_address_field() {
	echo '<input id="contact_info_address" name="contact_info_address" size=60 type="text" value="'.get_option('contact_info_address').'" class="code" /><br><span class="description">Ex: 123 fake st, city, mn</span>';
}

?>