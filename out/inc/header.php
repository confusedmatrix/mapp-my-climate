<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <title><?php echo $page('title'); ?></title>
  <meta name="description" content="<?php echo $page('meta_description'); ?>" />
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php echo $this->getCss(); ?>
  <?php echo $this->getJs(); ?>
    
  <!--<link rel="icon" type="image/png" href="img/favicon.png" />-->
</head>

<body>
  <div data-role="page" id="<?php echo $page('body_id', 'default'); ?>">
    <div data-role="header" id="header" data-position="fixed">
      <a href="#navigation" class="ui-btn-left ui-btn ui-corner-all ui-btn-icon-left ui-icon-bars ui-btn-icon-notext">Navigation</a>
      <img src="/img/header-logo.png" id="header-logo"/>
    </div>
    <div data-role="panel" id="navigation" data-position="left" data-display="overlay">
      <?php include $base . 'inc/navigation.php'; ?>
    </div>
    
    <div role="main" class="ui-content">