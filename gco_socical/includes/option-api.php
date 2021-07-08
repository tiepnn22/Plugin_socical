<?php
// Style
function gco_socical_Style() {
    wp_register_style( 'gco_socical-style', plugin_dir_url( __FILE__ )."../dist/css/gco_socical.css",false, 'all' );
    wp_enqueue_style('gco_socical-style');

    wp_register_script( 'gco_socical-script', plugin_dir_url( __FILE__ )."../dist/js/gco_socical.js", array('jquery'),false,true );
    wp_enqueue_script('gco_socical-script');
}
if (!is_admin()) add_action('wp_enqueue_scripts', 'gco_socical_Style');

// Customize
function customizer_gco( $wp_customize ) {
    $wp_customize->add_section (
        'section_gco',
        array(
            'title' => 'GCO Socical',
            'description' => 'Nhớ cập nhật lại dữ liệu !',
            'priority' => 1
        )
    );

    //Phone, Zalo
    $wp_customize->add_setting (
        'option_phone',
        array(
            'default' => '0359117301'
        )
    );
    $wp_customize->add_control (
        'control_phone',
        array(
            'type' => 'text',
            'label' => 'Phone, zalo',
            'section' => 'section_gco',
            'settings' => 'option_phone'
        )
    );
    //Messenger
    $wp_customize->add_setting (
        'option_messenger',
        array(
            'default' => 'm.me/1869377543355898'
        )
    );
    $wp_customize->add_control (
        'control_messenger',
        array(
            'type' => 'text',
            'label' => 'Messenger',
            'section' => 'section_gco',
            'settings' => 'option_messenger'
        )
    );
    //Chat Facebook
    $wp_customize->add_setting (
        'option_chatfb',
        array(
            'default' => ''
        )
    );
    $wp_customize->add_control (
        'control_chatfb',
        array(
            'type' => 'textarea',
            'label' => 'Chat Facebook',
            'section' => 'section_gco',
            'settings' => 'option_chatfb'
        )
    );
    //Back to top
    $wp_customize->add_setting (
        'option_backtop'
    );
    // Tạo control
    $wp_customize->add_control(
        'control_backtop',
        array(
            'type' => 'checkbox',
            'label' => 'Bạn có muốn hiển thị nút Back to top ?',
            'section' => 'section_gco',
            'settings' => 'option_backtop'
        )
    );
}
add_action( 'customize_register', 'customizer_gco' );
?>