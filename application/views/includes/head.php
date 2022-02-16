    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= data['title']; ?></title>
    <?php if(!empty($keyword)){ ?>
		  <meta name="keywords" content="<?php echo $keyword; ?>"/>
	<?php }else {?>
		<meta name="keywords" content="admin"/>
	<?php } ?>
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url();?>assets/images/favicon.png">
    <title>Ck Project Management</title>
    <!-- Custom CSS -->
    <link href="http://localhost/ci/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="http://localhost/ci/assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="http://localhost/ci/assets/libs/morris.js/morris.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="http://localhost/ci/assets/css/style.min.css" rel="stylesheet">