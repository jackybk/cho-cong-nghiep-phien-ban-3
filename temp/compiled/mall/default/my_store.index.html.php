<?php echo $this->fetch('member.header.html'); ?>
<style>
.information .info table{width :auto;}
</style>
<script type="text/javascript">
//<!CDATA[
$(function(){
        $('input[ectype="change_store_logo"]').change(function(){
            var src = getFullPath($(this)[0]);
            $('img[ectype="store_logo"]').attr('src', src);
            $('input[ectype="change_store_logo"]').removeAttr('name');
            $(this).attr('name', 'store_logo');
        });
        $('input[ectype="change_store_banner"]').change(function(){
            var src = getFullPath($(this)[0]);
            $('img[ectype="store_banner"]').attr('src', src);
            $('input[ectype="change_store_banner"]').removeAttr('name');
            $(this).attr('name', 'store_banner');
        });

        $('#my_store_form').validate({
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
            success       : function(label){
                if($(label).attr('for') != 'store_logo' && $(label).attr('for') != 'store_banner'  ){
                    label.addClass('validate_right').text('OK!');
                    }
            },
            rules : {
                store_name : {
                    required   : true,
                    remote : {
                        url  : 'index.php?app=apply&act=check_name&ajax=1',
                        type : 'get',
                        data : {
                            store_name : function(){
                                return $('#store_name').val();
                            },
                            store_id : <?php echo $this->_var['store']['store_id']; ?>
                        }
                    },
                    maxlength: 20
                },
                tel      : {
                    required     : true,
                    checkTel     : true
                },
                store_banner : {
                    accept   : 'png|jpe?g|gif'
                },
                store_logo   : {
                    accept   : 'png|jpe?g|gif'
                }
            },
            messages : {
                store_name  : {
                    required   : 'Thông tin không được phép để trống',
                    remote: 'name_exist',
                    maxlength: 'note_for_store_name'
                },
                tel      : {
                    required   : 'Thông tin không được phép để trống',
                    checkTel   : 'Số điện thoại chỉ là những ký tự số, không ít hơn 6 và không chứa các ký tự khác như cộng, trừ, nhân, chia và khoảng trống.'
                },
                store_banner : {
                    accept  : 'Xin vui lòng tải lên các định dạng jpg, jpeg, png, các file gif'
                },
                store_logo  : {
                    accept : 'Xin vui lòng tải lên các định dạng jpg, jpeg, png, các file gif'
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
function add_uploadedfile(file_data)
{
        $('#desc_images').append('<li file_name="'+ file_data.file_name +'" file_path="'+ file_data.file_path +'" ectype="handle_pic" file_id="'+ file_data.file_id +'"><input type="hidden" name="desc_file_id[]" value="'+ file_data.file_id +'"><div class="pic" style="z-index: 2;"><img src="<?php echo $this->_var['site_url']; ?>/'+ file_data.file_path +'" width="50" height="50" alt="'+ file_data.file_name +'" /></div><div ectype="handler" class="bg" style="z-index: 3;display:none"><img src="<?php echo $this->_var['site_url']; ?>/'+ file_data.file_path +'" width="50" height="50" alt="'+ file_data.file_name +'" /><p class="operation"><a href="javascript:void(0);" class="cut_in" ectype="insert_editor" ecm_title="Chèn hình"></a><span class="delete" ectype="drop_image" ecm_title="Xoá"></span></p><p class="name">'+ file_data.file_name +'</p></div></li>');
        trigger_uploader();
        if(EDITOR_SWFU.getStats().files_queued == 0){
                window.setTimeout(function(){
                        $('#editor_uploader').hide();
                },5000);
        }
}
function drop_image(file_id)
{
    if (confirm(lang.uploadedfile_drop_confirm))
        {
            var url = SITE_URL + '/index.php?app=my_store&act=drop_uploadedfile';
            $.getJSON(url, {'file_id':file_id}, function(data){
                if (data.done)
                {
                    $('*[file_id="' + file_id + '"]').remove();
                }
                else
                {
                    alert(data.msg);
                }
            });
        }
}

//]]>

</script>
<?php echo $this->_var['editor_upload']; ?>
<?php echo $this->_var['build_editor']; ?>
<div class="content">
  <div class="totline"></div>
  <div class="botline"></div>
  <?php echo $this->fetch('member.menu.html'); ?>
  <div id="right"> <?php echo $this->fetch('member.submenu.html'); ?>
    <div class="wrap">
        <div class="public">
            <div class="information">
            <form method="post" enctype="multipart/form-data" id="my_store_form">
                    <div class="setup">
                        <div class="photo relative1">

                            <p><img src="<?php if ($this->_var['store']['store_logo'] != ''): ?><?php echo $this->_var['store']['store_logo']; ?><?php else: ?>data/system/default_store_logo.gif<?php endif; ?>" width="120" height="120" ectype="store_logo" /></p>
                            <b class="ie6hack">
                                <span class="file1"><input type="file" size="1" maxlength="0" hidefocus="true" ectype="change_store_logo" /></span>
                                <span class="file2" style="_right: -22px;"><input type="file" ectype="change_store_logo" size="1" maxlength="0" hidefocus="true" /></span>
                                <div class="txt">Đổi logo</div>
                            </b>
                            <span class="explain">Đây là logo cửa hàng của bạn, kích thước 100*100 pixel.</span>
                        </div>
                        <div class="photo relative2">
                            <p><img src="<?php if ($this->_var['store']['store_banner'] != ''): ?><?php echo $this->_var['store']['store_banner']; ?><?php else: ?><?php echo $this->res_base . "/" . 'images/member/banner.gif'; ?><?php endif; ?>" width="607" height="120" ectype="store_banner" /></p>
                            <b>
                                <span class="file1"><input type="file" size="1" maxlength="0" hidefocus="true" ectype="change_store_banner"/></span>
                                <span class="file2" style="_right: -22px;"><input type="file" size="1" maxlength="0" hidefocus="true" ectype="change_store_banner"/></span>
                                <div class="txt">Đổi banner</div>
                            </b>
                            <span class="explain">Đây là banner cửa hàng của bạn, sẽ xuất hiện trên vị trí banner, kích thước yêu cầu 1000*120 pixel.</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="setup info shop">

                        <table style="width: 100%">
                            <?php if ($this->_var['subdomain_enable']): ?>
                            <tr>
                              <th>Tên miền cấp 2:</th>
                              <td><input type="text" name="domain" value="<?php echo htmlspecialchars($this->_var['store']['domain']); ?>"<?php if ($this->_var['store']['domain']): ?> disabled<?php endif; ?> class="text width11" />&nbsp;<?php if (! $this->_var['store']['domain']): ?>Có thể để trống, Lưu ý! Cài đặt sẽ không sửa đổi độ dài tên miền cần được:<?php echo $this->_var['domain_length']; ?><?php else: ?><?php endif; ?></td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <th class="width2">Tên cửa hàng:</th>
                                <td>
                                    <p class="td_block"><input id="store_name" type="text" class="text width_normal" name="store_name" value="<?php echo htmlspecialchars($this->_var['store']['store_name']); ?>"/><label class="field_notice">Tên cửa hàng</label></p>
                                    <b class="padding1">*</b><a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>" target="_blank" class="btn1">My Store</a>
                                </td>
                            </tr>
                            <tr>
                                <th>Khu vực:</th>
                                <td><div id="region">
                                    <input type="hidden" name="region_id" value="<?php echo $this->_var['store']['region_id']; ?>" class="mls_id" />
                                    <input type="hidden" name="region_name" value="<?php echo htmlspecialchars($this->_var['store']['region_name']); ?>" class="mls_names" />
                                    <?php if ($this->_var['store']['store_id']): ?>
                                    <span><?php echo htmlspecialchars($this->_var['store']['region_name']); ?></span>
                                    <input type="button" value="Sửa" class="edit_region" />
                                    <select style="display:none">
                                      <option>Xin chọn...</option>
                                      <?php echo $this->html_options(array('options'=>$this->_var['regions'])); ?>
                                    </select>
                                    <?php else: ?>
                                    <select class="select">
                                      <option>Xin chọn...</option>
                                      <?php echo $this->html_options(array('options'=>$this->_var['regions'])); ?>
                                    </select>
                                    <?php endif; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <th>Địa chỉ:</th>
                                <td>
                                    <p class="td_block"><input type="text" name="address" class="text width_normal" id="address" value="<?php echo htmlspecialchars($this->_var['store']['address']); ?>" /><span class="field_notice">Không lặp lại các thông tin khu vực</span></p>
                                </td>
                            </tr>
                            <tr>
                                <th>Điện thoại:</th>
                                <td><input name="tel" type="text" class="text width_normal" id="tel" value="<?php echo htmlspecialchars($this->_var['store']['tel']); ?>" /></td>
                            </tr>
                            <tr>
                                  <th>Liên hệ QQ:</th>
                                  <td><input name="im_qq" type="text" class="text width_normal" id="im_qq" value="<?php echo htmlspecialchars($this->_var['store']['im_qq']); ?>" /></td>
                            </tr>
                            <tr>
                                  <th>Liên hệ WW:</th>
                                  <td><input name="im_ww" type="text" class="text width_normal" id="im_ww" value="<?php echo htmlspecialchars($this->_var['store']['im_ww']); ?>" /></td>
                            </tr>
                            <tr>
                                  <th>Liên hệ MSN:</th>
                                  <td><?php if ($this->_var['store']['im_msn']): ?><?php echo htmlspecialchars($this->_var['store']['im_msn']); ?> <a target="_blank" href="<?php echo url('app=my_store&act=drop_im_msn'); ?>">Tắt</a><?php else: ?><a target="_blank" href="<?php echo $this->_var['msn_active_url']; ?>">Kích hoạt tài khoản msn</a><span class="padding1">Kích hoạt thông tin sẽ có trong cửa hàng</span><?php endif; ?></td>
                             </tr>
                             <tr>
                                <th class="align3">Hồ sơ cửa hàng:</th>
                                <td><div class="editor"><div>
                                    <textarea name="description" id="description" style="width:100%; height:350px;"><?php echo htmlspecialchars($this->_var['store']['description']); ?></textarea></div>
                                   <div style=" position: relative; top: 10px; z-index: 5;"><a class="btn3" id="open_editor_uploader">Up hình</a>
                                   <div class="upload_con" id="editor_uploader" style="display:none">
                                            <div class="upload_con_top"></div>
                                            <div class="upload_wrap">
                                                <ul>
                                                    <li>
                                                        <div id="divSwfuploadContainer">
                                                            <div id="divButtonContainer">
                                                                <span id="editor_upload_button"></span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li><iframe src="index.php?app=comupload&act=view_iframe&id=<?php echo $this->_var['id']; ?>&belong=<?php echo $this->_var['belong']; ?>&instance=desc_image" width="86" height="30" scrolling="no" frameborder="0"></iframe></li>
                                                    <li id="open_editor_remote" class="btn4">Link file</li>
                                                </ul>
                                                <div id="editor_remote" class="upload_file" style="display:none">
                                                <iframe src="index.php?app=comupload&act=view_remote&id=<?php echo $this->_var['id']; ?>&belong=<?php echo $this->_var['belong']; ?>&instance=desc_image" width="272" height="39" scrolling="no" frameborder="0"></iframe>
                                                </div>
                                                <div id="editor_upload_progress"></div>
                                                <div class="upload_txt">
                                                    <span>Hỗ trợ cho định dạng JPEG và hình ảnh GIF tĩnh, không hỗ trợ ảnh động, tải lên hình ảnh kích thước không quá 2MB. Có thể chọn nhiều tập tin bằng cách giữ phím Ctrl hoặc Shift và chọn.</span>
                                                </div>

                                            </div>
                                            <div class="upload_con_bottom"></div>
                                        </div>
                                    </div>
                                    <ul id="desc_images" class="preview">
                                        <?php $_from = $this->_var['files_belong_store']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'file');if (count($_from)):
    foreach ($_from AS $this->_var['file']):
?>
                                        <li ectype="handle_pic" file_name="<?php echo htmlspecialchars($this->_var['file']['file_name']); ?>" file_path="<?php echo $this->_var['file']['file_path']; ?>" file_id="<?php echo $this->_var['file']['file_id']; ?>">
                                        <input type="hidden" name="file_id[]" value="<?php echo $this->_var['file']['file_id']; ?>">
                                            <div class="pic">
                                            <img src="<?php echo $this->_var['site_url']; ?>/<?php echo $this->_var['file']['file_path']; ?>" width="50" height="50" alt="<?php echo htmlspecialchars($this->_var['file']['file_name']); ?>" title="<?php echo htmlspecialchars($this->_var['file']['file_name']); ?>" /></div>
                                            <div ectype="handler" class="bg">
                                            <img src="<?php echo $this->_var['site_url']; ?>/<?php echo $this->_var['file']['file_path']; ?>" width="50" height="50" alt="<?php echo htmlspecialchars($this->_var['file']['file_name']); ?>" title="<?php echo htmlspecialchars($this->_var['file']['file_name']); ?>" />
                                                <p class="operation">
                                                    <a href="javascript:void(0);" class="cut_in" ectype="insert_editor" ecm_title="Chèn hình"></a>
                                                    <span class="delete" ectype="drop_image" ecm_title="Xoá"></span>
                                                </p>
                                                <p title="<?php echo htmlspecialchars($this->_var['file']['file_name']); ?>" class="name"><?php echo htmlspecialchars($this->_var['file']['file_name']); ?></p>
                                            </div>
                                        </li>
                                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                    </ul>
                                    <div class="clear"></div>
                                    </div>
                                    <div class="issuance"><input type="submit" class="btn" value="Gửi" /></div>
                                 </td>
                             </tr>
                         </table></form>
          </div>
                </div>

            </div>
            <div class="wrap_bottom"></div>
        </div>

        <div class="clear"></div>
        <div class="adorn_right1"></div>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>
    <div class="clear"></div>
</div>
<?php echo $this->fetch('footer.html'); ?>