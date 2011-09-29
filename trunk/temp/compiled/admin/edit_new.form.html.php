<?php echo $this->fetch('header.html'); ?>
<?php echo $this->_var['build_editor']; ?>
<div class="content">
 
         <style type="text/css">
  #warning {
    background: none repeat scroll 0 0 #FFB7B7;
    border: 1px solid red;
    color: #000000;
    display: none;
    font-weight: normal;
    margin: 8px 0;
    padding: 3px 10px;
  }
.fontColor4
 {
    color: #9C9C9C;
 }

.padding3 {
    padding-left: 10px;
}
.field_notice {
    color: #9C9C9C;
    margin-left: 5px;
}
#warning label {
    display: block;
    margin: 3px 0;
}
form label.error {
    color: red;
    font-size: 12px;
    margin-left: 5px;
}
</style>
<script type="text/javascript">
//<!CDATA[
$(function(){
$('#partner_form').validate({
            errorPlacement: function(error, element){
                $(element).next('.field_notice').hide();
                if($(element).parent().parent().is('b'))
                {
                    $(element).parent().parent('b').next('.explain').hide();
                    $(element).parent().parent('b').after(error);
                }
                else
                {
                    $(element).after(error);
                }
            },
        
        rules : {
            title : {
                required   : true
            },
            picture : {
               accept : 'png|jpe?g|gif'
            },
            captcha : {
                required : true,
                remote   : {
                    url : 'index.php?app=captcha&act=check_captcha',
                    type: 'get',
                    data:{
                        captcha : function(){
                            return $('#captcha1').val();
                        }
                    }
                }
            }
        },
        messages : {
            title : {
                required : 'Tiêu đề không được để trống'
            },
            picture : {
                accept   : 'Nhận ảnh đuôi jpg|gif|png'
            },
            captcha : {
                required : 'Yêu cầu nhập capcha',
                remote   : 'Lỗi captcha',
            }
        }
    });
   regionInit("region");
        $(".right").mouseover(function(){
            $(this).next("div").show();
        });
        $(".right").mouseout(function(){
            $(this).next("div").hide();
        });
});


//]]>

</script>

    <div id="warning"></div>
   <form method="post" action="index.php?app=plquanly&amp;act=edit&amp;id=<?php echo $this->_var['dtin']['id']; ?>&amp;user_id=<?php echo $this->_var['dtin']['user_id']; ?>&amp;picture=<?php echo $this->_var['dtin']['picture']; ?>" enctype="multipart/form-data" id="partner_form">
        <table width="95%" cellspacing="10" cellpadding="0" border="0" align="center">
        
           <tr>
            <td class="titlePostNews">
	          Tiêu đề tin đã đăng:
	           <sup class="colorRed">*</sup>
            </td>
            <td><input name="title" id="cate_name" type="text" value="<?php echo htmlspecialchars($this->_var['dtin']['title']); ?>" class="inputTitleNews" style="width:300px"></td>
          </tr>
      
          <tr>
             <td>Hình ảnh</td>
              <td>
               
              <img src="../<?php echo $this->_var['dtin']['picture']; ?>" width="100" height="auto" />
         
              </td>
		 </tr>
         
            <tr>
              <td class="titlePostNews"> Chọn ảnh: </td>
              <td><input type="file" class="inputPostNews" name="picture" ectype="logo"/>
                <!--<input type="submit" name="Upload" value="" />-->
              </td>
            </tr>
          <tr>
            <td class="titlePostNews">
                Chuyên mục:
                  
            </td>
            <td><span class="height_row">
              <select  name="categories" class="Contact_text" id="categories">
               <option value="0">Hãy chọn...</option>
                <?php echo $this->html_options(array('options'=>$this->_var['scategories'],'selected'=>$this->_var['dtin']['categories'])); ?>
              </select>
            </span></td>
          </tr>
          
            
            <tr>
            <td class="titlePostNews" >Địa chỉ người đăng tin
                
            </td>
            <td>
                 <div id="region">
                                    <input type="hidden" name="region_id" value="<?php echo $this->_var['dtin']['region_id']; ?>" class="mls_id" />
                                    <input type="hidden" name="region_name" value="<?php echo htmlspecialchars($this->_var['dtin']['address']); ?>" class="mls_names" />
                                    <?php if ($this->_var['dtin']['id']): ?>
                                    <span><?php echo htmlspecialchars($this->_var['dtin']['address']); ?></span>
                                    <input type="button" value="Sửa" class="edit_region" />
                                    <select style="display:none">
                                      <option>Hãy chọn...</option>
                                      <?php echo $this->html_options(array('options'=>$this->_var['regions'])); ?>
                                    </select>
                                    <?php else: ?>
                                    <select class="select">
                                      <option>Hãy chọn...</option>
                                      <?php echo $this->html_options(array('options'=>$this->_var['regions'])); ?>
                                    </select>
                                    <?php endif; ?></div>
         </td>
          </tr>
          
       
          
          <tr>
            <td colspan="2" class="titlePostNews">
              Nội dung tin rao vặt
             <sup class="colorRed">*</sup>
            </td>
            </tr>
          <tr>
          <tr>
            <td colspan="2">
               <textarea name="description" id="noidung"  style="width:100%; height:400px;">
               <?php echo $this->_var['dtin']['content']; ?>
               </textarea>
                
                
                
             </td>
          </tr>
             <tr>
                <td style="color: #464646; font-size: 12px; font-weight: normal !important;width: 130px !important;">Xác nhận hình ảnh:</td>
                <td>
                    <input type="text" name="captcha" class="text" id="captcha1" />
                    <a href="javascript:change_captcha($('#captcha'));" class="renewedly"><img id="captcha" src="index.php?app=captcha&amp;<?php echo $this->_var['random_number']; ?>" /></a>
                </td>
          </tr>
         
       
          <tr>
            <td></td>
            <td><input name="Send" type="submit" value=" Gửi đi "></td>
          </tr>
            
        </table>
        
        </form>

<?php echo $this->fetch('footer.html'); ?>