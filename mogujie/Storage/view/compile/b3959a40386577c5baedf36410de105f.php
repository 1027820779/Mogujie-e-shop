<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>温馨提示</title>
    <link rel="stylesheet" type="text/css" href="<?php echo __ROOT__?>/Hdphp/View/css.css"/>
    
            <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
            <link href="http://cdn.bootcss.com/bootstrap/3.3.4/css/bootstrap-theme.min.css" rel="stylesheet">
            <script src="http://cdn.bootcss.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        
</head>
<body>
<div class="wrap">
    <div class="title">
        温馨提示
    </div>
    <div class="content">
        <div class="icon"></div>
        <div class="message">
            <p>
                <?php echo $message?>
            </p>
            <a href="javascript:<?php echo $url?>" class="btn btn-default btn-sm">
                返回
            </a>
        </div>
    </div>
</div>
<script type="text/javascript">
    window.setTimeout("<?php echo $url?>",<?php echo $time?>*1000);
</script>
</body>
</html>