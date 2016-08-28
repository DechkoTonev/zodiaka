<main>
    <div class="messagepop pop">
        <form method="post" id="new_message" name="">
            Избери зодия:
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
            <br>
            Въведи съдържание:<br>
            <textarea rows="10" name="post_content"></textarea>  <br>
            Зодиак от тип:
            <select name="zodiac_type" >
                <option value="daily">Дневен</option>
                <option value="month">Месечен</option>
                <option value="year">Годишен</option>
            </select>
            <p><input type="submit" value="Създай зодиак" id="message_submit"/> or <a class="close" href="/">Cancel</a></p>
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