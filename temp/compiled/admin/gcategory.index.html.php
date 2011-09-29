<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ajax_tree.js'; ?>" charset="utf-8"></script>
<div id="rightTop">
    <p>Quản lý danh mục sản phẩm</p>
    <ul class="subnav">
        <li><span>Danh sách</span></li>
        <li><a class="btn1" href="index.php?app=gcategory&amp;act=add">Thêm mới</a></li>
        <li><a class="btn1" href="index.php?app=gcategory&amp;act=export">Xuất</a></li>
        <li><a class="btn1" href="index.php?app=gcategory&amp;act=import">Nhập</a></li>
    </ul>
</div>

<div class="info2">
    <table  class="distinction">
        <?php if ($this->_var['gcategories']): ?>
        <thead>
        <tr class="tatr1">
            <td class="w30"><input id="checkall_1" type="checkbox" class="checkall" /></td>
            <td width="50%"><span class="all_checkbox"><label for="checkall_1">Chọn tất cả</label></span>Tên danh mục</td>
            <td>Thứ tự hiển thị</td>
            <td>Hiển thị</td>
            <td class="handler">Hành động</td>
        </tr>
        </thead>
        <?php endif; ?>
        <?php if ($this->_var['gcategories']): ?><tbody id="treet1"><?php endif; ?>
        <?php $_from = $this->_var['gcategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gcategory');if (count($_from)):
    foreach ($_from AS $this->_var['gcategory']):
?>
        <tr>
            <td class="align_center w30"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['gcategory']['cate_id']; ?>" /></td>
            <td class="node" width="50%"><?php if ($this->_var['gcategory']['switchs']): ?><img src="templates/style/images/treetable/tv-expandable.gif" ectype="flex" status="open" fieldid="<?php echo $this->_var['gcategory']['cate_id']; ?>"><?php else: ?><img src="templates/style/images/treetable/tv-item.gif"><?php endif; ?><span class="node_name editable" ectype="inline_edit" fieldname="cate_name" fieldid="<?php echo $this->_var['gcategory']['cate_id']; ?>" required="1" title="Click vào đây để thay đổi"><?php echo htmlspecialchars($this->_var['gcategory']['cate_name']); ?></span></td>
            <td class="align_center"><span class="editable" ectype="inline_edit" fieldname="sort_order" fieldid="<?php echo $this->_var['gcategory']['cate_id']; ?>" datatype="number" title="Click vào đây để thay đổi"><?php echo $this->_var['gcategory']['sort_order']; ?></span></td>
            <td class="align_center"><?php if ($this->_var['gcategory']['if_show']): ?><img src="templates/style/images/positive_enabled.gif" ectype="inline_edit" fieldname="if_show" fieldid="<?php echo $this->_var['gcategory']['cate_id']; ?>" fieldvalue="1" title="Click vào đây để thay đổi"/><?php else: ?><img src="templates/style/images/positive_disabled.gif" ectype="inline_edit" fieldname="if_show" fieldid="<?php echo $this->_var['gcategory']['cate_id']; ?>" fieldvalue="0" title="Click vào đây để thay đổi"/><?php endif; ?></td>
            <td class="handler"><span><a href="index.php?app=gcategory&amp;act=edit&amp;id=<?php echo $this->_var['gcategory']['cate_id']; ?>">Sửa</a>
                |
                <a href="javascript:if(confirm('Bạn có chắc chắn muốn xóa? Các mục con dưới thể loại này sẽ bị xóa theo!'))window.location = 'index.php?app=gcategory&amp;act=drop&amp;id=<?php echo $this->_var['gcategory']['cate_id']; ?>';">Xóa</a><?php if ($this->_var['region']['layer'] < $this->_var['max_layer']): ?> | <a href="index.php?app=gcategory&amp;act=add&amp;pid=<?php echo $this->_var['gcategory']['cate_id']; ?>">Thêm mục con</a><?php endif; ?>
                </span>
                </td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="5">Không có dữ liệu</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <?php if ($this->_var['gcategories']): ?></tbody><?php endif; ?>
        <tfoot>
            <tr class="tr_pt10">
            <?php if ($this->_var['gcategory']): ?>
                <td class="align_center"><label for="checkall1"><input id="checkall_2" type="checkbox" class="checkall"></label></td>
                <td colspan="4" id="batchAction">
                    <span class="all_checkbox"><label for="checkall_2">Chọn tất cả</label></span>&nbsp;&nbsp;
                    <input class="formbtn batchButton" type="button" value="Xóa" name="id" uri="index.php?app=gcategory&act=drop" presubmit="confirm('Bạn có chắc chắn muốn xóa? Các mục con dưới thể loại này sẽ bị xóa theo!');" />
                    <input class="formbtn batchButton" type="button" value="Sửa" name="id" uri="index.php?app=gcategory&act=batch_edit" />
                    <!--<input class="formbtn batchButton" type="button" value="lang.update_order" name="id" presubmit="updateOrder(this);" />-->
                </td>
            <?php endif; ?>
            </tr>
        </tfoot>
    </table>
</div>

<?php echo $this->fetch('footer.html'); ?>