<?php 
	$this->viewTitle = $entry['ent_title'];
	$this->css[] = 'entry.css';
    $this->meta[] = array('name' => 'description', 'content' => 'Overview of my blog');
    $this->meta[] = array('name' => 'author', 'content' => 'Blabla');
?>

<article>
    <h1 class="articleTitle">
        <?= $this->clean($entry['ent_title']) ?>
    </h1>
    <time><?= $entry['ent_date'] ?></time>
    <p><?= $this->clean($entry['ent_body']) ?></p>

<?php foreach ($comments as $c): ?>
    <div class="comment">
        <p class="commentAuthor">
            <?= $this->clean($c['com_author']) ?>
        </p>
        <p class="commentContent">
            <?= $this->clean($c['com_body']) ?>
        </p>
    </div>
    <br>
<?php endforeach; ?>
</article>

