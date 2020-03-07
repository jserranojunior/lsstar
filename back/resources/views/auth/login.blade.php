@extends('auth.app')

@section('content')



<div class="vertical-center">
    <div class="container">

        <div class="col-md-4 col-md-offset-4" id="painel-login">
            <div class="col-md-12" id="img-login">
                <img id="imagem-perfil" class="img-login-inicial img-responsive img-circle center-block" alt="imagem de login" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            </div>
            <div class="col-md-10 col-md-offset-1">
                <span id="feito"></span>
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif

                <form method="POST" action="#">

                </form>


                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"></div>
                    <input type="email" placeholder="E-mail" id="email-login" class="form-control" name="email" value="{{ old('email') }}"  required autofocus>


                    <script>
                       
                 </script>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}"></div>


                    <input id="password" placeholder="Senha" type="password" class="form-control" name="password" required>
                    <input type="hidden" id="asset" value="{{URL::asset('/img/usuarios')}}/">
                    <input type="hidden" id="location" value="{{URL::asset('/')}}/">





                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Lembrar-me
                        </label>
                        <a class="btn btn-link" href="{{ url('/password/reset') }}">
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




<script>
    console.log('funcionando')
    localStorage.setItem('laravel', 0) 
    localStorage.setItem('laravel_name', 0) 
    localStorage.setItem('laravel_photo', 0) 
</script>




@endsection
