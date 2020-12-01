@extends('admin.layouts.app')

@section('content')


<div class="wrapper-with-sidebar">
   <div class="container-fluid py-4">
    <a class="btn btn-primary mb-2" href="{{ route('FrontSliders.create') }}"> <i class="fa fa-plus"></i> Add Image</a>
      <div class="row">
         <div class="col-12">
            @include('layouts.error')
            <table id="datatableInitiazer" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>S.No.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Comment</th>
                <th>Blog</th>
                <th>Actions</th>
            </tr>
           </thead>
           <tbody>
           @php   $count  = 1; @endphp
           @foreach($data as $value)

           <tr>
                <td>{{ $count++ }}.</td>
                <td> {{$value['name']}} </td>
                <td> {{ $value['email'] }} </td>
                <td>{{ $value['comment'] }} </td>
                <td> {{ $value->blog->title }}</td>

                <td> 
                   @if($value['isApprove'])
                     <strong>Comment Approved </strong>
                   @else
                     <a class="btn btn-success" href="{{ route('approve.comment', ['id'=> $value['id']]) }}" title="Approve Comment" data-toggle="tooltip" > <i class="fa fa-check"></i> </a> 
                   @endif
                </td>
            </tr>
           @endforeach
          
           </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection

