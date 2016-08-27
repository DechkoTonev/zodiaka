<?php $this->title = 'Редактирай съществуващ китайски зодиак'; ?>

<h1><?= htmlspecialchars($this->title)?></h1>

<form method="post">
    <div>Зодия:</div>
    <select name="zodiacs" >
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
    <div>Съдържание:</div>
    <textarea rows="10" name="post_content"><?=
       htmlspecialchars($this->zodiac['content']) ?></textarea>
    <div>Дата: (yyyy-MM-dd hh:mm:ss) :</div>
    <input type="text" name="post_date" value="<?=
        htmlspecialchars($this->zodiac['date']) ?>" />
    <div><input type="submit" value="Edit">
         <a href="<?=APP_ROOT?>/chineseCalendar/admin">[CANCEL]</a></div>
</form>
