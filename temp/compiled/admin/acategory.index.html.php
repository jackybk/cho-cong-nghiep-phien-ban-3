<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
$(function()
{
    var map = <?php echo $this->_var['map']; ?>;
    if (map.length > 0)
    {
        var option = {openImg: "templates/style/images/treetable/tv-collapsable.gif", shutImg: "templates/style/images/treetable/tv-expandable.gif", leafImg: "templates/style/images/treetable/tv-item.gif", lastOpenImg: "templates/style/images/treetable/tv-collapsable-last.gif", lastShutImg: "templates/style/images/treetable/tv-expandable-last.gif", lastLeafImg: "templates/style/images/treetable/tv-item-last.gif", vertLineImg: "templates/style/images/treetable/vertline.gif", blankImg: "templates/style/images/treetable/blank.gif", collapse: false, column: 1, striped: false, highlight: true, state:false};
        $("#treet1").jqTreeTable(map, option);
    }
});
</script>
<div id="rightTop">
    <p>Quản lý danh mục tin tức</p>
    <ul class="subnav">
        <li><span>Danh sách</span></li>
        <li><a class="btn1" href="index.php?app=acategory&amp;act=add">Thêm mới</a></li>
    </ul>
</div>
<div class="info2">
    <table class="distinction">
        <?php if ($this->_var['acategories']): ?>
        <thead>
            <tr>
                <th class="w30"><input id="checkall_1" type="checkbox" class="checkall" /></th>
                <th width="50%"><span class="all_checkbox">
                    <label for="checkall_1">Chọn tất cả</label>
                    </span>Tên danh mục tin tức</th>
                <th>Thứ tự hiển thị</th>
                <th class="handler">Hành động</th>
            </tr>
        </thead>
        <tbody id="treet1">
            <?php endif; ?>
            <?php $_from = $this->_var['acategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'acategory');if (count($_from)):
    foreach ($_from AS $this->_var['acategory']):
?>
            <tr>
                <td class="align_center w30"><?php if (! $this->_var['acategory']['code']): ?>
                    <input type="checkbox" class="checkitem" value="<?php echo $this->_var['acategory']['cate_id']; ?>" />
                    <?php endif; ?></td>
                <td class="node" width="50%"><span ectype="inline_edit" fieldname="cate_name" fieldid="<?php echo $this->_var['acategory']['cate_id']; ?>" required="1" class="node_name editable"><?php echo htmlspecialchars($this->_var['acategory']['cate_name']); ?></span></td>
                <td class="align_center"><?php if (! $this->_var['acategory']['code']): ?>
                    <span ectype="inline_edit" fieldname="sort_order" fieldid="<?php echo $this->_var['acategory']['cate_id']; ?>" datatype="pint" maxvalue="255" class="editable"><?php echo $this->_var['acategory']['sort_order']; ?></span>
                    <?php endif; ?></td>
                <td class="handler"><span>
                    <?php if (! $this->_var['acategory']['code']): ?>
                    <a href="index.php?app=acategory&amp;act=edit&amp;id=<?php echo $this->_var['acategory']['cate_id']; ?>">Sửa</a> | <a href="javascript:if(confirm('Hủy bỏ loại sẽ gây ảnh hưởng tới nhiều hiếu tố khác! Bạn có chắc chắn muốn xóa?'))window.location = 'index.php?app=acategory&amp;act=drop&amp;id=<?php echo $this->_var['acategory']['cate_id']; ?>';">Xóa</a>
                    <?php endif; ?>
                    <?php if ($this->_var['acategory']['layer'] < $this->_var['max_layer'] && $this->_var['acategory']['parent_children_valid']): ?>
                    <?php if (! $this->_var['acategory']['code']): ?>
                    |
                    <?php endif; ?>
                    <a href="index.php?app=acategory&amp;act=add&amp;pid=<?php echo $this->_var['acategory']['cate_id']; ?>">Thêm</a>
                    <?php endif; ?>
                    </span> </td>
            </tr>
            <?php endforeach; else: ?>
            <tr class="no_data">
                <td colspan="4">Không điều mục hạng</td>
            </tr>
            <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <?php if ($this->_var['acategories']): ?>
        </tbody>
        <?php endif; ?>
        <tfoot>
            <tr class="tr_pt10">
                <?php if ($this->_var['acategories']): ?>
                <td class="align_center"><label for="checkall1">
                    <input id="checkall_2" type="checkbox" class="checkall">
                    </label></td>
                <td colspan="3" id="batchAction"><span class="all_checkbox">
                    <label for="checkall_2">Chọn tất cả</label>
                    </span>&nbsp;&nbsp;
                    <input class="formbtn batchButton" type="button" value="Xóa" name="id" uri="index.php?app=acategory&act=drop" presubmit="confirm('Hủy bỏ loại sẽ gây ảnh hưởng tới nhiều hiếu tố khác! Bạn có chắc chắn muốn xóa?');" />
                    <!--<input class="formbtn batchButton" type="button" value="lang.update_order" name="id" presubmit="updateOrder(this);" />-->
                </td>
                <?php endif; ?>
            </tr>
        </tfoot>
    </table>
</div>
<?php echo $this->fetch('footer.html'); ?>