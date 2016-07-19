
<?php foreach ($users as $user): ?>
    <div class="panel panel-default">
        <div class="panel-heading"><?php echo $user->name; ?></div>
        <div class="panel-body"><?php echo $user->email; ?></div>
    </div>
<?php endforeach; ?>
