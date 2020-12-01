@extends('admin.layouts.app')

@section('content')


<div class="wrapper-with-sidebar">
   <div class="container-fluid py-4">
      <div class="row">
         <div class="col-12">
            @include('layouts.error')
            <table id="datatableInitiazer" class="table table-bordered">
            <thead>
            <tr>
                <th>S.No.</th>
                <th>Ad Name </th>
                <th>Size</th>
                <th>Merchant Name</th>
                <th>Ads Image</th>
                <th>Hyper Link</th>
                <th>Created Date</th>
                <th>clicks</th>
                <th>Actions</th>
            </tr>
           </thead>
           <tbody>

         @php $count = 1; @endphp
         @foreach($allAds as $value)
               @php   $id = $value['id']; @endphp
           <tr>
                <td>{{ $count++ }} .</td>
                <td> {{ config('constants.ADS.'.$id) }}  </td>
                <td>  {{ config('constants.ADSSIZE.'.$id) }}</td>
                <td> {{ $value['company_name'] }}</td>
                <td> <img src="{{ asset('Images/uploads/'.$value['image']) }}" height="100" width="100" alt=""> </td>
                <td> {{ $value['hyper_link'] }} </td>
                <td> {{ $value['start_date'] }} </td>
                <td> {{ $value['clicks'] }} </td>
                <td> 
                     @if($value['isRunning']) 
                        <a class="btn btn-danger btn-sm" href="{{ route('stop.ad', ['id'=> $value['id']]) }}"> <i class="fa fa-stop" data-toggle="tooltip" title="Stop Running Ad"></i> </a>  
                     @else
                        <button class="btn btn-primary btn-sm" href="" title="Create New One" data-toggle="modal" data-target="#myModal{{$value['id']}}"> <i class="fa fa-plus"></i> </button> 
                     @endif

                        <a href="{{ route('ads.history', ['id'=> $value['id']]) }}" target="blank" class="btn btn-success btn-sm" href="" title="View History"> <i class="fa fa-info"></i> </a>
                </td>      
            </tr>

            <!-- The Modal -->
            <div class="modal" id="myModal{{$value['id']}}">
            <div class="modal-dialog">
               <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                  <h4 class="modal-title">Create Ad</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <form action="{{ route('ad.update') }}" method="POST" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group">
                              <label for="">Enter Merchant Name</label>
                              <input type="text" class="form-control" name="company_name">
                          </div>
                          <input type="hidden" name="id" value="{{ $value['id'] }}">
                          <div class="form-group">
                              <label for="">Choose Image</label>
                              <input type="file" class="form-control" name="image">
                          </div>
                          <div class="form-group">
                              <label for="">Enter Hyper Link</label>
                              <input type="text" name="hyper_link" class="form-control">
                          </div>
                          <div class="form-group">
                              <button class="btn btn-primary" type="submit">Submit</button>
                          </div>
                    </form>
                  </div>

                  <!-- Modal footer -->
                  <div class="modal-footer">
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                  </div>

               </div>
            </div>
            </div>
         @endforeach   

           </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection

