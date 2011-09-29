<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p>Quản lý thương hiệu</p>
    <ul class="subnav">
        <li><?php if ($this->_var['wait_verify']): ?><a class="btn1" href="index.php?app=brand">Danh sách</a><?php else: ?><span>Danh sách</span><?php endif; ?></li>
        <li><a class="btn1" href="index.php?app=brand&amp;act=add">Thêm mới</a></li>
        <li><?php if ($this->_var['wait_verify']): ?><span>Chờ duyệt</span><?php else: ?><a class="btn1" href="index.php?app=brand&amp;wait_verify=1">Chờ duyệt</a><?php endif; ?></li>
    </ul>
</div>
<div class="mrightTop">
    <div class="fontl">
        <form method="get">
            <div class="left">
                <input type="hidden" name="app" value="brand" />
                <input type="hidden" name="act" value="index" />
                <input type="hidden" name="wait_verify" value="<?php echo $this->_var['wait_verify']; ?>">
                Tên thương hiệu:
                <input class="queryInput" type="text" name="brand_name" value="<?php echo htmlspecialchars($this->_var['query']['brand_name']); ?>" />
                Thể loại:
                <input class="queryInput" type="text" name="tag" value="<?php echo htmlspecialchars($this->_var['query']['tag']); ?>">
                <input type="submit" class="formbtn" value="Tìm" />
            </div>
            <?php if ($this->_var['filtered']): ?>
            <a class="left formbtn1" href="index.php?app=brand&wait_verify=<?php echo $this->_var['wait_verify']; ?>">Hủy bỏ</a>
            <?php endif; ?>
      <span>
              </span></form>
    </div>
    <div class="fontr">
        <?php if ($this->_var['brands']): ?><?php echo $this->fetch('page.top.html'); ?><?php endif; ?>
    </div>
</div>
<div class="tdare">
    <table width="100%" cellspacing="0" class="dataTable">
        <?php if ($this->_var['brands']): ?>
        <tr class="tatr1">
            <td width="20" class="firstCell"><input type="checkbox" class="checkall" /></td>
            <td align="left"><span ectype="order_by" fieldname="brand_name">Tên thương hiệu</span></td>
            <td align="left"><span ectype="order_by" fieldname="tag">Thể loại</span></td>
            <td align="left" class="table-center">Logo</td>
            <?php if (! $this->_var['wait_verify']): ?>
             <td class="table-center"><span ectype="order_by" fieldname="sort_order">Thứ tự hiển thị</span></td>
            <td class="table-center"><span ectype="order_by" fieldname="recommended">Giới thiệu</span></td>
            <?php endif; ?>
            <td class="handler">Hành động</td>
        </tr>
        <?php endif; ?>
        <?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');if (count($_from)):
    foreach ($_from AS $this->_var['brand']):
?>
        <tr class="tatr2">
            <td class="firstCell"><input value="<?php echo $this->_var['brand']['brand_id']; ?>" class='checkitem' type="checkbox" /></td>
            <td align="left"><span ectype="inline_edit" fieldname="brand_name" fieldid="<?php echo $this->_var['brand']['brand_id']; ?>" required="1" class="editable" title="Click vào đây để thay đổi"><?php echo htmlspecialchars($this->_var['brand']['brand_name']); ?></span></td>
            <td align="left"><span ectype="inline_edit" fieldname="tag" fieldid="<?php echo $this->_var['brand']['brand_id']; ?>" required="1" class="editable" title="Click vào đây để thay đổi"><?php echo htmlspecialchars($this->_var['brand']['tag']); ?><span></td>
            <td align="left" class="table-center"><?php if ($this->_var['brand']['brand_logo']): ?><img src="<?php echo $this->_var['brand']['brand_logo']; ?>" height="30"/><?php endif; ?></td>
            <?php if (! $this->_var['wait_verify']): ?>
            <td class="table-center"><span ectype="inline_edit" fieldname="sort_order" fieldid="<?php echo $this->_var['brand']['brand_id']; ?>" datatype="pint" maxvalue="255" class="editable" title="Click vào đây để thay đổi"><?php echo $this->_var['brand']['sort_order']; ?></span></td>  
            <td class="table-center"><?php if ($this->_var['brand']['if_show']): ?><?php if ($this->_var['brand']['recommended']): ?><img src="templates/style/images/positive_enabled.gif" ectype="inline_edit" fieldname="recommended" fieldid="<?php echo $this->_var['brand']['brand_id']; ?>" fieldvalue="1" title="Click vào đây để thay đổi"/><?php else: ?><img src="templates/style/images/positive_disabled.gif" ectype="inline_edit" fieldname="recommended" fieldid="<?php echo $this->_var['brand']['brand_id']; ?>" fieldvalue="0" title="Click vào đây để thay đổi"/><?php endif; ?><?php endif; ?></td>
            <?php endif; ?>
            <td class="handler">
            <?php if ($this->_var['brand']['if_show'] == 1): ?>
            <a href="index.php?app=brand&amp;act=edit&amp;id=<?php echo $this->_var['brand']['brand_id']; ?>">Sửa</a>  |  <a name="drop" href="javascript:drop_confirm('Bạn có chắc chắn muốn xóa nó?', 'index.php?app=brand&amp;act=drop&amp;id=<?php echo $this->_var['brand']['brand_id']; ?>');">Xóa</a>
            <?php else: ?>
            <a href="index.php?app=brand&amp;act=pass&amp;id=<?php echo $this->_var['brand']['brand_id']; ?>">Cho phép</a>  |  <a href="index.php?app=brand&amp;act=refuse&amp;id=<?php echo $this->_var['brand']['brand_id']; ?>">Từ chối</a>       
            <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="7">Không có dữ liệu</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
    <?php if ($this->_var['brands']): ?>
    <div id="dataFuncs">
        <div id="batchAction" class="left paddingT15">
            <?php if ($this->_var['wait_verify']): ?>
            &nbsp;&nbsp;
            <input class="formbtn batchButton" type="button" value="Cho phép" name="id" uri="index.php?app=brand&act=pass" />
             &nbsp;&nbsp;
            <input class="formbtn batchButton" type="button" value="Từ chối" name="id" uri="index.php?app=brand&act=refuse" />
            <?php else: ?>
            &nbsp;&nbsp;
            <input class="formbtn batchButton" type="button" value="Xóa" name="id" uri="index.php?app=brand&act=drop" presubmit="confirm('Bạn có chắc chắn muốn xóa nó?');" />
            <?php endif; ?>
        </div>
        <div class="pageLinks">
            <?php if ($this->_var['brands']): ?><?php echo $this->fetch('page.bottom.html'); ?><?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
