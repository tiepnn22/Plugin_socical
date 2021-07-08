<?php
// Hàm add_option       tạo
    // add_option('mailer_gmail_username', 'nguyenngoctiep@gmail.com');
    // add_option('mailer_gmail_password', 'nguyentiep');
    // add_option('logo', 'http://localhost/wordpress/wp-content/uploads/2016/12/favico.png');
// Hàm get_option       lấy
    // echo get_option('mailer_gmail_username');
    // echo get_option('mailer_gmail_password');
    // echo get_option('logo');
// Hàm delete_option    xoá
    // delete_option('mailer_gmail_username');
    // delete_option('mailer_gmail_password');
    // delete_option('logo');
// Hàm update_option    sửa
    // echo get_option('mailer_gmail_password');
    // update_option('mailer_gmail_password', 'TIEPNGUYEN');
    // echo get_option('mailer_gmail_password');


// Add menu con vào một menu cha
function add_submenu_options() {
    add_submenu_page(
        'themes.php',           // Menu cha
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
        $email  = $_POST['email'];
        $pass   = $_POST['password'];
        $logo   = $_POST['logo'];

        $vung1  = $_POST['vung1'];
        $vung2  = $_POST['vung2'];
        $vung3  = $_POST['vung3'];

        $osdm   = $_POST['osdm'];

        // Cập nhật (nếu chưa có thì hệ thống tự thêm mới)
        update_option('mailer_gmail_username', $email);
        update_option('mailer_gmail_password', $pass);
        update_option('logo', $logo);

        update_option('vung1', $vung1);
        update_option('vung2', $vung2);
        update_option('vung3', $vung3);

        update_option('theme_option_danh_muc', $osdm);
    }
    
    // Lấy thông tin trong bảng Options, phải để code này sau phần if ở trên vì nó load sau thấy đc luôn kq trong form
    $email  = get_option('mailer_gmail_username');
    $pass   = get_option('mailer_gmail_password');
    $logo   = get_option('logo');

    $vung1  = get_option('vung1');
    $vung2  = get_option('vung2');
    $vung3  = get_option('vung3');
     
    $osdm   = get_option('theme_option_danh_muc');

    require('template/theme-option.php');
}
?>