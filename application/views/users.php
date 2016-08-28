<div class="container">
    <div class="row" style=" margin-top: 20px;">   
        <div class="col-md-12">
            <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Added on</th>
                        <th>User Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Added on</th>
                        <th>User Type</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>

                    <?php foreach ($users as $value): ?>
                        <tr>
                            <td><?php echo $value['id']; ?></td>
                            <td><?php echo $value['fname'].' '.$value['lname']; ?></td>
                            <td><?php echo $value['email']; ?></td>
                            <td><?php echo $value['mobile']; ?></td>
                            <td><?php echo $value['added_on']; ?></td>
                            <td><?php echo $value['role'] ==1 ? 'customer':'Admin'; ?></td>
                            <td><a href="<?php echo base_url('home/editproduct/'.$value['id']);?>" title="Edit Product"/>Edit </a> ||<a href="<?php echo base_url('home/deleteproduct/'.$value['id']);?>" title="Delete Product"/> Delete </a></td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>
