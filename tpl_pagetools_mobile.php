<?php if ((!empty($_SERVER['REMOTE_USER']))): ?>
<?php tpl_action('edit', 1, 'li', 0, '<span class="glyphicon glyphicon-pencil"></span> '); ?>
<?php else : ?>
<?php tpl_action('edit', 1, 'li', 0, '<span class="glyphicon glyphicon-file"></span> '); ?>
<?php endif; ?>
<?php tpl_action('revisions', 1, 'li', 0, '<span class="glyphicon glyphicon-tag"></span> '); ?>
<?php tpl_action('backlink', 1, 'li', 0, '<span class="glyphicon glyphicon-link"></span> '); ?>
<?php tpl_action('recent', 1, 'li', 0, '<span class="glyphicon glyphicon-time"></span> '); ?>
<?php tpl_action('top', 1, 'li', 0, '<span class="glyphicon glyphicon-arrow-up"></span> '); ?>
