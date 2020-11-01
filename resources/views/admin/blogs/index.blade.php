@extends('admin.layouts.app')

@section('content')

<div class="wrapper-with-sidebar">
   <div class="container-fluid py-4">
    <a class="btn btn-primary mb-2" href="{{ route('AdminBlogs.create') }}"> <i class="fa fa-plus"></i> Create Blog</a>
      <div class="row">
         <div class="col-12">
         @include('layouts.error')
         @php  $frontCategories   = config('constants.FRONTCATEGORY');  
         
         @endphp
         <!-- echo "<pre>";
         print_r($fronCategories);
         

         foreach($fronCategories as $key => $value)
         {
            echo $value;
         }
         exit; -->
               
         <!-- @endphp -->


            <table id="datatableInitiazer" class="table table-bordered">
            <thead>
            <tr>
                <th>S.No.</th>
                <th>Blog Title</th>
                <th>Category</th>
                <th>Image</th>
                <th>Front Category</th>
                <th>Actions</th>
            </tr>
           </thead>
           <tbody>
            @php   $count = 1;   @endphp
            @foreach($data as $value)
               <tr>
                  <td>{{ $count++ }}.</td>
                  <td>{{ $value['title'] }}</td>
                  <td>{{ getCategoryName($value['category']) }}</td>
                  <td> <img src="{{ asset('Images/uploads/'.$value['image']) }}" alt="" height="100" width="150"> </td>
                  <td> 
                    @php  $catName    =   ($value['front_category']) ? config('constants.FRONTCATEGORYLABEL')[$value['front_category']] : false;   @endphp
                    {{ $catName }}
                  </td>
                  <td> <button class="btn btn-primary btn-sm"> <i class="fa fa-edit"></i> </button> 
                        <a class="btn btn-danger btn-sm" href="{{ route('blog.delete', ['id'=> $value['id'] ]) }}" onclick=" return confirm('Are You Sure .... !') " > <i class="fa fa-trash"></i> </a> 
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#myModal{{$value['id']}}"> <i class="fa fa-info"></i> </button> 
                  </td>
               </tr>

               <!-- The Modal -->
                  <div class="modal" id="myModal{{$value['id']}}">
                  <div class="modal-dialog">
                     <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title">Change Front Category</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                        <form action="{{route('change.frontCategory')}}" method="POST">
                           <div class="form-group">
                              @csrf
                               <select name="front_category" id="" class="form-control">
                                 <option value="">Select Category</option>
                                 @foreach($frontCategories as $key => $catvalue )
                                    @if($catvalue == $value['front_category'])
                                      <option value="{{ $catvalue }}" selected>{{ $key }}</option>
                                    @else 
                                      <option value="{{ $catvalue }}">{{$key}}</option>
                                    @endif
                                 @endforeach
                               </select>    
                               <input type="hidden" value="{{ $value['id'] }}" name="blogId">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" btn="submit">Submit</button>
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

