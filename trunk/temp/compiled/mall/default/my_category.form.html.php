<script type="text/javascript">
$(function(){
    $('#category_form').validate({
/*        errorPlacement: function(error, element){
            var _message_box = $(element).parent().parent().parent().parent().find('#warning');
            _message_box.find('#warning_info').hide();
            _message_box.append(error);
        },
        success       : function(label){
            label.addClass('validate_right').text('OK!');
        },*/
        errorLabelContainer: $('#warning'),
        invalidHandler: function(form, validator) {
           /*var errors = validator.numberOfInvalids();
           if(errors)
           {*/
               $('#warning').show();
           /*}
           else
           {
               $('#warning').hide();
           }*/
        },
        onfocusout : false,
        onkeyup    : false,
        rules : {
            cate_name : {
                required : true,
                remote   : {
                url :'index.php?app=my_category&act=check_category',
                type:'get',
                data:{
                    cate_name : function(){
                        return $('#cate_name').val();
                    },
                    parent_id : function() {
                        return $('#parent_id').val();
                    },
                    id : '<?php echo $this->_var['gcategory']['cate_id']; ?>'
                  }
                }
            },
            sort_order : {
                number   : true
            }
        },
        messages : {
            cate_name : {
                remote   : 'Tên danh mục đã tồn tại, xin vui lòng nhập lại.',
                required : 'Tên danh mục không thể để trống.'

            },
            sort_order  : {
                number   : 'Chỉ được nhập chữ số.'
            }
        }
    });
});
</script>
<ul class="tab">
    <li class="active"><?php if ($_GET['act'] == add): ?>Thêm<?php else: ?>Sửa<?php endif; ?></li>
</ul>
<div class="eject_con">
 <div class="adds">
        <div id="warning"></div>
        <form id="category_form" method="post" target="pop_warning" action="index.php?app=my_category&amp;act=<?php echo $_GET['act']; ?><?php if ($_GET['id']): ?>&amp;id=<?php echo $_GET['id']; ?><?php endif; ?>">
        <ul>
            <li>
                <h3>Tên:</h3>
                <p><input class="text width_normal" type="text" name="cate_name" id="cate_name" value="<?php echo htmlspecialchars($this->_var['gcategory']['cate_name']); ?>" /><label class="field_notice"></label></p>
            </li>
            <li>
                <h3>Danh mục cha:</h3>
                <p><select name="parent_id" id="parent_id">
                <option>Xin chọn...</option>
                <?php echo $this->html_options(array('options'=>$this->_var['parents'],'selected'=>$this->_var['gcategory']['parent_id'])); ?>
                </select></p>
            </li>
            <li>
                <h3>Sắp xếp theo:</h3>
                <p><input type="text" name="sort_order" value="<?php echo $this->_var['gcategory']['sort_order']; ?>"  class="text width_short"/></p>
            </li>
            <li>
                <h3>Hiển thị:</h3>
                <p><label>
                 <input type="radio" name="if_show" value="1" <?php if ($this->_var['gcategory']['if_show']): ?>checked="checked"<?php endif; ?> />
                Có</label>
                <label>
                <input type="radio" name="if_show" value="0" <?php if (! $this->_var['gcategory']['if_show']): ?>checked="checked"<?php endif; ?> />
                Không</label></p>
            </li>
        </ul>
        <div class="submit"><input type="submit" class="btn" value="Gửi" /></div>
        </form>
    </div>
</div>