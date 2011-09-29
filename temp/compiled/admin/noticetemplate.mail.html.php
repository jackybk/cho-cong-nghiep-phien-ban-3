<?php echo $this->fetch('header.html'); ?>
<?php echo $this->_var['build_editor']; ?>
<div id="rightTop">
    <p>Thông báo mẫu</p>
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
                    Tiêu đề:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput" id="title" type="text" name="subject" value="<?php echo htmlspecialchars($this->_var['mailtemplate']['subject']); ?>" />
                </td>
            </tr>
            <tr>
                <th class="paddingT15">
                    <label for="link">Nội dung:</label></th>
                <td class="paddingT15 wordSpacing5">
                    <textarea style="width:650px;height:300px;" name="content"><?php echo $this->_var['mailtemplate']['content']; ?></textarea>
                </td>
            </tr>
            <?php if ($this->_var['cycleimg']['img']): ?>
            <?php endif; ?>
            <tr>
            <th></th>
            <td class="ptb20">
                <input type="hidden" name="version" value="<?php echo $this->_var['mailtemplate']['version']; ?>" />
                <input class="formbtn" type="submit" name="Submit" value="Gửi" />
                <input class="formbtn" type="reset" name="reset" value="Làm lại" />
            </td>
        </tr>
        </table>
    </form>
</div>
<?php echo $this->fetch('footer.html'); ?>
