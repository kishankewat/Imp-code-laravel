

@foreach($data as $value)

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
                    @endforeach