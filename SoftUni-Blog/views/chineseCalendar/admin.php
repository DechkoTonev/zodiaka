<main>
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