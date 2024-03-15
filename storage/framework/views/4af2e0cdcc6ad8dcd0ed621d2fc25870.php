<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Registration</h1>
    <form action="/register" method="POST">
        <?php echo csrf_field(); ?>
        <input name='login' id='login' type='text' placeholder='Login...'>
        <input name='passwd' id='passwd' type='password' placeholder='Password...'>
        <input name='email' id='email' type='email' placeholder='E-mail...'>
        <input type="submit" value="Confirm">
    </form>
</body>
</html><?php /**PATH C:\Users\OcchialiArabii\Desktop\Abibi\scaling-waffle\resources\views/register.blade.php ENDPATH**/ ?>