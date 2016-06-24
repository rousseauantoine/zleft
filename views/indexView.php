<?php 
	$this->viewTitle = 'My blog';
    $this->meta[] = array('name' => 'description', 'content' => 'Overview of my blog');
    $this->js[] = 'indexJs.js';
?>

<?php foreach ($entries as $e): ?>
    <article>
        <header>
            <a href="<?= "entry/index/" . $e['ent_id'] ?>">
                <h1><?= $this->clean($e['ent_title']) ?></h1>
            </a>
            <time><?= $e['ent_date'] ?></time>
        </header>
        <p><?= $this->clean($e['ent_body']) ?></p>
    </article>
    <hr />
<?php endforeach; ?>
<button id="clickMe">How many entries ?</button><br>
<div id="numberEntries"></div>

