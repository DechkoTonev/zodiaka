<?php $this->title = 'Зодиак - Регистрация'; ?>

<h1><?= htmlspecialchars($this->title) ?></h1>

<form method="post" id="register-form">
    <label for="register-username">Username:</label>
    <input type="text" name="username" id="register-username" required>
    </br>
    
    <label for="register-password">Password:</label>
    <input type="password" name="password" id="register-password" required>
    </br>
    
    <label for="register-user-confirm">Password Confirm:</label>
    <input type="password" name="password_confirm" id="register-user-confirm" required>
    </br>
    
    <label for="register-user-fullname">Fullname:</label>
    <input type="text" name="full_name" id="register-user-fullname">
    </br>
    
    <input type="submit" value="Login">
</form>
