
<main>
    <form name="filterZodiacs" method="get">
        <select name="zodiacs" >
            <option value="all" selected>Избери своят зодиакален знак</option>
            <option value="плъх">Плъх</option>
            <option value="бик">Бик</option>
            <option value="тигър">Тигър</option>
            <option value="заек">Заек</option>
            <option value="дракон">Дракон</option>
            <option value="змия">Змия</option>
            <option value="кон">Кон</option>
            <option value="овца">Овца</option>
            <option value="маймуна">Маймуна</option>
            <option value="петел">Петел</option>
            <option value="куче">Куче</option>
            <option value="глиган">Глиган</option>
        </select>
        <input type="submit" value="Покажи тази зодия">
    </form>

    <?php foreach($this->chinese_zodiacs as $zodiac) : ?>
        <h1><?= htmlentities($zodiac['zodiac_sign']) ?></h1>
        <p>
            <i>Posted on:</i>
            <?= htmlentities($zodiac['date']) ?>

        </p>
        <p><?= $zodiac['content']?></p>

    <?php endforeach ?>
</main>