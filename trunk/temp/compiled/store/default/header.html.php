<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $this->_var['site_url']; ?>/" />

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7 charset=<?php echo $this->_var['charset']; ?>" />
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo $this->_var['charset']; ?>" />
<?php echo $this->_var['page_seo']; ?>
<meta name="author" content="ccnvietnam.com" />
<meta name="copyright" content="ccnvietnam" />
<link href="<?php echo $this->res_base . "/" . 'style.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->res_base . "/" . 'slider.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->res_base . "/" . 'colorbox.css'; ?>" rel="stylesheet" type="text/css" />
<!--[if IE 6]><link rel="stylesheet" href="<?php echo $this->res_base . "/" . 'style.ie6.css'; ?>" type="text/css" media="screen" /><![endif]-->
<!--[if IE 7]><link rel="stylesheet" href="<?php echo $this->res_base . "/" . 'style.ie7.css'; ?>" type="text/css" media="screen" /><![endif]-->
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'script.js'; ?>"></script>
<script type="text/javascript" src="index.php?act=jslang"></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'jquery-1.6.1.min.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.lazyload.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
<script type="text/javascript">
 $("img").lazyload({
     placeholder : "<?php echo $this->res_base . "/" . 'images/white.gif'; ?>",       
     effect      : "fadeIn"
 });
</script>
<script type="text/javascript">
//<!CDATA[
var SITE_URL = "<?php echo $this->_var['site_url']; ?>";
var PRICE_FORMAT = '<?php echo $this->_var['price_format']; ?>';
</script>
<?php echo $this->_var['_head_tags']; ?>
</head>
<body>
	<div id="art-page-background-simple-gradient">
        <div id="art-page-background-gradient"></div>
    </div>
    <div id="art-page-background-glare">
        <div id="art-page-background-glare-image"></div>
    </div>
	<div id="art-main">
        <div class="art-sheet">
			<div class="art-sheet-body">