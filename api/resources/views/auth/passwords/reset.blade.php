@extends('layouts.app')

@section('content')
    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
        <div class="container">
            <h2>Réinitialisation de mot de passe</h2>
        </div>
    </div><!-- End Breadcrumbs -->
    <section id="contact" class="contact">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <form method="POST" action="{{ route('password.update') }}" class="php-email-form">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label for="email">{{ __('Addresse Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('Mot de passe') }}</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">{{ __('Confirmer mot de passe') }}</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                required autocomplete="new-password">
                        </div>
                        <div class="offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Réinitialiser mot de passe') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
    </section>
@endsection
