<main>
    <!--<div class="messagepop pop">
        <form method="post" id="new_message" name="">
            Избери зодия:
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
            <br>
            Въведи съдържание:<br>
            <textarea rows="10" name="post_content"></textarea>  <br>
            Въведи дата (yyyy-MM-dd hh:mm:ss):
            <input type="text" name="post_date"/>  <br>
            <p><input type="submit" value="Създай зодиак" id="message_submit"/> or <a class="close" href="/">Cancel</a></p>
        </form>
    </div>

    <div class="show-pop-up">
        <a href="/contact" id="contact">Създаване на нов зодиак</a>
    </div>
       -->
    <table>
        <tr>
            <th>ID</th>
            <th>Зодия</th>
            <th>Съдържание</th>
            <th>Actions</th>
        </tr>
        <?php foreach($this->chineseZodiacs as $chineseZodiac) : ?>
            <tr>
                <td><?= htmlspecialchars($chineseZodiac['id']) ?></td>
                <td><?=htmlspecialchars($chineseZodiac['zodiac_sign']) ?></td>
                <td><?=htmlspecialchars($chineseZodiac['content']) ?></td>
                <td>
                    <a href="<?=APP_ROOT?>/chineseCalendar/edit/<?=htmlspecialchars($chineseZodiac['id']) ?>"> [EDIT] </a>
                    <a href="<?=APP_ROOT?>/chineseCalendar/delete/<?=htmlspecialchars($chineseZodiac['id']) ?>"> [DELETE] </a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</main>