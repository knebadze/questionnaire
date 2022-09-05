@extends('layouts.user')

@section('content')

<div class="quest">
  <div class="container">
    <div ><h5>ინფორმაცია ორგანიზაციაზე</h5></div>
    {{ Breadcrumbs::render('organization') }}
    <div class="row"> 
      <div class="col-md-8">  
        <div style="min-height: 600px" class="my-3 p-3 bg-body rounded shadow-sm">
          <h5 class="border-bottom pb-2 mb-0">შევსებული კითხვარები:</h5>
          <div class="mt-4 border-bottom">
              <h6>{{$organization->name.':'}}</h6>
            </div>
            @foreach ($organization->questionnaire->where('organization_id', $organization->id) as $question)
          
            @foreach ($questionnaireList->where('id', $question->questionnaire_list_id ) as $list)
            <div class="d-flex text-muted pt-3">
              <div class="pb-3 mb-0 small lh-sm border-bottom w-100">
                <div class="d-flex justify-content-between">
                  <strong class="text-gray-dark">{{$list->title}}</strong>
                  <a style="font-size: 20px; " href="{{url($list->link.'/'.$list->id.'/'.$organization->id.'/'.$list->slug)}}"><i class="fa fa-eye"></i></a>
                </div>
                <span class="d-block">{{$list->text}}</span>
              </div>
            </div>
            @endforeach
        
            @endforeach
       
        </div>


      </div>
      <div class="col-md-4 right_box">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
          <h6 class="border-bottom pb-2 mb-0">ინფორმაცია ორგანიზაციაზე</h6>
          @if (!(empty($organization)))
          <div class="d-flex text-muted pt-3">
            <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
      
            <p class="pb-3 mb-0 small lh-sm ">
              <strong class="d-block text-gray-dark mb-1">საიდენტიფიკაციო კოდი:</strong>
              {{$organization->identification_code}}
            </p>
          </div>
          <hr>
          <div class="d-flex text-muted pt-3">
            <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#e83e8c"/><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text></svg>
      
            <p class="pb-3 mb-0 small lh-sm type_of_economic">
              <strong class="d-block text-gray-dark mb-1">საწარმოს დასახელება:</strong>
              {{$organization->name}}
            </p>
          </div>
            <hr>
          <div class="d-flex text-muted pt-3">
            <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#6f42c1"/><text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text></svg>
      
            <p class="pb-3 mb-0 small lh-sm type_of_economic">
              <strong class="d-block text-gray-dark mb-1">ფაქტიური მისამართი: </strong>
              {{$organization->address_l}}
            </p>
          </div>
         
          <hr>
          <div class="d-flex text-muted pt-3">
            <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
      
            <p class="pb-3 mb-0 small lh-sm type_of_economic">
              <strong class="d-block text-gray-dark mb-1">ტელეფონი:</strong>
              {{$organization->number}}
            </p>
          </div>
          <hr>
          <div class="d-flex text-muted pt-3">
            <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#e83e8c"/><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text></svg>
      
            <p class="pb-3 mb-0 small lh-sm type_of_economic">
              <strong class="d-block text-gray-dark mb-1">ეკონომიკური საქმიანობის ძირითადი სახე:</strong>
              {{$organization->type_of_economic}}
            </p>
          </div>
          <small class="d-block text-end mt-3">
            <a href="#">სრული ინფორმაცია</a>
          </small>
          @endif
        </div>
      </div>

    </div>
  </div>
</div>
@endsection
