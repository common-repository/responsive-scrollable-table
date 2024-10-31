<?php
/*
Plugin Name: Responsive Scrollable Table
Plugin URI:  https://www.pandasilk.com/wordpress-responsive-scrollable-table/
Description:  Wordpress Responsive Scrollable Table plugin makes  tables within WordPress content area  responsive.
Version: 1.0
Author: pandasilk
Author URI: https://www.pandasilk.com/wordpress-responsive-scrollable-table/
Text Domain: responsive-scrollable-table
Domain Path: /languages
License: GPLv2 or later
*/

// Add Shortcode
function wrst_scrollable_table( $atts , $content = null ) {

	return '<div style="overflow-x:auto;"'. $content . '</div>';

}
add_shortcode( 'ScrollableTable', 'wrst_scrollable_table' );

//Add Buttons to WordPress Text Editor
function wrst_shortcode_button_script()
{
    if(wp_script_is("quicktags"))
    {
        ?>
            <script type="text/javascript">
               
                //this function is used to retrieve the selected text from the text editor
                function getSel()
                {
                    var txtarea = document.getElementById("content");
                    var start = txtarea.selectionStart;
                    var finish = txtarea.selectionEnd;
                    return txtarea.value.substring(start, finish);
                }

                QTags.addButton(
                    "code_shortcode",
                    "ScrollableTable",
                    callback
                );

                function callback()
                {
                    var selected_text = getSel();
                    QTags.insertContent("[ScrollableTable]" +  selected_text + "[/ScrollableTable]");
                }
            </script>
        <?php
    }
}

add_action("admin_print_footer_scripts", "wrst_shortcode_button_script");