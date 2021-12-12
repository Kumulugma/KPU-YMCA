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
            <div class="col-lg-6">
                <h2>Kalkulator statyczny</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="<?=Url::toRoute(Yii::$app->params['staticUrl']);?>">Otwórz</a></p>
            </div>
            <div class="col-lg-6">
                <h2>Kalkulator Ajax</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-outline-secondary" href="<?=Url::toRoute(Yii::$app->params['ajaxUrl']);?>">Otwórz</a></p>
            </div>
        </div>

    </div>
</div>
