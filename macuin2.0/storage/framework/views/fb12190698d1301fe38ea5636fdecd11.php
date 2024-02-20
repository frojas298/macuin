<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $__env->yieldContent("titulo"); ?></title>
    <?php echo app('Illuminate\Foundation\Vite')(["resources/js/app.js"]); ?>


</head>
<body>
    <?php echo $__env->make("partials.navbar", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldContent("contenido"); ?>

</body>
</html><?php /**PATH /Users/fer/pw182/macuin2.0/resources/views/layouts/plantilla.blade.php ENDPATH**/ ?>