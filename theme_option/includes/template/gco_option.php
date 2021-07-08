<h1>Quản lý Tuỳ chỉnh</h1>

<form method="post" action="" class="form_option">
    <table>
        <tr>
            <td>Phone, zalo</td>
            <td>
                <input type="text" name="your-phone" value="<?php echo $phone; ?>" placeholder="0359117301">
            </td>
        </tr>
        <tr>
            <td>Messenger</td>
            <td>
                <input type="text" name="your-messenger" value="<?php echo $messenger; ?>" placeholder="m.me/1869377543355898">
            </td>
        </tr>
        <tr>
            <td>Chat Facebook</td>
            <td>
                <textarea name="your-chatfb" placeholder="Nhúng iframe" cols="40" rows="6"><?php echo $chatfb; ?></textarea>
            </td>
        </tr>
        <tr>
            <td>Back to top</td>
            <td>
                <input type="checkbox" name="your-backtop" <?php if($backtop == 'on') { echo 'checked="checked"'; } ?>>
                Bạn có muốn hiển thị nút Back to top?
            </td>
        </tr>

        <tr>
            <td></td>
            <td><input type="submit" name="save_option" value="Lưu"/></td>
        </tr>
    </table>
</form>

<style type="text/css">
    .form_option table {
        background: #fff;
        padding: 10px;
    }
    .form_option input[type=text], form textarea {
        width: 100%;
    }
</style>