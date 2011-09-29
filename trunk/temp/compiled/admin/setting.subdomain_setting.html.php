<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p>Cấu hình hệ thống</p>
    <ul class="subnav">
        <li><a class="btn4" href="index.php?app=setting&amp;act=base_setting">Thông tin cơ bản</a></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=base_information">Cấu hình website</a></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=email_setting">Cấu hình email</a></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=captcha_setting">Mã bảo vệ</a></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=store_setting">Cấu hình cửa hàng</a></li>
        <li><a class="btn4" href="index.php?app=setting&amp;act=credit_setting">Cấu hình tích hợp</a></li>
        <li><span>Tên miền phụ</span></li>
    </ul>
</div>

<div class="info">
    <form method="post">
        <table class="infoTable">
            <tr>
                <th class="paddingT15">
                    Dùng tên miền thứ cấp:</th>
                <td class="paddingT15 wordSpacing5">
                    <?php echo $this->html_radios(array('name'=>'enabled_subdomain','options'=>$this->_var['yes_or_no'],'checked'=>$this->_var['config']['enabled_subdomain'])); ?>
                <span class="grey">Kích hoạt tính năng tên miền thứ cấp cần hỗ trợ các cấu hình cụ thể tạo thuận lợi cho gói cài đặt, xem các thư mục tài liệu trong file cấu hình hai tên miền</span>
                </td>
            </tr>
            <tr>
                <th class="paddingT15">
                    Tên miền thứ cấp hậu tố:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput" id="subdomain_suffix" type="text" name="subdomain_suffix" value="<?php echo $this->_var['config']['subdomain_suffix']; ?>"/>
                <span class="grey">Ví dụ: Tên miền thứ cấp của người dùng sẽ được "test.mall.example.com", sau đó bạn chỉ cần điền vào "mall.example.com"</span>
                </td>
            </tr>
            <tr>
                <th class="paddingT15">
                    Dành tên miền:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput" id="subdomain_reserved" type="text" name="subdomain_reserved" value="<?php echo $this->_var['setting']['subdomain_reserved']; ?>"/>
                <span class="grey">Xin vui lòng nhập vào tên miền bạn muốn giữ trong hai, giữa các số lượng tên miền dành riêng","không riêng biệt</span>
                </td>
            </tr>
            <tr>
                <th class="paddingT15">
                    Chiều dài giới hạn:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput" id="subdomain_length" type="text" name="subdomain_length" value="<?php echo $this->_var['setting']['subdomain_length']; ?>"/>
                    <span class="grey">Giống như "3-12", thay mặt cho việc đăng ký tên miền hạn chế đến 3-12 ký tự</span>
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
