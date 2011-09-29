<?php echo $this->fetch('member.header.html'); ?>
<script type="text/javascript">
var curr_template_name = '<?php echo htmlspecialchars($this->_var['curr_template_name']); ?>';
var curr_style_name    = '<?php echo htmlspecialchars($this->_var['curr_style_name']); ?>';
var preview_img = new Image();
preview_img.onload = function(){
    var d = DialogManager.get('preview_image');
    if (!d)
    {
        return;
    }

    if (d.getStatus() != 'loading')
    {

        return;
    }

    d.setWidth(this.width + 50);
    d.setPosition('center');
    d.setContents($('<img src="' + this.src + '" alt="" />'));
    ScreenLocker.lock();
};
preview_img.onerror= function(){
    alert('Xem trước bị lỗi');
    DialogManager.close('preview_image');
};
function preview_theme(template_name, style_name){
    var screenshot = '<?php echo $this->_var['site_url']; ?>/themes/store/' + template_name + '/styles/' + style_name + '/screenshot.jpg';

    var d = DialogManager.create('preview_image');
    d.setTitle('Xem trước');
    d.setContents('loading', {'text':'loading'});
    d.setWidth(270);
    d.show('center');

    preview_img.src = screenshot;
}
function use_theme(template, style){
    var req = 'index.php?app=my_theme&act=set&template_name=' + template + '&style_name=' + style;
    var d = DialogManager.create('use_theme');
    d.setTitle('Sử dụng');
    d.setContents('loading', {'text':'loading'});
    d.setWidth(270);
    d.setStyle('dialog_has_title');
    d.show('center');
    $.getJSON(req, function(rtn){
        if (rtn.done)
        {
            $('#current_theme_img').attr('src', $('#themeimg_' + template + '_' + style).attr('src'));
            $('#current_template').html(template);
            $('#current_style').html(style);
            d.setTitle(lang.handle_successed);
            d.setContents('message', {'text' : rtn.msg});
        }
        else
        {
            d.setTitle(lang.error);
            d.setContents('message', {'type' : 'warning', 'text' : rtn.msg});
        }


    });

}
</script>
<div class="content">
    <div class="totline"></div><div class="botline"></div>
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
        <?php echo $this->fetch('member.submenu.html'); ?>
        <div class="wrap">

            <div class="public">

                <div class="information_index">
                    <div class="templet">
                        <div class="nonce"><img src="<?php echo $this->_var['site_url']; ?>/themes/store/<?php echo $this->_var['curr_template_name']; ?>/styles/<?php echo htmlspecialchars($this->_var['curr_style_name']); ?>/preview.jpg" width="160" height="110" id="current_theme_img" /></div>
                        <div class="txt">
                            <p>Tên cửa hàng:<span><?php echo htmlspecialchars($this->_var['store']['store_name']); ?></span><a href="<?php echo url('app=store&id=' . $this->_var['id']. ''); ?>" target="_blank" class="btn">Cửa hàng</a></p>
                            <p>Tên giao diện hiện tại:<b><?php echo htmlspecialchars($this->_var['curr_template_name']); ?></b></p>
                            <p>Tên style hiện tại:<b><?php echo htmlspecialchars($this->_var['curr_style_name']); ?></b></p>
                            <!--<div class="btn_layer">
                                <a href="javascript:void(0);" class="btn">Cửa hàng</a>
                            </div>-->
                        </div>
                    </div>
                    <h5 class="motif_title">Danh sách chủ đề</h5>
                    <div class="motif">
                        <ul>
                        <?php $_from = $this->_var['themes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'theme');if (count($_from)):
    foreach ($_from AS $this->_var['theme']):
?>
                            <li>
                                <p><a href="javascript:;" onclick="preview_theme('<?php echo htmlspecialchars($this->_var['theme']['template_name']); ?>', '<?php echo htmlspecialchars($this->_var['theme']['style_name']); ?>');"><img id="themeimg_<?php echo htmlspecialchars($this->_var['theme']['template_name']); ?>_<?php echo htmlspecialchars($this->_var['theme']['style_name']); ?>" src="<?php echo $this->_var['site_url']; ?>/themes/store/<?php echo htmlspecialchars($this->_var['theme']['template_name']); ?>/styles/<?php echo htmlspecialchars($this->_var['theme']['style_name']); ?>/preview.jpg"  width="200" height="140" ></a></p>
                                <h2>Tên giao diện: <?php echo htmlspecialchars($this->_var['theme']['template_name']); ?><br />Tên style: <?php echo htmlspecialchars($this->_var['theme']['style_name']); ?></h2>
                                <span>
                                    <a href="javascript:use_theme('<?php echo htmlspecialchars($this->_var['theme']['template_name']); ?>', '<?php echo htmlspecialchars($this->_var['theme']['style_name']); ?>');" class="employ">Sử dụng</a>
                                    <a href="javascript:preview_theme('<?php echo htmlspecialchars($this->_var['theme']['template_name']); ?>', '<?php echo htmlspecialchars($this->_var['theme']['style_name']); ?>');" class="preview">Xem trước</a>
                                </span>
                            </li>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </ul>
                    </div>
                 </div>
            </div>
            <div class="wrap_bottom"></div>
        </div>
        <div class="clear"></div>
        <div class="adorn_right1"></div>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
