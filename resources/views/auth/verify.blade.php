@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        </br></br>
            <div class="card">
                <div class="card-header">{{ __('Verifique seu email de acesso!!') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Enviamos um email com o link para verificação do seu email de acesso.') }}
                        </div>
                    @endif

                    {{ __('Antes de prosseguir verifique se recebeu em seu email um link de verificação.') }}
                    {{ __('Caso não tenha recebido') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('clique aqui para solicitar novamente.') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
