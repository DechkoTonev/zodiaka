<?php $this->title = 'Одобрение на пост'; ?>

<h1>Сигурни ли сте, че искате да изтриете поста?</h1>

<form method="post">
    <div>Title:</div>
    <input type="text" value="<?= htmlspecialchars($this->post['title'])?>" disabled/>
    <div>Content:</div>
    <textarea rows="10" disabled><?= htmlspecialchars($this->post['content']) ?></textarea>
    <div>Date:</div>
    <input type="text" value="<?= htmlspecialchars($this->post['date']) ?>" disabled/>
    <div>Author ID:</div>
    <input type="text" value="<?= htmlspecialchars($this->post['user_id']) ?>" disabled/>
    <div><input type="submit" value="Delete">
        <a href="<?=APP_ROOT?>/posts/approve">[CANCEL]</a></div>
</form>
