<?php echo $this->fetch('member.header.html'); ?>
<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
        <?php echo $this->fetch('member.submenu.html'); ?>
        <script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.plugins/jquery.validate.js'; ?>" charset="<?php echo $this->_var['charset']; ?>"></script>
        <div class="wrap">
            <div class="eject_btn_two eject_pos1" ><b class="ico4"><a uri="index.php?app=my_partner&amp;act=add" ectype="dialog" dialog_id="my_partner_add" dialog_width="460" dialog_title="Thêm đối tác">Thêm đối tác</a></b></div>
            <div class="public table">
                <table class="table_head_line">
                    <?php if ($this->_var['partners']): ?>
                    <tr class="line_bold">
                        <th class="width1"><input id="all" type="checkbox" class="checkall" /></th>
                        <th class="align1" colspan="5">
                            <span class="all"><label for="all">Chọn Tất cả</label></span>
                            <a href="javascript:void(0);" class="delete" uri="index.php?app=my_partner&act=drop" name="id" presubmit="confirm('Bạn có chắc chắn muốn xóa nó ?')" ectype="batchbutton">Xoá</a>
                        </th>
                    </tr>
                    <tr class="gray">
                        <th></th>
                        <th>Tiêu đề</th>
                        <th>Liên kết</th>
                        <th>Logo</th>
                        <th>Sắp xếp theo</th>
                        <th>Hành động</th>
                    </tr>
                    <?php endif; ?>
                    <?php $_from = $this->_var['partners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'partner');$this->_foreach['v'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['v']['total'] > 0):
    foreach ($_from AS $this->_var['partner']):
        $this->_foreach['v']['iteration']++;
?>
                    <?php if (($this->_foreach['v']['iteration'] == $this->_foreach['v']['total'])): ?><tr class="line_bold"><?php else: ?><tr class="line"><?php endif; ?>
                        <td class="align2"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['partner']['partner_id']; ?>" /></td>
                        <td><?php echo htmlspecialchars($this->_var['partner']['title']); ?></td>
                        <td class="color1"><?php echo $this->_var['partner']['link']; ?></td>
                        <td class="align2">
                        <?php if ($this->_var['partner']['logo']): ?>
                        <img src="<?php echo $this->_var['partner']['logo']; ?>" height="30"/>
                        <?php endif; ?>
                        </td>
                        <td class="align2"><span><?php echo $this->_var['partner']['sort_order']; ?></span></td>
                        <td class="width13">
                        <div class="">
                            <a href="javascript:void(0);" uri="index.php?app=my_partner&amp;act=edit&partner_id=<?php echo $this->_var['partner']['partner_id']; ?>" dialog_id="my_partner_edit" dialog_title="Sửa" dialog_width="460" ectype="dialog" class="edit1">Sửa</a><a href="javascript:drop_confirm('Bạn có chắc chắn muốn xóa nó ?', 'index.php?app=my_partner&amp;act=drop&id=<?php echo $this->_var['partner']['partner_id']; ?>');" class="delete">Xoá</a>
                        </div>
                        </td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td colspan="6" class="member_no_records padding6">Không có hồ sơ</td>
                    </tr>
                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <?php if ($this->_var['partners']): ?>
                    <tr>
                        <th><input id="all2" type="checkbox" class="checkall" /></th>
                        <th colspan="5">
                        <p class="position1">
                            <span class="all"><label for="all2">Chọn Tất cả</label></span>
                            <a href="javascript:void(0);" class="delete" uri="index.php?app=my_partner&act=drop" name="id" presubmit="confirm('Bạn có chắc chắn muốn xóa nó ?')" ectype="batchbutton">Xoá</a>

                        </p>
                        <p class="position2">
                            <?php echo $this->fetch('member.page.bottom.html'); ?>
                        </p>
                        </th>
                    </tr>
                    <?php endif; ?>
                </table>
            </div>
            <div class="wrap_bottom"></div>
        </div>
        <iframe name="my_partner" style="display:none"></iframe>
        <div class="clear"></div>
        <div class="adorn_right1"></div>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
