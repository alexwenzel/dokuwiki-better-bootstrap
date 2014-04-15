<div class="navbar navbar-default navbar-fixed-top navbar-inverse">
<div class="container">
<?php tpl_includeFile('header.html') ?>
<!-- header -->
<div class="navbar-header">
	<button class="navbar-toggle" data-toggle="collapse" data-target="#topnav" type="button">
	<span class="sr-only">Toggle Navigation</span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	<span class="icon-bar"></span>
	</button>
	<?php tpl_link(wl(),$conf['title'],'accesskey="h" title="[H]" class="navbar-brand"') ?>
</div>

<div class="collapse navbar-collapse" id="topnav">
<ul class="nav navbar-nav navbar-left">
	<!-- PAGE TOOLS -->
	<?php if ($showTools): ?>
	<?php ($ACT == 'index') ? tpl_action('index', 1, 'li class="active"', 0, '<span class="glyphicon glyphicon-home"></span> ') : tpl_action('index', 1, 'li', 0, '<span class="glyphicon glyphicon-home"></span> '); ?>	
	<?php endif; ?>
</ul>

<ul class="nav navbar-nav navbar-right">
	<!-- USER TOOLS -->
	<?php if ((!empty($_SERVER['REMOTE_USER']))): ?>
	<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php tpl_userinfo(); ?> <b class="caret"></b></a>
	<ul class="dropdown-menu">
	<?php ($ACT == 'profile') ? tpl_action('profile', 1, 'li class="active"') : tpl_action('profile', 1, 'li'); ?>
	<li class="divider"></li>
	<?php ($ACT == 'media') ? tpl_action('media', 1, 'li class="active"') : tpl_action('media', 1, 'li'); ?>
	<?php ($ACT == 'admin')? tpl_action('admin', 1, 'li class="active"') : tpl_action('admin', 1, 'li'); ?>
	<li class="divider"></li>
	<?php ($ACT == 'login') ? tpl_action('login', 1, 'li class="active"') : tpl_action('login', 1, 'li'); ?>
	</ul>
	</li>
	<?php else : ?>
	<?php ($ACT == 'register') ? tpl_action('register', 1, 'li class="active"') : tpl_action('register', 1, 'li'); ?>
	<?php ($ACT == 'login') ? tpl_action('login', 1, 'li class="active"') : tpl_action('login', 1, 'li'); ?>
	<?php endif; ?>
</ul>

<!-- SEARCH FORM -->
<div class="hidden-xs"><?php _tpl_searchform() ?></div>

</div>
</div>
</div>