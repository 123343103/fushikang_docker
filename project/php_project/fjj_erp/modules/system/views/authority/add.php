<?php
/**
 * F3858995
 * 2016/10/10
 */
use yii\helpers\Url;

$this->params['homeLike'] = ['label'=>'系统平台设置'];
$this->params['breadcrumbs'][] = ['label'=>'用戶组（角色）', 'url' => Url::to(['role-index'])];
$this->params['breadcrumbs'][] = ['label'=>'新增/修改角色'];
$this->title="新增操作角色"
?>
<div class="content">
    <?= $this->render("_form",['model'=>$model,'authority'=>$authority]) ?>
</div>
