@extends('layouts.app')

@section('content')

<!-- Login 25 start -->
<div class="login-25">
    <div class="container">
        <div class="row login-box">
            <div class="col-lg-6 form-section">
                <div class="form-inner">
                    <a href="login-25.html" class="logo">
                        <img src="{{asset('assets/img/logos/geostat.jpeg')}}" alt="logo">
                    </a>
                    <h3>შექმენი ახალი ექაუნთი</h3>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group position-relative clearfix">
                            <select name="role_id" class="form-control">
                                <option value="">მე ვარ?</option>
                                @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="form-group position-relative clearfix">
                            <select name="region_id" class="form-control">
                                <option value="">აირჩიე რეგიონი</option>
                                @foreach ($regions as $region)
                                <option value="{{$region->id}}">{{$region->name}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="form-group position-relative clearfix">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="სრული სახელი" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group position-relative clearfix">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="ემაილი">

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
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="პაროლი">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <i class="fa fa-eye password-indicator"></i>
                        </div>
                        <div class="form-group clearfix position-relative password-wrapper">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="გაიმეორეთ პაროლი">
                            <i class="fa fa-eye password-indicator"></i>
                        </div>
                        <div class="form-group checkbox clearfix">
                            <div class="clearfix float-start">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="agree" value="1" id="rememberme" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="rememberme">
                                        მე ვეთანხმები <a href="">წესებს & პირობებს</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group clearfix mb-0">
                            <button type="submit" class="btn btn-primary btn-lg btn-theme">რეგისტრაცია</button>
                        </div>
                        <div class="extra-login clearfix">
                            {{-- <span>Or Login With</span> --}}
                        </div>
                    </form>
                    <div class="clearfix"></div>

                    <p>უკვე მაქვს ექაუნთი? <a href="{{route('login')}}">შესვლა</a></p>
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
<!-- Login 25 end -->


@endsection
