<section id="contact">

  <?php if (!empty($data)): ?>
    <div class="card probootstrap-animate" style="border: 0px;">
      <div class="card-body" style="padding: 0px;">
        <h4 class="title">Visi</h4>
        <div class="description">
          <?php echo (isset($data->visi)) ? $data->visi : '-' ?>
        </div>
      </div>
    </div>

    <div class="card probootstrap-animate" style="border: 0px;">
      <div class="card-body" style="padding: 0px;">
        <h4 class="title">Misi</h4>
        <div class="description">
          <?php echo (isset($data->misi)) ? $data->misi : '-' ?>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
  <?php else: ?>
  <div class="nothing-found"><div>Data tidak dapat ditemukan</div></div>
  <div class="clearfix"></div>
  <?php endif; ?>

</section>
