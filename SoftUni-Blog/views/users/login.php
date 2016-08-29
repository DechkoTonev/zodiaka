<?php $this->title = 'Login'; ?>

<h1><?= htmlspecialchars($this->title) ?></h1>

<form method="post" id="user-form">
    <label for="user-name">Username:</label>
    <input type="text" name="username" id="user-name">

    <label for="user-password">Password: </label>
    <input type="password" name="password" id="user-password">

    <input type="submit" value="Login">
</form>
