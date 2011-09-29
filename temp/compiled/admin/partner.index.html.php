<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p>Quản lý quảng cáo</p>
    <ul class="subnav">
        <li><span>Danh sách</span></li>
        <li><a class="btn1" href="index.php?app=partner&amp;act=add">Thêm mới</a></li>
    </ul>
</div>
<div class="mrightTop">
    <div class="fontl">
        <form method="get">
            <div class="left">
                <input type="hidden" name="app" value="partner" />
                <input type="hidden" name="act" value="index" />
                Tiêu đề:
                <input class="queryInput" type="text" name="title" value="<?php echo htmlspecialchars($this->_var['query']['title']); ?>" />
                <input type="submit" class="formbtn" value="Tìm" />
            </div>
            <?php if ($this->_var['filtered']): ?>
            <a class="left formbtn1" href="index.php?app=partner">Hủy bỏ</a>
            <?php endif; ?>
        </form>
    </div>
    <div class="fontr">
        <?php echo $this->fetch('page.top.html'); ?>
    </div>
</div>
<div class="tdare">
    <table width="100%" cellspacing="0" class="dataTable">
        <?php if ($this->_var['partners']): ?>
        <tr class="tatr1">
            <td width="20" class="firstCell"><input type="checkbox" class="checkall" /></td>
            <td>Tiêu đề</td>
            <td>Link</td>
            <td class="table-center">Logo</td>
            <td class="table-center">Thứ tự hiển thị</td>
            <td class="handler">Hành động</td>
        </tr>
        <?php endif; ?>
        <?php $_from = $this->_var['partners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'partner');if (count($_from)):
    foreach ($_from AS $this->_var['partner']):
?>
        <tr class="tatr2">
            <td class="firstCell"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['partner']['partner_id']; ?>" /></td>
            <td><?php echo $this->_var['partner']['title']; ?></td>
            <td><?php echo $this->_var['partner']['link']; ?></td>
            <td class="table-center"><?php if ($this->_var['partner']['logo']): ?><img src="<?php echo $this->_var['partner']['logo']; ?>" height="30"/><?php endif; ?></td>
            <td class="table-center"><span ectype="inline_edit" fieldname="sort_order" fieldid="<?php echo $this->_var['partner']['partner_id']; ?>" datatype="pint" maxvalue="255" class="editable" title="Click vào đây để thay đổi"><?php echo $this->_var['partner']['sort_order']; ?></span></td>
            <td class="handler">
            <a href="index.php?app=partner&amp;act=edit&amp;id=<?php echo $this->_var['partner']['partner_id']; ?>">Sửa</a>
                |
                <a href="javascript:drop_confirm('Bạn có chắc chắn muốn xóa nó?', 'index.php?app=partner&amp;act=drop&amp;id=<?php echo $this->_var['partner']['partner_id']; ?>');">Xóa</a>
            </td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="6">Không có dữ liệu</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
    <?php if ($this->_var['partners']): ?>
    <div id="dataFuncs">
        <div id="batchAction" class="left paddingT15">&nbsp;&nbsp;
            <input class="formbtn batchButton" type="button" value="Xóa" name="id" uri="index.php?app=partner&act=drop" presubmit="confirm('Bạn có chắc chắn muốn xóa nó?');" />
            &nbsp;&nbsp;
           <!-- <input class="formbtn batchButton" type="button" value="lang.update_order" name="id" presubmit="updateOrder(this);" />-->
        </div>
        <div class="pageLinks">
            <?php echo $this->fetch('page.bottom.html'); ?>
        </div>
        <div class="clear"></div>
    </div>
    <?php endif; ?>
</div>
<?php echo $this->fetch('footer.html'); ?>
