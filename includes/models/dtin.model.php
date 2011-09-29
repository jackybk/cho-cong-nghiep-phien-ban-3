<?php
class DtinModel extends BaseModel
{
    var $table  = 'dangtin';
    var $prikey = 'id';
    var $_name  = 'dangtin';

    /* 添加编辑时自动验证 */
    var $_autov = array(
        'id' => array(
            'filter'    => 'trim',
        ),
        'category'  => array(
            'filter'    => 'intval',
        ),
        'city'  => array(
            'filter'    => 'intval',
        ),
      
    );
     
  
}
?>