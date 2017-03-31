<?php
function UpdateManager_menu(){
  add_options_page('UpdateManager','WP Tips','manage_options','WPTips-UpdateManager.php','UpdateManager_manage');
}
add_action('admin_menu','UpdateManager_menu');

function UpdateManager_vars(){
  add_option('ne_selection');
  register_setting('UpdateManager_settings','ne_selection');
}
add_action('admin_init','UpdateManager_vars');

function UpdateManager_manage(){
  if(!current_user_can('manage_options')){
     wp_die(_('You do not have sufficient permissions to access this page.'));
  }
?>

<?php
//process choice

if (get_option( 'ne_selection' )=='1') define (AUTOMATIC_UPDATER_DISABLED, true);
else define (AUTOMATIC_UPDATER_DISABLED, false);
?>

<div>
  <h1>Welcome to WP Tips - Update Manager</h1>
  <p>Here you can decide whether to enable or disable the automatic updates of WordPress and all the plugins in your site.</p>
</div>

<div>
<form method="POST" action="options.php">
<?php
   settings_fields('UpdateManager_settings');
   do_settings_sections('UpdateManager_settings');
?>
   <h1>Settings</h1>
   <p>Do you want to disable all automatic updates of WordPress and all the plugins in your site ?</p>
   <input name="ne_selection" type="radio" value="1" <?php checked( '1', get_option( 'ne_selection' ) ); ?> >Yes
   <input name="ne_selection" type="radio" value="0" <?php checked( '0', get_option( 'ne_selection' ) ); ?> >No
   
<?php
   submit_button();
?>
</form>
</div>


<?php } ?>
