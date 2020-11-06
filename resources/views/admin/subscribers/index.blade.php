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
                <th>Email</th>
                <th>Created </th>
                <th>Action</th>
            </tr>
           </thead>
           <tbody>
           @php   $count  = 1; @endphp
           @foreach($subscribeData as $value)

           <tr>
                <td>{{ $count++ }}.</td>
                <td>{{ $value['email'] }}</td>
                <td> {{ $value['created_at'] }} </td>
                <td> <button class="btn btn-primary"> <i class="fa fa-edit"></i> </button> 
                     <a class="btn btn-danger" onclick="return confirm('Are You Sure')" href="{{ route('subscribe.delete', ['id' => $value['id']]) }}"> <i class="fa fa-trash"></i> </a>  </td>
            </tr>
           @endforeach
          
           </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection

