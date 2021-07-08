<?php
// Add menu con vào một menu cha
function add_submenu_options() {
    add_submenu_page(
        'options-general.php',  // Menu cha
        'Tuỳ chỉnh',            // Tiêu đề của menu
        'Tuỳ chỉnh',            // Tên của menu
        'manage_options',       // Vùng truy cập, giá trị này có ý nghĩa chỉ có supper admin và admin đc dùng
        'theme-options',        // Slug của menu
        'access_menu_options'   // function hiển thị nội dung của menu (ở dưới)
    );
}
add_action('admin_menu', 'add_submenu_options');

// Hàm xử lý khi click vào menu trên thì hiện ra cái gì
function access_menu_options() { 
    if (!empty($_POST['save_option'])) {
        $phone      = $_POST['your-phone'];
        $messenger  = $_POST['your-messenger'];
        $chatfb     = $_POST['your-chatfb'];
        $backtop    = $_POST['your-backtop'];

        // Cập nhật (nếu chưa có thì hệ thống tự thêm mới)
        update_option('option_phone', $phone);
        update_option('option_messenger', $messenger);
        update_option('option_chatfb', $chatfb);
        update_option('option_backtop', $backtop);
    }

    // Lấy thông tin trong bảng Options, phải để code này sau phần if ở trên vì nó load sau thấy đc luôn kq trong form
    $phone      = get_option('option_phone');
    $messenger  = get_option('option_messenger');
    $chatfb     = get_option('option_chatfb');
    $backtop    = get_option('option_backtop');

    require('template/gco_option.php');
}
?>