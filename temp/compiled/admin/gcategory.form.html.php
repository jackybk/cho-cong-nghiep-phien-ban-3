<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
$(function(){
    $('#gcategory_form').validate({
        errorPlacement: function(error, element){
            $(element).next('.field_notice').hide();
            $(element).after(error);
        },
        success       : function(label){
            label.addClass('right').text('OK!');
        },
        onfocusout : false,
        onkeyup    : false,
        rules : {
            cate_name : {
                required : true,
                remote   : {                
                url :'index.php?app=gcategory&act=check_gcategory',
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
                required : 'Tên danh mục không được để trống',
                remote   : 'Tên thể loại đã tồn tại!'
            },
            sort_order  : {
                number   : 'Chỉ nhập số'
            }
        }
    });
});
</script>
<div id="rightTop">
    <p>Quản lý danh mục sản phẩm</p>
    <ul class="subnav">
        <li><a class="btn1" href="index.php?app=gcategory">Danh sách</a></li>
        <li><?php if ($this->_var['gcategory']['cate_id']): ?><a class="btn1" href="index.php?app=gcategory&amp;act=add">Thêm mới</a><?php else: ?><span>Thêm mới</span><?php endif; ?></li>
    </ul>
</div>
<div class="info">
    <form method="post" enctype="multipart/form-data" id="gcategory_form">
        <table class="infoTable">
            <tr>
                <th class="paddingT15">
                    Tên danh mục:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="infoTableInput2" id="cate_name" type="text" name="cate_name" value="<?php echo htmlspecialchars($this->_var['gcategory']['cate_name']); ?>" /> <label class="field_notice">Tên danh mục sản phẩm thêm mới</label>               </td>
            </tr>
            <tr>
                <th class="paddingT15">
                    <label for="parent_id">Danh mục cha:</label></th>
                <td class="paddingT15 wordSpacing5">
                    <select id="parent_id" name="parent_id"><option value="0">Hãy chọn...</option><?php echo $this->html_options(array('options'=>$this->_var['parents'],'selected'=>$this->_var['gcategory']['parent_id'])); ?></select> <label class="field_notice">Danh mục sản phẩm cha</label>               </td>
            </tr>
            <tr>
                <th class="paddingT15">
                    Thứ tự hiển thị:</th>
                <td class="paddingT15 wordSpacing5">
                    <input class="sort_order" id="sort_order" type="text" name="sort_order" value="<?php echo $this->_var['gcategory']['sort_order']; ?>" />  <label class="field_notice">Thứ tự hiển thị trên website</label>              </td>
            </tr>
            <tr>
              <th class="paddingT15">Hiển thị:</th>
              <td class="paddingT15 wordSpacing5"><p>
                <label>
                  <input type="radio" name="if_show" value="1" <?php if ($this->_var['gcategory']['if_show']): ?>checked="checked"<?php endif; ?> />
                  Có</label>
                <label>
                  <input type="radio" name="if_show" value="0" <?php if (! $this->_var['gcategory']['if_show']): ?>checked="checked"<?php endif; ?> />
                  Không</label> <label class="field_notice">Có hay không cho phép hiển thị?</label>
              </p></td>
            </tr>

          <tr>
            <th></th>
            <td class="ptb20">
                <input class="formbtn" type="submit" name="Submit" value="Gửi" />
                <input class="formbtn" type="reset" name="reset" value="Làm lại" />            </td>
        </tr>
        </table>
    </form>
</div>
<?php echo $this->fetch('footer.html'); ?>
