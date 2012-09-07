<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo app()->name;?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-status-bar-style" content="default" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <link rel="stylesheet" type="text/css" href="<?php echo sbu('libs/bootstrap/css/bootstrap.min.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo tbu('styles/beta-mobile.css');?>" />
</head>
<body>
<noscript><div id="noscript"><h2>Notice</h2><p>JavaScript is currently off.</p><p>Turn it on in browser settings to view this mobile website.</p></div></noscript>
<header>
fuck
</header>
<div class="beta-container">
<?php echo $content;?>
</div>
<footer>
footer
</footer>
</body>
</html>

<?php cs()->registerCoreScript('jquery');?>