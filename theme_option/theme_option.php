<?php
/*
	Plugin Name: Theme option
	Plugin URI: https://gco.vn
	Description: Tạo theme option
	Author: Nguyễn Ngọc Tiệp
	Author URI:
	Version: 1.0
*/

// Style
function gco_option_Style() {
    wp_register_style( 'gco_option-style', plugin_dir_url( __FILE__ )."dist/css/gco_option.css",false, 'all' );
    wp_enqueue_style('gco_option-style');

    wp_register_script( 'gco_option-script', plugin_dir_url( __FILE__ )."dist/js/gco_option.js", array('jquery'),false,true );
    wp_enqueue_script('gco_option-script');
}
if (!is_admin()) add_action('wp_enqueue_scripts', 'gco_option_Style');

require 'includes/option-api.php';

if ( !is_admin() && $GLOBALS['pagenow'] !== 'wp-login.php' ) {

    add_action('wp_footer', 'wpshout_action_example');
    function wpshout_action_example() {
        $socical_phone       = get_option('option_phone');
        $socical_messenger   = get_option('option_messenger');
        $socical_chat_fb     = get_option('option_chatfb');
        $socical_backtop     = get_option('option_backtop');
?>

    <div id="tool__society">
        <div class="tool__item">

            <?php if(!empty( $socical_phone )) { ?>
                <a href="tel:<?php echo $socical_phone; ?>" class="tool__icon tool__icon_tel" title="socical">
                    <img src="<?php echo plugin_dir_url( __FILE__ ).'dist/images/icon/icon-phone.png'; ?>" alt="socical">
                </a>
                <a href="https://zalo.me/<?php echo $socical_phone; ?>" class="tool__icon tool__icon_zalo" title="socical" target="_blank">
                    <img src="<?php echo plugin_dir_url( __FILE__ ).'dist/images/icon/icon-zalo.png'; ?>" alt="socical">
                </a>
            <?php } ?>

            <?php if(!empty( $socical_messenger )) { ?>
                <a href="https://<?php echo $socical_messenger; ?>" class="tool__icon tool__icon_mes" title="socical" target="_blank">
                    <img src="<?php echo plugin_dir_url( __FILE__ ).'dist/images/icon/icon-mes.png'; ?>" alt="socical">
                </a>
            <?php } ?>

            <?php if($socical_backtop == 'on') { ?>
            <a href="javascript:void(0)" id="back-to-top" class="tool__icon tool__icon_back" title="back to top">
                <img src="<?php echo plugin_dir_url( __FILE__ ).'dist/images/icon/icon-back.png'; ?>" alt="socical">
            </a>
            <?php } ?>

        </div>
    </div>

    <?php if(!empty( $socical_chat_fb )) { echo $socical_chat_fb; } ?>

<?php
    }
}
?>