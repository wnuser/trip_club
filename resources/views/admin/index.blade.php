@extends('layouts.adminApp')

@section('content')

<div class="sidebar-admin">
   <div class="inner-wrap">
     <div class="side-wrap">
        <ul>
          <li><a href="#">Blog</a></li>
          <li><a href="#" class="active">People</a></li>
          <li><a href="#">Blog</a></li>
          <li><a href="#">Tables</a></li>
        </ul>
     </div>
   </div>
</div>
<div class="wrapper-with-sidebar">
   <div class="container-fluid py-4">
      <div class="row">
         <div class="col-lg-6 col-md-6 col-12 mb-3">
             <div class="counting-box">
                <h5>Total users</h5>
                 <h3>345</h3>
                 <i class="fas fa-users"></i>
             </div>
         </div>
         <div class="col-lg-6 col-md-6 col-12 mb-3">
             <div class="counting-box">
                <h5>Total users</h5>
                 <h3>345</h3>
                 <i class="fas fa-chart-bar"></i>
             </div>
         </div>
      </div>
      <div class="row">
         <div class="col-12">
            <table id="records-table" class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
           </thead>
           <tbody>
           <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
            </tr>
           </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection

