<?php
/*
   chinh sua ngay 27/09/2011
   Le Duc Vien
   Hien thi hinh anh danh muc trang cap 2
*/
class GdetailApp extends MallbaseApp

{

    function index()
    {
        $id = isset($_GET['id']) ? trim($_GET['id']) : '';
        $store_id = isset($_GET['store']) ? trim($_GET['store']) : '';
        $model_img =& m('goodsimage');
        $goods_img = $model_img->find(array(
	        'count'         => true,
	        'conditions'    => 'goods_id ='.$id ,
        ));
        $this->assign('image', $goods_img);
        //var_dump($goods_img);
        //lay thong tin san pham
        $goods_mod  =& m('goods');
        $goods_list = $goods_mod->find(array(
            'count'         => true,
            'conditions'    => 'goods_id = '.$id ,
        ));
        foreach ($goods_list as $key => $goods)
        {
            $store_mod =& m('store');
            $goods_list[$key]['credit_image'] = $this->_view->res_base . '/images/' . $store_mod->compute_credit($goods['credit_value'], $step);
            empty($goods['default_image']) && $goods_list[$key]['default_image'] = Conf::get('default_goods_image');
            $goods_list[$key]['grade_name'] = $sgrades[$goods['sgrade']];
        }
       $this->assign('sanpham', $goods_list);
        //ket thuc
       
        //hien thi danh muc san pham cung loai
         $goods_mod  =& m('goods');
         $goods_list = $goods_mod->get_list(array(
            //'conditions' =>'store_id = '.$store_id ,
            'order'      => 'add_time DESC',
            'limit'      => 10,
        ));
        foreach ($goods_list as $key => $goods)
        {
            $store_mod =& m('store');
            $goods_list[$key]['credit_image'] = $this->_view->res_base . '/images/' . $store_mod->compute_credit($goods['credit_value'], $step);
            empty($goods['default_image']) && $goods_list[$key]['default_image'] = Conf::get('default_goods_image');
            $goods_list[$key]['grade_name'] = $sgrades[$goods['sgrade']];
        }
       
       $this->assign('dmsanpham', $goods_list);
        //ket thuc
        
        
        $this->assign('index', 1); // 标识当前页面是首页，用于设置导航状态

        $this->assign('icp_number', Conf::get('icp_number'));
        /* 热门搜素 */

        $this->assign('hot_keywords', $this->_get_hot_keywords());

		/*------add by tianya--------*/

		//$this->assign('search_keywords', $this->_get_search_keywords());

        $goods_id=$_GET['id'];

		$result=mysql_query("SELECT goods_name FROM ecm_goods WHERE goods_id=$goods_id") or die(mysql_error());

		list($goods_name)=mysql_fetch_array($result);

        $this->assign('page_title', "$goods_name");

        $this->assign('page_description', "$goods_name");

        $this->assign('page_keywords', "$goods_name");

         //$cate_id = isset($param['cate_id']) ? $param['cate_id'] : 0;

        $this->_curlocal($this->_get_goods_curlocal($cate_id));

        $this->display('gdetail.goods.html');

    }



    function _get_hot_keywords()

    {

        $keywords = explode(',', conf::get('hot_search'));

        return $keywords;

    }


    function _get_goods_curlocal($cate_id)
    {

        $parents = array();

        if ($cate_id)
        {
            $gcategory_mod =& bm('gcategory');
            $parents = $gcategory_mod->get_ancestor($cate_id, true);

        }
        $curlocal = array(
            array('text' => LANG::get('all_categories'), 'url' => "javascript:dropParam('cate_id')"),
        );
        foreach ($parents as $category)

        {
            $curlocal[] = array('text' => $category['cate_name'], 'url' => "javascript:replaceParam('cate_id', '" . $category['cate_id'] . "')");
        }
        unset($curlocal[count($curlocal) - 1]['url']);
        return $curlocal;
    }
}



?>