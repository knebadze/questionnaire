@extends('layouts.user')
@section('content')
<div class="quest_main">
<div class="container">
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

{{--  --}}


</div>
<div class="clear"></div>

<hr>
<div class="container">
<div class="col-md-12 mt-4">
   <p><strong>კითხვარის შევსების ინსტრუქცია</strong>  - მომდევნო გვერდზე მოცემულ ცხრილში წარმოდგენილია კვლევის დასაწყისში თქვენ მიერ დასახელებული პროდუქციის მონაცემები. თითოეული პროდუქტისთვის გთხოვთ მიუთითოთ შემდეგი ინფორმაცია:</p>
   {{-- <br><br> --}}
   <ul class="text_ul">
       <li><strong>წინა თვე</strong>  - საანგარიშო პერიოდის წინა თვეში საწარმოს მიერ წარმოებული და ადგილობრივ ბაზარზე გაყიდული პროდუქტის ფასი ლარებში (დღგ-ს, აქციზის გადასახადის და სატრანსპორტო ხარჯების გარეშე);</li>
       <li><strong>მიმდინარე თვე</strong>  - საანგარიშო პერიოდში საწარმოს მიერ წარმოებული და ადგილობრივ ბაზარზე გაყიდული პროდუქტის ფასი ლარებში (დღგ-ს, აქციზის გადასახადის და სატრანსპორტო ხარჯების გარეშე);</li>
       <li><strong>კომენტარი</strong> - ფასის ცვლილების შემთხვევაში, ცვლილების გამომწვევი მიზეზი ან სხვა დამატებითი ინფორმაცია.</li>
   </ul>
</div>
</div>
<div class="container">
	<hr>
	<div class="middle_descr">
		<div class="row">

			<div class="col-md-12 mb-4">
				<h5>{{'# '.$questionnaire->id.'.'.$questionnaire->product_name.'(ს) ცხრილი'}}</h5>
         </div>
         @if (!(empty($questionnaire)))
         <div class="row ">
          <hr>
          <div> <h5 class="mb-4">უკვე შევსებული ცხრილები:</h5></div>
          <p>   @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
                @php
                    Session::forget('message');
                @endphp
            </div>
            @endif</p>
          <div>
           <form class="form-group" method="POST" action="{{ url('table_update/'.$questionnaire->id) }}" enctype="multipart/form-data">
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
                         <th scope="row">{{$questionnaire->id}}</th>
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
                       
                       @foreach ($questionnaire->questionnairebody as $body)
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
               <hr>
               <div>
                   <p><a href="{{url()->previous()}}">უკან გასვლა</a></p>
               </div>
               <div class="my-4 float-end">
                <button type="submit" class="btn btn-primary ">შესწორება</button>
             </div>
              </form>
         </div>
         
        </div>
         @endif
      </div>
   </div>
</div>

<div class="clear"></div>
@endsection