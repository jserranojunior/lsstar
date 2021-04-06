

<?php $__env->startSection('content'); ?>



<div class="vertical-center">
    <div class="container">

        <div class="col-md-4 col-md-offset-4" id="painel-login">
            <div class="col-md-12" id="img-login">
                <img id="imagem-perfil" class="img-login-inicial img-responsive img-circle center-block" alt="imagem de login" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            </div>
            <div class="col-md-10 col-md-offset-1">
                <span id="feito"></span>
                <?php if($errors->has('email')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('email')); ?></strong>
                </span>
                <?php endif; ?>
                <?php if($errors->has('password')): ?>
                <span class="help-block">
                    <strong><?php echo e($errors->first('password')); ?></strong>
                </span>
                <?php endif; ?>

                <form method="POST" action="#">

                </form>


                <form class="form-horizontal" role="form" method="POST" action="<?php echo e(url('/login')); ?>">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>"></div>
                    <input type="email" placeholder="E-mail" id="email-login" class="form-control" name="email" value="<?php echo e(old('email')); ?>"  required autofocus>


                    <script>
                       
                 </script>
                    <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>"></div>


                    <input id="password" placeholder="Senha" type="password" class="form-control" name="password" required>
                    <input type="hidden" id="asset" value="<?php echo e(URL::asset('/img/usuarios')); ?>/">
                    <input type="hidden" id="location" value="<?php echo e(URL::asset('/')); ?>/">





                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Lembrar-me
                        </label>
                        <a class="btn btn-link" href="<?php echo e(url('/password/reset')); ?>">
                            Esqueceu a senha?
                        </a>
                    </div>


                    <div class="form-group">
                        <div class="col-md-8 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Logar
                            </button>


                        </div>
                    </div>
                </form>
            </div>

        </div>

    </div>


</div>
</div>









<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>