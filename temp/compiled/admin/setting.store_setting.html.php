<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p>Cấu hình hệ thống</p>
    <ul class="subnav">
        <li><a class="btn4" href="index.php?app=setting&amp;act=base_setting">Thông tin cơ bản</a></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=base_information">Cấu hình website</a></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=email_setting">Cấu hình email</a></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=captcha_setting">Mã bảo vệ</a></li>
        <li><span>Cấu hình cửa hàng</span></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=credit_setting">Cấu hình tích hợp</a></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=subdomain_setting">Tên miền phụ</a></li>
        </ul>
</div>

<div class="info">
    <form method="post" enctype="multipart/form-data">
        <table class="infoTable">
            <tr>
                <th class="paddingT15">
                    Cho phép cửa hàng:</th>
                <td class="paddingT15 wordSpacing5">
                    <input id="store_allow0" type="radio" name="store_allow" <?php if ($this->_var['setting']['store_allow'] == 0): ?>checked<?php endif; ?> value="0" /> <label for="store_allow0">Đóng</label>
                    <input id="store_allow1" type="radio" name="store_allow" <?php if ($this->_var['setting']['store_allow'] == 1): ?>checked<?php endif; ?> value="1" /> <label for="store_allow1">Mở</label>
                </td>
            </tr>
            <tr>
            <th></th>
            <td class="ptb20">
                <input class="formbtn" type="submit" name="Submit" value="Gửi" />
                <input class="formbtn" type="reset" name="Submit2" value="Làm lại" />
            </td>
        </tr>
        </table>
    </form>
</div>
<?php echo $this->fetch('footer.html'); ?>
