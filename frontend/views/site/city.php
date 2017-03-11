<?php 
	
	namespace frontend\views\site;

	use frontend\models\City;

	$model = Region::find()->where(['country_id'=> $country_id])->saArray()->all();

?>