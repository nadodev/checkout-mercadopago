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
            <form method="POST" action="{{ route('register') }}" class="form flex flex--column flex--center" >
                @csrf
                <div class="form__group">
                    <input type="text" name="name" class="form__input form__input--radius"
                        placeholder="{{ __('Digite seu Nome') }}" id="name" value="{{old('name')}}" required autocomplete="false">
                    <label for="name" class="form__label">{{ __('Nome') }}</label>
                </div>
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
                        class="form__input form__input--radius"
                        placeholder="{{ __('Digite sua senha') }}"
                        required
                    >
                    <label for="password" class="form__label">{{ __('Senha') }}</label>
                </div>
                <div class="form__group">
                    <input
                        type="password"
                        name="password_confirmation"
                        id="password_confirmation"
                        autocomplete="new-password"
                        class="form__input form__input--radius"
                        placeholder="{{ __('Digite sua Confirmação de senha') }}"
                        required
                    >
                    <label for="password_confirmation" class="form__label">{{ __('Confirmar sua Senha') }}</label>
                </div>

                <div class="form__group">
                    <button class="btn btn--radius btn--white">{{ __('Registrar') }}</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
