<?php 
	$this->viewTitle = 'Administration';
?>
<?php
if(!$this->isUserConnected()){
?>
    <form action="<?= Configuration::get("root"); ?>/admin/index" method="post">
        <label for="login">Login</label></label><input id="login" type="text" name="login">
        <label for="password">Password</label><input id="password" type="password" name="password">
        <input type="submit" value="Connection">
    </form>
<?php
}else{
?>
    <div>Hello, you are connected</div>
<?php
}
?>

