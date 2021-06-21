<?php

use yii\helpers\Html;
use yii\helpers\url;
?>
<article class="item" data-key="<?= $model->id; ?>">
    <?=
    "<img width='30%' src='" . Url::to(['item/view-gambar', 'nama' => $model->gambar]) . "'>"
    ?>
    <h2 class="titel">
        <?=
        Html::a(
            Html::encode($model->name),
            Url::toRoute(['item/view', 'id' => $model->id]),
            ['title' => $model->name]
        )
        ?>
    </h2>
    <div class="item-detail">
        <b><?= Html::encode('Rp.' . $model->price); ?></b>
        <?php if (!Yii::$app->user->isGuest) : ?>
            <?= Html::a('Buy', ['item/view', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?php else : ?>
            <br>
            <small class="text-denger"> Plase Login to By Item</small>
        <?php endif; ?>
    </div>
    <hr>
</article>