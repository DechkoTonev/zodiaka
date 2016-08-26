<?php $this->title = 'Изтрии Зодиак'; ?>

<h1>Сигурни ли сте, че искате да изтриите този зодиак?</h1>

<form method="post">
    <div>Зодия:</div>
    <input type="text" value="<?= htmlspecialchars($this->zodiac['zodiac_sign'])?>" disabled/>
    <div>Съдържание:</div>
    <textarea rows="10" disabled><?= htmlspecialchars($this->zodiac['content']) ?></textarea>
    <div>Дата:</div>
    <input type="text" value="<?= htmlspecialchars($this->zodiac['date']) ?>" disabled/>
    <div>Зодиак от тип:</div>
    <input type="text" value="<?= htmlspecialchars($this->zodiac['zodiac_type']) ?>" disabled/>
    <div><input type="submit" value="Delete">
         <a href="<?=APP_ROOT?>/zodiac/admin">[CANCEL]</a></div>
</form>
