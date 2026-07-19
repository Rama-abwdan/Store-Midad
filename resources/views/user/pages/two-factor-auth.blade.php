
@extends('layouts.dashboard.user')
@section('title','Two-Factor')
@section('breadcrumb') 
<li class="breadcrumb-item active">Two-Factor Authentication</li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Two-Factor Authentication</h4>
            </div>
            <div class="card-body">
                <!-- Two-factor authentication content goes here -->
                <p>Two-factor authentication adds an extra layer of security to your account by requiring a second form of verification in addition to your password. This helps protect your account from unauthorized access.</p>
                <p>To enable two-factor authentication, you will need to set up an authenticator app on your mobile device. Once set up, you will receive a unique code that you will need to enter along with your password when logging in.</p>
                <p>We highly recommend enabling two-factor authentication to enhance the security of your account.</p>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(!$user->two_factor_secret)
                    <p>Two-factor authentication is currently <strong>enabled</strong> for your account.</p>
                    <form method="POST" action="{{ route('two-factor.enable') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">Enable Two-Factor Authentication</button>
                    </form>
                @else<div class="row">
                    <div class="col-md-6">
                        <h5>Two-factor authentication is enable for this account</h5>
                        <h5>Scan the QR code with your authenticator app</h5>
                        <div class="mb-3">
                            {!! $user->twoFactorQrCodeSvg() !!}
                        </div>
                        <div class="col-md-6">
                            <h5>Recovery Codes</h5>
                            <p>Keep these recovery codes in a safe place. You can use them to access your account if you lose access to your authentication app.</p>
                            <ul class="list-group mb-3">
                                @foreach ($user->recoveryCodes() as $code)
                                <li class="list-group-item">{{ $code }}</li>
                                @endforeach 
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <form action="{{ route('two-factor.disable') }}" method="Post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Disable Two-Factor Authentication</button>
                    </form>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
    @push('styles')
    @endpush