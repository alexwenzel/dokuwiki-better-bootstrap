<?php
/**
 * DokuWiki Starter Bootstrap Template
 *
 * @link     http://dokuwiki.org/template:starter[M JE
 * @author   Anika Henke <anika@selfthinker.org>
 * @license  GPL 2 (http://www.gnu.org/licenses/gpl.html)
 */

if (!defined('DOKU_INC')) die(); /* must be run from within DokuWiki */
@require_once(dirname(__FILE__).'/tpl_functions.php'); /* include hook for template functions */

$showTools = !tpl_getConf('hideTools') || ( tpl_getConf('hideTools') && $_SERVER['REMOTE_USER'] );
$showSidebar = page_findnearest(tpl_getConf('sidebarID')) && ($ACT=='show');
?><!DOCTYPE html>
<html xml:lang="<?php echo $conf['lang'] ?>" lang="<?php echo $conf['lang'] ?>" dir="<?php echo $lang['direction'] ?>" class="no-js">
<head>
    <meta charset="UTF-8" />
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><![endif]-->
    <title><?php tpl_pagetitle() ?> [<?php echo strip_tags($conf['title'])?>]</title>
    <?php include('tpl_head.php') ?>
</head>

<body data-spy="scroll" data-target="#dw_toc">

<!--[if IE 6 ]><div id="IE6"><![endif]--><!--[if IE 7 ]><div id="IE7"><![endif]--><!--[if IE 8 ]><div id="IE8"><![endif]-->

<div id="dokuwiki__site" >
<div id="dokuwiki__top" class="dokuwiki site mode_<?php echo $ACT ?> <?php echo ($showSidebar) ? 'hasSidebar' : '' ?>">

<!-- NAVBAR START -->
<?php include('tpl_navbar.php') ?>
<!-- NAVBAR END -->

<!-- PAGE TOOLS -->
<?php if ($showTools): ?>
<?php include('tpl_pagetools.php') ?>
<?php endif ?>

<div class="container not-header">

<!-- occasional error and info messages on top of the page -->
<!-- <div class="notifications"><?php html_msgarea(); ?></div> -->

<!-- BREADCRUMBS -->
<div class="row hidden-xs" id="breadcrumbs"><div class="col-lg-12">
<?php _tpl_breadcrumbs(); ?>
</div></div>

<!-- SEARCH FORM mobile-->
<div class="row visible-xs" id="breadcrumbs"><div class="col-lg-12">
<?php _tpl_searchform() ?>
</div></div>

<!-- skip link -->
<a href="#dokuwiki__content" class="skip-to-content visible-xs btn-block btn btn-info"><?php echo $lang['skip_to_content'] ?></a>

<!-- PAGE TOOLS mobile -->
<div class="row visible-xs" id="breadcrumbs"><div class="col-lg-12">
<ul class="nav nav-pills">
<?php if ((!empty($_SERVER['REMOTE_USER']))): ?>
<?php tpl_action('edit', 1, 'li', 0, '<span class="glyphicon glyphicon-pencil"></span> ', ''); ?>
<?php else : ?>
<?php tpl_action('edit', 1, 'li', 0, '<span class="glyphicon glyphicon-file"></span> '); ?>
<?php endif; ?>
<?php tpl_action('revisions', 1, 'li', 0, '<span class="glyphicon glyphicon-tag"></span> '); ?>
<?php tpl_action('backlink', 1, 'li', 0, '<span class="glyphicon glyphicon-link"></span> '); ?>
<?php tpl_action('recent', 1, 'li', 0, '<span class="glyphicon glyphicon-time"></span> '); ?>
</ul>
<br>
</div></div>

<section class="wrapper row">

    <!-- sidebar -->
    <?php if ($ACT == 'show'): ?>
    <?php
    $cols = (int)tpl_getConf('sidebar_cols');
    ($cols < 0 || $cols >= 12) ? $cols = 3 : '';
    ?>
    <aside id="dokuwiki__aside" class="col-sm-<?php echo $cols;?>">
        <?php if ($showSidebar && $cols > 0): ?>
        <div class="sidebar-page">
            <?php tpl_includeFile('sidebarheader.html') ?>
            <?php bootstrap_tpl_include_sidebar($conf['sidebar'], false) ?>
            <?php tpl_includeFile('sidebarfooter.html') ?>
        </div>
        <?php endif; ?>
    </aside><!-- /aside -->
    <?php endif; ?>

    <div id="dokuwiki__content" class="<?php if ($ACT == 'show'): ?>col-sm-<?php echo 12 - $cols; ?><?php else: ?>col-xs-12<?php endif; ?>">
        <?php if($conf['youarehere']){ ?>
            <div class="youarehere">
                <?php bootstrap_tpl_youarehere() ?>
            </div>
        <?php } ?>

        <?php tpl_flush() /* flush the output buffer */ ?>
        <?php tpl_includeFile('pageheader.html') ?>

        <?php _tpl_toc(); ?>
        <div class="page" role="main">
        <!-- wikipage start -->
            <?php tpl_content(false) /* the main content */ ?>
        <!-- wikipage stop -->
        </div>

        <?php tpl_includeFile('pagefooter.html') ?>
    </div><!-- /content -->
</section><!-- /wrapper -->

        <?php tpl_includeFile('footer.html') ?>
    </div>
    </div>
</div><!-- /#dokuwiki__site -->

<div class="no"><?php tpl_indexerWebBug(); ?></div>
<!--[if ( IE 6 | IE 7 | IE 8 ) ]></div><![endif]-->

<!-- FOOTER -->
<footer id="dokuwiki__footer">
<ul>
<li><?php tpl_pageinfo(); ?></li>
<li><?php tpl_license('badge'); ?></li>
</ul>
</footer>

<script src="<?php print DOKU_TPL; ?>/js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script type="text/javascript">var jQNew = $.noConflict(true);</script>
<script src="<?php print DOKU_TPL; ?>js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php print DOKU_TPL; ?>js/sorttable.js" type="text/javascript"></script>
<script src="<?php print DOKU_TPL; ?>js/script.js" type="text/javascript"></script>

</body>
</html>