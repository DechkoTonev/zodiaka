<?php $this->title = 'Зодиак - Дневен Зодиак'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<main>
    <?php foreach($this->dailyZodiacs as $dailyZodiac) : ?>
        <h1><?= htmlentities($dailyZodiac['zodiac_sign']) ?></h1>
        <p><?= $dailyZodiac['content']?></p>
    <?php endforeach ?>
</main>