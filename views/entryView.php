<?php 
	$this->viewTitle = $entry['ent_title'];
	array_push($this->css, 'entryCss.css', 'entryCss2.css');
    $this->meta[] = array('name' => 'description', 'content' => 'Overview of my blog');
    $this->meta[] = array('name' => 'author', 'content' => 'Blabla');
?>

<article>
    <header>
        <h1><?= $this->clean($entry['ent_title']) ?></h1>
        <time><?= $entry['ent_date'] ?></time>
    </header>
    <p><?= $this->clean($entry['ent_body']) ?></p>
</article>
<hr />
<header>
    <h1>Comments</h1>
</header>
<?php foreach ($comments as $c): ?>
    <p><?= $this->clean($c['com_author']) ?></p>
    <p><?= $this->clean($c['com_body']) ?></p>
<?php endforeach; ?>

