@extends('admin.layouts.app')

@section('content')


<div class="wrapper-with-sidebar">
   <div class="container-fluid py-4">
    <a class="btn btn-primary mb-2" href="{{ route('FrontSliders.create') }}"> <i class="fa fa-plus"></i> Add Image</a>
      <div class="row">
         <div class="col-12">
            <table id="datatableInitiazer" class="table table-striped table-bordered" style="width:100%">
            <thead>
            <tr>
                <th>S.No.</th>
                <th>Title</th>
                <th>Category</th>
                <th>Slider Image</th>
                <th>Actions</th>
            </tr>
           </thead>
           <tbody>
           @php   $count  = 1; @endphp
           @foreach($data as $value)

           <tr>
                <td>{{ $count++ }}.</td>
                <td> {{$value['title']}} </td>
                <td> {{ getCategoryName($value['category']) }} </td>
                <td> <img src="{{ asset('Images/uploads/'.$value['image']) }}" alt="" height="100" width="150" >  </td>

                <td> <a class="btn btn-primary" href="{{ route('slider.edit', ['id'=> $value->id]) }}" > <i class="fa fa-edit"></i> </a> 
               
                     <a class="btn btn-danger" href="{{ route('slider.delete', ['id'=> $value['id']]) }}" onclick="return confirm('Are You Sure....!')"> <i class="fa fa-trash"></i> </a>  </td>
            </tr>
           @endforeach
          
           </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection

