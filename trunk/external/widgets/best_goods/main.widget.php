<?php

/**
 * 精品推荐挂件
 *
 * @param   int     $img_recom_id   图文推荐id
 * @return  array
 */
class Best_goodsWidget extends BaseWidget
{
    var $_name = 'best_goods';
    var $_ttl  = 1800;
    var $_num  = 14;

    function _get_data()
    {
        $goods_mod  =& m('goods');
        $goods_list = $goods_mod->get_list(array(
            'conditions' => $conditions,
            'order'      => 'add_time DESC',
            'limit'      => 14,
        ));
        foreach ($goods_list as $key => $goods)
        {
            $step = intval(Conf::get('upgrade_required'));
            $step < 1 && $step = 5;
            $store_mod =& m('store');
            $goods_list[$key]['credit_image'] = $this->_view->res_base . '/images/' . $store_mod->compute_credit($goods['credit_value'], $step);
            empty($goods['default_image']) && $goods_list[$key]['default_image'] = Conf::get('default_goods_image');
            $goods_list[$key]['grade_name'] = $sgrades[$goods['sgrade']];
        }
       $this->assign('sanpham', $goods_list);
       //var_dump($goods_list);
    }

    function get_config_datasrc()
    {
        // 取得推荐类型
        $this->assign('recommends', $this->_get_recommends());

        // 取得一级商品分类
        $this->assign('gcategories', $this->_get_gcategory_options(1));
    }

    function parse_config($input)
    {
        if ($input['img_recom_id'] >= 0)
        {
            $input['img_cate_id'] = 0;
        }

        return $input;
    }
}

?>