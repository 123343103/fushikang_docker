<?php
/**
 * Created by PhpStorm.
 * User: F1678086
 * Date: 2016/12/28
 * Time: 15:19
 */
namespace app\modules\crm\models\show;

use app\modules\crm\models\CrmCustProduct;

class CrmCustProductShow extends CrmCustProduct
{
    public function fields()
    {
        $fields = parent::fields();

        return $fields;
    }
}