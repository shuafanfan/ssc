<?php 
namespace Home\Model;
use Think\Model\RelationModel;
class PlayWayTypeModel extends RelationModel {
    protected $_link = array(
        'Category'=>array(
            'mapping_type'      => self::BELONGS_TO,
            'class_name'        => 'Category',
            'foreign_key'       => 'cate_id',
        ),
        'PlayWays'=>array(
            'mapping_type'      => self::HAS_MANY,
            'class_name'        => 'PlayWay',
            'foreign_key'       => 'type_id',
        ),
    );
}

