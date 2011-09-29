<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7 charset=<?php echo $this->_var['charset']; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_var['charset']; ?>" />
<title> ECMall </title>
<link href="templates/style/admin.css" rel="stylesheet" type="text/css" />
<link href="templates/style/user.css" rel="stylesheet" type="text/css" />
<link href="templates/style/screen.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
//<!CDATA[
var SITE_URL = "<?php echo $this->_var['site_url']; ?>";
//]]>
</script>

<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/ddcolorposter.js'; ?>></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/YAHOO.js'; ?> ></script>
<script type="text/javascript2" src="<?php echo $this->res_base . "/" . 'js/log.js'; ?>></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/color.js'; ?> ></script>

<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/event.js'; ?>"} ></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/dom.js'; ?>></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/animation.js'; ?> ></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/dragdrop.js'; ?> ></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/slider.js'; ?>></script>



<script type="text/javascript" src="index.php?act=jslang"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/admin.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="index.php?act=jslang"></script>
<script type="text/javascript" src="index.php?act=jslang"></script>

<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'member.js'; ?>" charset="utf-8"></script>
<script type="text/javascript">
$(function(){
    $('#left h1 span,h2.title a.fold').click(function(){
        if($(this).hasClass('span_close')){
            $(this).removeClass('span_close');
            $(this).addClass('span_open');
            this.title = 'open';
            closeSubmenu($(this).parent());
        }
        else{
            $(this).removeClass('span_open');
            $(this).addClass('span_close');
            this.title = 'close';
            openSubmenu($(this).parent());
        }
    });

    var span = $("#child_nav");
    span.hover(function(){
        $("#float_layer:not(:animated)").show();
    }, function(){
        $("#float_layer").hide();
    });
});
function closeSubmenu(h1){
    h1.next('ul').css('display', 'none');
}
function openSubmenu(h1){
    h1.next('ul').css('display', '');
}
</script>
<style type="text/css">
<!--
body {background: #fcfdff}
-->
</style>
<?php echo $this->_var['_head_tags']; ?>
</head>
<body>