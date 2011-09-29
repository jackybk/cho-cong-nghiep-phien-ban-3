<?php
class Markets_storeApp extends MallbaseApp
{
    function index()
    {
        $this->assign('index', 1); 

        $this->assign('icp_number', Conf::get('icp_number'));
        $this->assign('hot_keywords', $this->_get_hot_keywords());
		
        $this->assign('page_title', "$goods_name");
        $this->assign('page_description', "$goods_name");
        $this->assign('page_keywords', "$goods_name");
        $this->_curlocal($this->_get_goods_curlocal($cate_id));
        $this->display('markets.store.html');
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