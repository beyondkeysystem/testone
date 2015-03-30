<h1>Articles</h1>

<br />
<br />

<?php foreach ($articles as $article): ?>

<h3><?php echo $this->Html->link( $article['Article']['name'], array('action' => 'view', 'year' => substr($article['Article']['created'], 0, 4), 'month' => substr($article['Article']['created'], 5, 2), 'day' => substr($article['Article']['created'], 8, 2),  'slug' => $article['Article']['slug'])); ?></h3>
<br />

<?php endforeach; ?>

<?php echo $this->element('pagination-counter'); ?>

<?php echo $this->element('pagination'); ?>

