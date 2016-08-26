<main>
    <div class="messagepop pop">
        <form method="post" id="new_message" name="">
            Избери зодия:
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
            <br>
            Въведи съдържание:<br>
            <textarea rows="10" name="post_content"></textarea>  <br>
            Въведи дата (yyyy-MM-dd hh:mm:ss):
            <input type="text" name="post_date"/>  <br>
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