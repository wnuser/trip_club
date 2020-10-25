@extends('admin.layouts.app')

@section('content')


<div class="wrapper-with-sidebar">
   <div class="container-fluid py-4">
    <a class="btn btn-primary mb-2" href="{{ route('BlogCategorys.create') }}"> <i class="fa fa-plus"></i> Create Category</a>
      <div class="row">
         <div class="col-12">
            <table id="datatableInitiazer" class="table table-bordered">
            <thead>
            <tr>
                <th>S.No.</th>
                <th>Category Name</th>
                <th>Category Image</th>
                <th>Actions</th>
            </tr>
           </thead>
           <tbody>
           @php   $count  = 1; @endphp
           @foreach($data as $value)

           <tr>
                <td>{{ $count++ }}.</td>
                <td>{{ $value['name'] }}</td>
                <td> <img src="{{ asset('Images/categories/'.$value['image']) }}" alt="" height="100" width="150" >  </td>
                <td> <button class="btn btn-primary"> <i class="fa fa-edit"></i> </button> 
                     <button class="btn btn-danger"> <i class="fa fa-trash"></i> </button>  </td>
            </tr>
           @endforeach
          
           </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection

