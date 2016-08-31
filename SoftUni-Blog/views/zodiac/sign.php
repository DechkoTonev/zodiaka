<?php $this->title = 'Зодиак - Зодии'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<main>
    <?php foreach($this->signsZodiacs as $signsZodiac) : ?>
        <h1><?= htmlentities($signsZodiac['zodiac_sign']) ?></h1>
        <p><?= $signsZodiac['content']?></p>
    <?php endforeach ?>
</main>