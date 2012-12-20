<?php
/**
 * DokuWiki Arctic Template
 *
 * This is the template you need to change for the overall look
 * of DokuWiki.
 *
 * You should leave the doctype at the very top - It should
 * always be the very first line of a document.
 *
 * @author Andreas Gohr <andi@splitbrain.org>
 * @author Michael Klier <chi@chimeric.de>
 * @link   http://wiki.splitbrain.org/template:arctic
 * @link   http://chimeric.de/projects/dokuwiki/template/arctic
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

// include custom arctic template functions
require_once(dirname(__FILE__).'/tpl_functions.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>"
 lang="<?php echo $conf['lang']?>" dir="<?php echo $lang['direction']?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>
        <?php echo strip_tags($conf['title'])?> &gt;&gt; <?php tpl_pagetitle()?>

  </title>

  <?php tpl_metaheaders()?>
  <link rel="shortcut icon" href="<?php echo DOKU_TPL?>images/favicon.ico" />


</head>
<body>
<div id="wrapper">
  <div class="dokuwiki">
    <?php html_msgarea()?>
    <div class="head">
      <div class="menu" id="menu" style="float: left">
      	<div class="menu-title small darkblue awesome"><span class="gear" style="line-height: 0.5em; font-size: 1.5em; magin-bottom: -0.1em">⚙</span> Aktionen</div>
        <div class="menu-content">
          <?php 
            if(!tpl_getConf('closedwiki') || (tpl_getConf('closedwiki') && isset($_SERVER['REMOTE_USER']))) {

                    // check if new page button plugin is available
                    if(!plugin_isdisabled('npd') && ($npd =& plugin_load('helper', 'npd'))) {
                      $npd->html_new_page_button();
                    }
                    tpl_actionlink('edit');
                    tpl_actionlink('history');
            }
                if(!tpl_getConf('closedwiki') || (tpl_getConf('closedwiki') && isset($_SERVER['REMOTE_USER']))) {
                  tpl_actionlink('admin');
                  tpl_actionlink('profile');
                  tpl_actionlink('recent');
                  tpl_actionlink('index');
                  tpl_actionlink('login');
                } else {
                  tpl_actionlink('login');
                }
          ?>
        </div>
    </div>
    <div class="stylehead">
          <?php tpl_link(wl(),$conf['title'],'name="dokuwiki__top" accesskey="h" title="[ALT+H]"')?>
          &gt;&gt; <?php tpl_link(wl($ID,'do=backlink'),tpl_pagetitle($ID,true))?>
      </div>
      <div id="search"><?php if(tpl_getConf('sidebar') == 'none') tpl_searchform(); ?></div>
	</div>

    <?php flush()?>

      <div class="page">
        <?php tpl_content() ?>
      </div>

      <div class="stylefoot">
        <div class="meta">
          <div class="user">
          <?php tpl_userinfo()?>
          </div>
          <div class="doc">
          <?php tpl_pageinfo()?>
          </div>
        </div>
      </div>

    <div class="clearer"></div>

    <?php flush()?>

  </div>
</div>

<div class="no"><?php /* provide DokuWiki housekeeping, required in all templates */ tpl_indexerWebBug()?></div>
</body>
</html>
