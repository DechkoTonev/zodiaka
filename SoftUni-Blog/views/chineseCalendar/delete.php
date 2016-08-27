<?php $this->title = 'Изтрии Китайския Зодиак'; ?>

<h1>Сигурни ли сте, че искате да изтриите този зодиак?</h1>

<form method="post">
    <div>Зодия:</div>
    <input type="text" value="<?= htmlspecialchars($this->chineseZodiac['zodiac_sign'])?>" disabled/>
    <div>Съдържание:</div>
    <textarea rows="10" disabled><?= htmlspecialchars($this->chineseZodiac['content']) ?></textarea>
    <div>Дата:</div>
    <input type="text" value="<?= htmlspecialchars($this->chineseZodiac['date']) ?>" disabled/>
    <div>Зодиак от тип:</div>
    <div><input type="submit" value="Delete">
         <a href="<?=APP_ROOT?>/chineseCalendar/admin">[CANCEL]</a></div>
</form>
