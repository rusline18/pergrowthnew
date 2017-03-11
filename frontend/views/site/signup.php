<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use kartik\depdrop\DepDrop;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use frontend\models\Country;
use frontend\models\Region;
use frontend\models\City;

$this->title = 'Регистрация';
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'lastname', ["enableLabel"=>false])->textInput(['autofocus' => true, "placeholder"=>"Ввдеите Вашу фамилию"]) ?>

                <?= $form->field($model, 'username',["enableLabel"=>false])->textInput(["placeholder"=>"Введите Ваше име"]) ?>

                <?= $form->field($model, 'email',["enableLabel"=>false])->textInput(["placeholder"=>"Введите email"]) ?>

                <?= $form->field($model, 'password',["enableLabel"=>false])->passwordInput(["placeholder"=>"Ввержите пароль"]) ?>

                <?= $form->field($model, 'floor')->dropDownList([
                "men"=>"Мужчина",
                "women"=>"Женщина"
                ], ["prompt"=>"Выберите список..."]) ?>

                <?= $form->field($model, 'data', ["enableLabel"=>false])->textInput(["placeholder"=>"Ввкдие дату"]) ?>

                <?php $my_array = ArrayHelper::map(Region::find()->where(['country_id'=>3159])->all(),'region_id', 'name') ?>
                <?= $form->field($model, 'region')->dropDownList(
                    $my_array,
                    [
                    'prompt'=> 'Выберите регион',
                    'onchange'=>'
                        $.post("index.php?r=site/city&id='.'"+$(this).val(), function(data){
                            $("select#signupform-city").html(data);
                        });'
                    ]); ?>

                <?= $form->field($model, 'city')->dropDownList(
                    ArrayHelper::map(City::find()->all(), 'city_id', 'name'),
                    [
                    'prompt'=>'Выберите город',
                    'disabled'=>'disabled'
                    ]); ?>

                <div class="form-group">
                    <?= Html::submitButton('Зарегестрироваться', ['class' => 'btn btn-success', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>