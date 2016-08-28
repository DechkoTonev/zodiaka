<?php $this->title = 'Редактирай съществуващ зодиак'; ?>

<h1><?= htmlspecialchars($this->title)?></h1>

<form method="post">
    <div>Зодия:</div>
    <select name="zodiac" >
        <option value="Овен">Овен</option>
        <option value="Телец">Телец</option>
        <option value="Близнаци">Близнаци</option>
        <option value="Рак">Рак</option>
        <option value="Лъв">Лъв</option>
        <option value="Дева">Дева</option>
        <option value="Везни">Везни</option>
        <option value="Скорпион">Скорпион</option>
        <option value="Стрелец">Стрелец</option>
        <option value="Козирог">Козирог</option>
        <option value="Водолей">Водолей</option>
        <option value="Риби">Риби</option>
    </select>
    <div>Съдържание:</div>
    <textarea rows="10" name="post_content"><?=
       htmlspecialchars($this->zodiac['content']) ?></textarea>
       <div>Зодиак от тип:</div>
    <select name="zodiac_type" >
        <option value="daily">Дневен</option>
        <option value="month">Месечен</option>
        <option value="year">Годишен</option>
    </select>
    <div><input type="submit" value="Edit">
         <a href="<?=APP_ROOT?>/zodiac/admin">[CANCEL]</a></div>
</form>
