<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'Strona główna';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Witaj w kalkulatorze YMCA!</h1>

        <p class="lead">Dzięki niemu możesz określić procentową zawartość tkanki tłuszczowej w organizmie - metoda YMCA.</p>

        <h3>Ogólny wzór</h3>
        <p>
            Zawartość tkanki tłuszczowej (kobiety) = ((1.634 x obwód pasa [cm] – 0.1804 x masa ciała [kg] - 76.76 ) / 2,2 * masa ciała [kg]) x 100 <br>
            Zawartość tkanki tłuszczowej (mężczyźni) = ((1.634 x obwód pasa [cm] – 0.1804 x masa ciała [kg] - 98.42 ) / 2,2 x masa ciała [kg]) x 100 
        </p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-12">
                <h2>Kalkulator</h2>

                <p>Można dzięki niemu obliczyć procentową zawartość tkanki tłuszczowej w organizmie. Do obliczenia wymaga zaledwie dwóch paratrów:<br>
<br>
    obwód pasa (talii – na wysokości pępka) – liczony w centymetrach,<br>
    masę ciała – liczona w kilogramach.<br>
<br>
Wskaźnik ten wielokrotnie będzie wykładnikiem kondycji fizycznej i stanu zdrowia. Może on także posłużyć do monitorowania przebiegu diety oraz zmian w organizmie poddanym treningowi redukującemu zbędną tkankę tłuszczową.</p>

                <p><a class="btn btn-outline-secondary" href="<?=Url::toRoute(Yii::$app->params['staticUrl']);?>">Otwórz</a></p>
            </div>
        </div>

    </div>
</div>
