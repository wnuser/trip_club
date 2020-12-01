@extends('admin.layouts.app')

@section('content')


<div class="wrapper-with-sidebar">
   <div class="container-fluid py-4">
      <div class="row">
         <div class="col-12">
         <a class="btn btn-dark float-right" href="{{ route('Ads.index') }}"><i class="fa fa-angle-double-left"></i> Back </a>
            @include('layouts.error')
            <table id="datatableInitiazer" class="table table-bordered">
            <thead>
            <tr>
                <th>S.No.</th>
                <th>Ad Name</th>
                <th>Merchant Name</th>
                <th>Ads Image</th>
                <th>Hyper Link</th>
                <th>Created Date</th>
                <th>End Date</th>
                <th>clicks</th>
            </tr>
           </thead>
           <tbody>

         @php $count = 1; @endphp
         @foreach($adsHistory as $value)
               @php   $id = $value['ad_id']; @endphp
           <tr>
                <td>{{ $count++ }} .</td>
                <td> {{ config('constants.ADS.'.$id) }} </td>
                <td> {{ $value['company_name'] }}</td>
                <td> <img src="{{ asset('Images/uploads/'.$value['image']) }}" height="100" width="100" alt=""> </td>
                <td> {{ $value['hyper_link'] }} </td>
                <td> {{ $value['start_date'] }} </td>
                <td> {{ $value['end_date']  }} </td>
                <td> {{ $value['clicks'] }} </td>
               
            </tr>
         @endforeach   

           </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection

