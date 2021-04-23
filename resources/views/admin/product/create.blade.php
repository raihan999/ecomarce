
@extends('layouts.admin.app')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" crossorigin="anonymous">
@section('content')
<!-- START: Main Content-->
<main>
    <div class="container-fluid site-width">
    <!-- START: Breadcrumbs-->
    <div class="row ">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><h4 class="mb-0">Basic Form</h4></div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Form</li>
                    <li class="breadcrumb-item active"><a href="#">Basic</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->

    <!-- START: Card Data-->
    <div class="row">
        <div class="col-12 mt-4">
            <div class="card">
                <div class="card-header">                               
                    <h6 class="card-title">Form Inputs</h6>                                
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">                                           
                            <div class="col-12">
                                <form class="add-contact-form" method="post" action="{{ route('store.product') }}"enctype="multipart/form-data">    
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Product Name <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control rounded" id="inputEmail4" placeholder="Product name" name="product_name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="product_code">Product Code<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control" id="product_code" placeholder="Product code" name="product_code">
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Category <span style="color:red;">*</span></label>
                                            <select class="form-control select2" data-placeholder="Choose country" name="category_id">
                                                <option selected disabled>Choose Category</option>
                                                @foreach($category as $ca)
                                                <option value="{{ $ca->id }}">{{ $ca->categoty_name }}</option>
                                                @endforeach
                                              </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Sub category <span style="color:red;">*</span></label>
                                            <select class="form-control select2" data-placeholder="Choose country" name="subcategory_id">
                                                @foreach($subcategory as $sbcat)
                                                  <option value="{{ $sbcat->id }}">{{ $sbcat->subcategory_name }}</option>
                                                @endforeach
                                               
                                              </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Brand <span style="color:red;">*</span></label>
                                            <select class="form-control select2" data-placeholder="Choose country" name="brand_id" id="inputState">
                                                <option selected disabled>Choose Category</option>
                                                @foreach($brand as $br)
                                                <option value="{{ $br->id }}">{{ $br->brand_name }}</option>
                                                @endforeach
                                              </select>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Product Quantity <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control rounded" id="inputEmail4" placeholder="Product Quantity" name="product_quantity">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Selling Price <span style="color:red;">*</span></label>
                                            <input type="text" class="form-control rounded" id="inputEmail4" placeholder="selling price" name="selling_price">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="product_code">Extra Tax<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control"  placeholder="Extra Tax" name="ex_tax">
                                        </div>
                                    </div>
                                   

                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputEmail4">Product Color <span style="color:red;">*</span></label>
                                            </br>
                                            <input type="text" class="form-control rounded" id="inputEmail4" placeholder="Product Color" name="product_color" data-role="tagsinput" >
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="product_code">Product Size<span style="color:red;">*</span></label>
                                            </br>
                                            <input  type="text" class="form-control"  placeholder="Product Size" name="product_size" data-role="tagsinput">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="product_code">Vedio Link<span style="color:red;">*</span></label>
                                            <input type="text" class="form-control"  placeholder="Vedio Link" name="video_link">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <div class="modal-body">    
                                                <div class="card">
                                                <div class="card-header d-flex justify-content-between align-items-center">                               
                                                    <h4 class="card-title">Product Description</h4>                                   
                                                </div>
                                                <div class="card-body">
                                                    <textarea  class="summernote" required name="product_details"></textarea>
                                                </div>
                                            </div>
                                            </div>
                                       </div>
                                    </div>                       
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="inputEmail4">Image One <span style="color:red;">*</span></label>
                                            <input type="file" class="form-control rounded" name="image_one" onchange="readURL(this);" required="">
                                            </br>
                                            <img style="float: right; height:30px; width:30px;" src="{{asset('avatar.png')}}" id="one" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputEmail4">Image Two <span style="color:red;">*</span></label>
                                            <input type="file" class="form-control rounded" name="image_two" onchange="readURL1(this);" required="">
                                            </br>
                                            <img style="float: right; height:30px; width:30px;" src="{{asset('avatar.png')}}" id="two" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputEmail4">Image Three <span style="color:red;">*</span></label>
                                            <input type="file" class="form-control rounded" name="image_three" onchange="readURL2(this);" required="">
                                            </br>
                                            <img style="float: right; height:30px; width:30px;" src="{{asset('avatar.png')}}" id="three" >
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputEmail4">Image Four <span style="color:red;">*</span></label>
              $('#three')
                                            <input type="file" class="form-control rounded" name="image_four" onchange="readURL3(this);" id="three" required="">
                                            </br>
                                            <img style="float: right; height:30px; width:30px;" src="{{asset('avatar.png')}}" id="four" >
                                        </div>
                                    </div>

                                  <hr>


                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group col-md-6 custom-control custom-checkbox">
                                                    <input type="checkbox" id="minimal-checkbox-disabled2"value="1" name="featured_product">
                                                    <label for="minimal-checkbox-disabled2">Featured Product</label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group col-md-6 custom-control custom-checkbox">
                                                    <input type="checkbox" id="minimal-checkbox-disabled2"value="1" name="new_product">
                                                    <label for="minimal-checkbox-disabled2">New Product</label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="form-group col-md-4">
                                            <div class="custom-control custom-checkbox">
                                                <div class="form-group col-md-6 custom-control custom-checkbox">
                                                    <input type="checkbox" id="minimal-checkbox-disabled2"value="1" name="buyone_getone">
                                                    <label for="minimal-checkbox-disabled2">Buyone Getone</label>
                                                </div>
                                                
                                            </div>
                                        </div>
                                     
                                    </div>
                                    

                                   
                                    <button style="float: center;" type="submit" class="btn btn-primary">Save Product</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Card DATA-->
</div>
</main>
<!-- END: Content-->

<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#one')
                  .attr('src', e.target.result)
                  .width(30)
                  .height(30);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
<script type="text/javascript">
	function readURL1(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#two')
                  .attr('src', e.target.result)
                  .width(30)
                  .height(30);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
<script type="text/javascript">
	function readURL2(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#three')
                  .attr('src', e.target.result)
                  .width(30)
                  .height(30);
          };
          reader.readAsDataURL(input.files[0])
      }
   }
</script>
<script type="text/javascript">
	function readURL3(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#four')
                  .attr('src', e.target.result)
                  .width(30)
                  .height(30);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js" crossorigin="anonymous"></script>

<script type="text/javascript">
    $(document).ready(function() {
       $('select[name="category_id"]').on('change', function(){
           var category_id = $(this).val();
           if(category_id) {
            $.ajax({
                url: "{{  url('/get/subcategory/') }}/"+category_id,
                type:"GET",
                dataType:"json",
                success:function(data) {
                   var d =$('select[name="subcategory_id"]').empty();
                      $.each(data, function(key, value){

                          $('select[name="subcategory_id"]').append('<option value="'+ value.id +'">' + value.subcategory_name + '</option>');

                      });

                },
               
            });
           } else {
               alert('danger');
           }

       });
   });

</script>
@endsection