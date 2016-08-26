<main>
    <?php foreach($this->signsZodiacs as $signsZodiac) : ?>
        <h1><?= htmlentities($signsZodiac['zodiac_sign']) ?></h1>
        <p><?= $signsZodiac['content']?></p>
    <?php endforeach ?>
</main>