<main>
    <table>
        <tr>
            <th>ID</th>
            <th>Заглавие</th>
            <th>Съдържание</th>
            <th>Дата</th>
            <th>Име на автор</th>
            <th>Actions</th>
        </tr>
        <?php foreach($this->postsToApprove as $postToApprove) : ?>
            <tr>
                <td><?= htmlspecialchars($postToApprove['id']) ?></td>
                <td><?=htmlspecialchars($postToApprove['title']) ?></td>
                <td><?=cutLongText($postToApprove['content']) ?></td>
                <td><?=htmlspecialchars($postToApprove['date']) ?></td>
                <td><?=htmlspecialchars($postToApprove['full_name']) ?></td>
                <td>
                    <a href="<?=APP_ROOT?>/posts/approvePost/<?=htmlspecialchars($postToApprove['id']) ?>"> [APPROVE] </a>
                    <a href="<?=APP_ROOT?>/posts/deleteApprovedPost/<?=htmlspecialchars($postToApprove['id']) ?>"> [DELETE] </a>
                </td>
            </tr>
        <?php endforeach ?>
    </table>
</main>