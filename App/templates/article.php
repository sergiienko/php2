<h1><?php echo $article->title; ?></h1>

<?php if (!empty($article->author)): ?>
    <h4>by <?php echo $article->author->name; ?></h4>
<?php endif; ?>

<p><?php echo $article->text; ?></p>
