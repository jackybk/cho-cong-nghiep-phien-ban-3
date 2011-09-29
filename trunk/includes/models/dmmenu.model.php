<?php

/* 品牌 brand */
class DmmenuModel extends BaseModel
{
    var $table  = 'need';
    var $prikey = 'id';
    var $_name  = 'need';

    /* 添加编辑时自动验证 */
    var $_autov = array(
        'category' => array(
            'required'  => true,    //必填     //最长100个字符
            'filter'    => 'trim',
        ),
       
        
    );

    function edit($conditions, $edit_data)
    {
        $store_list = $this->find(array(
            'fields'     => 'id',
            'conditions' => $conditions,
        ));
        foreach ($store_list as $store)
        {
            // 清除缓存
            $this->clear_cache($store['id']);
        }

        return parent::edit($conditions, $edit_data);
    }
     function drop($conditions, $fields = '')
    {
        /* 清除缓存 */
        $store_list = $this->find(array(
            'fields'     => 'id',
            'conditions' => $conditions,
        ));
        foreach ($store_list as $store)
        {
            $this->clear_cache($store['id']);
        }

        return parent::drop($conditions, $fields);
    }
    function unique($title, $id = 0)
    {
        $conditions = "title = '" . $title . "' AND id != ".$id."";
        //dump($conditions);
        return count($this->find(array('conditions' => $conditions))) == 0;
    }
    
  /* 取得本店所有商品分类 */
    function get_sgcategory_options($id)
    {
        $mod =& bm('gcategory', array('_tin_dang' => $id));
        $gcategories = $mod->get_list();
        import('tree.lib');
        $tree = new Tree();
        $tree->setTree($gcategories, 'cate_id', 'parent_id', 'cate_name');
        return $tree->getOptions();
    }
     function get_info($id)
    {
        $info = $this->get(array(
            'conditions' => $id,
            'join'       => 'belongs_to_user',
            
        ));
        if (!empty($info['certification']))
        {
            $info['certifications'] = explode(',', $info['certification']);
        }
        return $info;
    }
     function clear_cache($id)
    {
        $cache_server =& cache_server();
        $keys = array('function_get_store_data_' . $id);
        foreach ($keys as $key)
        {
            $cache_server->delete($key);
        }
    }
     function get_options()
    {
        $cache_server =& cache_server();
        $key     = 'sgrade_options';
        $options = $cache_server->get($key);
        if ($options === false)
        {
            $options = array();
            $sgrades = $this->find();
            foreach ($sgrades as $sgrade)
            {
                $options[$sgrade['id']] = $sgrade['stt'];
            }
            $cache_server->set($key, $options);
        }

        return $options;
    }
    
}

?>