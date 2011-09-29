<?php echo $this->fetch('member.header.html'); ?>
<div class="content">
    <?php echo $this->fetch('member.menu.html'); ?>
    <div id="right">
        <div class="wrap_line margin1">
            <div class="public">
                <div class="information_index">
                    <div class="photo">
                        <p><img src="<?php echo $this->_var['user']['portrait']; ?>" width="120" height="120" alt="" /></p>
                    </div>

                    <div class="info">
                        <h3 class="margin2">
                            <span>Chào mừng bạn, <?php echo htmlspecialchars($this->_var['user']['user_name']); ?></span>
                            <a href="<?php echo url('app=member&act=profile'); ?>">Sửa thông tin>></a>
                        </h3>
                        <table class="width6">
                            <tr>
                                <td>Đăng nhập lần cuối: <?php echo local_date("Y-m-d H:i:s",$this->_var['user']['last_login']); ?></td>
                                <td>
                                <?php if ($this->_var['store']): ?>
                                Uy tín người bán: <a href="<?php echo url('app=store&act=credit&id=' . $this->_var['store']['store_id']. ''); ?>" target="_blank"><?php echo $this->_var['store']['credit_value']; ?></a><?php if ($this->_var['store']['credit_value'] >= 0): ?> <img src="<?php echo $this->_var['store']['credit_image']; ?>" /> <?php endif; ?>
                                <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <td>IP lần cuối: <?php echo $this->_var['user']['last_ip']; ?></td>
                                <td>
                                <?php if ($this->_var['store']): ?>
                                Đánh giá phản hồi: <?php echo $this->_var['store']['praise_rate']; ?>%
                                <?php endif; ?>
                                </td>
                            </tr>
                        </table>
                        <p><?php echo sprintf('Bạn có <span class="red">%s</span> tin nhắn, <a href="index.php?app=message&act=newpm">Nhấp vào xem</a>', $this->_var['new_message']); ?></p>
                    </div>
                </div>

            </div>
            <div class="wrap_bottom"></div>
        </div>
        <div class="wrap_line margin1">
            <div class="public_index">
                <div class="information_index">
                    <h3 class="title">Thông báo hoạt động mua hàng</h3>
                    <?php if ($this->_var['buyer_stat'] && $this->_var['buyer_stat']['sum']): ?>
                    <div class="remind">
                        <dl>
                            <dt>Thông báo</dt>
                            <dd><?php echo sprintf('Bạn có <span class="red">%s</span> đang chờ thanh toán, xin thanh toán“<a href="index.php?app=buyer_order&type=pending">Đặt hàng chờ thanh toán</a>” của bạn.', $this->_var['buyer_stat']['pending']); ?></dd>
                            <dd><?php echo sprintf('Bạn có <span class="red">%s</span> đã giao hàng chờ xác nhận, hãy xác nhận “<a href="index.php?app=buyer_order&type=shipped"> Đã nhận được hàng hóa </a>”', $this->_var['buyer_stat']['shipped']); ?></dd>
                            <dd><?php echo sprintf('Bạn có <span class="red">%s</span> chưa được đánh giá, hãy đánh giá “<a href="index.php?app=buyer_order&type=finished">Đơn đặt hàng đã hoàn thành</a>” của bạn', $this->_var['buyer_stat']['finished']); ?></dd>
                        </dl>
                        <dl>
                            <dt>Nhắc nhớ mua theo nhóm</dt>
                            <dd><?php echo sprintf('Bạn có <span class="red">%s</span>  tham gia vào các hoạt động mua theo nhóm, xin xác nhận “<a href="index.php?app=buyer_groupbuy&state=finished">Hoàn thành mua theo nhóm</a>” của bạn', $this->_var['buyer_stat']['groupbuy_finished']); ?></dd>
                            <dd><?php echo sprintf('Bạn có <span class="red">%s</span> tham gia vào sự kiện mua theo nhóm đã bị hủy, xem“<a href="index.php?app=buyer_groupbuy&state=canceled">Đã bị hủy mua theo nhóm</a>”', $this->_var['buyer_stat']['groupbuy_canceled']); ?></dd>
                        </dl>
                        <a href="<?php echo url('app=buyer_order'); ?>" class="btn pos1" title="Xem đơn hàng"><span class="pic1">Xem đơn hàng</span></a>
                    </div>
                    <?php else: ?>
                    <div class="awoke">
                        Bạn không có đơn hàng được tạo ra tại <br /><a href="index.php">Trang chủ</a>,chọn sản phẩm yêu thích của bạn, xem kinh nghiệm mua sắm nó.
                    </div>
                    <?php endif; ?>
                </div>

            </div>
            <div class="wrap_bottom"></div>
        </div>
<?php if ($this->_var['store']): ?>
        <div class="wrap_line">
            <div class="public_index">
                <div class="information_index">
                    <h3 class="title">Thông báo hoạt động bán hàng
                        <p>
                        <span>Cấp cửa hàng: <?php echo $this->_var['sgrade']['grade_name']; ?></span>
                        <span>Thời hạn: <?php if ($this->_var['sgrade']['add_time']): ?><?php echo sprintf('Còn %s ngày', $this->_var['sgrade']['add_time']); ?><?php else: ?>Không giới hạn<?php endif; ?></span>
                        <span>Đã đăng sản phẩm: <?php echo $this->_var['sgrade']['goods']['used']; ?>/<?php if ($this->_var['sgrade']['goods']['total']): ?><?php echo $this->_var['sgrade']['goods']['total']; ?><?php else: ?>Không giới hạn<?php endif; ?></span>
                        <span>Sử dụng: <?php echo $this->_var['sgrade']['space']['used']; ?>M/<?php if ($this->_var['sgrade']['space']['total']): ?><?php echo $this->_var['sgrade']['space']['total']; ?>M<?php else: ?>Không giới hạn<?php endif; ?></span>
                        </p>
                    </h3>
                    <div class="remind">
                        <dl>
                            <dt>Thông báo</dt>
                            <dd><?php echo sprintf('Bạn có <span class="red">%s</span> đơn hàng đang chờ giải quyết, xin giải quyết “<a href="index.php?app=seller_order&type=submitted">Đơn hàng</a>” của bạn', $this->_var['seller_stat']['submitted']); ?></dd>
                            <dd><?php echo sprintf('Bạn có <span class="red">%s</span> đơn hàng đã được xuất xưởng, xử lý “<a href="index.php?app=seller_order&type=accepted">Vận chuyển đơn hàng</a>” của bạn', $this->_var['seller_stat']['accepted']); ?></dd>
                        </dl>
                        <dl>
                            <dt>Nhắc nhớ mua theo nhóm</dt>
                            <dd><?php echo sprintf('Bạn có <span class="red">%s</span> hoạt động mua theo nhóm, xác nhận “<a href="index.php?app=seller_groupbuy&state=end">Kết thúc mua theo nhóm</a>” của bạn.', $this->_var['seller_stat']['groupbuy_end']); ?></dd>
                        </dl>
                        <a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>" title="Xem cửa hàng" target="_blank" class="btn1 pos2"><span class="pic2">Xem cửa hàng</span></a>
                        <a href="<?php echo url('app=seller_order'); ?>" class="btn pos3" title="Xem đơn hàng"><span class="pic1">Xem đơn hàng</span></a>
                    </div>
                </div>

            </div>
            <div class="wrap_bottom"></div>
        </div>
<?php endif; ?>
<?php if ($this->_var['applying']): ?>
        <div class="wrap_line">
            <div class="public_index">
                <div class="information_index">
                    <h3 class="title">apply_remind</h3>
                    <div class="remind">
                        <dl>
                            <dt>apply_state</dt>
                            <dd><?php echo sprintf('store_applying', $this->_var['user']['sgrade']); ?></dd>
                        </dl>
                        <a href="index.php?app=apply&step=2&id=<?php echo $this->_var['user']['sgrade']; ?>" title="edit_store_info" class="btn1 pos2"><span class="pic2">edit_store_info</span></a>
                    </div>
                </div>

            </div>
            <div class="wrap_bottom"></div>
        </div>
<?php endif; ?>
        <div class="clear"></div>
        <div class="adorn_right1"></div>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
