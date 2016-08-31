<?php $this->title = 'Аднимистраторски Панел'; ?>

<main>
    <h1>Aдминистраторски Панел</h1>
    <div id="menu-for-nav">
        <a href="<?=APP_ROOT?>"><img src="<?=APP_ROOT?>/content/images/site-logo.png"></a>
    
        <div id="admin-nav">
            <span class="administrator-navigation">
                <a href="<?=APP_ROOT?>/zodiac/admin">Администрация на зодиак.</a>
            </span>
    
            <span class="administrator-navigation">
                <a href="<?=APP_ROOT?>/chineseCalendar/admin">Администрация на китайски зодиак.</a>
            </span>
    
            <span class="administrator-navigation">
                <a href="<?=APP_ROOT?>/posts/approve">Постове, който чакат одобрение.</a>
            </span>
    
            <span class="administrator-navigation">
                <a href="<?=APP_ROOT?>/posts">Администрация на постове.</a>
            </span>
        </div>
    </div>
</main>

