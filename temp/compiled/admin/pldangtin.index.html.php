<?php echo $this->fetch('header.html'); ?>
<div class="wrap">
            <div class="public table">
         <table style="font-size:12px">
          <tr class="line_bold">
                        <th class="width1"><input type="checkbox" id="all" class="checkall"/></th>
                        <th class="align1" colspan="6">
                            <span class="all"><label for="all">Chọn tất cả</label></span>
                            <a href="javascript:void(0);" class="edit" ectype="batchbutton" uri="index.php?app=plquanly&act=edit" name="id">Sửa</a>
                            <a href="javascript:void(0);" class="delete" ectype="batchbutton" uri="index.php?app=plquanly&act=drop&amp;picture=<?php echo $this->_var['dtin']['picture']; ?>" name="id" presubmit="confirm('Bạn có chắc chắn muốn xóa nó?')">Xóa</a>
                            <a href="javascript:void(0);" class="edit" ectype="batchbutton" uri="index.php?app=plquanly&amp;act=lammoitin" name="id" presubmit="confirm('Bạn có chắc muốn làm mới tin không')">Làm mới tin</a>
                            <a href="javascript:void(0);" class="edit" ectype="batchbutton" uri="index.php?app=plquanly&amp;act=check_khuyenmai" name="id" presubmit="confirm('Bạn có chắc muốn kích hoạt tin này thành tin khuyến mại không')">Kích hoạt tin khuyến mại</a>
                            <a href="javascript:void(0);" class="edit" ectype="batchbutton" uri="index.php?app=plquanly&amp;act=debugkhuyenmai" name="id" presubmit="confirm('Bạn có chắc muốn hủy bỏ tin khuyến mại này không')">Hủy bỏ tin khuyến mại</a>
                            
                        </th>
                        <th colspan="8">
                           &nbsp;
                        </th>
           </tr>
         <?php if ($this->_var['dangtin']): ?>
        <tr class="tatr1">
            <td align="center"><span fieldname="tt">&nbsp;</span></td>
            <td align="center"><span fieldname="anh">Hình ảnh</span></td>
            <td align="center"><span fieldname="anh">Tiêu đề tin rao vặt</span></td>
            <td align="center"><span fieldname="luotxem">VIP</span></td>
            <td align="center"><span fieldname="luotup">Siêu Vip</span></td>
            <td align="center"><span fieldname="noidang">Khuyến mại</span></td>    
            <td align="center"><span fieldname="noidang">Ngày gửi</span></td>    
            <td class="center">Hành động</td>
        </tr>
        <?php endif; ?>
        <?php $_from = $this->_var['dangtin']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'dtin');if (count($_from)):
    foreach ($_from AS $this->_var['dtin']):
?>
        <tr class="tatr2">
            
            <td align="center" style="width:7%"><input type="checkbox" class="checkitem" value="<?php echo $this->_var['dtin']['id']; ?>"/></td>  
             <td align="center" style="width:5%">
              <img src="../<?php echo $this->_var['dtin']['picture']; ?>" width="50" height="auto" />

             </td>
             <td align="center" style="width:40%; padding:3px 3px 3px 3px">
             <span style="color:blue; font-weight:bold"><?php echo $this->_var['dtin']['title']; ?></span>
                 <br>
                 <div class="processPostedNews">
                    <span class="codeOfNews">Mã tin rao vặt:<?php echo $this->_var['dtin']['id']; ?></span>
                     <a class="tinraovat" title="làm mới tin đăng" href="index.php?app=plquanly&amp;act=refesh&amp;id=<?php echo $this->_var['dtin']['id']; ?>">
                      <img border="0" align="absmiddle" title="làm mới tin đăng" src="../data/files/mall/icon_uptop.png">
                     <span style="color:#0470E9">Up lên đầu</span>
                    </a>
                    
                     <a title="đăng tin tự động" href="index.php?app=plquanly&amp;act=uptin&amp;id=<?php echo $this->_var['dtin']['id']; ?>">
	                     <img border="0" align="absmiddle" title="tự động đăng tin" alt="tự động đăng tin" src="../data/files/mall/icon_upauto.png">
	                     <span style="color:#0470E9">Up tự động</span>
                     </a>
                 </div>
                  <div class="processPostedNews">
                    <a href="index.php?app=plquanly&amp;act=dangtinvip&amp;id=<?php echo $this->_var['dtin']['id']; ?>"><img border="0" align="absmiddle" alt="đăng tin vip" title="đăng tin vip" src="../data/files/mall/icon_plus.gif">Đăng tin VIP</a> &nbsp;
                    <a href="index.php?app=plquanly&amp;act=tinsieuvip&amp;id=<?php echo $this->_var['dtin']['id']; ?>"><img border="0" align="absmiddle" alt="đăng tin siêu vip" title="đăng tin siêu vip" src="../data/files/mall/icon_plus.gif">Đăng tin siêu VIP</a>
                </div>
             </td>
             <td align="center" style="width:5%"><?php if ($this->_var['dtin']['vip'] == 1): ?>Có<?php else: ?>Không<?php endif; ?></td>
             <td align="center" style="width:10%"><?php if ($this->_var['dtin']['svip'] == 1): ?>Có<?php else: ?>Không<?php endif; ?></td>
             <td align="center" style="width:10%"><?php if ($this->_var['dtin']['khuyenmai'] == 1): ?>Có<?php else: ?>Không<?php endif; ?></td>
             <td align="center" style="width:5%"><?php echo local_date("d-m-Y",$this->_var['dtin']['thoigianup']); ?></td>
            <td class="center">
               <a class="edit" href="index.php?app=plquanly&amp;act=edit&amp;id=<?php echo $this->_var['dtin']['id']; ?>">Sửa</a><a name="drop" class="delete" href="javascript:drop_confirm('Bạn có chắc chắn muốn xóa nó?', 'index.php?app=plquanly&amp;act=drop&amp;id=<?php echo $this->_var['dtin']['id']; ?>&amp;picture=<?php echo $this->_var['dtin']['picture']; ?>');">Xóa</a>
            </td>
        </tr>
      <?php endforeach; else: ?>
        <tr class="no_data">
            <td colspan="7">Không có dữ liệu</td>
        </tr>
      
        <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
           <?php if ($this->_var['dangtin']): ?>

                    <tr class="line_bold line_bold_bottom">
                        <td colspan="11"> </td>
                    </tr>
                    <tr>
                        <th><input type="checkbox" id="all2" class="checkall"/></th>
                        <th colspan="10">
                            <p class="position1">
                                <span class="all"><label for="all2">Chọn tất cả</label></span>
                                <a href="javascript:void(0);" class="edit" ectype="batchbutton" uri="index.php?app=plquanly&amp;act=edit&ret_page=<?php echo $this->_var['page_info']['curr_page']; ?>" name="id">Sửa</a>
                                <a href="javascript:void(0);" class="delete" uri="index.php?app=plquanly&act=drop" name="id" presubmit="confirm('Bạn có chắc chắn muốn xóa nó?')" ectype="batchbutton">Xóa</a>
                                 <a href="javascript:void(0);" class="edit" ectype="batchbutton" uri="index.php?app=plquanly&amp;act=lammoitin" name="id" presubmit="confirm('Bạn có chắc muốn làm mới tin không')">Làm mới tin</a>
                                 <a href="javascript:void(0);" class="edit" ectype="batchbutton" uri="index.php?app=plquanly&amp;act=check_khuyenmai" name="id" presubmit="confirm('Bạn có chắc muốn kích hoạt tin này thành tin khuyến mại không')">Kích hoạt tin khuyến mại</a>
                                  <a href="javascript:void(0);" class="edit" ectype="batchbutton" uri="index.php?app=plquanly&amp;act=debugkhuyenmai" name="id" presubmit="confirm('Bạn có chắc muốn hủy bỏ tin khuyến mại này không')">Hủy bỏ tin khuyến mại</a>
                            </p>
                            
                        </th>
                    </tr>
 
                    <?php endif; ?>
                </table>
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
