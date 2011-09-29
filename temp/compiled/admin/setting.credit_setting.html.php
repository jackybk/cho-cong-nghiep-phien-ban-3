<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p>Cấu hình hệ thống</p>
    <ul class="subnav">
        <li><a class="btn4" href="index.php?app=setting&amp;act=base_setting">Thông tin cơ bản</a></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=base_information">Cấu hình website</a></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=email_setting">Cấu hình email</a></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=captcha_setting">Mã bảo vệ</a></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=store_setting">Cấu hình cửa hàng</a></li>
        <li><span>Cấu hình tích hợp</span></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=subdomain_setting">Tên miền phụ</a></li>
        </ul>
</div>

<div class="info">
    <form method="post" enctype="multipart/form-data">
        <table class="infoTable">
            <tr>
                <th class="paddingT15">
                    Yêu cầu để được nâng cấp:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput" id="upgrade_required" type="text" name="upgrade_required" value="<?php echo $this->_var['setting']['upgrade_required']; ?>"/></td>
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
