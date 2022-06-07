<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" href="http://quantikaecuador.com/images/blog_5.jpg" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="css/login.css" />
    <title>Qüántika. Inicio de Sesión</title>
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">
          <form  action="" class="sign-in-form" method="POST">
            <?php echo csrf_field(); ?>
            <h2 class="title">Inicio de Sesión</h2>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" placeholder="Email" required autofocus name="email" value="<?php echo e(old('email')); ?>"/>
              
            </div>
            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
              <small><?php echo e($message); ?></small>
             <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              

              <input type="password" placeholder="Password" name="password" value="" />
         
            </div>
            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <small><?php echo e($message); ?></small>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
          
              
            <button type="submit"  class="btn solid submitt">Ingresar</button>
            <a href="recuperar">
            <i class="fas fa-link"></i> Recuperar Contraseña
              </a>
            <p class="social-text">Nuestras plataformas sociales</p>
            <div class="social-media">
              <a href="https://www.facebook.com/quantikaEcuador" " target="_blank" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="index" class="social-icon" " target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
          
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
            
          </form>
      
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <div class="content">
            <h1 style="font-size: 55px;">Qüántika</h1>
            <h1><p>
            @quantikaEcuador    · Empresa de telecomunicaciones
            </p></h1>
         <h3><i class="fas fa-phone"> 099 009 0242</i></h3>


          </div>
          <img src="img/log1.svg" class="image" alt="" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>One of us ?</h3>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
              laboriosam ad deleniti.
            </p>
            <button class="btn transparent" id="sign-in-btn">
              Sign in
            </button>
          </div>
          <img src="img/register.svg" class="image" alt="" />
        </div>
      </div>
    </div>

    <script src="login.js"></script>
    <script src="js/plugin/sweetalert/sweetalert.min.js"></script>

    
  </body>
</html>
<?php /**PATH G:\xampp\htdocs\AppQuantika\resources\views/login.blade.php ENDPATH**/ ?>