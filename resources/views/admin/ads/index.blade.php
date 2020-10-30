@extends('admin.layouts.app')

@section('content')


<div class="wrapper-with-sidebar">
   <div class="container-fluid py-4">
    <a class="btn btn-primary mb-2" href="{{ route('BlogCategorys.create') }}"> <i class="fa fa-plus"></i> Create Ads</a>
      <div class="row">
         <div class="col-12">
            <table id="records-table" class="table table-bordered">
            <thead>
            <tr>
                <th>S.No.</th>
                <th>Ads Image</th>
                <th>Hyper Link</th>
                <th>Created Date</th>
                <th>Actions</th>
            </tr>
           </thead>
           <tbody>

           <tr>
                <td>1.</td>
                <td></td>
                <td>Test</td>
                <td>22/09/2020</td>
                <td> <button class="btn btn-primary"> <i class="fa fa-edit"></i> </button> 
                     <button class="btn btn-danger"> <i class="fa fa-trash"></i> </button>  </td>
            </tr>

            <tr>
                <td>1.</td>
                <td></td>
                <td>Test Home</td>
                <td>22/09/2020</td>
                <td> <button class="btn btn-primary"> <i class="fa fa-edit"></i> </button> 
                     <button class="btn btn-danger"> <i class="fa fa-trash"></i> </button>  </td>
            </tr>

            <tr>
                <td>1.</td>
                <td></td>
                <td>Test Blog</td>
                <td>22/09/2020</td>
                <td> <button class="btn btn-primary"> <i class="fa fa-edit"></i> </button> 
                     <button class="btn btn-danger"> <i class="fa fa-trash"></i> </button>  </td>
            </tr>

            <tr>
                <td>1.</td>
                <td></td>
                <td>Test</td>
                <td>22/09/2020</td>
                <td> <button class="btn btn-primary"> <i class="fa fa-edit"></i> </button> 
                     <button class="btn btn-danger"> <i class="fa fa-trash"></i> </button>  </td>
            </tr>
          
           </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection

