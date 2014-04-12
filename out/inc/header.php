<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title><?php echo $page('title'); ?></title>
  <meta name="description" content="<?php echo $page('meta_description'); ?>" />

  <?php echo $this->getCss(); ?>
    
  <!--<link rel="icon" type="image/png" href="img/favicon.png" />-->
</head>

<body id="<?php echo $page('body_id', 'default'); ?>">
  <div data-role="page" id="home">
    <div data-role="header" id="header">
      <a href="#navigation" class="ui-btn-left ui-btn ui-btn-inline ui-mini ui-corner-all ui-btn-icon-left ui-icon-bars ui-btn-icon-notext">Navigation</a>
      <h1><?php echo $page('h1'); ?></h1>
    </div>
    <div data-role="panel" id="navigation" data-position="left" data-display="overlay">
      <?php include $base . 'inc/navigation.php'; ?>
    </div>
    
    <div role="main" class="ui-content">