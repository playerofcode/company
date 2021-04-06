  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Team </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/welcome');?>">Home</a></li>
              <li class="breadcrumb-item active">Update Team</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
             <?php if($this->session->flashdata('msg')): ?>
        <div class="alert alert-warning text-center"><?php echo $this->session->flashdata('msg');?></div>
        <?php endif;?>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Team</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php foreach ($team as $key): ?>  
              <form action="<?php echo base_url('admin/update_team/'.$key->id);?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo set_value('name',$key->name);?>" placeholder="Enter Name">
                    <p><?php echo form_error('name'); ?></p>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Image</label><br>
                    <center><img src="<?php if(!empty($key->image)):echo base_url($key->image);endif;?>" style="height: 100px;margin:10px;border-radius:10px;box-shadow: 0 5px 10px rgba(0,0,0,0.5);"></center>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                      <p><?php if(isset($image)){echo $image;} ?></p>
                  </div>
                   <div class="form-group">
                    <label for="exampleInputEmail1">Designation</label>
                    <input type="text" class="form-control" name="designation" value="<?php echo set_value('designation',$key->designation);?>" placeholder="Enter Designation">
                    <p><?php echo form_error('designation'); ?></p>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Twitter Link</label>
                    <input type="url" class="form-control" name="twitter" value="<?php echo set_value('twitter',$key->twitter);?>" placeholder="Enter Designation">
                    <p><?php echo form_error('twitter'); ?></p>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Facebook Link</label>
                    <input type="url" class="form-control" name="facebook" value="<?php echo set_value('facebook',$key->facebook);?>" placeholder="Enter Designation">
                    <p><?php echo form_error('facebook'); ?></p>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Instagram Link</label>
                    <input type="url" class="form-control" name="instagram" value="<?php echo set_value('instagram',$key->instagram);?>" placeholder="Enter Designation">
                    <p><?php echo form_error('instagram'); ?></p>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">LinkedIn Link</label>
                    <input type="url" class="form-control" name="linkedin" value="<?php echo set_value('linkedin',$key->linkedin);?>" placeholder="Enter Designation">
                    <p><?php echo form_error('linkedin'); ?></p>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Member</button>
                </div>
              </form>
               <?php endforeach ?>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (left) -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->