<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Обратная связь';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($model, 'name',["enableLabel"=>false])->textInput(['autofocus' => true, "placeholder"=>"Ваше имя"]) ?>

                <?= $form->field($model, 'email',["enableLabel"=>false])->textInput(["placeholder"=>"Ваш email"]) ?>

                <?= $form->field($model, 'subject',["enableLabel"=>false])->textInput(["placeholder"=>"Тема сообщения"]) ?>

                <?= $form->field($model, 'body',["enableLabel"=>false])->textarea(['rows' => 6]) ?>

                <?= $form->field($model, 'verifyCode',["enableLabel"=>false])->widget(Captcha::className(), [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-success', 'name' => 'contact-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>

</div>
