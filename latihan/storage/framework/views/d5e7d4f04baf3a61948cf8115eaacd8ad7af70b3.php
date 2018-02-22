<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TEST</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo e(asset('../resources/assets/vendor/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('../resources/assets/dist/css/custom.css')); ?>" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo e(asset('../resources/assets/vendor/metisMenu/metisMenu.min.css')); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo e(asset('../resources/assets/dist/css/sb-admin-2.css')); ?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo e(asset('../resources/assets/vendor/morrisjs/morris.css')); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo e(asset('../resources/assets/vendor/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <?php echo $__env->make('include.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

            <?php echo $__env->make('include.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        </nav>

        <div id="page-wrapper">
            	<?php echo $__env->yieldContent('content'); ?>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <!-- jQuery -->
    <script src="<?php echo e(asset('../resources/assets/vendor/jquery/jquery.min.js')); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo e(asset('../resources/assets/vendor/bootstrap/js/bootstrap.min.js')); ?>"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo e(asset('../resources/assets/vendor/metisMenu/metisMenu.min.js')); ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/vue"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo e(asset('../resources/assets/dist/js/sb-admin-2.js')); ?>"></script>

    <script src="<?php echo e(asset('../resources/assets/js/bootstrap-datepicker.js')); ?>"></script>
    <script src="<?php echo e(asset('../resources/assets/js/bootstrap-datepicker.min.js')); ?>"></script>

</body>

</html>
