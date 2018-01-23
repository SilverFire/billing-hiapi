<?php

namespace hiqdev\billing\hiapi\target;

use hiqdev\billing\hiapi\models\Target;
use yii\db\Expression;

class TargetQuery extends \hiqdev\yii\DataMapper\query\Query
{
    protected $modelClass = Target::class;

    /**
     * @return array
     */
    protected function attributesMap()
    {
        return [
            'id' => 'o.obj_id',
            'type' => new Expression("
                t.name || 
                CASE WHEN tt.name IS NOT NULL THEN
                    '.' || tt.name
                ELSE
                    ''
                END as type
            "),
        ];
    }

    public function initFrom()
    {
        return $this->from('obj   o')
                ->leftJoin('zref   t',  't.obj_id  = o.class_id')
                ->leftJoin('device d',  'd.obj_id  = o.obj_id')
                ->leftJoin('zref   tt', 'tt.obj_id = coalesce(d.type_id)');
    }
}