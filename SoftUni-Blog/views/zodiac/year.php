<?php $this->title = 'Зодиак - Годишен Зодиак'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<main>
    <?php foreach($this->yearZodiacs as $yearZodiac) : ?>
        <h1><?= htmlentities($yearZodiac['zodiac_sign']) ?></h1>
        <p><?= $yearZodiac['content']?></p>
    <?php endforeach ?>
</main>