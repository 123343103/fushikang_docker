<?php
use yii\helpers\Url;
use app\classes\Menu;

$actionId = Yii::$app->controller->action->id;
?>

<div class="table-head">
    <p class="head">订单出货情况查询报表</p>
    <div class="float-right">
        <!--        <a><span>导出</span></a>-->
        <?= Menu::isAllow('/sale/sale-trade-order/index', 'btn_export') ?
            '<a id="export">
            <div style="height: 23px;width: 55px;float: left;">
                <p class="add-item-bgc" style="float: left"></p>
                <p style="font-size: 14px;margin-top: 2px;">&nbsp;导出</p>
            </div>
        </a>
        <p style="float: left;">&nbsp;|&nbsp;</p>'
            : '' ?>
        <a href="<?= Url::home() ?>">
            <div class='icon-btn'>
                <p class='return-item-bgc float-left ml-4'></p>
                <p class='text-btn'>&nbsp;返回</p>
            </div>
        </a>
    </div>
</div>