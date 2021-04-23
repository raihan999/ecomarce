
@extends('layouts.admin.app')

@section('content')

<main>
   <div class="container-fluid site-width">
   <!-- START: Breadcrumbs-->
   <div class="row ">
       <div class="col-12  align-self-center">
           <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
               <div class="w-sm-100 mr-auto"><h4 class="mb-0">Subsategory Manage</h4></div>

               <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                   <li class="breadcrumb-item">Home</li>
                   <li class="breadcrumb-item">Category</li>
                   <li class="breadcrumb-item active"><a href="#">Subsategory Manage</a></li>
               </ol>
           </div>
       </div>
   </div>
   <!-- END: Breadcrumbs-->

   <!-- START: Card Data-->
     <a href="#"class="bg-primary py-2 px-2 rounded ml-auto text-white w-100 text-center pull-right" data-toggle="modal" data-target="#newcategory">
                       <i class="icon-plus align-middle text-white"></i> <span class="d-none d-xl-inline-block">Add New Subcategory </span>
                   </a>
   <div class="row">
       <div class="col-12 mt-3">
           <div class="card">
               <div class="card-header  justify-content-between align-items-center">                               
                   <h4 class="card-title">Subsategory Data</h4> 
                    <div class="pull-right">
                       
                    </div>
               </div>
               
               <div class="card-body">
                   <div class="table-responsive">
                       <table  id="categoryTable" class="display table dataTable table-striped table-bordered" >
                           <thead>
                               <tr>
                                   <th>Category Name</th>
                                   <th>Subcategory Name</th>
                                   <th>Action</th>
                               </tr>
                           </thead>
                           <tbody>
                           @foreach($subcategory as $row)
                              
                                    
                                   <td>{{$row->categoty_name}}</td> 
                                   <td>{{$row->subcategory_name}}</td> 
                                   
                                   
                                   <td>
                                     
                                     <a href="{{ url('admin/edit/category/'.$row->id) }}" class="btn btn-info" data-toggle="tooltip" title="Edit"><i class="fa fa-pencil"></i>Edit</a>
                                     <a href="{{ url('admin/delete/category/'.$row->id) }}" class="btn btn-danger" data-toggle="tooltip" title="Delete"><i class="fa fa-trash">Delete</i></a>
                                   </td>
                               </tr>
                           @endforeach                          
                              
                           </tbody>
                         
                       </table>
                   </div>
               </div>
           </div> 

       </div>                  
   </div>
   <!-- END: Card DATA-->
</div>
</main>
<!-- Add Category Add Model  -->
<div class="modal fade" id="newcategory">
   <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title">
                   <i class="icon-pencil"></i> Add Subcategory
               </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <i class="icon-close"></i>
               </button>
           </div>
            <form class="add-contact-form" method="post" action="{{ route('store.subcategory')}}"enctype="multipart/form-data">    
               @csrf
               <div class="modal-body">    
                <p>
                    <label for="exampleInputEmail1">Category </label>
                   
                     <select class="form-control" name="category_id">
                      <option selected disabled>Select Category</option>
                     @foreach($category as $row)
                     <option value="{{ $row->id }}"> {{ $row->categoty_name }} </option>
                     @endforeach
                   </select>
                </p>                                           
              
                  
                </br>
                <div class="form-group row">
                    
                    <div class="col-sm-12">
                        <input type="text" class="form-control" id="Subcategory Name" placeholder="Subcategory Name" name="subcategory_name">
                    </div>
                </div>


               </div>
               <div class="modal-footer">
                   <button type="submit" class="btn btn-primary add-todo">Add Subcategory</button>
               </div>
           </form>
       </div>
   </div>
</div>


@endsection