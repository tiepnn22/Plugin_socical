<h1>Quản lý Tuỳ chỉnh</h1>
<form method="post" action="" class="form_option">
    <table>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?php echo $email; ?>" placeholder="email"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td><textarea name="password" placeholder="pass" cols="40" rows="6"><?php echo $pass; ?></textarea></td>
        </tr>
        <tr>
            <td>Nhập đường dẫn ảnh logo</td>
            <td><input type="text" name="logo" value="<?php echo $logo; ?>" placeholder="logo"></td>
        </tr>


        <tr>
            <td>vùng danh mục 1</td>
            <td><input type="text" name="vung1" value="<?php echo $vung1; ?>" placeholder="vung1"></td>
        </tr>
        <tr>
            <td>vùng danh mục 2</td>
            <td><input type="text" name="vung2" value="<?php echo $vung2; ?>" placeholder="vung2"></td>
        </tr>
        <tr>
            <td>vùng danh mục 3</td>
            <td><input type="text" name="vung3" value="<?php echo $vung3; ?>" placeholder="vung3"></td>
        </tr>


        <tr>
            <td>select id danh muc</td>
            <td>
                <select name="osdm">
                    <?php
                        $terms = get_terms('san-pham-category', array(
                            'parent'=> 0,
                            'hide_empty' => false
                        ) );
                        foreach($terms as $term){
                            $b = $term->term_id;
                            $c = $term->name;

                            $osdm = get_option('theme_option_danh_muc');
                            ?>
                                <option value="<?php echo $b; ?>" <?php if($osdm == $b) { echo 'selected="selected"'; } ?> >
                                    <?php echo $c; ?>
                                </option>
                            <?php
                        }
                    ?>
                </select>
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
    .form_option input, form textarea {
        width: 100%;
    }
</style>