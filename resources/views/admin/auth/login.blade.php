@extends('admin.master')
@section('content')
<section class="bodyLogin__conteudoSuperior">
    <div class="bodyLogin__conteudo flex flex--column gap-64">
        <section class="bodyLogin__logo">
            <img src="">
        </section>
        <div>
            <div class="bodyLogin__intro">
                <p>
                    Seja bem-vindo a área de acesso restrito.<br />
                    Utilize o formulário para efetuar o login no sistema.</p>
            </div>
            <form action="{{ route('login') }}" class="form flex flex--column flex--center" method="POST">
                @csrf
                <div class="form__group">
                    <input type="text" name="email" class="form__input form__input--radius"
                        placeholder="{{ __('Digite seu E-mail') }}" id="email" value="{{old('email')}}" required autocomplete="false">
                    <label for="email" class="form__label">{{ __('Email') }}</label>
                </div>

                <div class="form__group">
                    <input
                        type="password"
                        name="password"
                        id="password"
                        autocomplete="current-password"
                        class="form__input form__input--radius"
                        placeholder="{{ __('Digite sua senha') }}"
                        required
                    >
                    <label for="password" class="form__label">{{ __('Senha') }}</label>
                </div>

                <div class="form__group">
                    <button class="btn btn--radius btn--white">{{ __('Login') }}</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
