@extends('layouts.app')

@section('content')


<!-- Login 25 section start -->
<div class="login-25">
    <div class="container">
        <div class="row login-box">
            <div class="col-lg-6 form-section">
                <div class="form-inner">
                    <a href="" class="logo">
                        <img src="{{asset('assets/img/logos/geostat.jpeg')}}" alt="logo">
                    </a>
                    <h3>ავტორიზაცია</h3>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group position-relative clearfix">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="თქვენი ემაილი">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <div class="login-popover login-popover-abs" data-bs-toggle="popover" data-bs-trigger="hover" title="უმჯობესია!" data-bs-content="გამოიყენეთ ორგანიზაციის ემაილი">
                                <i class="fa fa-info-circle"></i>
                            </div>
                        </div>
                        <div class="form-group clearfix position-relative password-wrapper">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="პაროლი">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <i class="fa fa-eye password-indicator"></i>
                        </div>
                        <div class="checkbox form-group clearfix">
                            <div class="form-check float-start">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="rememberme">
                                    დამიმახსოვრე
                                </label>
                            </div>
                            <a href="forgot-password-25.html" class="link-light float-end forgot-password">დაგავიწყდათ პაროლი?</a>
                        </div>
                        <div class="form-group clearfix mb-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-theme">შესვლა</button>
                        </div>
                        <div class="extra-login clearfix">
                            {{-- <span>Or Login With</span> --}}
                        </div>
                    </form>
                    <div class="clearfix"></div>
                    <p>ჯერ არ ხართ რეგისტრირებული? <a href="{{route('register')}}" class="thembo"> რეგისტრაცია</a></p>
                </div>
            </div>
            <div class="col-lg-6 align-self-center form-text">
                <div class="info clearfix align-self-center">
                    <h1 class="animate-charcter">ელექტრონული კითხვარი</h1>
                    <p>შემთხვევითად გენერირებული ტექსტი ეხმარება დიზაინერებს და ტიპოგრაფიული ნაწარმის შემქმნელებს, რეალურთან მაქსიმალურად მიახლოებული შაბლონი წარუდგინონ შემფასებელს. ხშირადაა შემთხვევა, როდესაც დიზაინის შესრულებისას საჩვენებელია, თუ როგორი იქნება ტექსტის ბლოკი.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Login 25 section end -->
@endsection
