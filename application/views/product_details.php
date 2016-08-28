<div class="jumbotron">
    <div class="container">
        <?php if ($this->session->userdata('user_login')['role'] == 1): ?>
            User Dashboard
        <?php else: ?>   
            Admin Dashboard
        <?php endif; ?>
    </div>
</div>

<div class="container">
    <div class="row">
           <h2>Product Details</h2>
            <div class="col-md-12">
               <h2><?php echo $product['name']; ?></h2>
               <p><?php if ($product['image'] != ''): ?>
                        <img src="<?php echo base_url('uploads/products/' . $product['image']); ?>" width="100" height="100"/>
                    <?php else: ?>
                        <img src="<?php echo base_url('images/default.jpg'); ?>" width="100" height="100"/>
                    <?php endif; ?>
                </p>
                <p><?php echo $product['description']; ?></p>
                <p>Course Type: <?php echo $product['course_type']; ?></p>
                <p>Serve Time: <?php echo $product['serve_type']; ?></p>
                <p>Rs: <?php echo $product['price']; ?></p>
                <p>Stock: <?php echo $product['quantity']; ?></p>
            </div>
    
    </div>
</div>