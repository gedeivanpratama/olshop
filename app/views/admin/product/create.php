<div class="row">
    <div class="col-md-12 px-2">
        <div id="smartwizard">
                <ul>
                    <li><a href="#step-1">Product Info<br /><small>Step description</small></a></li>
                    <li><a href="#step-2">Product Image<br /><small>Step description</small></a></li>
                    <li><a href="#step-3">Step Title<br /><small>Step description</small></a></li>
                    <li><a href="#step-4">Step Title<br /><small>Step description</small></a></li>
                </ul>
                <div>
                    <!-- step 1 -->
                    <div id="step-1" class="">
                        <form action="<?= BASEURL ?>/Product/store" method="post" class="px-3">
                          <div class="row">
                            <div class="col-md-8">
                              <div class="form-group">
                                <label for="name">Product Name :</label>
                                <?php if(Msg::check('name')): ?>
                                    <div class="text-danger"><?php Msg::get('name'); ?></div>
                                <?php endif ?>
                                <input type="text" class="form-control" name="name" id="name">
                              </div>
                              <div class="form-group">
                                <label for="name">Product Price :</label>
                                <?php if(Msg::check('price')): ?>
                                    <div class="text-danger"><?php Msg::get('price'); ?></div>
                                <?php endif ?>
                                <input type="number" class="form-control" name="price" id="name">
                              </div>
                              <div class="form-group">
                                <label for="name">Product Qty :</label>
                                <?php if(Msg::check('qty')): ?>
                                    <div class="text-danger"><?php Msg::get('qty'); ?></div>
                                <?php endif ?>
                                <input type="number" class="form-control" name="qty" id="name">
                              </div>
                              <div class="form-group">
                                <label for="name">Product Discount :</label>
                                <input type="number" class="form-control" name="discount" id="name">
                              </div>
                              <div class="form-group">
                                <label for="name">Product Description :</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                              </div>

                              <button type="submit" class="btn btn-primary">Add</button>
                            </div>
                                </form>
                          </div>
                    </div>
                    <!-- step 1 -->

                    <!-- step 2 -->
                    <div id="step-2" class="">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary my-5 mx-3" data-toggle="modal" data-target="#exampleModal">Upload</button>
                    <!-- error message -->
                    <?php if(Msg::check('image')): ?>
                        <div class="text-danger ml-3"><?php Msg::get('image'); ?></div>
                    <?php endif ?>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Image From Computer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?= BASEURL ?>/Image/store" method="post" enctype="multipart/form-data">
                                <label for="">Upload Image</label><br>
                                <input type="file" name="image" >
                                <div class="form-group my-2">
                                    <label for="">Select Product :</label>
                                    <select name="product_id" id="" class="form-control">
                                        <?php foreach($data['product'] as $value): ?>
                                            <option value="<?= $value->id ?>"><?= $value->name ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <label for="">Description :</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control my-2"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-success">Upload</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal end -->
                <form action="<?= BASEURL ?>/Image/choose" method="post" class="px-3">
                    <div class="row">
                        <?php foreach ($data['images'] as $value): ?>
                            <div class="col-md-4">
                                    <div class="card" style="width: 18rem;">
                                        <img src="<?= BASEURL ?>/img/product/<?= $value->image ?>" class="card-img-top" alt="...">
                                        <div class="card-body">
                                            <h5 class="card-title">Description</h5>
                                            <p class="card-text"><?= $value->description ?></p>
                                            <input class="mb-2" type="checkbox" name="id[]" value="<?= $value->id ?>"> show the image
                                        </div>
                                    </div>
                                </div>
                        <?php endforeach; ?>
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">Choose</button>
                </form>

        </div>





                    <div id="step-3" class="">
                        Step Content
                    </div>
                    <div id="step-4" class="">
                        Step Content
                        </form>
                    </div>
                </div>
        </div>
    </div>
</div>