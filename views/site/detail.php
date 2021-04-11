<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Url;

$this->title = $news->title;
?>

<div class="detail-page">
  <div class="container">
    <div class="row mb-5">
      <div class="col-lg-4 col-md-4">
        <img src="<?= $news->image ?>" alt="Картинка новости" />
      </div>
      <div class="col-md-8">
        <div class="detail-page__header">
          <h1><?= $news->title ?></h1>
          <? if ($news->is_favourite) : ?>
            <div class="fav-label fav-label--block">В избранном</div>
          <? endif; ?>
        </div>
        <p><?= $news->description ?></p>
        <p><?= $news->text ?></p>
      </div>
    </div>
    <? if (count($similar) > 0) : ?>
      <h2 class="mb-5">Похожие новости</h2>
      <div class="row">
        <? foreach ($similar as $item) : ?>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card">
              <img src="<?= $item->image ?>" class="card-img-top" alt="Картинка новости">
              <div class="card-body">
                <h5 class="card-title"><?= $item->title ?></h5>
                <p class="card-text"><?= $item->description ?></p>
                <a href="<?= Url::toRoute(['site/detail', 'id' => $item->id]) ?>" class="btn btn-primary">Подробнее</a>
              </div>
            </div>
          </div>
        <? endforeach; ?>
      </div>
    <? endif; ?>
  </div>
</div>