<?php
/*
    Plugin Name: GCO - Show Socical
    Plugin URI: https://gco.vn/
    Description: GCO - Plugin Show Socical
    Author: Nguyễn Ngọc Tiệp
    Author URI:
    Version: 1.0
*/

require 'includes/option-api.php';

if ( !is_admin() && $GLOBALS['pagenow'] !== 'wp-login.php' ) {

    add_action('wp_footer', 'wpshout_action_example');
    function wpshout_action_example() {
        $socical_phone      = get_theme_mod( 'option_phone' );
        $socical_messenger  = get_theme_mod( 'option_messenger' );
        $socical_chatfb     = get_theme_mod( 'option_chatfb' );
        $socical_backtop    = get_theme_mod( 'option_backtop' );
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

            <?php if($socical_backtop == 1) { ?>
            <a href="javascript:void(0)" id="back-to-top" class="tool__icon tool__icon_back" title="back to top">
                <img src="<?php echo plugin_dir_url( __FILE__ ).'dist/images/icon/icon-back.png'; ?>" alt="socical">
            </a>
            <?php } ?>

        </div>
    </div>

    <?php if(!empty( $socical_chatfb )) { echo $socical_chatfb; } ?>

<?php
    }
}
?>