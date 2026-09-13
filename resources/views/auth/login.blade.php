@extends('layouts.auth')

@section('title', 'Login - CashWave')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/bootstrap-social.css') }}">
    <style>
        .login-brand {
            margin-bottom: 25px;
            font-size: 28px;
            font-weight: 800;
            letter-spacing: -0.5px;
            color: #6777ef;
        }
        .card-primary {
            border-top: 4px solid #6777ef;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            border-radius: 12px;
        }
        .custom-control-input:checked ~ .custom-control-label::before {
            background-color: #6777ef;
            border-color: #6777ef;
        }
    </style>
@endpush

@section('main')
    <!-- Branding / Logo -->
    <div class="login-brand text-center">
        <span style="color: #34395e;">Cash</span>Wave<span style="color: #6777ef;">.</span>
    </div>

    <div class="card card-primary">
        <div class="card-header">
            <h4>Welcome Back! 👋</h4>
        </div>

        <div class="card-body">
            <p class="text-muted text-small mb-4">Please sign in to your account to continue managing your finances.</p>

            <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                @csrf

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input id="email" type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" tabindex="1" required autofocus placeholder="name@example.com">
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="d-block">
                        <label for="password" class="control-label">Password</label>
                        {{-- Uncomment jika route password.request tersedia --}}
                        {{-- <div class="float-right">
                            <a href="{{ route('password.request') }}" class="text-small">
                                Forgot Password?
                            </a>
                        </div> --}}
                    </div>
                    <input id="password" type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        name="password" tabindex="2" required placeholder="Enter your password">
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="remember">Remember Me</label>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block shadow-sm" tabindex="4">
                        Sign In
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="text-muted mt-4 text-center">
        Don't have an account? <a href="{{ route('register') }}" class="font-weight-bold">Create One</a>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->

    <!-- Page Specific JS File -->
@endpush
