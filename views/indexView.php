<?php 
	$this->viewTitle = 'My blog';
    $this->meta[] = array('name' => 'description', 'content' => 'Overview of my blog');
    $this->js[] = 'index.js';
?>

<?php foreach ($entries as $e){ ?>
    <article>
        <h2 class="articleTitle">
            <a href="<?= "entry/index/" . $e['ent_id'] ?>"><?= $this->clean($e['ent_title']) ?></a>
        </h2>
        <time><?= $e['ent_date'] ?></time>
        <p><?= $this->clean($e['ent_body']) ?></p>
    </article>
    <hr />
<?php
}
if($this->isUserAllowedToAccessResource('ajaxIndex/getNumberEntries')){
?>
    <button id="clickMe">How many entries ?</button><br>
    <div id="numberEntries"></div>
<?php
}
?>


