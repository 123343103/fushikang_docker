<?php

namespace app\modules\system\controllers;

use app\modules\common\models\BsSettlement;
use app\modules\system\models\search\SettlementSearch;
use yii;
use app\modules\common\models\BsTradConditions;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\hr\models\HrStaff;
use app\modules\system\models\SystemLog;
use app\controllers\BaseController;
use yii\helpers\Json;
use app\controllers\BaseActiveController;

/**
 * TradConditionController implements the CRUD actions for BsTradConditions model.
 */
class SettlementController extends BaseActiveController
{
    public $modelClass = 'app\modules\common\models\BsSettlement';

    /**
     * Lists all BsTradConditions models.
     * @return mixed
     */
    public function actionIndex()
    {
        $model = new SettlementSearch();
        $dataProvider = $model->search(Yii::$app->request->queryParams);
        $model = $dataProvider->getModels();
        $list['rows'] = $model;
        $list['total'] = $dataProvider->totalCount;
        return $list;
    }

    /**
     * Displays a single BsTradConditions model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->actionModel($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new BsTradConditions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BsSettlement();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                return $this->success();
            } else {
                return $this->error();
            }
        } else {
            return $this->error();
        }
    }

    /**
     * Updates an existing BsTradConditions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->actionModel($id);
        if ($model->load(Yii::$app->request->post()) ) {
            if ($model->save()){
                return $this->success();
            }else{
                return  $this->error();
            }
            //return $this->redirect(['view', 'id' => $model->tac_id]);
        } else {
            $list[] = $model;
            return $list;
        }
    }
    /**
     * Deletes an existing BsTradConditions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $result = $this->actionModel($id)->delete();
        if ($result){
            return $this->success();
        }else{
            return $this->error();
        }
    }

    /**
     * Finds the BsTradConditions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BsTradConditions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionModel($id)
    {
        if (($model = BsSettlement::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
