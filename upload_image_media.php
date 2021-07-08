<?php
// code upload image từ máy lên media
$image_url = 'https://sangodanang.gcosoftware.vn/wp-content/uploads/2021/01/banner1.jpg';

$upload_dir = wp_upload_dir(); // là array các đường dẫn trên máy+local
$image_data = file_get_contents( $image_url ); // lấy hình ảnh
$filename = basename( $image_url ); // lấy tên file

if ( wp_mkdir_p( $upload_dir['path'] ) ) {
  $file = $upload_dir['path'] . '/' . $filename;// /Applications/MAMP/htdocs/wptest/wp-content/uploads/2021/01 ./. $filename
}
else {
  $file = $upload_dir['basedir'] . '/' . $filename;// /Applications/MAMP/htdocs/wptest/wp-content/uploads ./. $filename
}

$wp_filetype = wp_check_filetype( $filename, null );// check đuôi + dạng của file upload

if($wp_filetype["type"] != "image/jpeg" && $wp_filetype["type"] != "image/png") {
    echo "Không đúng định dạng *.jpg hoặc *.png";
} else {
    file_put_contents( $file, $image_data );

    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => sanitize_file_name( $filename ),
        'post_content' => '',
        'post_status' => 'inherit'
    );

    $attach_id = wp_insert_attachment( $attachment, $file );
    require_once( ABSPATH . 'wp-admin/includes/image.php' );
    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
    wp_update_attachment_metadata( $attach_id, $attach_data );

    echo "Upload thành công";
}
?>