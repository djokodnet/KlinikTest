<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Treatment $model */

$this->title = 'Create Treatment';
$this->params['breadcrumbs'][] = ['label' => 'Treatments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treatment-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
