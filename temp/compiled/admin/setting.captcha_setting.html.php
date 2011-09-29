<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p>Cấu hình hệ thống</p>
    <ul class="subnav">
        <li><a class="btn4" href="index.php?app=setting&amp;act=base_setting">Thông tin cơ bản</a></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=base_information">Cấu hình website</a></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=email_setting">Cấu hình email</a></li>
        <li><span>Mã bảo vệ</span></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=store_setting">Cấu hình cửa hàng</a></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=credit_setting">Cấu hình tích hợp</a></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=subdomain_setting">Tên miền phụ</a></li>
        </ul>
</div>

<div class="info">
    <form method="post" enctype="multipart/form-data">
        <table class="infoTable">
            <tr>
                <th class="paddingT15">
                    Sử dụng mã bảo vệ:</th>
              <td class="paddingT15 wordSpacing5">
                  <input id="captcha_status1" type="checkbox" name="captcha_status[login]" value="1" <?php if ($this->_var['setting']['captcha_status']['login']): ?>checked<?php endif; ?>/> <label for="captcha_status1">Đăng nhập</label>
                    <input id="captcha_status2" type="checkbox" name="captcha_status[register]" value="1" <?php if ($this->_var['setting']['captcha_status']['register']): ?>checked<?php endif; ?>/> <label for="captcha_status2">Đăng ký</label>
                     <input id="captcha_status3" type="checkbox" name="captcha_status[goodsqa]" value="1" <?php if ($this->_var['setting']['captcha_status']['goodsqa']): ?>checked<?php endif; ?>/> <label for="captcha_status3">Tư vấn sản phẩm</label> 
                    <input id="captcha_status4" type="checkbox" name="captcha_status[backend]" value="1" <?php if ($this->_var['setting']['captcha_status']['backend']): ?>checked<?php endif; ?>/> <label for="captcha_status4">Quay lại đăng nhập</label>                </td>
            </tr>
            <!--<tr>
                <th class="paddingT15">
                    Cho phép các lỗi đăng nhập:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput" id="captcha_error_login" type="text" name="captcha_error_login" value="<?php echo $this->_var['setting']['captcha_error_login']; ?>"/></td>
            </tr>-->
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
