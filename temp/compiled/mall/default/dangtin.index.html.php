<?php echo $this->_var['editor_upload']; ?>
<?php echo $this->_var['build_editor']; ?>
<?php echo $this->fetch('header.html'); ?>
<?php echo $this->fetch('curlocal.html'); ?>
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

.information .info table{width :auto;}
</style>
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
            danhmuc :{
                required : true
            },
            nhucau :{
                required : true
            },
            chungloai :{
                required : true
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
                required : 'Tiêu đề tin đăng không được để trống'
            },
            danhmuc : {
                required : 'Bạn chưa chọn chuyên mục!'
            },
            nhucau : {
                required : 'Bạn chưa chọn nhu cầu!'
            },
            chungloai : {
                required : 'Bạn chưa chọn chủng loại!'
            },
            picture : {
            	
                accept   : 'Chỉ chấp nhận các định dạng gif, jpg, jpeg, png'
            },
            captcha : {
                required : 'Nhập ký tự captcha không để trống',
                remote   : 'Lỗi mã xác thực',
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

<script type="text/javascript">
//<!CDATA[
$(function(){
    // add store_gcategory
    gcategoryInit("gcategory");
    // validate
    $('#batch_form').validate({
        errorPlacement: function(error, element){
            $(element).parent().next('.new_add').hide();
            $(element).after(error);
        },
        success       : function(label){
            label.addClass('validate_right').text('OK!');
        },
        onkeyup : false,
        rules : {
            price      : {
                number     : true,
                min : 0
            },
            stock      : {
                digits    : true
            }
        },
        messages : {
            price       : {
                number     : 'number_only',
                min : 'price_ge_0'
            },
            stock       : {
                digits  : 'number_only'
            }
        }
    });
});
//]]>
</script>

<script language="javascript" type="text/javascript">

function changecat()

{

	var ajaxRequest;

	

	try

	{

		ajaxRequest = new XMLHttpRequest();

	}

	catch(e)

	{

	try

	{

		ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");

	}

	catch(e)

	{

	try

	{

		ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");

	}

	catch(e)

	{

		alert("Trinh duyet khong ho tro Ajax");

	}

	}

	}

	

	ajaxRequest.onreadystatechange = function()
	{

	if(ajaxRequest.readyState == 4)
	{
	document.getElementById("nhucau").innerHTML = ajaxRequest.responseText;//noidung la name of div sau select option
	}

	else

	{
	document.getElementById("nhucau").innerHTML = "Loading...";
	}

	}
	var catid = document.getElementById("danhmuc").value;//laptopImage la id of select imageLink
	var str = "catid="+catid;
	ajaxRequest.open("POST","index.php?app=changecat",true);
	ajaxRequest.setRequestHeader("Content-Type","application/x-www-form-urlencoded; charset=UTF-8");
	ajaxRequest.send(str);
}
</script>

<div class="content">
    <div class="left">
      noi dung phan ben trai	
    </div>

    <div class="right">
    <div id="warning"></div>
   <form method="post" action="index.php?app=dangtin&amp;act=add" enctype="multipart/form-data" id="partner_form">
        <table width="95%" cellspacing="10" cellpadding="0" border="0" align="center">
        
           <tr>
            <td class="titlePostNews" style="color: #464646; font-size: 12px;">
	          Tiêu đề tin:
	           <sup class="colorRed">*</sup>
            </td>
            <td>
            	<input name="title" id="cate_name" type="text" class="inputTitleNews"  style="width:300px">
        	</td>
          </tr>
          <tr>
			<td>&nbsp;</td>
			<td>
                  <!--<img src="" width="100" height="100">-->
			</td>
		 </tr>
           
            <tr>
              <td class="titlePostNews" style="color: #464646; font-size: 12px;"> Chọn ảnh: </td>
              <td><input type="file" class="inputPostNews" name="picture" ectype="logo"/>
                <!--<input type="submit" name="Upload" value="" />-->
              </td>
            </tr>
          <tr>
            <td class="titlePostNews" style=" color: #464646; font-size: 12px;">
                Chuyên mục:
                  
            </td>
              <td class="assort">
                <p id="gcategory" class="select">
                  <!--<input type="hidden" name="cate_id" value="0" class="mls_id" />
                  <input type="hidden" name="cate_name" value="" class="mls_names" />-->
                  <select name="danhmuc" id="danhmuc" onchange="changecat()">
                    <option value="">Xin chọn...</option>
                        <?php echo $this->html_options(array('options'=>$this->_var['scategories'])); ?>
                  </select>
                 
                </p>
              </td>
          </tr>
          <tr>
            <td class="titlePostNews" style=" color: #464646; font-size: 12px;">
                Nhu cầu:
                  
            </td>
              <td class="assort">
                <p id="nhucau" class="select">
                  
                  <select name="nhucau" disabled>
                       <option>Xin chọn nhu cầu</option>
                   <?php $_from = $this->_var['need']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nhucau');if (count($_from)):
    foreach ($_from AS $this->_var['nhucau']):
?>
                     <option value="<?php echo $this->_var['nhucau']['id']; ?>"><?php echo $this->_var['nhucau']['category']; ?></option>
                   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </select>
                </p>
              </td>
          </tr>
            
          <tr>
            <td class="titlePostNews" style=" color: #464646; font-size: 12px;">
                Chủng loại:
                  
            </td>
              <td class="assort">
                <!--<p id="chungloai" class="select">-->
                 
                  <select name="chungloai" disabled>
                       <option>Xin chọn chủng loại</option>
                   <?php $_from = $this->_var['dmchungloai']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'chungloai');if (count($_from)):
    foreach ($_from AS $this->_var['chungloai']):
?>
                     <option value="<?php echo $this->_var['chungloai']['id']; ?>"><?php echo $this->_var['chungloai']['category']; ?></option>
                   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </select>
                <!--</p>-->
              </td>
          </tr>
            
           <tr>
            <td class="titlePostNews" style="color: #464646; font-size: 12px;">Quận huyện
                
            </td>
               <td>
                   <div id="region">
                              <input type="hidden" name="region_id"   class="mls_id" />
                              <input type="hidden" name="region_name"  class="mls_names" />
                                    <select style="display:none">
                                      <option>Xin chọn...</option>
                                      <?php echo $this->html_options(array('options'=>$this->_var['regions'])); ?>
                                    </select>
                               
                                    <select class="select">
                                      <option>Xin chọn...</option>
                                      <?php echo $this->html_options(array('options'=>$this->_var['regions'])); ?>
                                    </select>
                   </div>
              </td>
          </tr>
          
       
          
          <tr>
            <td colspan="2" class="titlePostNews" style="color: #464646; font-size: 12px;">
              Nội dung tin đăng:
             <sup class="colorRed">*</sup>
            </td>
            </tr>
          <tr>
          <tr>
            <td colspan="2"><div class="editor"><div>
               <textarea name="description" id="noidung"  style="width:100%; height:400px;"></textarea>
              
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
            <td class="issuance"><input name="Send" class="btn" type="submit" value=" Gửi đi "></td>
          </tr>
            
        </table>
        
        </form>
    </div>
</div>

<?php echo $this->fetch('footer.html'); ?>
