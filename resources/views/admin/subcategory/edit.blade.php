
@extends('layouts.admin.app')

@section('content')

<main>
   <div class="container-fluid site-width">
   <!-- START: Breadcrumbs-->
   <div class="row ">
       <div class="col-12  align-self-center">
           <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
               <div class="w-sm-100 mr-auto"><h4 class="mb-0">Service Product Edit</h4></div>

               <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                   <li class="breadcrumb-item">Home</li>
                   <li class="breadcrumb-item">Service Product</li>
                   <li class="breadcrumb-item active"><a href="#">Edit</a></li>
               </ol>
           </div>
       </div>
   </div>
   <!-- END: Breadcrumbs-->

   <!-- START: Card Data-->
   <div class="row">
       <div class="col-12 col-lg-12 mt-3">
           <div class="card">
               <div class="card-header">                               
                   <h4 class="card-title">Service Product Edit</h4>                                
               </div>
               <div class="card-content">
                   <div class="card-body">
                       <div class="row">                                           
                           <div class="col-12">
                              
                                <form class="add-contact-form" method="post" action="{{ url('update/service/'.$service->id) }}"enctype="multipart/form-data">    
                                    @csrf
                                
                                   <div class="form-group row">
                                       <label for="email" class="col-sm-2 col-form-label">category</label>
                                       <div class="col-sm-10">
                                        <select class="form-control" name="cat_id">
                                            @foreach($category as $row)
                                            <option value="{{ $row->id }}"
                                           <?php 
                                              if($row->id == $service->cat_id) {
                                                echo "selected";
                                              }
                                            ?>
                                            >{{ $row->category_name }} </option>
                                            @endforeach
                                          </select>
                                       </div>
                                   </div>
                                   <div class="form-group row">
                                       <label for="inputPassword3" class="col-sm-2 col-form-label">Image</label>
                                       <div class="col-sm-10">
                                        <input type="file" class="picker_1" id="file"  name="image" onchange="readURL(this);"  accept="image" />
                                       <img class="pull-right" style="height: 55px;" src="{{ asset($service->image) }}" id="image"/>
                                       </div>
                                   </div>   
                                   <div class="form-group row">
                                    <label for="inputPassword3" class="col-sm-2 col-form-label">Description</label>
                                    <div class="col-sm-10">
                                     <textarea  class="summernote" required name="description">{!!$service->description !!}</textarea>
                                    </div>
                                </div> 
                                   
                                   <div class="form-group row">
                                       <div class="col-sm-10">
                                           <button type="submit" class="btn btn-primary">Update</button>  
                                       </div>
                                   </div>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>


</div>
</main>
<!-- Add Category Add Model  -->
<div class="modal fade" id="newcategory">
   <div class="modal-dialog modal-dialog-centered">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title">
                   <i class="icon-pencil"></i> Add Service
               </h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <i class="icon-close"></i>
               </button>
           </div>
            <form class="add-contact-form" method="post" action="{{ route('store.service')}}"enctype="multipart/form-data">    
               @csrf
               <div class="modal-body">    
                <div class="col-md-12">
                                             
                    <select class="form-control" name="category_id">
                      @foreach($category as $row)
                      <option value="{{ $row->id }}"
                     <?php 
                        if($row->id == $service->cat_id) {
                          echo "selected";
                        }
                      ?>
                      >{{ $row->category_name }} </option>
                      @endforeach
                    </select> 
              </div>                                           
                <p>
                    <label for="exampleInputEmail1"> Image *</label>
                  
                  <input type="file" class="picker_1" id="file"  name="image" onchange="readURL(this);"  accept="image" />
                  <img class="pull-right" style="height: 55px;" src="{{ asset('public/avater.jpg') }}" id="image"/>
               </p>
                  
                </br>
                   <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">                               
                        <h4 class="card-title">Description</h4>                                   
                    </div>
                    <div class="card-body">
                        <textarea  class="summernote" required name="description"></textarea>
                    </div>
                </div>


               </div>
               <div class="modal-footer">
                   <button type="submit" class="btn btn-primary add-todo">Add Service</button>
               </div>
           </form>
       </div>
   </div>
</div>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image')
                    .attr('src', e.target.result)
                    .width(50)
                    .height(50);
            };
            reader.readAsDataURL(input.files[0]);
        }
     }
  </script>
  

@endsection