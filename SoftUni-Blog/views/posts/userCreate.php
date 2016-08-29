<?php $this->title = 'Създайте нова статия'; ?>

<h1><?= htmlspecialchars($this->title)?></h1>

<form method="post" id="create-form">
    <label for="create-title">Title:</label>
    <input type="text" name="post_title" id="create-title">
    </br>
    <label for="create-content">Content:</label>
    <textarea rows="10" name="post_content" id="create-content"></textarea>
    
    <div>
         <input type="submit" value="Create">
        </br>
        </br>
         <a href="<?=APP_ROOT?>/" id="cancel-hlink">[CANCEL]</a>
    </div>
</form>
