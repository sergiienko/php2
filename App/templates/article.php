<form method="post">
    <p>
        <input type="text" name="article[title]" value="<?php echo $article->title; ?>">
    </p>

    <?php if (!empty($article->author)): ?>
    <p>
        <input type="text" disabled value="<?php echo $article->author->name; ?>">
    </p>
    <?php endif; ?>

    <p>
        <textarea name="article[text]" cols="50" rows="10"><?php echo $article->text; ?></textarea>
    </p>
    <p>
        <input type="submit" value="Save">
    </p>
    <input type="hidden" name="article[id]" value="<?php echo $article->id; ?>">
    <input type="hidden" name="action" value="edit">
</form>

<form method="post">
    <input type="submit" value="Delete">
    <input type="hidden" name="article[id]" value="<?php echo $article->id; ?>">
    <input type="hidden" name="action" value="delete">
</form>
