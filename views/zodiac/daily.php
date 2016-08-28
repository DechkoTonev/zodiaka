<main>
    <?php foreach($this->dailyZodiacs as $dailyZodiac) : ?>
        <h1><?= htmlentities($dailyZodiac['zodiac_sign']) ?></h1>
        <p><?= $dailyZodiac['content']?></p>
    <?php endforeach ?>
</main>