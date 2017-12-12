<section class="min-padding portfolio-section">
        <div class="isotope-container">
          <div class="container">
            <div class="portfolio-filter-group">
			<a href="#" data-filter="*" class="iso-button is-checked">All</a>
			<?php
				foreach($data_kategori as $value)
			{
				?>
					<a href="#"  data-filter="<?=$value->judul_kategori?>" class="iso-button"><?=$value->judul_kategori?></a>
				<?php
			}
			?>
			</div>
          </div>
          <div class="portfolio-group container remove-col-padding">
            <div class="row iso-grid">
			<?php
			foreach($data_beranda as $value)
			{
              ?>
			  <div class="grid-item portfolio-column col-lg-3 col-md-4 col-sm-6 col-xs-12 business photography">
                <div class="portfolio-item portfolio-item-2"><img src="<?=base_url('assets/gallery/foto/'.$value->foto);?>" alt="<?=$value->judul_konten?>">
                  <div class="overlay">
                    <div class="cell-vertical-wrapper">
                      <div class="cell-middle overlay-content text-center">
                        <h5 class="heading-icon-1"><?=$value->judul_konten?></h5>
                        <div class="font-serif caption"><?=$value->isi?></div>
                        <div class="group-link">
						<a href="<?=base_url('Home/detil_content/'.$value->id_konten);?>" class="icon-link"></a>
						<a href="<?=base_url('assets/gallery/foto/'.$value->foto);?>" class="zoom-link icon-outline-vector-icons-pack-67"></a></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
			  <?php
		   }
		?>
            </div>
			
          </div>
        </div>
		<script type="text/javascript">
			$grid-item.isotope-container({
				// filter element with numbers greater than 50
				filter: function() {
				// _this_ is the item element. Get text of element's .number
					var iso-button = $(this).find('.iso-button').val(judul_kategori);
				// return true to show, false to hide
				
				}
			})
		</script>
        <div class="portfolio-show-more text-center"><a href="#">SHOW MORE</a></div>
      </section>