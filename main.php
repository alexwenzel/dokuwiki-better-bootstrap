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
    <title>
        <?php tpl_pagetitle() ?>
        [<?php echo strip_tags($conf['title'])?>]
    </title>
    <?php @require_once(dirname(__FILE__).'/head-css.php'); ?>
</head>

<body data-spy="scroll" data-target="#dw_toc">
<?php /* with these Conditional Comments you can better address IE issues in CSS files,
precede CSS rules by #IE6 for IE6, #IE7 for IE7 and #IE8 for IE8 (div closes at the bottom) */ ?>
<!--[if IE 6 ]><div id="IE6"><![endif]--><!--[if IE 7 ]><div id="IE7"><![endif]--><!--[if IE 8 ]><div id="IE8"><![endif]-->

<?php /* the "dokuwiki__top" id is needed somewhere at the top, because that's where the "back to top" button/link links to */ ?>
<?php /* classes mode_<action> are added to make it possible to e.g. style a page differently if it's in edit mode,
see http://www.dokuwiki.org/devel:action_modes for a list of action modes */ ?>
<?php /* .dokuwiki should always be in one of the surrounding elements (e.g. plugins and templates depend on it) */ ?>
<div id="dokuwiki__site" ><div id="dokuwiki__top"
class="dokuwiki site mode_<?php echo $ACT ?> <?php echo ($showSidebar) ? 'hasSidebar' : '' ?>">

<!-- NAVBAR START -->
<?php include('tpl_navbar.php') ?>
<!-- NAVBAR END -->

<!-- PAGE TOOLS -->
<?php if ($showTools): ?>
<ul class="nav nav-pills nav-stacked fixednavright">
<?php if ((!empty($_SERVER['REMOTE_USER']))): ?>
<?php tpl_action('edit', 1, 'li', 0, '', '', '<span class="glyphicon glyphicon-pencil"></span>'); ?>
<?php else : ?>
<?php tpl_action('edit', 1, 'li', 0, '', '', '<span class="glyphicon glyphicon-file"></span>'); ?>
<?php endif; ?>
<?php tpl_action('revisions', 1, 'li', 0, '', '', '<span class="glyphicon glyphicon-tag"></span>'); ?>
<?php tpl_action('backlink', 1, 'li', 0, '', '', '<span class="glyphicon glyphicon-link"></span>'); ?>
<?php tpl_action('recent', 1, 'li', 0, '', '', '<span class="glyphicon glyphicon-time"></span>'); ?>
</ul>
<?php endif ?>

<div class="container not-header">

<!-- occasional error and info messages on top of the page -->
<div class="notifications">
<?php html_msgarea(); ?>
</div>

<!-- skip link -->
<a href="#dokuwiki__content" class="skip-to-content visible-xs btn-block btn btn-info"><?php echo $lang['skip_to_content'] ?></a>

<!-- BREADCRUMBS -->
<div class="row" id="breadcrumbs"><div class="col-lg-12">
<?php _tpl_breadcrumbs(); ?>
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

    <!-- ********** CONTENT ********** -->
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

        <!-- ********** FOOTER ********** -->
        <footer id="dokuwiki__footer">
            <ul class="doc breadcrumb pull-right">
                <li><?php tpl_action('top', 1, ''); ?></li>
                <li><?php tpl_pageinfo() /* 'Last modified' etc */ ?></li>
            </ul>
            <?php tpl_license('button') /* content license, parameters: img=*badge|button|0, imgonly=*0|1, return=*0|1 */ ?>
        </footer><!-- /footer -->

        <?php tpl_includeFile('footer.html') ?>
    </div>
    </div></div><!-- /site -->

    <div class="no"><?php tpl_indexerWebBug() /* provide DokuWiki housekeeping, required in all templates */ ?></div>
    <!--[if ( IE 6 | IE 7 | IE 8 ) ]></div><![endif]-->

    <?php @require_once(dirname(__FILE__).'/tail-js.php'); ?>
</body>
</html>
