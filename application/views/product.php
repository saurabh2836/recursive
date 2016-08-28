<div class="container">
    <div class="row navbar-right">
        <a href="<?php echo base_url('home/addproduct'); ?>" class="btn btn-info " role="button">Add Product</a>
    </div>
    <div class="row">   
        <div class="col-md-12">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>SKU</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Course Type</th>
                        <th>Serve Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Name</th>
                        <th>Name</th>
                        <th>SKU</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Course Type</th>
                        <th>Serve Time</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php foreach ($product as $value): ?>
                        <tr>
                            <td><?php echo $value['id']; ?></td>
                            <td><?php echo $value['name']; ?></td>
                            <td><?php echo $value['sku']; ?></td>
                            <td><?php echo $value['description']; ?></td>
                            <td><?php echo $value['price']; ?></td>
                            <td>
                                <?php if( $value['image'] !='' ):?>
                                    <img src="<?php echo base_url('uploads/products/'.$value['image']);?>" width="100" height="100"/>
                                 <?php else:?>
                                    <img src="<?php echo base_url('images/default.jpg');?>" width="100" height="100"/>
                                    <?php endif;?>
                            </td>
                            <td><?php echo $value['course_type']; ?></td>
                            <td><?php echo $value['serve_time']; ?></td>
                            <td><a href="<?php echo base_url('home/editproduct/'.$value['id']);?>" title="Edit Product"/>Edit </a> ||<a href="<?php echo base_url('home/deleteproduct/'.$value['id']);?>" title="Delete Product"/> Delete </a></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
