<?php $this->title = 'Зодиак Администрация'; ?>

<h1><?=htmlspecialchars($this->title)?></h1>

<main>
    <div class="messagepop pop">
        <form method="post" id="new_message">
            <label for="select-zodiacs">Избери зодия:</label>
            <select name="zodiac" id="select-zodiacs">
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
            <br>
            
            <label for="create-textarea">Въведи съдържание:</label>
            <textarea rows="10" name="post_content" id="create-textarea"></textarea>
            <br>
            
            <label for="zodiac_type">Зодиак от тип:</label>
            <select name="zodiac_type" id="zodiac_type" >
                <option value="daily">Дневен</option>
                <option value="month">Месечен</option>
                <option value="year">Годишен</option>
            </select>

            <input type="submit" value="Създай зодиак" id="message_submit"/>
            </br>
            </br>
            <a class="close"  id="cancel-link" href="/">Cancel</a>
        </form>
    </div>

    <div class="show-pop-up">
        <a href="/contact" id="contact">Създаване на нов зодиак</a>
    </div>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Зодия</th>
            <th>Съдържание</th>
            <th>Тип на хороскопа</th>
            <th>Actions</th>
        </tr>
        <?php foreach($this->zodiacs as $zodiac) : ?>
            <tr>
                <td><?= htmlspecialchars($zodiac['id']) ?></td>
                <td><?=htmlspecialchars($zodiac['zodiac_sign']) ?></td>
                <td><?=htmlspecialchars($zodiac['content']) ?></td>
                <td><?=htmlspecialchars($zodiac['zodiac_type']) ?></td>
                <td>
                    <a href="<?=APP_ROOT?>/zodiac/edit/<?=htmlspecialchars($zodiac['id']) ?>"> [EDIT] </a>
                    <a href="<?=APP_ROOT?>/zodiac/delete/<?=htmlspecialchars($zodiac['id']) ?>"> [DELETE] </a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</main>