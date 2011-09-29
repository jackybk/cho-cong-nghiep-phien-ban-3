<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p><strong>Chỉnh sửa nội dung</strong></p>
</div>

<div class="info">
    <form method="post" enctype="multipart/form-data">
        <table class="infoTable">
            <tr>
                <th class="paddingT15">
                    <label for="widget_contents">Nội dung tập tin:</label></th>
                <td class="paddingT15 wordSpacing5">
                    <textarea id="widget_contents" style="width:500px; height:300px" name="code"><?php echo $this->_var['code']; ?></textarea>
                </td>
            </tr>
            <tr>
                <th></th>
                <td class="ptb20">
                    <input class="formbtn" type="submit" value="Gửi" />
                    <input class="formbtn" type="button" onclick="window.history.go(-1)" value="Quay lại" />
                </td>
            </tr>
        </table>
    </form>
</div>
<?php echo $this->fetch('footer.html'); ?>
