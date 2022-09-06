@extends('layouts.user')

@section('content')
    <div style="height: 635px" class="container">
      <main >
        <div class="py-5 text-center">
          {{-- <img class="d-block mx-auto mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
          <h2>შეავსეთ თქვენი მონაცემბეი</h2>
          <p class="lead">შევსება სავალდებულოა გთხოვთ შეავსოთ სრულად ინფორმაცია</p>
        </div>

        <div class="row g-5">
          <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
              <span class="text-primary">პირადი მონაცემები</span>
              {{-- <span class="badge bg-primary rounded-pill">3</span> --}}
            </h4>
            <ul class="list-group mb-3">
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">სახელი გვარი:</h6>
                  <small class="text-muted">{{auth()->user()->name}}</small>
                </div>
                {{-- <span class="text-muted">$12</span> --}}
              </li>
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">თქვენი ემაილი:</h6>
                  <small class="text-muted">{{auth()->user()->email}}</small>
                </div>
                {{-- <span class="text-muted">$8</span> --}}
              </li>

              @foreach ($interviewers as $interviewer)
              @if ($interviewer->address)
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">მისამართი:</h6>
                  <small class="text-muted">{{$interviewer->address}}</small>
                </div>
              </li>
              @endif
              @if ($interviewer->number)
              <li class="list-group-item d-flex justify-content-between lh-sm">
                <div>
                  <h6 class="my-0">ნომერი:</h6>
                  <small class="text-muted">{{$interviewer->number}}</small>
                </div>
              </li>
              @endif
              @endforeach


              {{-- <li class="list-group-item d-flex justify-content-between bg-light">
                <div class="text-success">
                  <h6 class="my-0">Promo code</h6>
                  <small>EXAMPLECODE</small>
                </div>
                <span class="text-success">−$5</span>
              </li> --}}
              {{-- <li class="list-group-item d-flex justify-content-between">
                <span>Total (USD)</span>
                <strong>$20</strong>
              </li> --}}
            </ul>

            {{-- <form class="card p-2">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Promo code">
                <button type="submit" class="btn btn-secondary">Redeem</button>
              </div>
            </form> --}}
          </div>
          <div class="col-md-7 col-lg-8">
            <h4 class="mb-3"></h4>
            <form class="form-group" method="POST" action="{{ route('interviewer.profile') }}" enctype="multipart/form-data">
                @csrf
                <p>   @if(Session::has('message'))
                    <div class="alert alert-success">
                        {{ Session::get('message') }}
                        @php
                            Session::forget('message');
                        @endphp
                    </div>
                    @endif</p>
              <div class="row g-3">
                <div class="col-md-6">
                    <label for="country" class="form-label">რეგიონი</label>
                    <select class="form-select" name="region_id" id="country" required>
                      <option value="">აირჩიე</option>
                      @foreach ($regions as $region)
                      <option value="{{$region->id}}">{{$region->name}}</option>
                      @endforeach

                    </select>
                  </div>

                  <div class="col-sm-6">
                    <label for="firstName" class="form-label">საცხოვრებელი მისამართი</label>
                    <input type="text" class="form-control" name="address" placeholder="" value="" required>
                  </div>

                  <div class="col-md-6">
                    <label for="country" class="form-label">კითხვარის კატეგორია</label>
                    <select class="form-select" name="category_id" id="country" required>
                      <option value="">აირჩიე...</option>
                     @foreach ($categoreis as $category)
                     <option value="{{$category->id}}">{{$category->name}}</option>
                     @endforeach

                    </select>
                  </div>

                  <div class="col-sm-6">
                    <label for="firstName" class="form-label">ტელეფონის ნომერი</label>
                    <input type="text" class="form-control" name="number" placeholder="" value="" required>
                  </div>

              <hr class="my-4">

              <div class="my-4">
                <button type="submit" class="btn btn-primary ">შენახვა</button>
             </div>
            </form>
          </div>
        </div>
      </main>
    </div>
    @endsection
