<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $this->_var['site_url']; ?>/" />

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7 charset=<?php echo $this->_var['charset']; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_var['charset']; ?>" />
<?php echo $this->_var['page_seo']; ?>
<meta name="author" content="<?php echo $this->_var['site_url']; ?>" />
<meta name="generator" content="CCNVIETNAM <?php echo $this->_var['ecmall_version']; ?>" />
<meta name="copyright" content="Copyright 2010 Chocongnghiep.com.vn All rights reserved" />
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
<link href="<?php echo $this->res_base . "/" . 'css/style.css'; ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="index.php?act=jslang"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.colorbox.js'; ?>" charset="utf-8"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("a[rel='imgdetail']").colorbox();
	});
</script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/nav.js'; ?>" charset="utf-8"></script>
<script type="text/javascript">
//<!CDATA[
var SITE_URL = "<?php echo $this->_var['site_url']; ?>";
var PRICE_FORMAT = '<?php echo $this->_var['price_format']; ?>';
//]]>
</script>
<?php echo $this->_var['_head_tags']; ?>
<!--<editmode></editmode>-->
</head>

<body>
<a name="top"></a>
<div id="nav_top">
	<div class="wrap_top">
		<div class="category">
			<ul id="navmenu">
				<li>
					<a href="<?php echo $this->_var['site_url']; ?>/" title="Trang chủ" class="root home"><img src="<?php echo $this->res_base . "/" . 'images/icon_home.png'; ?>" align="absmiddle"/></a>
				</li>
				<li>
					<a href="<?php echo url('app=category&act=store'); ?>" class="root">Cửa hàng<img src="<?php echo $this->res_base . "/" . 'images/icon_arrow_down.gif'; ?>" align="absmiddle"/></a>
					<ul>
						<?php
							$sql="SELECT * FROM `ecm_scategory` WHERE `parent_id` =0 ORDER BY `sort_order`";
							$result=mysql_query($sql);
							if(mysql_num_rows($result)>0)
							{
								while($row=mysql_fetch_array($result))
								{
									echo "
									<li><a href=\"".$row['cate_id']."\"><span>".$row['cate_name']."</span></a>";
										$sqlsub="SELECT * FROM `ecm_scategory` WHERE `parent_id` =".$row['cate_id']." ORDER BY `sort_order`";
										$resultsub=mysql_query($sqlsub);
										if(mysql_num_rows($resultsub)>0)
										{
											echo "<ul>";
											while($rowsub=mysql_fetch_array($resultsub))
											{
												echo "<li><a href=\"#\"><span>".$rowsub['cate_name']."</span></a></li>";
											}
											echo "</ul>";
										}
									echo "</li>";
								}
							}
			
						?>
					</ul>
				</li>
				<li>
					<a href="<?php echo url('app=category'); ?>" class="root">Mua sắm<img src="<?php echo $this->res_base . "/" . 'images/icon_arrow_down.gif'; ?>" align="absmiddle"/></a>
					<ul style="background: #eee;">
						<?php
							$sql="SELECT * FROM `ecm_gcategory` WHERE `store_id` =0 AND `parent_id` =0 AND `if_show` =1 ORDER BY `sort_order`";
							$result=mysql_query($sql);
							if(mysql_num_rows($result)>0)
							{
								while($row=mysql_fetch_array($result))
								{
									echo "
									<li><a href=\"".$row['cate_id']."\"><span>".$row['cate_name']."</span></a>";
										$sqlsub="SELECT * FROM `ecm_gcategory` WHERE `store_id` =0 AND `parent_id` =".$row['cate_id']." AND `if_show` =1 ORDER BY `sort_order`";
										$resultsub=mysql_query($sqlsub);
										if(mysql_num_rows($resultsub)>0)
										{
											echo "<ul>";
											while($rowsub=mysql_fetch_array($resultsub))
											{
												echo "<li><a href=\"#\"><span>".$rowsub['cate_name']."</span></a></li>";
											}
											echo "</ul>";
										}
									echo "</li>";
								}
							}
			
						?>
					</ul>
				</li>
				<li><a href="<?php echo url('app=blog'); ?>" class="root blog"><img src="<?php echo $this->res_base . "/" . 'images/icon_forum.png'; ?>" align="absmiddle"/>Forum</a></li>
				<li><a href="<?php echo url('app=blog'); ?>" class="root forum"><img src="<?php echo $this->res_base . "/" . 'images/icon_blog.png'; ?>" align="absmiddle"/>Blog</a></li>
			</ul>
		</div>
		<div class="find">
			<form method="GET" action="<?php echo url('app=search'); ?>">
				<div class="wrapfind">
					<input type="text" name="keyword" class="text_find" style="border: none;" />
					<input type="hidden" name="app" value="search" />
					<input type="submit" name="Submit" value="Tìm kiếm" class="btn_find" />
				</div>
			</form>
		</div>
		<div class="user">
			<ul id="navmenu">
				<li class="first"><a href="<?php echo url('app=adsnews'); ?>" class="root">Rao vặt<img src="<?php echo $this->res_base . "/" . 'images/icon_arrow_down.gif'; ?>" align="absmiddle"/></a>
					<ul>
						<?php
							$sql="SELECT * FROM `ecm_gcategory` WHERE `store_id` =0 AND `parent_id` =0 AND `if_show` =1 ORDER BY `sort_order`";
							$result=mysql_query($sql);
							if(mysql_num_rows($result)>0)
							{
								while($row=mysql_fetch_array($result))
								{
									echo "<li><a href=\"".$row['cate_id']."\"><span>".$row['cate_name']."</span></a></li>";
								}
							}
			
						?>
					</ul>
				</li>
				<li><a href="<?php echo url('app=adsnews'); ?>" class="root">Tin tức<img src="<?php echo $this->res_base . "/" . 'images/icon_arrow_down.gif'; ?>" align="absmiddle"/></a>
					<ul>
						<?php
							$sql="SELECT * FROM `ecm_gcategory` WHERE `store_id` =0 AND `parent_id` =0 AND `if_show` =1 ORDER BY `sort_order`";
							$result=mysql_query($sql);
							if(mysql_num_rows($result)>0)
							{
								while($row=mysql_fetch_array($result))
								{
									echo "<li><a class=\"only\" href=\"".$row['cate_id']."\"><span>".$row['cate_name']."</span></a></li>";
								}
							}
			
						?>
					</ul>
				</li>
				<?php if (! $this->_var['visitor']['user_id']): ?>
				<li>
					<a href="<?php echo url('app=member'); ?>" class="root account"><img src="<?php echo $this->res_base . "/" . 'images/icon_member.png'; ?>" align="absmiddle"/>Đăng nhập</a>
					<ul class="boxlogin">
						<li>
							<form method="post" class="ui-corner-bl ui-corner-br" id="login_form" action="index.php?app=member&act=login&ret_url=">
								<div class="line first">
									<label for="username">Tên đăng nhập:</label>
									<input id="username" name="user_name" value="" class="txtlogin" title="Tên đăng nhập" tabindex="1" type="text">
								</div>
								<div class="line">
									<label for="password">Mật khẩu:</label>
									<input id="password" name="password" value="" class="txtlogin" title="Mật khẩu" tabindex="2" type="password">
								</div>
								<div class="line">
									<input id="remember" name="remember_me" value="1" tabindex="3" type="checkbox">
									<label for="remember" class="lable_remember">Ghi nhớ mật khẩu</label>
								</div>
								<div class="line">
									<input id="btn_login" name="Submit" value="Đăng nhập" tabindex="4" type="submit" class="enter" />
									<div class="clear"></div>
								</div>
								<div class="line">
									<a href="<?php echo url('app=find_password'); ?>" class="clew" tabindex="5">Quên mật khẩu?</a>
								</div>
								<input type="hidden" name="ret_url" value="<?php echo $this->_var['ret_url']; ?>" />
							</form>
						</li>
					</ul>
				</li>
				<li><a href="<?php echo url('app=member&act=register'); ?>" class="root account"><img src="<?php echo $this->res_base . "/" . 'images/icon_reg.png'; ?>" align="absmiddle"/>Đăng ký</a></li>
				 <?php else: ?>
					<li><a href="" class="root"><?php echo htmlspecialchars($this->_var['visitor']['user_name']); ?><img src="<?php echo $this->res_base . "/" . 'images/icon_arrow_down.gif'; ?>" align="absmiddle"/></a>
						<ul>
						<?php
							$sql="SELECT * FROM `ecm_gcategory` WHERE `store_id` =0 AND `parent_id` =0 AND `if_show` =1 ORDER BY `sort_order`";
							$result=mysql_query($sql);
							if(mysql_num_rows($result)>0)
							{
								while($row=mysql_fetch_array($result))
								{
									echo "<li><a class=\"only\" href=\"".$row['cate_id']."\"><span>".$row['cate_name']."</span></a></li>";
								}
							}
			
						?>
					</ul>
					</li>
					<li><a class="root account" href="<?php echo url('app=member&act=logout'); ?>"><img src="<?php echo $this->res_base . "/" . 'images/icon_logout.png'; ?>" align="absmiddle"/>Thoát</a></li>
				<?php endif; ?>
				<li class="last"><a href="" class="root shopping" title="Giỏ hàng có  100 sản phẩm"><img src="<?php echo $this->res_base . "/" . 'images/icon_cart.png'; ?>" align="absmiddle"/><sup>100</sup></a></li>
				
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div id="head">
    <h1 title="<?php echo $this->_var['site_title']; ?>"><a href="index.php"><img alt="<?php echo $this->_var['site_title']; ?>" src="<?php echo $this->_var['site_logo']; ?>" /></a></h1>
    <div class="menu">
		<div class="ads_top">
			<a href=""><img src="data/files/mall/template/advertise.jpg"></a>
		</div>
    </div>
	<div class="clear"></div>
</div>
<div id="nav_middle">
    <div class="nav">
		<ul class="nav_left">
			<li><a class="<?php if ($this->_var['index']): ?>link<?php else: ?>hover<?php endif; ?>" href="index.php"><span style="padding-left: 0px;"><img  class="icon_home" src="<?php echo $this->res_base . "/" . 'images/icon_home_gray.png'; ?>" align="absmiddle"/></span></a></li>
			<?php $_from = $this->_var['navs']['middle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');if (count($_from)):
    foreach ($_from AS $this->_var['nav']):
?>
			<li><a class="<?php if (! $this->_var['index'] && $this->_var['nav']['link'] == $this->_var['current_url']): ?>link<?php else: ?>hover<?php endif; ?>" href="<?php echo $this->_var['nav']['link']; ?>"<?php if ($this->_var['nav']['open_new']): ?> target="_blank"<?php endif; ?>><span><?php echo htmlspecialchars($this->_var['nav']['title']); ?></span><sup></sup></a></li>
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
		<ul class="nav_right">
			<?php $_from = $this->_var['navs']['header']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');if (count($_from)):
    foreach ($_from AS $this->_var['nav']):
?>
            <li class="line"><a href="<?php echo $this->_var['nav']['link']; ?>"<?php if ($this->_var['nav']['open_new']): ?> target="_blank"<?php endif; ?>><span><?php echo htmlspecialchars($this->_var['nav']['title']); ?></span></a></li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		</ul>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>