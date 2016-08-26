<?php $this->title = 'Редактирай съществуващ зодиак'; ?>

<h1><?= htmlspecialchars($this->title)?></h1>

<form method="post">
    <div>Зодия:</div>
    <select name="zodiac" >
        <option value="овен">Овен</option>
        <option value="телец">Телец</option>
        <option value="близнаци">Близнаци</option>
        <option value="рак">Рак</option>
        <option value="лъв">Лъв</option>
        <option value="дева">Дева</option>
        <option value="везни">Везни</option>
        <option value="скорпион">Скорпион</option>
        <option value="стрелец">Стрелец</option>
        <option value="козирог">Козирог</option>
        <option value="водолей">Водолей</option>
        <option value="риби">Риби</option>
    </select>
    <div>Съдържание:</div>
    <textarea rows="10" name="post_content"><?=
       htmlspecialchars($this->zodiac['content']) ?></textarea>
    <div>Дата: (yyyy-MM-dd hh:mm:ss) :</div>
    <input type="text" name="post_date" value="<?=
        htmlspecialchars($this->zodiac['date']) ?>" />
    <div>Зодиак от тип:</div>
    <select name="zodiac_type" >
        <option value="daily">Дневен</option>
        <option value="month">Месечен</option>
        <option value="year">Годишен</option>
    </select>
    <div><input type="submit" value="Edit">
         <a href="<?=APP_ROOT?>/zodiac/admin">[CANCEL]</a></div>
</form>
