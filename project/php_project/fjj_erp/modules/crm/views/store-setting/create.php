<?php

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '新增销售点';
$this->params['homeLike'] = ['label'=>'客户关系管理'];
$this->params['breadcrumbs'][] = ['label' => '销售点维护列表', 'url' => Url::to(['index'])];
$this->params['breadcrumbs'][] = ['label' => $this->title];

?>
<div>

    <?= $this->render('_form',[
        'seller'=>$seller,
        'status'=>$storeStatus,
        'saleArea'=>$saleArea,
        'country'=>$country,
    ]) ?>
</div>