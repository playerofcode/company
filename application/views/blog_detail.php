  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog</h2>
          <ol>
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li>Blog</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">
            <?php foreach ($blog as $key): ?>
            <article class="entry entry-single" data-aos="fade-up">

              <div class="entry-img">
                <img src="<?php echo base_url($key->image);?>" alt="" class="img-fluid" width="100%">
              </div>

              <h2 class="entry-title">
                <a href="javascript:void(0);"><?php echo $key->title;?></a>
              </h2>
              <p style="text-align: justify;"><?php echo $key->description; ?></p>
              

          

           

            </article><!-- End blog entry -->
            <?php endforeach ?>
          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar" data-aos="fade-left">
              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                <?php foreach($recent_blog as $key):?>
                <div class="post-item clearfix">
                  <img src="<?php echo base_url($key->image);?>" alt="">
                  <h4><a href="<?php echo base_url('home/blog_detail/'.$key->id); ?>"><?php echo $key->title; ?></a></h4>
                  <time datetime="2020-01-01"><?php echo date("M d,Y", strtotime($key->created_at));?></time>
                </div>
                <?php endforeach;?>

              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>

              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->