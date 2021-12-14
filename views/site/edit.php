<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Edycja';

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Lista pomiarów
        </div>
        <div class="card-body">

            <?php
            $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'options' => ['class' => 'form-horizontal'],
                        'action' =>['site/save']
                    ])
            ?>
            <?= $form->field($data, 'gender_ID')->radioList($genders); ?>
            <?= $form->field($data, 'waist') ?>
            <?= $form->field($data, 'body_weight') ?>
            <?= $form->field($data, 'ID')->hiddenInput()->label(false);?>

            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Zaktualizuj', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <?php ActiveForm::end() ?>

            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Płeć</th>
                            <th>Obwód w pasie</th>
                            <th>Masa ciała</th>
                            <th>Współczynnik</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Płeć</th>
                            <th>Obwód w pasie</th>
                            <th>Masa ciała</th>
                            <th>Współczynnik</th>
                            <th></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php if (count($model) > 0) { ?>
                            <?php foreach ($model as $entry) { ?>
                                <tr>
                                    <td>
                                        <p class="mb-0"><?=$entry->genders->name?></p>
                                    </td>
                                    <td>
                                        <p class="mb-0"><?=$entry->waist?></p>
                                    </td>
                                    <td>
                                        <p class="mb-0"><?=$entry->body_weight?></p>
                                    </td>
                                    <td>
                                        <p class="mb-0"><?=round($entry->doMath($entry), 2)?></p>
                                    </td>
                                    <td>
                                        <a href="/site/edit/<?=$entry->ID?>" class="btn btn-sm btn-dark">Edytuj</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php } else { ?>
                                <tr>
                                    <td colspan="5">
                                        Brak wyników
                                    </td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
