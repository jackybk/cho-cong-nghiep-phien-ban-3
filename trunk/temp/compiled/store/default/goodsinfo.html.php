<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'goodsinfo.js'; ?>" charset="utf-8"></script>
<script type="text/javascript">
//<!CDATA[
/* buy */
function buy()
{
    if (goodsspec.getSpec() == null)
    {
        alert(lang.select_specs);
        return;
    }
    var spec_id = goodsspec.getSpec().id;

    var quantity = $("#quantity").val();
    if (quantity == '')
    {
        alert(lang.input_quantity);
        return;
    }
    if (parseInt(quantity) < 1)
    {
        alert(lang.invalid_quantity);
        return;
    }
    add_to_cart(spec_id, quantity);
}

/* add cart */
function add_to_cart(spec_id, quantity)
{
    var url = SITE_URL + '/index.php?app=cart&act=add';
    $.getJSON(url, {'spec_id':spec_id, 'quantity':quantity}, function(data){
        if (data.done)
        {
            $('.bold_num').text(data.retval.cart.kinds);
            $('.bold_mly').html(price_format(data.retval.cart.amount));
            $('.ware_cen').slideDown('fast');
            setTimeout(slideUp_fn, 5000);
        }
        else
        {
            alert(data.msg);
        }
    });
}

var specs = new Array();
<?php $_from = $this->_var['goods']['_specs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'spec');if (count($_from)):
    foreach ($_from AS $this->_var['spec']):
?>
specs.push(new spec(<?php echo $this->_var['spec']['spec_id']; ?>, '<?php echo htmlspecialchars($this->_var['spec']['spec_1']); ?>', '<?php echo htmlspecialchars($this->_var['spec']['spec_2']); ?>', <?php echo $this->_var['spec']['price']; ?>, <?php echo $this->_var['spec']['stock']; ?>));
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
var specQty = <?php echo $this->_var['goods']['spec_qty']; ?>;
var defSpec = <?php echo htmlspecialchars($this->_var['goods']['default_spec']); ?>;
var goodsspec = new goodsspec(specs, specQty, defSpec);
//]]>
</script>

<h2 class="ware_title"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></h2>
<div class="ware_info">
    <div class="ware_pic">
        <div class="big_pic">
            <a href="javascript:;">
				<span class="jqzoom">
					<img src="<?php echo ($this->_var['goods']['_images']['0']['thumbnail'] == '') ? $this->_var['default_image'] : $this->_var['goods']['_images']['0']['thumbnail']; ?>" width="207" height="207" jqimg="<?php echo $this->_var['goods']['_images']['0']['image_url']; ?>" />
				</span>
			</a>
        </div>
        <div class="bottom_btn">
            <!--<a class="collect" href="javascript:collect_goods(<?php echo $this->_var['goods']['goods_id']; ?>);" title="Add to Favorite"></a>-->
            <div class="left_btn"></div>
            <div class="right_btn"></div>
            <div class="ware_box">
                <ul>
                    <?php $_from = $this->_var['goods']['_images']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_image');$this->_foreach['fe_goods_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_goods_image']['total'] > 0):
    foreach ($_from AS $this->_var['goods_image']):
        $this->_foreach['fe_goods_image']['iteration']++;
?>
                    <li <?php if (($this->_foreach['fe_goods_image']['iteration'] <= 1)): ?>class="ware_pic_hover"<?php endif; ?> bigimg="<?php echo $this->_var['goods_image']['image_url']; ?>"><img src="<?php echo $this->_var['goods_image']['thumbnail']; ?>" width="55" height="55" /></li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
            </div>
        </div>
		<?php if ($this->_var['share']): ?>
		<div class="share_goods">
			<div id="share_label">Chia sẻ liên kết</div>
			<div id="share_link">
                <?php $_from = $this->_var['share']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                <?php if ($this->_var['item']['type'] == 'collect'): ?><a target="_blank" href="<?php echo $this->_var['item']['link']; ?>"><?php if ($this->_var['item']['logo']): ?><img src="<?php echo $this->_var['item']['logo']; ?>" title="<?php echo htmlspecialchars($this->_var['item']['title']); ?>"/><?php endif; ?></a><?php endif; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				<?php $_from = $this->_var['share']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                <?php if ($this->_var['item']['type'] == 'share'): ?><a target="_blank" href="<?php echo $this->_var['item']['link']; ?>"><?php if ($this->_var['item']['logo']): ?><img src="<?php echo $this->_var['item']['logo']; ?>" title="<?php echo htmlspecialchars($this->_var['item']['title']); ?>"/><?php endif; ?></a><?php endif; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		   </div>
		</div>
		<?php endif; ?>
    </div>
    <div class="ware_text">
        <div class="rate">
			<div class="info_good">
				<div class="label_info">Giá:</div>
				<div class="result_info"><span class="price_good" ectype="goods_price"><?php echo price_format($this->_var['goods']['_specs']['0']['price']); ?></span><br><span class="vat">Đã có VAT</span></div>
			</div>
			<div class="info_good">
				<div class="label_info">Hãng sản xuất:</div>
				<div class="result_info"><?php echo htmlspecialchars($this->_var['goods']['brand']); ?></div>
			</div>
			<div class="info_good">
				<div class="label_info">Xuất xứ:</div>
				<div class="result_info">Việt Nam</div>
			</div>
			<div class="info_good">
				<div class="label_info">Khuyến mại:</div>
				<div class="result_info">Nếu có</div>
			</div>
			<div class="info_good">
				<div class="label_info">Bảo hành:</div>
				<div class="result_info">12 tháng</div>
			</div>
			<div class="info_good">
				<div class="label_info">Bình luận:</div>
				<div class="result_info"><?php echo $this->_var['comments']; ?></div>
			</div>
			<div class="info_good">
				<div class="label_info">Phí vận chuyển:</div>
				<div class="result_info">Tính phí khi thanh toán</div>
			</div>
			<div class="info_good">
				<div class="label_info">&nbsp;</div>
				<div class="result_info">Tính phí khi thanh toán
					<?php if ($this->_var['goods']['spec_qty'] > 0): ?>
					<br/><?php echo htmlspecialchars($this->_var['goods']['spec_name_1']); ?>
					<?php endif; ?>
					<?php if ($this->_var['goods']['spec_qty'] > 1): ?>
					<br/><?php echo htmlspecialchars($this->_var['goods']['spec_name_2']); ?>
					<?php endif; ?>
					<?php if ($this->_var['goods']['spec_qty'] > 0): ?>
					<br/>Bạn đã chọn:<span class="aggregate" ectype="current_spec"></span>
					<?php endif; ?>
				</div>
			</div>
			<div class="info_good">
				<div class="label_info">Số lượng:</div>
				<div class="result_info">(Hiện kho hàng có <span class="stock" ectype="goods_stock"><?php echo $this->_var['goods']['_specs']['0']['stock']; ?></span> sản phẩm )<br/><input type="text" class="text width2" name="" id="quantity" value="1" /> sản phẩm </div>
			</div>
			<div class="info_good">
				<div class="label_info">&nbsp;</div>
				<div class="result_info detail_buy">
					<a href="javascript:buy();" class="art-button">Đặt hàng</a>
					<div class="ware_cen" style="display:none;">
						<div class="ware_center">
							<h6>
								<span class="dialog_title">Đã thêm sản phẩm vào giỏ hàng thành công.</span>
							</h6>
							<div class="ware_cen_btn">
								Bạn đã đặt <span class="bold_num">100</span> sản phẩm<br/>Tổng tiền: <span class="bold_mly">%s</span>
							</div>
						</div>
						<div class="ware_cen_bottom"></div>
					</div>
				</div>
			</div>   
        </div>
    </div>
    <div class="cleared"></div>
</div>