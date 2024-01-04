<?php include_once('header.php') ?>

<div class="probootstrap-page-wrapper">
  <!-- Fixed navbar -->
  
  <div class="probootstrap-header-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 probootstrap-top-quick-contact-info text-right">
          <?php if (!empty($app->contact->address)): ?>
            <span style="height: 20px; overflow: hidden;"><i class="icon-location2"></i><?php echo $app->contact->address ?></span>
          <?php endif; ?>
          <?php if (!empty($app->contact->phone)): ?>
            <span><i class="icon-phone2"></i><?php echo $app->contact->phone ?></span>
          <?php endif; ?>
          <?php if (!empty($app->contact->email)): ?>
            <span><i class="icon-mail"></i><?php echo $app->contact->email ?></span>
          <?php endif; ?>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-3 probootstrap-top-social">
          <ul>
            <?php if (!empty($app->contact->twitter)): ?>
            <li><a href="http://twitter.com/<?php echo $app->contact->twitter ?>" target="_blank"><i class="icon-twitter"></i></a></li>
            <?php endif; ?>
            <?php if (!empty($app->contact->facebook)): ?>
            <li><a href="http://facebook.com/<?php echo $app->contact->facebook ?>" target="_blank"><i class="icon-facebook2"></i></a></li>
            <?php endif; ?>
            <?php if (!empty($app->contact->instagram)): ?>
            <li><a href="http://instagram.com/<?php echo $app->contact->instagram ?>" target="_blank"><i class="icon-instagram2"></i></a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbar navbar-default probootstrap-navbar">
    <div class="container">
      <div class="navbar-header">
        <div class="btn-more js-btn-more visible-xs">
          <a href="#"><i class="icon-dots-three-vertical "></i></a>
        </div>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <strong>
          <a style="padding-top: 0!important;padding-bottom: 0!important;font-size: 30px;text-transform: uppercase;top: 24px;position: relative;-webkit-transition: .2s all;transition: .2s all;" href="<?php echo base_url() ?>">
          <img src="<?php echo base_url($app->app_logo) ?>" alt="logo" width="100">
          <!-- <?php echo (isset($app->app_name)) ? $app->app_name : '' ?></a> -->
        </strong>
      </div>

      <div id="navbar-collapse" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">

          <?php
            // Generate menu: 2 level
            $menu = '';

foreach ($menus as $item) {
    $class1 = (count($item->childs) > 0) ? 'dropdown' : '';
    $class2 = ($this->router->fetch_class() == $item->link) ? 'active' : '';
    $isDropdown = (count($item->childs) > 0) ? 'data-toggle="dropdown" class="dropdown-toggle"' : '';
    $link = ($item->link_tobase == 1) ? base_url($item->link) : $item->link;
    $newTab = ($item->is_newtab == 1) ? 'target="_blank"' : '';

    $menu .= '<li class="' . $class1 . ' ' . $class2 . '">';
    $menu .= '<a href="' . $link . '" ' . $newTab . ' ' . $isDropdown . '>';
    $menu .= $item->name;
    $menu .= '</a>';
    if (count($item->childs) > 0) {
        $menu .= '<ul class="dropdown-menu">';
        foreach ($item->childs as $child) {
            $class1 = (count($child->childs) > 0) ? 'dropdown' : '';
            $class2 = ($this->router->fetch_class() == $child->link) ? 'active' : '';
            $link = ($child->link_tobase == 1) ? base_url($child->link) : $item->link;
            $newTab = ($item->is_newtab == 1) ? 'target="_blank"' : '';

            $menu .= '<li class="' . $class1 . ' ' . $class2 . '">';
            $menu .= '<a href="' . $link . '" ' . $newTab . '>';
            $menu .= $child->name;
            $menu .= '</a>';
            $menu .= '</li>';
        };
        $menu .= '</ul>';
    };
    $menu .= '</li>';
};

echo $menu;
?>

        </ul>
      </div>
    </div>
  </nav>

  <?php if (in_array($this->router->fetch_class(), ['dashboard'])): ?>
  <section class="flexslider">
    <ul class="slides">
      <li style="background-image: url('<?php echo base_url($data->background_image) ?>')" class="overlay">
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="probootstrap-slider-text text-center">
                <h1 class="probootstrap-heading probootstrap-animate"><?php echo $data->intro ?></h1>
              </div>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </section>

  <section class="probootstrap-section probootstrap-section-colored">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-left section-heading probootstrap-animate">
          <h2>Selamat Datang di <strong><?php echo $app->app_name ?></strong></h2>
        </div>
      </div>
    </div>
  </section>

  <section class="probootstrap-section" style="padding-bottom: 20px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="probootstrap-flex-block">
            <div class="probootstrap-text probootstrap-animate">
              <h3>About Us</h3>
              <p><?php echo $app->app_description ?></p>
              <p><a href="<?php echo base_url('about') ?>" class="btn btn-primary">Learn More</a></p>
            </div>
            <div class="probootstrap-image probootstrap-animate" style="background-image: url('<?php echo $data->intro_image ?>')"></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>
  
  <?php if (!in_array($this->router->fetch_class(), ['dashboard', 'page'])): ?>
  <section class="probootstrap-section probootstrap-section-colored">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-left section-heading probootstrap-animate mb0">
          <h1 class="mb0"><?php echo (!empty($app->active_module->name) ? $app->active_module->name : '-') ?></h1>
          <?php if (!empty($app->active_module->description)): ?>
          <p style="margin-bottom: 0px;"><?php echo $app->active_module->description ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </section>
  <?php endif; ?>

  <section class="probootstrap-section probootstrap-bg-white">
    <div class="container">
      {content}
    </div>
  </section>
  
  <section class="probootstrap-cta">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="probootstrap-animate" data-animate-effect="fadeInRight">Kontak kami untuk informasi lebih lanjut</h2>
          <a href="<?php echo base_url('contact') ?>" role="button" class="btn btn-primary btn-lg btn-ghost probootstrap-animate" data-animate-effect="fadeInLeft">Kontak</a>
        </div>
      </div>
    </div>
  </section>

</div>
<!-- END wrapper -->

<!-- Photoswipe Modal -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="pswp__bg"></div>
  <div class="pswp__scroll-wrap">

      <div class="pswp__container">
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
          <div class="pswp__item"></div>
      </div>

      <div class="pswp__ui pswp__ui--hidden">
          <div class="pswp__top-bar">
              <div class="pswp__counter"></div>
              <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>
              <button class="pswp__button pswp__button--share" title="Share"></button>
              <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>
              <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>
              <div class="pswp__preloader">
                  <div class="pswp__preloader__icn">
                    <div class="pswp__preloader__cut">
                      <div class="pswp__preloader__donut"></div>
                    </div>
                  </div>
              </div>
          </div>
          <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
              <div class="pswp__share-tooltip"></div> 
          </div>
          <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
          </button>
          <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
          </button>
          <div class="pswp__caption">
              <div class="pswp__caption__center"></div>
          </div>
      </div>
  </div>
</div>

<?php include_once('footer.php') ?>
