@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <!-- Modal  For Add Category-->
                    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form>
                                @csrf
                                @method('PATCH')

                              <div class="form-group">
                                <label for="category_name" class="col-form-label">Category Name:</label>
                                <input type="text" class="form-control" id="category_name" name="category_name">
                              </div>
                              <div class="form-group">
                                <label for="category_details" class="col-form-label">Description:</label>
                                <textarea class="form-control" id="category_details" name="category_details"></textarea>
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="add_category" class="btn btn-primary">Add Category</button>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Modal  For Add Products-->
                    <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New Products</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form enctype="multipart/form-data">
                                @csrf
                              <div class="form-group">
                                <label for="product_name" class="col-form-label">Products Name:</label>
                                <input type="text" class="form-control" id="product_name" name="product_name">
                              </div>
                               
                                <div class="form-group">
                                  <label for="category_id">Category</label>
                                  <select id="category_id" class="form-control" name ="category_id">
                                 <option selected name ="category_id" value="">Choose...</option>
                                @foreach($categories as $value)
                                    <option name ="category_id" value="{{$value->id}}">{{$value->category_name}}
                                    </option>
                                @endforeach
                                  </select>
                                </div>
                             
                              <div class="form-group">
                                <label for="price" class="col-form-label">Products Price:</label>
                                <input type="text" class="form-control" id="price" name="price">
                              </div>
                              <div class="form-group">
                                <label for="colore" class="col-form-label">Products Colore:</label>
                                <input type="text" class="form-control" id="colore" name="colore">
                              </div>
                              <div class="form-group">
                                  <label for="Size">Size</label>
                                  <select id="size" class="form-control" name ="size">
                                 <option selected name ="size" value="">Choose...</option>
                                 <option selected name ="size" value="M">M</option>
                                 <option selected name ="size" value="XL">XL</option>
                                 <option selected name ="size" value="XLL">XLL</option>

                             </select>
                             </div>

                              <div class="form-group">
                                <label for="image" class="col-form-label">Products Image:</label>
                                <input type="file" class="form-control" id="image" name="image">
                              </div>
                              <div class="form-group">
                                <label for="products_details" class="col-form-label">Products Description:</label>
                                <textarea class="form-control" id="products_details" name="products_details"></textarea>
                              </div>
                            </form>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="add_product" class="btn btn-primary">Add Product</button>
                          </div>
                        </div>
                      </div>
                    </div>
                <!--End Modal  For Add Products-->


                </div>
                <!--End Modal  For Add Category-->
<!-- Modal  For update Products-->
                    <div class="modal fade" id="updateproductModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Products</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form enctype="multipart/form-data">
                                    @csrf
                                  <div class="form-group">
                                    <label for="u_product_name" class="col-form-label">Products Name:</label>
                                    <input type="text" class="form-control" id="u_product_name" name="u_product_name">
                                  </div>
                                   
                                    <div class="form-group">
                                      <label for="u_category_id">Category</label>
                                      <select id="u_category_id" class="form-control" name ="u_category_id">
                                     <option selected name ="u_category_id" value="">Choose...</option>
                                    @foreach($categories as $value)
                                        <option name ="u_category_id" value="{{$value->id}}">{{$value->category_name}}
                                        </option>
                                    @endforeach
                                      </select>
                                    </div>
                                 
                                  <div class="form-group">
                                    <label for="u_price" class="col-form-label">Products Price:</label>
                                    <input type="text" class="form-control" id="u_price" name="u_price">
                                  </div>
                                  <div class="form-group">
                                    <label for="u_colore" class="col-form-label">Products Colore:</label>
                                    <input type="text" class="form-control" id="u_colore" name="u_colore">
                                  </div>
                                  <div class="form-group">
                                      <label for="Size">Size</label>
                                      <select id="u_size" class="form-control" name ="size">
                                     <option selected name ="u_size" value="">Choose...</option>
                                     <option selected name ="u_size" value="M">M</option>
                                     <option selected name ="u_size" value="XL">XL</option>
                                     <option selected name ="u_size" value="XLL">XLL</option>
                                 </select>
                                 </div>
                                  <div class="form-group">
                                    <label for="u_image" class="col-form-label">Products Image:</label>
                                    <input type="file" class="form-control" id="u_image" name="u_image">
                                  </div>
                                  <div class="form-group">
                                    <label for="u_products_details" class="col-form-label">Products Description:</label>
                                    <textarea class="form-control" id="u_products_details" name="u_products_details"></textarea>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" id="update_product" class="btn btn-primary">Update Product</button>
                              </div>
                            </div>
                          </div>
                        </div>
                    <!--End Modal  For update Products-->
                
                <!-- Show Category and products -->

                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                           <div id="message"></div>
                               
                            <button class="btn btn-info" data-toggle="modal" data-target="#categoryModal">Add New Category
                            </button>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Categories</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $value)
                                    <tr>
                                        <td><a href="">{{$value->category_name}}</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                        <a href="">All Categories</a>
                                </tbody>    
                                
                            </table> 
                        </div>
                        <div class="col-md-10" >
                            <button class="btn btn-info" data-toggle="modal" data-target="#productModal">Add New Category
                            </button>
                            <table class="row"> 

                                <tr>
                                    <th>Products</th>
                                </tr>
                                @foreach($products as $value)
                                <tr style="width: 20%; float:left" >
                                    <th>
                                        <a href=""><img src="" height="100px" width="100px" border="1"/></a>
                                        <br>Product Name: <a href="">{{$value->product_name}}</a>
                                        <br>Price: {{$value->price}}
                                        <br>Colore: {{$value->colore}}
                                        <br>Size: {{$value->size}}
                                        <br>Products Details: {{$value->products_details}}<br>
                                        <a class="btn btn-success editproductModal"  para-id="editproductModal">Edit }}</a>
                                        <a href="" class="btn btn-danger">Delete</a>
                                    </th>
                                    
                                </tr>
                                @endforeach
                            </table>
                        </div> 
                    </div>
                </div>
                <!-- Show Category and products -->

            </div>
       </div>
    </div>
</div>
<a id="hello"><b>test1</b></a>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script type="text/javascript">
   $(document).ready(function(){
    $(this).on('click','#add_category',function(){
        var category_name = $('#category_name').val();
        var category_details = $('#category_details').val();
        alert(category_name);
        $.ajax({
            type:'POST',
            url:'/category',
            data:{category_name:category_name,category_details:category_details},
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                if (data) {
                    $('#message').html("<p class='alert alert-success'> Category add success</p>");
                    // window.location.reload(true);
                }
            }
        })
    })
   })
/*Add products....................*/
   $(document).ready(function(){
    $(this).on('click','#add_product',function(){
        var product_name = $('#product_name').val();
        var category_id = $('#category_id').val();
        var price = $('#price').val();
        var colore = $('#colore').val();
        var size = $('#size').val();
        var image = $('#image').val();
        var products_details = $('#products_details').val();
        $.ajax({
            type:'POST',
            url:'/products',
            enctype: 'multipart/form-data',
            data:{product_name:product_name,category_id:category_id,price:price,colore:colore,size:size,image:image,products_details:products_details},
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                if (data) {
                    $('#message').html("<p class='alert alert-success'> Category add success</p>");
                    // window.location = window.location
                // window.location.reload(true);
                }
            }
        })
    })
   })

/*Edit products .........................................*/
   $(document).ready(function(){
    $(this).on('click','a',function(){
        // var product_id = $(this).attr();
        $(document).on('click', 'editproductModal', function () {
    alert(this.id);
});
        // alert(product_id);
           var product_id= $(this).val('.editproductModal');
        alert(product_id);

        $.ajax({
            type:'POST',
            url:'/products',
            data:{product_id:product_id},
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                alert();
                if (data) {
                    alert(data);
                    // $('#updateproductModal').modal('show');
                    // window.location = window.location
                // window.location.reload(true);
                }
            }
        })
    })
   })

/*Update products .........................................*/
   $(document).ready(function(){
    $(this).on('click','#update_product',function(){
        var u_product_name = $('#u_product_name').val();
        var u_category_id = $('#u_category_id').val();
        var u_price = $('#u_price').val();
        var u_colore = $('#colore').val();
        var u_size = $('#u_size').val();
        var u_image = $('#u_image').val();
        var u_products_details = $('#u_products_details').val();
        $.ajax({
            type:'PATCH',
            url:'/products',
            enctype: 'multipart/form-data',
            data:{u_product_name:u_product_name,u_category_id:u_category_id,u_price:u_price,u_colore:u_colore,u_size:u_size,u_image:u_image,u_products_details:u_products_details},
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success:function(data){
                if (data) {
                    $('#message').html("<p class='alert alert-success'> Category add success</p>");
                    // window.location = window.location
                // window.location.reload(true);
                }
            }
        })
    })
   })
</script>
@endsection
