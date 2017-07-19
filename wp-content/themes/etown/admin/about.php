<?php
function theme_options_panel(){
	add_dashboard_page( 'Sample Page Title', 'Sample', 'edit_posts', 'sample-slug', 'wps_theme_func_settings', 2); 
	add_action('admin_print_styles', 'my_plugin_admin_styles');
}
add_action('admin_menu', 'theme_options_panel');
function wps_theme_func(){
		echo '<div class="wrap"><div id="icon-users" class="icon32"><br></div>
		<h2>Theme</h2></div>';
}

function my_plugin_admin_styles() {
	wp_enqueue_script( array('jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-sortable') );
}

function wps_theme_func_settings(){ 
?>	
<div class="wrap">
	<div id="icon-themes" class="icon32"><br></div>	<h2>Menus</h2>

	<style>
		html>body #sortable li { height: 1.5em; line-height: 1.2em; }
	</style>
	<script>
		jQuery(function() {
			jQuery( "#menu-to-edit" ).sortable({
				placeholder: "sortable-placeholder"
			});
			jQuery( "#menu-to-edit" ).disableSelection();
		});
	</script>


	<div class="demo">
		<ul id="menu-to-edit" class="menu ui-sortable">
<?php for ($i = 1; $i <= 10; $i++) { ?>
			<li id="menu-item-<?php echo $i ?>" class="menu-item menu-item-depth-0 menu-item-page menu-item-edit-active">
				<dl class="menu-item-bar">
					<dt class="menu-item-handle">
						<span class="item-title">Title <?php echo $i ?></span>
						<span class="item-controls">
						<a class="item-edit" id="edit-20" title="Edit Menu Item" href="index.php?page=sample-slug#edit-menu-item=20#menu-item-settings-20">Edit Menu Item</a>
					</span>
					</dt>
				</dl>
				
				
				
				
				<div class="menu-item-settings" id="menu-item-settings-20" style="">
					<input id="contact_info_phone_number" name="contact_info_phone_number" size=20 type="file" value="ASDS" class="code"/><span class="description">Ex: 123.456.7890</span>;

	
					<input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[20]" value="20">
					<input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[20]" value="14">
					<input class="menu-item-data-object" type="hidden" name="menu-item-object[20]" value="page">
					<input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[20]" value="0">
					<input class="menu-item-data-position" type="hidden" name="menu-item-position[20]" value="3">
					<input class="menu-item-data-type" type="hidden" name="menu-item-type[20]" value="post_type">
				</div>
				
				
						
			</li>
<?php } ?>
		</ul>
	</div><!-- End demo -->

</div>


<?php

} 

?>