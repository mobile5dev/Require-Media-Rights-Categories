<?php
/*
Plugin Name: Require Media Rights Categories
Plugin URI: http://example.com
Description: Adds a pop up box requiring Sports and Countries categories to be selected for Media Rights.
Version: 1.0
Author: David Yip <david.yip@mobile-5.com>
Author URI: http://example.com
License: A "Slug" license name e.g. GPL2
*/
add_action('admin_footer', 'require_media_rights_categories');
function require_media_rights_categories(){
	$screen = get_current_screen();
	if($screen->post_type == "media_right"){
		?>
		<script type="text/javascript">
      jQuery(function($){
        $('#publish, #save-post').click(function(e){
          if(!$('#media_category .tagchecklist span').length){
            alert("Please select a Sport for this Media Right.");
            e.stopImmediatePropagation();
            return false;
          }

          return true;
        });
      });
		</script>
		<?php
	}
	return true;
}
