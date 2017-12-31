<?php

use yii\helpers\Url;

if (!$li) {
    ?>  
    <div class="dropdown-menu">

        <?php
        $arrgrup = array_chunk($model, $items);
        foreach ($arrgrup as $category) {
            echo '<ul role="menu">';
            foreach ($category as $v) {
                ?>

                <li><a href="<?= Url::to(['/site/category', 'id' => $v['id']]) ?>"><?= $v['name'] ?></a>
                </li>
                <?php
            }

            echo '</ul>';
        }
        echo '</div>';
    } else {
       

            foreach ($model as $v) {
                ?>
                <li><a href="<?= Url::to(['/site/category', 'id' => $v['id']]) ?>"><?= $v['name'] ?></a>
                </li>
                <?php
            
        }
    }
    ?>

