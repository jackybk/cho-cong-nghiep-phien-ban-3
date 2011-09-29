<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
//<!CDATA[
$(function()
{
    var map = <?php echo $this->_var['map']; ?>;
    if (map.length > 0)
    {
        var option = {openImg: "templates/style/images/treetable/tv-collapsable.gif", shutImg: "templates/style/images/treetable/tv-expandable.gif", leafImg: "templates/style/images/treetable/tv-item.gif", lastOpenImg: "templates/style/images/treetable/tv-collapsable-last.gif", lastShutImg: "templates/style/images/treetable/tv-expandable-last.gif", lastLeafImg: "templates/style/images/treetable/tv-item-last.gif", vertLineImg: "templates/style/images/treetable/vertline.gif", blankImg: "templates/style/images/treetable/blank.gif", collapse: false, column: 1, striped: false, highlight: true, state:false};
        $("#treet1").jqTreeTable(map, option);
    }
});
//]]>
</script>

<div id="rightTop">
    <p>Thể loại</p>
    <ul class="subnav">
        <li><span>Danh sách</span></li>
        <li><a class="btn1" href="index.php?app=scategory&amp;act=add">Thêm mới</a></li>
        <li><a class="btn1" href="index.php?app=scategory&amp;act=export">Xuất</a></li>
        <li><a class="btn1" href="index.php?app=scategory&amp;act=import">Nhập</a></li>
    </ul>
</div>

<div class="info2">
    <table class="distinction">
        <?php if ($this->_var['scategories']): ?>
        <thead>
        <tr>
            <th class="w30"><input id="checkall_1" type="checkbox" class="checkall" /></th>
            <th width="50%"><span class="all_checkbox"><label for="checkall_1">Chọn tất cả</label></span>Tên thể loại</td>
            <th>Thứ tự hiển thị</th>
            <th class="handler">Hành động</th>
        </tr>
        </thead>
        <tbody id="treet1"><?php endif; ?>
        <?php $_from = $this->_var['scategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'scategory');if (count($_from)):
    foreach ($_from AS $this->_var['scategory']):
?>
        <tr>
            <td class="align_center w30"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['scategory']['cate_id']; ?>" /></td>
            <td class="node" width="50%"><span ectype="inline_edit" fieldname="cate_name" fieldid="<?php echo $this->_var['scategory']['cate_id']; ?>" required="1" title="Click vào đây để thay đổi" class="node_name editable"><?php echo htmlspecialchars($this->_var['scategory']['cate_name']); ?></span></td>
            <td class="align_center"><span ectype="inline_edit" fieldname="sort_order" fieldid="<?php echo $this->_var['scategory']['cate_id']; ?>" datatype="pint" maxvalue="255" title="Click vào đây để thay đổi" class="editable"><?php echo $this->_var['scategory']['sort_order']; ?></span></td>
            <td class="handler">
                <span><a href="index.php?app=scategory&amp;act=edit&amp;id=<?php echo $this->_var['scategory']['cate_id']; ?>">Sửa</a>
                |
                <a href="javascript:if(confirm('Hủy bỏ phân loại, các phân loại dưới sẽ bị hủy bỏ! Bạn có chắc chắn muốn xóa?'))window.location = 'index.php?app=scategory&amp;act=drop&amp;id=<?php echo $this->_var['scategory']['cate_id']; ?>';">Xóa</a><?php if ($this->_var['scategory']['layer'] < 2): ?> | <a href="index.php?app=scategory&amp;act=add&amp;pid=<?php echo $this->_var['scategory']['cate_id']; ?>">Thêm mục con</a><?php endif; ?>
                </span>
                </td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="4">Không có dữ liệu!</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <?php if ($this->_var['scategories']): ?></tbody><?php endif; ?>
        <tfoot>
            <tr class="tr_pt10">
            <?php if ($this->_var['scategories']): ?>
                <td class="align_center"><label for="checkall1"><input id="checkall_2" type="checkbox" class="checkall"></label></td>
                <td colspan="3" id="batchAction">
                    <span class="all_checkbox"><label for="checkall_2">Chọn tất cả</label></span>&nbsp;&nbsp;
                    <input class="formbtn batchButton" type="button" value="Xóa" name="id" uri="index.php?app=scategory&act=drop" presubmit="confirm('Hủy bỏ phân loại, các phân loại dưới sẽ bị hủy bỏ! Bạn có chắc chắn muốn xóa?');" />
Cập nhật
                </td>
            <?php endif; ?>
            </tr>
        </tfoot>

    </table>
</div>

<?php echo $this->fetch('footer.html'); ?>