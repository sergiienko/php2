<div class="row">
    <?php foreach($news as $n): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="/admin/news/edit?id=<?php echo $n->id; ?>">
                    <?php echo $n->title; ?>
                </a>
            </div>
            <div class="panel-body"><?php echo $n->text; ?></div>
        </div>
    <?php endforeach; ?>
</div>

<form method="post">
    <p>
        <input type="text" name="article[title]" value="">
    </p>
    <p>
        <textarea name="article[text]" cols="50" rows="10"></textarea>
    </p>
    <p>
        <input type="submit" value="Save">
    </p>
</form>