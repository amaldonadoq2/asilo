<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>" type="text/css">

    <title><?php echo e(config('app.name')); ?></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div id="app">
        <app></app>
    </div>
</body>
<script src="<?php echo e(mix('/js/app.js')); ?>"></script>

</html><?php /**PATH C:\Projects_Laravel\asilo\resources\views/welcome.blade.php ENDPATH**/ ?>