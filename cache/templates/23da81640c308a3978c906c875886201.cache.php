<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="keywords" content="<?php echo $meta_keywords; ?>" />
    <meta name="description" content="<?php echo $meta_description; ?>" />
    <meta name="author" content="zanjs">
    <meta property="og:title" content="<?php echo $meta_title; ?>" />
    <meta property="og:site_name" content="<?php echo $meta_title; ?>" />
    <meta property="og:url" content="<?php echo SITE_URL; ?>" />
    <meta property="og:description" content="<?php echo $meta_description; ?>" />
    <meta property="og:image" content="" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-title" content="Julian DM">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title><?php echo $meta_title; ?></title>
    <meta name="author" content="zanjs.com" />
    <link rel="shortcut icon" href="<?php echo HOME_THEME_PATH; ?>build/img/yish.png" />
    <link rel="stylesheet" type="text/css" href="<?php echo HOME_THEME_PATH; ?>build/css/app.css?vsj" />
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script type="text/javascript">
        var siteUrl = '<?php echo SITE_URL; ?>',
                md5 = '<?php echo md5(SYS_KEY); ?>';

        try {
            Typekit.load();
        } catch(e) {}
    </script>
</head>