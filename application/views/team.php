  <main id="main">
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Team</h2>
          <ol>
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li>Team</li>
          </ol>
        </div>

      </div>
    </section>
    <section id="team" class="team section-bg">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Our <strong>Team</strong></h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
        <div class="row">
          <?php foreach($team as $key):?>
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up">
              <div class="member-img">
                <img src="<?php echo base_url($key->image);?>" class="img-fluid" alt="">
                <div class="social">
                  <a href="<?php echo $key->twitter;?>" target="_blank"><i class="icofont-twitter"></i></a>
                  <a href="<?php echo $key->facebook; ?>" target="_blank"><i class="icofont-facebook"></i></a>
                  <a href="<?php echo $key->instagram;?>" target="_blank"><i class="icofont-instagram"></i></a>
                  <a href="<?php echo $key->linkedin;?>" target="_blank"><i class="icofont-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4><?php echo $key->name;?></h4>
                <span><?php echo $key->designation;?></span>
              </div>
            </div>
          </div>
        <?php endforeach;?>
        </div>

      </div>
    </section>
  </main>
