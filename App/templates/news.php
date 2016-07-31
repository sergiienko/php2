<div class="row">
    <?php foreach($news as $n): ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="/news/one?id=<?php echo $n->id; ?>">
                    <?php echo $n->title; ?>
                </a>
            </div>
            <div class="panel-body"><?php echo $n->text; ?></div>
        </div>
    <?php endforeach; ?>
</div>
