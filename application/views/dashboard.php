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
           <h2>Product List</h2>
        <?php foreach ($product as $value): ?>
            <div class="col-md-4">
                <a href="<?php echo base_url('home/product_details/'.$value['id']);?>" title="<?php echo $value['name'];?>">
                <h2><?php echo $value['name']; ?></h2>
               <p><?php if ($value['image'] != ''): ?>
                        <img src="<?php echo base_url('uploads/products/' . $value['image']); ?>" width="100" height="100"/>
                    <?php else: ?>
                        <img src="<?php echo base_url('images/default.jpg'); ?>" width="100" height="100"/>
                    <?php endif; ?>
                </p>
                <p>Rs: <?php echo $value['price']; ?></p>
                <p>Stock: <?php echo $value['quantity']; ?></p>
                </a> 
            </div>
        <?php endforeach; ?> 
    </div>
</div>