<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
$(function(){
    $('#article_form').validate({
        errorPlacement: function(error, element){
            $(element).next('.field_notice').hide();
            $(element).after(error);
        },
        success       : function(label){
            label.addClass('right').text('OK!');
        },
        rules : {    
            title : {
                required : true
            },
            cate_id :{
                required : true
            },
            link    :{
                url     : true
            },
            sort_order:{
               number   : true
            }
        },
        messages : {
            title : {
                required : 'Tiêu đề của tin tức không thể để trống'
            },
            cate_id : {
                required : 'Tên danh mục không thể để trống'
            },
            link    : {
                url     : 'Xin vui lòng nhập một URL hợp lệ'
            },
            sort_order  : {
                number   : 'Chỉ nhập số'
            }
        }
    });
});

function add_uploadedfile(file_data)
{
    var newImg = '<tr id="' + file_data.file_id + '" class="tatr2"><input type="hidden" name="file_id[]" value="' + file_data.file_id + '" /><td><img width="40px" height="40px" src="' + SITE_URL + '/' + file_data.file_path + '" /></td><td>' + file_data.file_name + '</td><td><a href="javascript:insert_editor(\'' + file_data.file_name + '\', \'' + file_data.file_path + '\');">Chèn hình ảnh vào bài viết</a> | <a href="javascript:drop_uploadedfile(' + file_data.file_id + ');">Xóa</a></td></tr>';
    $('#thumbnails').prepend(newImg);
}
function insert_editor(file_name, file_path){
    tinyMCE.execCommand('mceInsertContent', false, '<img src="'+ SITE_URL +'/' + file_path + '" alt="'+ file_name + '">');
}
function drop_uploadedfile(file_id)
{
    if(!window.confirm(lang.uploadedfile_drop_confirm)){
        return;
    }
    $.getJSON('index.php?app=article&act=drop_uploadedfile&file_id=' + file_id, function(result){
        if(result.done){
            $('#' + file_id).remove();
        }else{
            alert('drop_error');
        }
    });
}
</script>
<?php echo $this->_var['build_editor']; ?>
<?php echo $this->_var['build_upload']; ?>
<div id="rightTop">
    <p>Quản lý danh sách tin tức</p>
    <ul class="subnav">
        <li><a class="btn1" href="index.php?app=article">Danh sách</a></li>
        <?php if ($this->_var['article']['article_id']): ?>
        <li><a class="btn1" href="index.php?app=article&amp;act=add">Thêm mới</a></li>
        <?php else: ?>
        <li><span>Thêm mới</span></li>
        <?php endif; ?>
    </ul>
</div>

<div class="info">
    <form method="post" enctype="multipart/form-data" id="article_form">
        <table class="infoTable">
            <tr>
                <th class="paddingT15">
                    Tiêu đề:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput" id="title" type="text" name="title" value="<?php echo htmlspecialchars($this->_var['article']['title']); ?>" />
                </td>
            </tr>
            <?php if (! $this->_var['article']['code']): ?>
            <tr>
                <th class="paddingT15">
                    <label for="cate_id">Danh mục tin tức:</label></th>
                <td class="paddingT15 wordSpacing5">
                    <select id="cate_id" name="cate_id">
                    <option value="">Hãy chọn...</option>
                    <?php echo $this->html_options(array('options'=>$this->_var['parents'],'selected'=>$this->_var['article']['cate_id'])); ?></select>
                </td>
            </tr>
            <tr>
                <th class="paddingT15">
                    Link:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput" id="link" type="text" name="link" value="<?php echo htmlspecialchars($this->_var['article']['link']); ?>" />
                </td>
            </tr>
            <tr>
                <th class="paddingT15">
                    <label for="if_show">Hiển thị:</label></th>
                <td class="paddingT15 wordSpacing5">
                    <input id="yes" type="radio" name="if_show" value="1" <?php if ($this->_var['article']['if_show'] == 1): ?> checked="checked"<?php endif; ?> />
                    <label for="yes">Có</label>
                    <input id="no" type="radio" name="if_show" value="0" <?php if ($this->_var['article']['if_show'] == 0): ?> checked="checked"<?php endif; ?> />
                    <label for="no">Không</label>
                </td>
            </tr>
            <tr>
                <th class="paddingT15">
                    Thứ tự hiển thị:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="sort_order" id="sort_order" type="text" name="sort_order" value="<?php echo $this->_var['article']['sort_order']; ?>" />
                </td>
            </tr>
            <?php endif; ?>
            <tr>
                <th class="paddingT15">
                    <label for="article">Nội dung tin tức:</label></th>
                <td class="paddingT15 wordSpacing5">
                    <textarea id="article" name="content" style="width:650px;height:400px;"><?php echo htmlspecialchars($this->_var['article']['content']); ?></textarea>
                </td>
            </tr>
            <tr>
            <th>Hình ảnh tải lên:</th>
            <td height="100" valign="top">
            <div id="divUploadTypeContainer">
                <input name="upload_types" id="bat_upload" type="radio" value="bat_upload" checked="checked" /> <label for="bat_upload">Multi file</label>
                <input name="upload_types" id="com_upload" type="radio" value="com_upload" /> <label for="com_upload">Single file</label>
            </div>
            <div id="divSwfuploadContainer">
                <div id="divButtonContainer">
                    <span id="spanButtonPlaceholder"></span>
                </div>
                <div id="divFileProgressContainer"></div>
            </div>
            <iframe id="divComUploadContainer" style="display:none;" src="index.php?app=comupload&act=view_iframe&id=<?php echo $this->_var['id']; ?>&belong=<?php echo $this->_var['belong']; ?>" width="500" height="46" scrolling="no" frameborder="0">
            </iframe>
            </td>
            </tr>
            <tr>
            <th>Hình đã được thông qua:</th>
            <td>                
            <div class="tdare">
    <table  width="600px" cellspacing="0" class="dataTable">
        <tbody id="thumbnails">
        <?php $_from = $this->_var['files_belong_article']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'file');if (count($_from)):
    foreach ($_from AS $this->_var['file']):
?>
        <tr class="tatr2" id="<?php echo $this->_var['file']['file_id']; ?>">
        <input type="hidden" name="file_id[]" value="<?php echo $this->_var['file']['file_id']; ?>" />
        <td><img alt="<?php echo $this->_var['file']['file_name']; ?>" src="<?php echo $this->_var['site_url']; ?>/<?php echo $this->_var['file']['file_path']; ?>" width="40px" height="40px" /></td>
        <td><?php echo $this->_var['file']['file_name']; ?></td>
        <td><a href="javascript:insert_editor('<?php echo $this->_var['file']['file_name']; ?>', '<?php echo $this->_var['file']['file_path']; ?>');">Chèn hình ảnh vào bài viết</a> | <a href="javascript:drop_uploadedfile(<?php echo $this->_var['file']['file_id']; ?>);">Xóa</a></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </tbody>
    </table>
</div>
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
