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
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Blog Info</th>
                <th>Created </th>
                <th>Action</th>
            </tr>
           </thead>
           <tbody>
           @php   $count  = 1; @endphp
           @foreach($blogQueries as $value)

           <tr>
                <td>{{ $count++ }}.</td>
                <td>{{ $value['name'] }}</td>
                <td>{{ $value['mobile'] }} </td>
                <td> {{ $value['email'] }} </td>
                <td> {{  $value['blog_info'] }} </td>
                <td> {{ $value['created_at'] }} </td>
                <td> <button class="btn btn-primary"> <i class="fa fa-edit"></i> </button> 
                     <a class="btn btn-danger" href="{{ route('blogquery.delete', ['id'=>$value['id']]) }}" onclick="return confirm('Are You Sure')"> <i class="fa fa-trash"></i> </a>  </td>
            </tr>
           @endforeach
          
           </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection

