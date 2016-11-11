<?php 
	$this->viewTitle = 'Administration';
    $this->css[] = 'admin.css';
?>
<?php
if(!$this->isUserConnected()){
?>
    <form action="<?= Configuration::get("root"); ?>/admin/index" method="post">
        <input id="login" type="text" name="login" placeholder="login">
        <input id="password" type="password" name="password" placeholder="password">
        <input type="submit" value="Connection">
    </form>
<?php
    if(isset($flash))
        echo $flash;
}else{
?>
    <div>Hello, below stands your admin panel</div>
<?php
}
?>


