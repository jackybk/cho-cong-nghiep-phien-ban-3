<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript">
$(function(){
    $('#notice_form').validate({
        errorPlacement: function(error, element){
            $(element).next('.field_notice').hide();
            $(element).after(error); 
        },
        success       : function(label){
            label.addClass('right').text('OK!');
        },
        rules : { 
            user_name : {
                required : check_user_name  
            },   
            amount    :{
                number     : true
            }
        },
        messages : {
            user_name :{
                required     : 'Tên thành viên không được để trống'
            },
            amount    :{
                number     : 'Chỉ gửi đến số!'
            }
        }
    });
    function check_user_name()
    {
        var rs = $(":input[name='send_type']:checked").val();
        
        return rs == 1 ? true : false; 
    }
    $("input[name='send_type']").click(function(){
        var rs = $(this).val();
        switch(rs)
        {
            case '1':
                $('#user_list').show();
                $('#sgrade_list').hide();
                break;
            case '2':
                $('#user_list').hide();
                $('#sgrade_list').hide();
                break;
            case '3':
                $('#sgrade_list').show();
                $('#user_list').hide();
                break;
            case '4':
                $('#user_list').hide();
                $('#sgrade_list').hide();
                break;
        }
    });
    $("input[name='send_mode']").click(function(){
        var rs = $(this).val();
        switch(rs)
        {
            case '1':
                $('#msg').show();
                $('#email').hide();
                $('#title').hide();
                break;
            case '2':
                $('#msg').hide();
                $('#email').show();
                $('#title').show();
                break;
        }
    });
    
    $('#msg_instrunction').toggle(function(){
        $(this).next('div').fadeIn("slow")
    },function(){
        $(this).next('div').fadeOut("slow");
    });
});

</script>
<style type="text/css">
#short_msg_desc {margin-top:10px;}
#short_msg_desc a {color:#0099CC;}
#short_msg_desc div {display:none;color:#646665;border:1px solid #CCCCCC;padding:5px;width:340px;background-color:#F5F5F5;line-height:25px;}
</style>
<?php echo $this->_var['build_editor']; ?>
<div id="rightTop">
  <p>Thông báo thành viên</p>
  <ul class="subnav">
    <li><span>Gửi thông báo</span></li>
  </ul>
</div>
<div class="info">
<form method="POST" id="notice_form">
<input type="hidden" name="type" value="<?php echo $_GET['type']; ?>">
<table class="infoTable">

    <tr>
        <th class="paddingT15">Gửi cho:</td>
        <td class="paddingT15 wordSpacing5">
            <?php echo $this->html_radios(array('options'=>$this->_var['send_type'],'name'=>'send_type','checked'=>'1')); ?>
        </td>
    </tr>
    <tr id="user_list">
        <th class="paddingT15"> Danh sách thành viên:</th>
        <td class="paddingT15 wordSpacing5"><textarea name="user_name" style="height:100px;" id="user_name"></textarea><span class="field_notice">Điền tên thành viên trên mỗi dòng<span></td>
    </tr>
    <tr id="sgrade_list" style="display:none;">
        <th class="paddingT15"> Danh sách thành viên:</th>
        <td class="paddingT15 wordSpacing5">
        <select name="sgrade[]" multiple="multiple">
            <?php echo $this->html_options(array('options'=>$this->_var['sgrades'])); ?>
        </select>
        </td>
    </tr>
    <tr>
        <th class="paddingT15">Gửi hàng loạt:</td>
        <td class="paddingT15 wordSpacing5"><input type="text" name="amount" value="20"><span class="field_notice">Chỉ nên gửi <100 người, tránh tình trạng Request time out</span></td>
    </tr>
    <tr>
        <th class="paddingT15">Hình thức gửi :</td>
        <td class="paddingT15 wordSpacing5"><?php echo $this->html_radios(array('options'=>$this->_var['send_mode'],'name'=>'send_mode','checked'=>'1')); ?></td>
    </tr>
    <tr id="title" style="display:none;">
        <th class="paddingT15">Tiêu đề tin nhắn:</td>
        <td class="paddingT15 wordSpacing5"><input type="text" name="title"></td>
    </tr>
    <tr id="email"  style="display:none;">
        <th class="paddingT15">Nội dung:</td>
        <td class="paddingT15 wordSpacing5"><textarea name="content" style="width:400px; height:300px;"></textarea></td>
    </tr>
    <tr id="msg">
        <th class="paddingT15">Nội dung:</td>
        <td class="paddingT15 wordSpacing5"><textarea name="content1" style="width:400px; height:300px;"></textarea>
            <div id="short_msg_desc"><a href="javascript:;" id="msg_instrunction">Gửi qua tin nhắn bằng cách sử dụng tin nhắn mẫu?</a>
                <div>图片标签：[img]http://ecmall.shopex.cn/images/logo.gif[/img]<br/>超链接标签：[url=http://ecmall.shopex.cn]ECMall官方网站[/url]</div>
            <div>
        </td>
    </tr>
    <tr>
        <th class="paddingT15"> </th>
        <td class="ptb20"><input class="formbtn" type="submit" name="Submit" value="Gửi" />
          <input class="formbtn" type="reset" name="Submit2" value="Làm lại" /></td>
    </tr>
</table>
</form>
</div>
<?php echo $this->fetch('footer.html'); ?>