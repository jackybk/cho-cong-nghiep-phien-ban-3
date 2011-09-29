<?php echo $this->fetch('header.html'); ?>
<?php echo $this->_var['build_editor']; ?>
<div id="rightTop">
    <p>Quản lý Email thông báo</p>
    <ul class="subnav">
        <li><a class="btn1" href="index.php?app=mailtemplate&amp;type=<?php echo $this->_var['notice_mail']; ?>">Email mẫu</a></li>
        <li><a class="btn1" href="index.php?app=mailtemplate&amp;type=<?php echo $this->_var['notice_msg']; ?>">Tin nhắn mẫu</a></li>
    </ul>
</div>

<div class="info">
    <form method="post" enctype="multipart/form-data">
        <table class="infoTable">
            <tr>
                <th class="paddingT15">
                    <label for="link">Thông báo nội dung:</label></th>
                <td class="paddingT15 wordSpacing5">
                    <textarea style="width:650px;height:300px;" name="msgtemplate"><?php echo $this->_var['msgtemplate']; ?></textarea>
                </td>
            </tr>
            <tr>
            <th></th>
            <td class="ptb20">
                <input class="formbtn" type="submit" name="Submit" value="Gửi" />
                <input class="formbtn" type="reset" name="reset" value="Làm lại" />
            </td>
        </tr>
        </table>
    </form>
</div>
<?php echo $this->fetch('footer.html'); ?>
