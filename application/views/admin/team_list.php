  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Team Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/welcome');?>">Home</a></li>
              <li class="breadcrumb-item active">Team</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <?php if($this->session->flashdata('msg')): ?>
                <div class="card-header">
              <div class="alert alert-warning text-center"><?php echo $this->session->flashdata('msg');?></div>
              </div>
               <?php endif;?>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Designation</th>
                    <th>Twitter</th>
                    <th>Facebook</th>
                    <th>Instagram</th>
                    <th>LinkedIn</th>
                    <th>Update</th>
                    <th>Delete</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                  $i=1;
                  foreach ($team as $key): 
                  ?>
                  <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $key->name; ?></td>
                    <td><img src="<?php echo base_url($key->image); ?>" style="height:100px;width:100px;"> </td>
                    <td><?php echo $key->designation; ?></td>
                    <td><p class="text-justify"><a href="<?php echo $key->twitter; ?></"><?php echo $key->twitter; ?></a></p></td>
                    <td><p class="text-justify"><a href="<?php echo $key->facebook; ?>"><?php echo $key->facebook; ?></a></p></td>
                    <td><p class="text-justify"><a href="<?php echo $key->instagram; ?>"><?php echo $key->instagram; ?></a></p></td>
                    <td><p class="text-justify"><a href="<?php echo $key->linkedin; ?>"><?php echo $key->linkedin; ?></a></p></td>
                    <td><a href="<?php echo base_url('admin/edit_team/'.$key->id);?>">Edit</a></td>
                    <td><a onclick="return confirm('Are you sure want to delete?');" href="<?php echo base_url('admin/delete_team/'.$key->id);?>">Delete</a></td>
                  </tr>
                  <?php $i++;endforeach; ?>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->