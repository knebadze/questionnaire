@extends('layouts.user')
@section('content')
<div class="quest_main">
<div class="container">
  {{-- {{ Breadcrumbs::render('question') }} --}}
	<div class="row">
		<div class="col-md-12">
	      <div class="inscription">
		      <p>კითხვარი და კონსულტაციები მის შევსებაზე უფასოა</p>
	      </div>
	   </div>
   </div>
</div>

<div class="clear"></div>
<div class="container">
	<div class="row head">
		<div class="col-md-12">
	      <div class="head_quest">
	         <p><img src="{{asset('assets/img/logos/saqstat.png')}}">
	         <h6>საქართველოს სტატისტიკის ეროვნული სამსახური საქსტატი
	         0180 თბილისი, ც. დადიანის გამზ. N30, ტელ: (+995 32) 236 72 10 (400)<br> ელფოსტა: info@geostat.ge. ვებგვერდი: www.geostat.ge</h6></p>
	      </div>
      </div>
      <div class="col-md-6">
      	<div class="left_head">
      		<p>ადგილობრივი ბაზრისთვის წარმოებული<br> პროდუქციის მწარმოებელთა ფასების<br> სტატისტიკური გამოკვლევა</p>
      	</div>
      </div>
      <div class="col-md-6">
      	<div class="right_head">
      		<p><b>კითხვარი N 06.2.1.4 (ყოველთვიური)</b><br>
               დამტკიცებულია სსიპ საქართველოს სტატისტიკის ეროვნული სამსახურის საბჭოს 2019 წლის 19 თებერვლის #4 დადგენილებით</p>
      	</div>
      </div>
   </div>
</div>

<div class="clear"></div>

<div class="container">
	<hr>
	<div class="middle_descr">
		<div class="row">
			<div class="col-md-12">
				<p>„ოფიციალური სტატისტიკის შესახებ“ საქართველოს კანონის 25-ე მუხლის თანახმად მეწარმე ფიზიკური და იურიდიული პირები ვალდებული არიან, საქსტატის მოთხოვნის შემთხვევაში წარადგინონ მათ ხელთ არსებული ინფორმაცია, მათ შორის, კონფიდენციალური. პასუხისმგებლობა ინფორმაციის წარუდგენლობისთვის გათვალისწინებულია საქართველოს ადმინისტრაციულ სამართალდარღვევათა კოდექსის 17712 მუხლით.
				<br><br>
            ინდივიდუალური მონაცემები ითვლება კონფიდენციალურად და დაცულია საქართველოს ზოგადი ადმინისტრაციული კოდექსითა და „ოფიციალური სტატისტიკის შესახებ“ საქართველოს კანონის 28-ე მუხლით.
            <br><br>
            კვლევაში ჩართული საწარმოები, რომლებიც აწარმოებენ სამრეწველო პროდუქციას, ყოველთვიურ ინფორმაციას მათ მიერ წარმოებული პროდუქციის ფასების შესახებ წარუდგენენ სტატისტიკის ეროვნულ სამსახურს ყოველთვიურად, <b>არაუგვიანეს მომდევნო თვის 8 რიცხვისა.</b></p>
         </div>
      </div>
   </div>
</div>

<div class="clear"></div>

{{-- ORGANIZATION ROLE  --}}
@if (Auth::user()->role_id === 2)
<div class="container">
	<hr>
	<div class="row">

		<div class="col-md-12">
      {{-- თუ ორგანიზაციაზე ინფორმაცია უკვე არის ბაზაში --}}
         @if (!(empty($organizations)))
         @foreach ($organizations as $organization)
         <form class="form-group" method="POST" action="{{ url('questionnaire/organization_update/'.$organization->id) }}" enctype="multipart/form-data">
          @csrf        
   <div class="row g-2" >
       
         <div class="col-lg-6 ">
          <div class="form-floating">
           <input type="text" name="identification_code" class="form-control" id="" value="{{$organization->identification_code}}" placeholder="საიდენტიფიკაციო კოდი">
           <label for="">საიდენტიფიკაციო კოდი</label>
          </div>
         </div>

          <div class="col-lg-6  ">
              <div class="form-floating">
                  <input type="text" name="name" class="form-control" id="" value="{{$organization->name}}" placeholder="საწარმოს დასახელება">
                  <label for="">საწარმოს დასახელება</label>
                 </div>
          </div>
      </div>
      <div class="row g-2 mt-3" >
          <div class="col-lg-6 ">
           <div class="form-floating">
            <input type="text" name="address_l" class="form-control" id="" value="{{$organization->address_l}}" placeholder="საიდენტიფიკაციო კოდი">
            <label for="">იურიდიული მისამართი</label>
           </div>
          </div>

           <div class="col-lg-6  ">
               <div class="form-floating">
                   <input type="text" name="address_a" class="form-control" id="" value="{{$organization->address_a}}" placeholder="საწარმოს დასახელება">
                   <label  for="">ფაქტიური მისამართი</label>
                  </div>
           </div>
       </div>
       <div class="row g-2 mt-3" >
       
          <div class="col-lg-6 ">
           <div class="form-floating">
            <input type="text" name="region" class="form-control" id="" value="{{$organization->region->name}}" placeholder=" რეგიონი">
            <label for="">რეგიონი</label>
           </div>
          </div>

           <div class="col-lg-6  ">
               <div class="form-floating">
                   <input type="text" name="district" class="form-control" id="" value="{{$organization->district}}" placeholder="რაიონი">
                   <label for="">რაიონი</label>
                  </div>
           </div>
       </div>
       <div class="row g-2 mt-3" >
       
          <div class="col-lg-6 ">
              <label for="">საკუთრების ფორმა</label>
            <input type="file" name="ownership" class="form-control" id="" placeholder="საკუთრების ფორმა">
            <div class="mt-2">
              <p><a href="{{asset('assets/files/form/'.$organization->ownership)}}" target="_blank">{{$organization->ownership}}</a></p>
            </div>
          </div>

           <div class="col-lg-6  ">
                  <label for="">ორგანიზაციულ-სამართლებრივი ფორმა</label>
                   <input type="file" name="legal_form" class="form-control" id="" placeholder="ორგანიზაციულ-სამართლებრივი ფორმა">
                   <div class="mt-2">
                    <p><a href="{{asset('assets/files/form/'.$organization->legal_form)}}" target="_blank">{{$organization->legal_form}}</a></p>
                  </div>
           </div>
       </div>
       <div class="row g-2 mt-3" >
       
          <div class="col-lg-6 ">
           <div class="form-floating">
            <input type="text" name="type_of_economic" class="form-control" id="" value="{{$organization->type_of_economic}}" placeholder="ეკონომიკური საქმიანობის ძირითადი სახე">
            <label for="">ეკონომიკური საქმიანობის ძირითადი სახე</label>
           </div>
          </div>

           <div class="col-lg-6">
               <div class="form-floating">
                   <input type="text" name="head" class="form-control" id="" value="{{$organization->head}}" placeholder="საწარმოს ხელმძღვანელის სახელი და გვარი">
                   <label for="">საწარმოს ხელმძღვანელის სახელი და გვარი</label>
                  </div>
           </div>
       </div>
       <div class="row g-2 mt-3" >
       
          <div class="col-lg-6 ">
           <div class="form-floating">
            <input type="text" name="number" class="form-control" id="" value="{{$organization->number}}" placeholder="ტელეფონი">
            <label for="">ტელეფონი</label>
           </div>
          </div>
       </div>
       <div class="my-4 float-end">
        <button type="submit" class="btn btn-primary ">განახლება</button>
     </div>
    </form>
       @endforeach
   
  
   @endif
   {{-- თუ ორგანიზაციის შესახებ ინფორმაცია ცარიელია --}}
   @if(empty($organization))
   <form class="form-group" method="POST" action="{{ route('organization') }}" enctype="multipart/form-data">
    @csrf

<div class="row g-2" >
 
   <div class="col-lg-6 ">
    <div class="form-floating">
     <input type="text" name="identification_code" class="form-control" id="" value="" placeholder="საიდენტიფიკაციო კოდი">
     <label for="">საიდენტიფიკაციო კოდი</label>
    </div>
   </div>

    <div class="col-lg-6  ">
        <div class="form-floating">
            <input type="text" name="name" class="form-control" id="" placeholder="საწარმოს დასახელება">
            <label for="">საწარმოს დასახელება</label>
           </div>
    </div>
</div>
<div class="row g-2 mt-3" >
 
    <div class="col-lg-6 ">
     <div class="form-floating">
      <input type="text" name="address_l" class="form-control" id="" placeholder="საიდენტიფიკაციო კოდი">
      <label for="">იურიდიული მისამართი</label>
     </div>
    </div>

     <div class="col-lg-6  ">
         <div class="form-floating">
             <input type="text" name="address_a" class="form-control" id="" placeholder="საწარმოს დასახელება">
             <label for="">ფაქტიური მისამართი</label>
            </div>
     </div>
 </div>
 <div class="row g-2 mt-3" >
 
    <div class="col-lg-6 ">
     <select name="region_id" class="form-control" style="height: 57px">
      <option value="">აირჩიე რეგიონი</option>
      @foreach ($regions as $region)
      <option value="{{$region->id}}">{{$region->name}}</option>
      @endforeach
  </select>
    </div>

     <div class="col-lg-6  ">
         <div class="form-floating">
             <input type="text" name="district" class="form-control" id="" placeholder="რაიონი">
             <label for="">რაიონი</label>
            </div>
     </div>
 </div>
 <div class="row g-2 mt-3" >
 
    <div class="col-lg-6 ">
        <label for="">საკუთრების ფორმა</label>
      <input type="file" name="ownership" class="form-control" id="" placeholder="საკუთრების ფორმა">
    </div>

     <div class="col-lg-6  ">
            <label for="">ორგანიზაციულ-სამართლებრივი ფორმა</label>
             <input type="file" name="legal_form" class="form-control" id="" placeholder="ორგანიზაციულ-სამართლებრივი ფორმა">
     </div>
 </div>
 <div class="row g-2 mt-3" >
 
    <div class="col-lg-6 ">
     <div class="form-floating">
      <input type="text" name="type_of_economic" class="form-control" id="" placeholder="ეკონომიკური საქმიანობის ძირითადი სახე">
      <label for="">ეკონომიკური საქმიანობის ძირითადი სახე</label>
     </div>
    </div>

     <div class="col-lg-6">
         <div class="form-floating">
             <input type="text" name="head" class="form-control" id="" placeholder="საწარმოს ხელმძღვანელის სახელი და გვარი">
             <label for="">საწარმოს ხელმძღვანელის სახელი და გვარი</label>
            </div>
     </div>
 </div>
 <div class="row g-2 mt-3" >
 
    <div class="col-lg-6 ">
     <div class="form-floating">
      <input type="text" name="number" class="form-control" id="" placeholder="ტელეფონი">
      <label for="">ტელეფონი</label>
     </div>
    </div>
 </div>

 <div class="my-4 float-end">
  <button type="submit" class="btn btn-primary ">შენახვა</button>
</div>
</form>
         @endif
        
        </div>
        <div class="col-md-12 ">
            <hr>
             <div class="col-md-12 mt-4">
				<p><strong>კითხვარის შევსების ინსტრუქცია</strong>  - მომდევნო გვერდზე მოცემულ ცხრილში წარმოდგენილია კვლევის დასაწყისში თქვენ მიერ დასახელებული პროდუქციის მონაცემები. თითოეული პროდუქტისთვის გთხოვთ მიუთითოთ შემდეგი ინფორმაცია:</p>
				{{-- <br><br> --}}
                <ul class="text_ul">
                    <li><strong>წინა თვე</strong>  - საანგარიშო პერიოდის წინა თვეში საწარმოს მიერ წარმოებული და ადგილობრივ ბაზარზე გაყიდული პროდუქტის ფასი ლარებში (დღგ-ს, აქციზის გადასახადის და სატრანსპორტო ხარჯების გარეშე);</li>
                    <li><strong>მიმდინარე თვე</strong>  - საანგარიშო პერიოდში საწარმოს მიერ წარმოებული და ადგილობრივ ბაზარზე გაყიდული პროდუქტის ფასი ლარებში (დღგ-ს, აქციზის გადასახადის და სატრანსპორტო ხარჯების გარეშე);</li>
                    <li><strong>კომენტარი</strong> - ფასის ცვლილების შემთხვევაში, ცვლილების გამომწვევი მიზეზი ან სხვა დამატებითი ინფორმაცია.</li>
                </ul>
        </div>
         <hr>
         <div class="col-lg-3 mb-4 ">
          <div class="d-inline-block;">
              
             </div>
      </div>
      <form class="form-group" method="POST" action="{{ route('questionnaire') }}" enctype="multipart/form-data">
        @csrf
      
         <table class="table table-bordered border-black question_table">
            <thead>
                <tr>
                    <th style="width: 10%"  scope="col">#</th>
                    <th style="width: 20%" scope="col">CPA კოდი</th>
                    <th colspan="5" scope="col">პროდუქტის დასახელება</th>
                  </tr>
            </thead>
            <tbody>
                <tr>
                  <th scope="row">{{$countQuestionnaire + 1}}</th>
                    <td ><input type="text" name="cpa_kode" placeholder="მაგ:">
                      <input type="text" name="questionnaire_list_id" value="{{$questionnaireList->id}}" hidden></td>
                    <td colspan="5"><input type="text" name="product_name" placeholder="მაგ:პური"></td>
                  </tr>
                  <tr>
                    <td colspan="2" rowspan="2" >პროდუქტის სახეობა</td>
                    <td rowspan="2">ზომის ერთეული</td>
                    <td colspan="3">ადგილობრივი ბაზრისთვის წარმოებული პროდუქციის ფასი (ლარი)</td>
                    <td>კომენტარი</td>
                  </tr>
                  <tr>
                    <td><p  title="რაღაცა თვე">საბაზო თვე </p> </td>
                    <td>წინა თვე</td>
                    <td>მიმდინარე თვე</td>
                    <td></td>
                  </tr>
                  @for ($i = 0; $i < 4; $i++)
                  <tr >
                    <td style="height: 50px" colspan="2" scope="row"><input type="text" name="product_type[]" placeholder="მაგ:პური" multiple=""></td>
                    <td><input type="text" name="unit[]" placeholder="მაგ:ცალი" multiple=""></td>
                    <td><input type="text" name="base_month[]" placeholder="მაგ: 100" multiple=""></td>
                    <td><input type="text" name="previous_month[]" placeholder="მაგ:" multiple=""></td>
                    <td><input type="text" name="current_month[]" placeholder="მაგ:" multiple=""></td>
                    <td><input type="text" name="comment[]" placeholder="მაგ:" multiple=""></td>
                  </tr>
                  @endfor
            </tbody>
          </table>
          <hr>
          <div class="my-4 float-end">
           <button type="submit" class="btn btn-primary ">გაგზავნა</button>
        </div>
         </form>
      </div>

   </div>

   {{-- უკვე შევსებული ცხრილები --}}
   @if ($questionnaires)
   <div class="row ">
    <hr>
    <div> <h5 class="mb-4">უკვე შევსებული ცხრილები:</h5></div>
    @foreach ($questionnaires as $questionnaire)
    <div>
  
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">CPA კოდი</th>
              <th scope="col" style="width: 30%">დასახელება</th>
              <th scope="col">შევსების თარიღი</th>
              <th scope="col">დაკვირვების პერიოდი</th>
              <th scope="col">შეცვლა & წაშლა</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">{{$questionnaire->id}}</th>
              <td>{{($questionnaire->cpa_kode)}}</td>
              <td>{{$questionnaire->product_name}}</td>
              <td>{{$questionnaire->updated_at->format('Y-m-d H:i')}}</td>
              <td>{{$questionnaire->updated_at->subMonth()->format('F')}}</td>
              <td class="action"><a href="{{url('table/'.$questionnaire->id)}}"><i class="fa fa-edit text-success"></i></a> / <a href="{{url('table_delete/'.$questionnaire->id)}}"><i class="fa fa-trash text-danger"></i></a></td>
            </tr>
          </tbody>
        </table>
   </div>
    @endforeach
    <div>
      <p><a href="{{url('home')}}">უკან გასვლა</a></p>
    </div>
  </div>
  @else
  
   <div class="row">
     <h4></h4>
    <div> <h5 class="mb-4">უკვე შევსებული ცხრილები:</h5></div>
    <p>გთხოვთ შეავსოთ ცხრილი</p>
   </div>
   @endif
   
</div>

@else
   {{-- END ORGANIZATION ROLE --}}

   
   {{-- START ADMIN ROLE  --}} 

<div class="container">
	<hr>
	<div class="row">

		<div class="col-md-12">
         
         <form class="form-group" method="POST" action="{{ url('questionnaire/organization_update/'.$organization->id) }}" enctype="multipart/form-data">
          @csrf        
   <div class="row g-2" >
       
         <div class="col-lg-6 ">
          <div class="form-floating">
           <input type="text" name="identification_code" class="form-control" id="" value="{{$organization->identification_code}}" placeholder="საიდენტიფიკაციო კოდი">
           <label for="">საიდენტიფიკაციო კოდი</label>
          </div>
         </div>

          <div class="col-lg-6  ">
              <div class="form-floating">
                  <input type="text" name="name" class="form-control" id="" value="{{$organization->name}}" placeholder="საწარმოს დასახელება">
                  <label for="">საწარმოს დასახელება</label>
                 </div>
          </div>
      </div>
      <div class="row g-2 mt-3" >
       
          <div class="col-lg-6 ">
           <div class="form-floating">
            <input type="text" name="address_l" class="form-control" id="" value="{{$organization->address_l}}" placeholder="საიდენტიფიკაციო კოდი">
            <label for="">იურიდიული მისამართი</label>
           </div>
          </div>

           <div class="col-lg-6  ">
               <div class="form-floating">
                   <input type="text" name="address_a" class="form-control" id="" value="{{$organization->address_a}}" placeholder="საწარმოს დასახელება">
                   <label for="">ფაქტიური მისამართი</label>
                  </div>
           </div>
       </div>
       <div class="row g-2 mt-3" >
       
          <div class="col-lg-6 ">
           <div class="form-floating">
            <input type="text" name="region" class="form-control" id="" value="{{$organization->region}}" placeholder=" რეგიონი">
            <label for="">რეგიონი</label>
           </div>
          </div>

           <div class="col-lg-6  ">
               <div class="form-floating">
                   <input type="text" name="district" class="form-control" id="" value="{{$organization->district}}" placeholder="რაიონი">
                   <label for="">რაიონი</label>
                  </div>
           </div>
       </div>
       <div class="row g-2 mt-3" >
       
          <div class="col-lg-6 ">
              <label for="">საკუთრების ფორმა</label>
            <input type="file" name="ownership" class="form-control" id="" placeholder="საკუთრების ფორმა">
            <div class="mt-2">
              <p><a href="{{asset('asset/files/form/'.$organization->ownership)}}" target="_blank">{{$organization->ownership}}</a></p>
            </div>
          </div>

           <div class="col-lg-6  ">
                  <label for="">ორგანიზაციულ-სამართლებრივი ფორმა</label>
                   <input type="file" name="legal_form" class="form-control" id="" placeholder="ორგანიზაციულ-სამართლებრივი ფორმა">
                   <div class="mt-2">
                    <p><a href="{{asset('asset/files/form/'.$organization->legal_form)}}" target="_blank">{{$organization->legal_form}}</a></p>
                  </div>
           </div>
       </div>
       <div class="row g-2 mt-3" >
       
          <div class="col-lg-6 ">
           <div class="form-floating">
            <input type="text" name="type_of_economic" class="form-control" id="" value="{{$organization->type_of_economic}}" placeholder="ეკონომიკური საქმიანობის ძირითადი სახე">
            <label for="">ეკონომიკური საქმიანობის ძირითადი სახე</label>
           </div>
          </div>

           <div class="col-lg-6">
               <div class="form-floating">
                   <input type="text" name="head" class="form-control" id="" value="{{$organization->head}}" placeholder="საწარმოს ხელმძღვანელის სახელი და გვარი">
                   <label for="">საწარმოს ხელმძღვანელის სახელი და გვარი</label>
                  </div>
           </div>
       </div>
       <div class="row g-2 mt-3" >
       
          <div class="col-lg-6 ">
           <div class="form-floating">
            <input type="text" name="number" class="form-control" id="" value="{{$organization->number}}" placeholder="ტელეფონი">
            <label for="">ტელეფონი</label>
           </div>
          </div>
       </div>

   </form>
        </div>

      {{-- შევსებული ცხრილები --}}


        <div class="col-md-12 ">
            <hr>
             <div class="col-md-12 mt-4">
				<p><strong>კითხვარის შევსების ინსტრუქცია</strong>  - მომდევნო გვერდზე მოცემულ ცხრილში წარმოდგენილია კვლევის დასაწყისში თქვენ მიერ დასახელებული პროდუქციის მონაცემები. თითოეული პროდუქტისთვის გთხოვთ მიუთითოთ შემდეგი ინფორმაცია:</p>
                <ul class="text_ul">
                    <li><strong>წინა თვე</strong>  - საანგარიშო პერიოდის წინა თვეში საწარმოს მიერ წარმოებული და ადგილობრივ ბაზარზე გაყიდული პროდუქტის ფასი ლარებში (დღგ-ს, აქციზის გადასახადის და სატრანსპორტო ხარჯების გარეშე);</li>
                    <li><strong>მიმდინარე თვე</strong>  - საანგარიშო პერიოდში საწარმოს მიერ წარმოებული და ადგილობრივ ბაზარზე გაყიდული პროდუქტის ფასი ლარებში (დღგ-ს, აქციზის გადასახადის და სატრანსპორტო ხარჯების გარეშე);</li>
                    <li><strong>კომენტარი</strong> - ფასის ცვლილების შემთხვევაში, ცვლილების გამომწვევი მიზეზი ან სხვა დამატებითი ინფორმაცია.</li>
                </ul>
        </div>
         <hr>
         <div class="col-lg-3 mb-4 ">
          <div class="d-inline-block;">
              
             </div>
      </div>
      @foreach ($adminQuestionnaires->where('organization_id', $organization->id) as $questionnaire)
   
      <form class="form-group" method="POST" action="{{ route('questionnaire') }}" enctype="multipart/form-data">
        @csrf
      
        <table class="table table-bordered border-black question_table">
          <thead>
              <tr>
                  <th style="width: 10%"  scope="col">#</th>
                  <th style="width: 20%" scope="col">CPA კოდი</th>
                  <th colspan="5" scope="col">პროდუქტის დასახელება</th>
                </tr>
          </thead>
          <tbody>
              <tr>  
                @if ($questionnaire->id <3)
                <th scope="row">{{$questionnaire->id}}</th>
                @else
                <th scope="row">{{($questionnaire->id) - 2}}</th>
                @endif
                  
                  <td ><input type="text" name="cpa_kode" value="{{$questionnaire->cpa_kode}}" placeholder="მაგ:"></td>
                  <td colspan="5"><input type="text" value="{{$questionnaire->product_name}}"  name="product_name" placeholder="მაგ:პური"></td>
                </tr>
                <tr>
                  <td colspan="2" rowspan="2" >პროდუქტის სახეობა</td>
                  <td rowspan="2">ზომის ერთეული</td>
                  <td colspan="3">ადგილობრივი ბაზრისთვის წარმოებული პროდუქციის ფასი (ლარი)</td>
                  <td>კომენტარი</td>
                </tr>
                <tr>
                  <td><p>საბაზო თვე </p> </td>
                  <td>წინა თვე</td>
                  <td>მიმდინარე თვე</td>
                  <td></td>
                </tr>
                
                @foreach ($questionnaireBody->where('questionnaire_id', $questionnaire->id) as $body)
                <tr >
                  <td style="height: 50px" colspan="2" scope="row"><input type="text" name="product_type[]" value="{{$body->product_type}}"  placeholder="მაგ:პური" multiple=""></td>
                  <td><input type="text" name="unit[]" value="{{$body->unit}}"  placeholder="მაგ:ცალი" multiple=""></td>
                  <td><input type="text" name="base_month[]" value="{{$body->base_month}}"  placeholder="მაგ: 100" multiple=""></td>
                  <td><input type="text" name="previous_month[]" value="{{$body->previous_month}}"  placeholder="მაგ:" multiple=""></td>
                  <td><input type="text" name="current_month[]" value="{{$body->current_month}}"  placeholder="მაგ:" multiple=""></td>
                  <td><input type="text" name="comment[]" value="{{$body->comment}}"  placeholder="მაგ:" multiple=""></td>
                </tr>
                @endforeach
              
               
          </tbody>
        </table>
         </form>
         <hr>
         @endforeach
      </div>
      <div>
        <p><a href="{{url()->previous()}}">უკან გასვლა</a></p>
    </div>
   </div>
</div>
@endif 
 {{--   --}}
</div>
@endsection