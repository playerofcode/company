  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blog</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url('admin/welcome');?>">Home</a></li>
              <li class="breadcrumb-item active">Update Blog</li>
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
                <h3 class="card-title">Update Blog</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <?php foreach ($blog as $key):?>
              <form action="<?php echo base_url('admin/update_blog/'.$key->id);?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Blog Title</label>
                    <input type="text" class="form-control" name="title" value="<?php echo set_value('title',$key->title);?>" placeholder="Enter Blog Title">
                    <p><?php echo form_error('title'); ?></p>
                  </div>
                  
                  <div class="form-group">
                    <label for="exampleInputFile">Blog Image</label><br>
                    <center><img src="<?php if(!empty($key->image)):echo base_url($key->image);endif;?>" style="height: 100;margin:10px;border-radius:10px;box-shadow: 0 5px 10px rgba(0,0,0,0.5);"></center>
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
                    <label for="exampleInputPassword1">Blog Description</label>
                    <textarea class="form-control" placeholder="Blog Description Here..." name="description"><?php echo set_value('description',$key->description);?></textarea>
                    <p><?php echo form_error('description'); ?></p>

                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update Blog</button>
                </div>
              </form>
            <?php endforeach; ?>
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