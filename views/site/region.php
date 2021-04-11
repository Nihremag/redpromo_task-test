<?php

/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = 'Новости города ' . $regionname;
?>
<div class="main-page">
  <div class="container">
    <div class="row mb-3">
      <h1 class="mb-3">Новости города <?= $regionname ?></h1>
      <div class="col-lg-4">
        <form class="d-flex" action="/region" method="GET">
          <select name="id" class="form-select" aria-label="Default select example">
            <option value="0" <?= $regionid === 0 ? 'selected' : '' ?>>Все новости</option>
            <?php foreach ($cities as $city) : ?>
              <option <?= $regionid === $city->id ? 'selected' : '' ?> value="<?= $city->id ?>"><?= $city->name ?></option>
            <?php endforeach;  ?>
          </select>
          <button type="submit" class="btn btn-primary ml-3">Выбрать</button>
        </form>
      </div>
    </div>
    <div class="row">
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
        <p>Новостей пока нет</p>
      <? endif; ?>
    </div>
  </div>
</div>