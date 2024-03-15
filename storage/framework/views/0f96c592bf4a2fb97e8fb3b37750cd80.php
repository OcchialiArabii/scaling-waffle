<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js" defer></script>
    <script src="<?php echo e(asset('refresh.js')); ?>" defer></script>
    <title>Login</title>
</head>
<body>
    <h1>Log in</h1>
    <?php if(isset($message)): ?>
    <?php switch($message):

        case (1): ?>

            <p class='mess'>Registration complete. Now you can log in</p>
            <?php break; ?>

        <?php case (2): ?>
            <p class='mess'>Incorrect data</p>
            <?php break; ?>

    <?php endswitch; ?>
    <?php endif; ?>

    <form action="/login" method="POST">
        <?php echo csrf_field(); ?>
        <input type="text" name="login" id='login' placeholder="Login...">
        <input type='password' name='passwd' id='passwd' placeholder='Password...'>
        <input type='submit' value='Sign in' class ="submit">
    <form>
    
    
</body>
</html><?php /**PATH C:\Users\OcchialiArabii\Desktop\Abibi\scaling-waffle\resources\views/login.blade.php ENDPATH**/ ?>