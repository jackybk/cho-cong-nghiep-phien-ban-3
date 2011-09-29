<?php echo $this->fetch('header.html'); ?>
<script language="javascript">
$(function(){
    $.getJSON('<?php echo $this->_var['spt']; ?>&jsoncallback=?',function(){});
    $.getJSON('http://ecmall.shopex.cn/system/notice2.php?charset=<?php echo $this->_var['cur_lang']; ?>&jsoncallback=?',function(data){
        var message='';
        $.each(data,function(i){
            message += '<li>' + data[i] + '</li>';
        });
        $('#news').html(message);
    }
);
});
<?php if ($this->_var['dangerous_apps']): ?>
var dangerous_apps = '';
<?php $_from = $this->_var['dangerous_apps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'da');if (count($_from)):
    foreach ($_from AS $this->_var['da']):
?>
dangerous_apps += "<?php echo $this->_var['da']; ?>\r\n";
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
alert(dangerous_apps);
<?php endif; ?>
</script>
<div id="rightTop">
<p>
    Xin chào, <b><?php echo $this->_var['admin']['user_name']; ?></b>&nbsp;&nbsp;&nbsp;
    <!--[ <a target="_blank" href="<?php echo $this->_var['site_url']; ?>/index.php?app=message&amp;act=inbox" class="tidings">Tin tức</a>: <?php echo $this->_var['new']['total']; ?> ]
-->    Lần đăng nhập cuối:&nbsp; <?php echo local_date("Y-m-d H:i:s",$this->_var['admin']['last_login']); ?> &nbsp;&nbsp;&nbsp;IP đăng nhập cuối:&nbsp; <?php echo $this->_var['admin']['last_ip']; ?>
</p>
</div>
<dl id="rightCon">
<?php if ($this->_var['dangerous_apps']): ?>
<dt>Cảnh báo</dt>
<dd>
    <ul style="color:red; font-weight:bold;">
        <?php $_from = $this->_var['dangerous_apps']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'da');if (count($_from)):
    foreach ($_from AS $this->_var['da']):
?>
        <li><?php echo $this->_var['da']; ?></li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
</dd>
<?php endif; ?>
<dt>Tin tức mới</dt>
<dd>
    <ul id="news">
    </ul>
</dd>
<?php if ($this->_var['remind_info']): ?>
<dt>Thông báo cho quản trị</dt>
<dd>
    <ul>
        <?php $_from = $this->_var['remind_info']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'remind');if (count($_from)):
    foreach ($_from AS $this->_var['remind']):
?>
        <li><?php echo $this->_var['remind']; ?></li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
</dd>
<?php endif; ?>
<dt>Tin mới trong tuần</dt>
<dd>
    <table>
        <tr>
            <th>Thành viên mới:</th>
            <td class="td"><?php echo $this->_var['news_in_a_week']['new_user_qty']; ?></td>
            <th>Số lượng của hàng mới:</th>
            <td class="td"><?php echo $this->_var['news_in_a_week']['new_store_qty']; ?>/<?php echo $this->_var['news_in_a_week']['new_apply_qty']; ?></td>
        </tr>
        <tr>
            <th>Số lượng sản phẩm mới:</th>
            <td class="td"><?php echo $this->_var['news_in_a_week']['new_goods_qty']; ?></td>
            <th>Đơn hàng mới:</th>
            <td class="td"><?php echo $this->_var['news_in_a_week']['new_order_qty']; ?></td>
        </tr>
    </table>
</dd>
<dt>Thống kê</dt>
<dd>
    <table>
        <tr>
            <th>Tổng số thành viên:</th>
            <td class="td"><?php echo $this->_var['stats']['user_qty']; ?></td>
            <th>Tổng số cửa hàng:</th>
            <td class="td"><?php echo $this->_var['stats']['store_qty']; ?>/<?php echo $this->_var['stats']['apply_qty']; ?></td>
        </tr>
        <tr>
            <th>Tổng số hàng hóa:</th>
            <td class="td"><?php echo $this->_var['stats']['goods_qty']; ?></td>
            <th>Tổng số đặt hàng:</th>
            <td class="td"><?php echo $this->_var['stats']['order_qty']; ?></td>
        </tr>
        <tr>
            <th>Tổng số đơn đặt hàng:</th>
            <td class="td"><?php echo price_format($this->_var['stats']['order_amount']); ?></td>
            <th></th>
            <td class="td"></td>
        </tr>
    </table>
</dd>
<dt>Thông tin hệ thống</dt>
<dd>
    <table>
        <tr>
            <th>Hệ điều hành Server:</th>
            <td class="td"><?php echo $this->_var['sys_info']['server_os']; ?></td>
            <th>WEB Server:</th>
            <td class="td"><?php echo $this->_var['sys_info']['web_server']; ?></td>
        </tr>
        <tr>
            <th>PHP Version:</th>
            <td class="td"><?php echo $this->_var['sys_info']['php_version']; ?></td>
            <th>MYSQL Version:</th>
            <td class="td"><?php echo $this->_var['sys_info']['mysql_version']; ?></td>
        </tr>
        <tr>
            <th>CNN Version:</th>
            <td class="td"><?php echo $this->_var['sys_info']['ecmall_version']; ?></td>
            <th>Ngày cài đặt:</th>
            <td class="td"><?php echo $this->_var['sys_info']['install_date']; ?></td>
        </tr>
    </table>
</dd>
</dl>
<?php echo $this->fetch('footer.html'); ?>
