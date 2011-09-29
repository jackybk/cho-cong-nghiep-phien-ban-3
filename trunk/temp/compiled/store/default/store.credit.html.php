<?php echo $this->fetch('header.html'); ?>

<?php echo $this->fetch('top.html'); ?>

<div id="content">
    <div id="left">
        <?php echo $this->fetch('left.html'); ?>
    </div>
    
    <div id="right">
        <div class="module_currency">
            <h2 class="common_title veins1">
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <span class="ico1"><span class="ico2">Đáng giá ( <?php echo $this->_var['store']['praise_rate']; ?> % )</span></span>
            </h2>
            
            <div class="wrap">
                <div class="wrap_child">
                    <div class="credited">
                        <table>
                            <tr class="bg2 new_size">
                                <th></th>
                                <th>Trong 1 tuần</th>
                                <th>Trong 1 tháng</th>
                                <th>Trong 6 tháng</th>
                                <th>Trước 6 tháng</th>
                                <th>Tổng</th>
                            </tr>
                            <tr>
                                <th><div class="fontColor6 credited_css">Tốt</div></th>
                                <td><?php echo $this->_var['stats']['3']['in_a_week']; ?></td>
                                <td><?php echo $this->_var['stats']['3']['in_a_month']; ?></td>
                                <td><?php echo $this->_var['stats']['3']['in_six_month']; ?></td>
                                <td><?php echo $this->_var['stats']['3']['six_month_before']; ?></td>
                                <td><?php echo $this->_var['stats']['3']['total']; ?></td>
                            </tr>
                            <tr>
                                <th><div class="fontColor7 credited_css">Bình thường</div></th>
                                <td><?php echo $this->_var['stats']['2']['in_a_week']; ?></td>
                                <td><?php echo $this->_var['stats']['2']['in_a_month']; ?></td>
                                <td><?php echo $this->_var['stats']['2']['in_six_month']; ?></td>
                                <td><?php echo $this->_var['stats']['2']['six_month_before']; ?></td>
                                <td><?php echo $this->_var['stats']['2']['total']; ?></td>
                            </tr>
                            <tr>
                                <th><div class="fontColor8 credited_css">Xấu</div></th>
                                <td><?php echo $this->_var['stats']['1']['in_a_week']; ?></td>
                                <td><?php echo $this->_var['stats']['1']['in_a_month']; ?></td>
                                <td><?php echo $this->_var['stats']['1']['in_six_month']; ?></td>
                                <td><?php echo $this->_var['stats']['1']['six_month_before']; ?></td>
                                <td><?php echo $this->_var['stats']['1']['total']; ?></td>
                            </tr>
                            <tr>
                                <th><div class="fontColor9 credited_css">Tổng</div></th>
                                <td><?php echo $this->_var['stats']['0']['in_a_week']; ?></td>
                                <td><?php echo $this->_var['stats']['0']['in_a_month']; ?></td>
                                <td><?php echo $this->_var['stats']['0']['in_six_month']; ?></td>
                                <td><?php echo $this->_var['stats']['0']['six_month_before']; ?></td>
                                <td><?php echo $this->_var['stats']['0']['total']; ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <a name="module">
        <ul class="user_menu">
            <div class="ornament1"></div>
            <div class="ornament2"></div>
            <li><a class="<?php if ($_GET['eval']): ?>normal<?php else: ?>active<?php endif; ?>" href="<?php echo url('app=store&act=credit&id=' . $this->_var['store']['store_id']. ''); ?>#module"><span>Tất cả đánh giá</span></a></li>
            <li><a class="<?php if ($_GET['eval'] == 3): ?>active<?php else: ?>normal<?php endif; ?>" href="<?php echo url('app=store&act=credit&id=' . $this->_var['store']['store_id']. '&eval=3'); ?>#module"><span>Tốt</span></a></li>
            <li><a class="<?php if ($_GET['eval'] == 2): ?>active<?php else: ?>normal<?php endif; ?>" href="<?php echo url('app=store&act=credit&id=' . $this->_var['store']['store_id']. '&eval=2'); ?>#module"><span>Bình thường</span></a></li>
            <li><a class="<?php if ($_GET['eval'] == 1): ?>active<?php else: ?>normal<?php endif; ?>" href="<?php echo url('app=store&act=credit&id=' . $this->_var['store']['store_id']. '&eval=1'); ?>#module"><span>Xấu</span></a></li>
        </ul>
        
        <table class="tab_table">
            <tr class="bg1 new_size">
                <th>Đánh giá</th>
                <th class="width2">Nội dung</th>
                <th class="width3">Sản phẩm</th>
                <th>Số tiền</th>
                <th>Người mua</th>
                <th>Thời gian</th>
            </tr>
            <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
            <tr>
                <th>
                    <?php if ($this->_var['goods']['evaluation'] == 1): ?>
                    <span class="fontColor8">Xấu</span>
                    <?php elseif ($this->_var['goods']['evaluation'] == 2): ?>
                    <span class="fontColor7">Bình thường</span>
                    <?php else: ?>
                    <span class="fontColor6">Tốt</span>
                    <?php endif; ?>
                </th>
                <td><div class="tab_table_con"><?php echo nl2br(htmlspecialchars($this->_var['goods']['comment'])); ?></div></td>
                <td><a class="ware_link" href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></a></td>
                <td class="tab_align money"><?php echo price_format($this->_var['goods']['price']); ?></td>
                <td class="tab_align fontColor10"><?php echo htmlspecialchars($this->_var['goods']['buyer_name']); ?></td>
                <td class="tab_align fontColor11"><?php echo local_date("Y-m-d H:i:s",$this->_var['goods']['evaluation_time']); ?></td>
            </tr>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </table>
        <?php echo $this->fetch('page.bottom.html'); ?>
    </div>
    
    <div class="clear"></div>
</div>

<?php echo $this->fetch('footer.html'); ?>