@extends('layout.guest.index')
@section('content-body')
    <div class="row">
        <div class="col-12">
            @error('credenciais_incorretas')
                <div class="alert alert-danger text-center">
                    {{ $message }} 
                </div> 
            @enderror

            <form action="{{ route('auth.authenticate')}}" id="authentication" method="post" class="login_validator">
                @csrf

                <div class="form-group @error('login') has-error @enderror">
                    <label for="email" class="sr-only"> E-mail</label>
                    <input type="text" class="form-control" name="login" placeholder="Login" value="{{ old('login') }}">
                    
                    <p class="text-danger"> 
                        @error('login')
                            {{ $message }}
                        @enderror
                    </p>
                </div>

                <div class="form-group @error('senha') has-error @enderror">
                    <label for="password" class="sr-only">Password</label>
                    <input 
                        type="password" 
                        class="form-control" 
                        name="senha" 
                        placeholder="Senha" 
                        autocomplete="off"
                    >

                    <p class="text-danger">
                        @error('senha')
                            {{ $message }}
                        @enderror

                    </p>
                </div>
                <div class="form-group">
                    <input type="submit" value="Entrar" class="btn btn-primary btn-block" />
                </div>
                <a href="forgot_password.html" id="forgot" class="forgot"> Esqueceu sua senha? </a>
                <div class="mt-3">
                    <span class="sign-up mt-2">Primeiro acesso ? <a href="{{ route('auth.register') }}"> Realizar Cadastro</a></span>
                </div>
            </form>
        </div>
    </div>
@endsection
