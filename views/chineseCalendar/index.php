
<main>
    <?php foreach($this->chinese_zodiacs as $zodiac) : ?>
        <h1><?= htmlentities($zodiac['zodiac_sign']) ?></h1>
        <p><?= $zodiac['content']?></p>

    <?php endforeach ?>
</main>