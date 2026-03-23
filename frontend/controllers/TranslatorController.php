<?php


namespace frontend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Translator;

class TranslatorController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionTranslators()
    {
        $qb = Translator::find();

        return $this->render('translators', [
            'translators' => $qb->all(),
        ]);
    }

    public function actionGetTranslatorsApi()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $dayOfWeek = date('N'); // 1 (пн) - 7 (вс)

        $type = ($dayOfWeek >= 6) ? 2 : 1;

        $qb = Translator::find()
            ->where(['work_type' => $type]);

        $translators = $qb->all();

        $message = 'Переводчики отсутствуют';
        if ($translators) {
            $message = 'Количество переводчиков: ' . count($translators);
        }

        return [
            'message' => $message,
            'translators' => $translators,
        ];
    }

    public function actionAddEmp()
    {
        $model = new Translator();
        $message = '';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $message = 'Новый сотрудник добавлен';
            $model = new Translator(); // очищаем форму
        } elseif (Yii::$app->request->isPost) {
            $message = 'Возникла ошибка при добавлении сотрудника';
        }

        return $this->render('add_emp', [
            'model' => $model,
            'message' => $message
        ]);

//full_name
//email
//work_type
//created_at
    }
}