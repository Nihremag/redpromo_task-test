<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Поиск';
?>

<div class="search-page">
  <div class="container">
    <div class="row">
    <h1 class="mb-3">Результаты по вашему запросу</h1>
      <? if (count($news) > 0) : ?>
        <? foreach ($news as $item) : ?>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card mb-3">
              <? if ($item->is_favourite) : ?>
                <div class="fav-label">В избранном</div>
              <? endif; ?>
              <img src="<?= $item->image ?>" class="card-img-top" alt="Картинка новости">
              <div class="card-body">
                <h5 class="card-title"><?= $item->title ?></h5>
                <p class="card-text"><?= $item->description ?></p>
                <a href="<?= Url::toRoute(['site/detail', 'id' => $item->id]) ?>" class="btn btn-primary">Подробнее</a>
              </div>
            </div>
          </div>
        <? endforeach; ?>
      <? else : ?>
        <p>По вашему запросу ничего не найдено</p>
      <? endif; ?>
    </div>
  </div>
</div>