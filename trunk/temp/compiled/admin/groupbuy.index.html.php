<?php echo $this->fetch('header.html'); ?>
<div id="rightTop">
    <p>Quản lý bán sỉ</p>
    <ul class="subnav">
        <li><span>Danh sách</span></li>
    </ul>
</div>
<div class="mrightTop">
    <div class="fontl">
        <form method="get">
            <div class="left">
                <input type="hidden" name="app" value="groupbuy" />
                <input type="hidden" name="act" value="index" />
                Tên:
                <input class="queryInput" type="text" name="group_name" value="<?php echo htmlspecialchars($this->_var['query']['group_name']); ?>" />
                Tình trạng:
                <select name="type">
                    <?php echo $this->html_options(array('options'=>$this->_var['types'],'selected'=>$this->_var['type'])); ?>
                </select>
                <input type="submit" class="formbtn" value="Tìm" />
            </div>
            <?php if ($this->_var['filtered']): ?>
            <a class="left formbtn1" href="index.php?app=groupbuy">Hủy bỏ</a>
            <?php endif; ?>
            <span> </span>
        </form>
    </div>
    <div class="fontr"> <?php if ($this->_var['groupbuys']): ?><?php echo $this->fetch('page.top.html'); ?><?php endif; ?> </div>
</div>
<div class="tdare">
    <table width="100%" cellspacing="0" class="dataTable">
        <?php if ($this->_var['groupbuys']): ?>
        <tr class="tatr1">
            <td width="20" class="firstCell"><input type="checkbox" class="checkall" /></td>
            <td align="left">Tên</td>
            <td align="left">Tên cửa hàng</td>
            <td align="left">Tình trạng</td>
            <td align="left" class="table-center">Thời lượng</td>
            <td class="table-center">Tham gia</td>
            <td class="handler">Lượt xem</td>
            <td class="table-center">Giới thiệu</td>
            <td class="handler">Hành động</td>
        </tr>
        <?php endif; ?>
        <?php $_from = $this->_var['groupbuys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'groupbuy');if (count($_from)):
    foreach ($_from AS $this->_var['groupbuy']):
?>
        <tr class="tatr2">
            <td class="firstCell"><input value="<?php echo $this->_var['groupbuy']['group_id']; ?>" class='checkitem' type="checkbox" /></td>
            <td align="left"><a href="<?php echo $this->_var['site_url']; ?>/index.php?app=groupbuy&amp;id=<?php echo $this->_var['groupbuy']['group_id']; ?>" target="_blank"><?php echo htmlspecialchars($this->_var['groupbuy']['group_name']); ?></a></td>
            <td align="left"><a href="<?php echo $this->_var['site_url']; ?>/index.php?app=store&amp;id=<?php echo $this->_var['groupbuy']['store_id']; ?>" target="_blank"><?php echo htmlspecialchars($this->_var['groupbuy']['store_name']); ?></a></td>
            <td align="left"><?php echo call_user_func("group_state",$this->_var['groupbuy']['state']); ?></td>
            <td align="left" class="table-center"> <?php echo local_date("Y-m-d",$this->_var['groupbuy']['start_time']); ?> đến <?php echo local_date("Y-m-d",$this->_var['groupbuy']['end_time']); ?> </td>
            <td class="table-center"><?php echo $this->_var['groupbuy']['count']; ?>/<?php echo $this->_var['groupbuy']['min_quantity']; ?></td>
            <td class="handler"><?php echo $this->_var['groupbuy']['views']; ?></td>
            <td class="table-center">
             <?php if ($this->_var['groupbuy']['state'] == 1): ?>
                <?php if ($this->_var['groupbuy']['recommended']): ?>
                    <img src="templates/style/images/positive_enabled.gif" ectype="inline_edit" fieldname="recommended" fieldid="<?php echo $this->_var['groupbuy']['group_id']; ?>" fieldvalue="1" title="Click vào đây để thay đổi"/>
                    <?php else: ?>
                    <img src="templates/style/images/positive_disabled.gif" ectype="inline_edit" fieldname="recommended" fieldid="<?php echo $this->_var['groupbuy']['group_id']; ?>" fieldvalue="0" title="Click vào đây để thay đổi"/>
                    <?php endif; ?>
            <?php else: ?>
                -
            <?php endif; ?>
            </td>
            <td class="handler"><a href="<?php echo $this->_var['site_url']; ?>/index.php?app=groupbuy&amp;id=<?php echo $this->_var['groupbuy']['group_id']; ?>" target="_blank">Xem</a> | <a name="drop" href="javascript:drop_confirm('Nếu bạn xóa nhóm hoạt động mua bán, sẽ gây nhiều ảnh hưởng tới các hoạt động khác! Bạn có muốn xóa nó không?', 'index.php?app=groupbuy&amp;act=drop&amp;id=<?php echo $this->_var['groupbuy']['group_id']; ?>');">Xóa</a> </td>
        </tr>
        <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="10">Không có dữ liệu</td>
        </tr>
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </table>
    <?php if ($this->_var['groupbuys']): ?>
    <div id="dataFuncs">
        <div id="batchAction" class="left paddingT15"> &nbsp;&nbsp;
            <input class="formbtn batchButton" type="button" value="Xóa" name="id" uri="index.php?app=groupbuy&act=drop" presubmit="confirm('Nếu bạn xóa nhóm hoạt động mua bán, sẽ gây nhiều ảnh hưởng tới các hoạt động khác! Bạn có muốn xóa nó không?');" />
            &nbsp;&nbsp;
            <input class="formbtn batchButton" type="button" value="Giới thiệu" name="id" uri="index.php?app=groupbuy&act=recommended"  presubmit="confirm('Bạn có chắc chắn đồng ý các giới thiệu?')" />
            &nbsp;&nbsp; </div>

    </div>
    <?php endif; ?>
    <div class="pageLinks"><?php if ($this->_var['groupbuys']): ?> <?php echo $this->fetch('page.bottom.html'); ?> <?php endif; ?> </div>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>