<div class="container margin-top-15">
    <div class=" col-xs-12 ws-col-centered">
        <h1 class="ws-page-title text-center">Add Product</h1>
        <?php echo $this->session->flashdata('add_product'); ?>
        <form class="form" id="signupForm" role="form" action='<?php echo base_url(); ?>home/insertproduct' method='post' enctype="multipart">
            <div class="form-group">
                <label class="sr-only" for="name">Name</label>
                <input type='text' class="form-control" name="name" placeholder="Name" required='required' />
            </div>
            <div class="form-group">
                <label class="sr-only" for="SKU">SKU</label>
                <input type='text' class="form-control" name="sku" placeholder="SKU" required='required' />
            </div>
            <div class="form-group">
                <label class="sr-only" for="Description">Description</label>
                <textarea name="description" required='required' placeholder="Enter Product Description" rows="3" cols="95"></textarea>
            </div>
            <div class="form-group">
                <label class="sr-only" for="price">price</label>
                <input class="form-control" id="mobile" name="price" placeholder="Product price" type="text" value="">
            </div>
            <div class="form-group">
                <label class="sr-only" for="image">Image</label>
                <input class="form-control" id="image" name="image" placeholder="Uploading Product Image" type="file" value="">
            </div>
            <div class="form-group">
                    <select class="form-control" name="course_type">
                        <option value="0" selected="selected">Select Course Type</option>
                                <option value="1">Starter</option>
                                <option value="2">Main Course</option>
                                <option value="3">Dessert</option>
                        </select>
            </div>
            <div class="form-group">
                    <select class="form-control" name="serve_time">
                        <option value="0" selected="selected">Select Serve Type</option>
                                <option value="1">Breakfast</option>
                                <option value="2">Lunch</option>
                                <option value="3">Dinner</option>
                        </select>
            </div>
            <div class="form-group">
            <input class="btn btn-info form-control" id='ws-login-button' type='submit' value='Add Product'/>
            </div>
        </form>
    </div>
</div>