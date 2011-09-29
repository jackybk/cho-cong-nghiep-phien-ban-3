<?php echo $this->fetch('header.html'); ?>
<div class="wrap">
            <div class="public table">
              <table style="font-size:12px">
             
              <tr>
                      <td class="searchSetAutoUP">
                          <div class="titleSearchAuto">Tìm kiếm tin rao vặt bạn muốn sử dụng tính năng Up tự động</div>
                      </td>
                   </tr>
                   
                   <tr>
                       <td class="searchSetAutoUP">
		                   <form action="index.php?app=plquanly&amp;act=keyword" method="POST" enctype="multipart/form-data">               
								<label for="idNews"><span class="lblIdNews">Mã tin rao vặt (ID): </span></label>
								<input type="text" size="10" id="idNews" name="idNews">
								<input type="submit" name="searchup" value="Tìm kiếm"/>																
		                   </form>
	                   </td>
                   </tr>
                    <?php if ($this->_var['timkiem']): ?>
                   <tr>
                       <td valign="top">
                          <fieldset>
                                <legend>Tin rao vặt bạn muốn Up tin tự động</legend>
                                <form method="POST" action="index.php?app=plquanly&amp;act=uptin" enctype="multipart/form-data">
                                <?php if ($this->_var['timkiem']): ?>
                                  <?php $_from = $this->_var['timkiem']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'key');if (count($_from)):
    foreach ($_from AS $this->_var['key']):
?>
                                  <img border="0" align="absmiddle" title="tự động đăng tin" alt="tự động đăng tin" src="data/files/mall/icon_upauto.png">
                                  &nbsp;&nbsp;
                                     <span style="font-weight:bold;"><a style="outline: medium none;text-decoration: none;"><?php echo htmlspecialchars($this->_var['key']['title']); ?></a></span>
                                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                <?php else: ?>
                                   <span style="font-weight:bold;color:red;">Không tìm thấy tin thông tin bạn muốn tìm</span>
                                <?php endif; ?>
									<div class="inforGuideUser">
                                        <div class="buyGuideVip">
                                          Tính năng cập nhật tin tự động
                                        </div>		
                                        <div class="labelGuideUP">
                                        Bạn muốn tự động up 
                                           <input type="text" value="1" id="timeUp" name="qty_item">
                                           <label for="timeUp">lần</label>
                                           <span>(<=100 lần)</span>
                                        </div>	
                                        <div class="labelGuideUP">
                                        Mỗi lần cách nhau 
                                        <select id="spaceUp" name="spaceUp">
                                            <option value="180">3 phút</option>
                                            <option value="300">5 phút</option>
                                            <option value="600">10 phút</option>
                                            <option value="1200">20 phút</option>
                                            <option value="1800">30 phút</option>
                                            <option value="3000">50 phút</option>
                                            <option value="3600">1 giờ</option>
                                            <option value="5400">1,5 giờ</option>
                                            <option value="7200">2 giờ</option>
                                            <option value="10800">3 giờ</option>
                                            <option value="14400">4 giờ</option>
                                            <option value="18000">5 giờ</option>
                                        </select>
                                        </div>
                              
                          </fieldset>
                       </td>
                   </tr>
                   <tr>
                       <td align="center">
                            <input id="executeAutoUp" type="submit" name="executeAutoUp" value="Thực hiện">
                       </td>
                   </tr>
                   <?php endif; ?>
                </table>
               
                 
              </form>
            </div>
       <?php if ($this->_var['dangtin']): ?>
       
    <div id="dataFuncs">
         <div class="pageLinks"><?php echo $this->fetch('page.bottom.html'); ?></div>
      
        <div class="pageLinks">
            <?php if ($this->_var['dangtin']): ?><?php echo $this->fetch('page.bottom.html'); ?><?php endif; ?>
        </div>
    </div>
    <?php endif; ?>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>
