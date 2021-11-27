<!--Main layout-->
<main class="mt-5">
  <div class="container">
    <hr class="my-5" />

    <!--Section: Content-->
    <section class="text-center">
      <h3 class="mb-5"><strong>Categories</strong></h3>

      <div class="row">
        <div class="col-lg-4 col-md-12 mb-4">
          <div class="card">
            <div
              class="bg-image hover-overlay ripple"
              data-mdb-ripple-color="light"
            >
              <img
                data-src="https://bn1304files.storage.live.com/y4mNeEUL6iPNhKS4br8kVEKNngvKxXqPRxyFel1UfYnoQXJgW7MljbNQL3fyQU8KuDb6SL3meuEJHiJ9ZWirru1BvPs7czc0-Yq7uenikX_CmQHVMqSBnkQkGmz0w7veLgozj5_ZOyn0lyGrnubwvv-jdT-TOSqPzKVQQNT7rZIPaSFhDrOhELFU5OxjIzaEmNM?width=455&height=303&cropmode=none"
                class="w-100 img-fluid lazy"
              />
              <a href="./products">
                <div
                  class="mask"
                  style="background-color: rgba(0, 0, 0, 0.7)"
                >
                  <div class="d-flex justify-content-center align-items-center h-100">
                    <h3 class="text-white mb-0">EARRING</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-12 mb-4">
          <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img
                data-src="https://bn1304files.storage.live.com/y4mPCCMLDkVObu69VehG9IoLgZPK3JJCFKt9_zHdrIOqf7COQAS6Z1yB3K4_Z2TuclvWG7VHeJZzw_sJsBlzwkFNBjRu908GXaem73nhFijZ2au6aCaI1IApNn4-I7E-Cuf0LXjtw_eI3hgoDNuTUUHqr5NopBPva-Ik8-MRjqx6w9O1XAS9Rkpd3wdJCCGvQuR?width=455&height=303&cropmode=none"
                class="w-100 img-fluid lazy"
              />
              <a href="./products">
                <div
                  class="mask"
                  style="background-color: rgba(0, 0, 0, 0.7)"
                >
                  <div class="d-flex justify-content-center align-items-center h-100">
                    <h3 class="text-white mb-0">NECKLET</h3>
                  </div>
                </div>
              </a>
            </div>
          </div>
            
        </div>

        <div class="col-lg-4 col-md-12 mb-4">
          <div class="card">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img
                data-src="https://bn1304files.storage.live.com/y4mPEa33eBUsRA0N_vc76lyEFqc0QRA8flJ6ocbCIOgbAgvx1A1B2FFduQJjg8in9ubP4hwUNkVX5cH2HDE8Gpatu280EDkmMGLS-PkgY9wqNpeOd-DqOirLae-k6gPBfTtxdOQMJd75T52dMQlMNv4XN1cTs9E1Ero4oTJW0jZQE2Q8P8gRVwESPUgNd-56XcV?width=455&height=303&cropmode=none"
                class="w-100 img-fluid lazy"
              />
              <a href="./products">
                <div
                  class="mask"
                  style="background-color: rgba(0, 0, 0, 0.7)"
                >
                <div class="d-flex justify-content-center align-items-center h-100">
                  <h3 class="text-white mb-0">BRACELET</h3>
                  </div>
                </div>
              </a>
            </div>            
          </div>   
        </div>
      </div>
    </section>
    <!--Section: Content-->

    <hr class="my-5" />
    <!--Section: Content-->
    <section class="text-center">
      <h3 class="mb-5"><strong>This week's highlight</strong></h3>
      <?php 
        if (isset( $data["featuredProduct"] ) ){
          $featuredProduct = json_decode($data['featuredProduct'], true)[0];
          echo '<div class="d-lg-block offset-lg-1 col-lg-10 mb-4">';
          echo '<div class="bg-image" style="background-image: url(\''. $featuredProduct['image'] .'\');height: 400px;">';
          echo '<div class="mask" style="background-color: rgba(0, 0, 0, 0.7)">';
          echo '  <div class="d-flex justify-content-center align-items-center h-100">';
          echo '    <div class="text-white text-center p-5">';
          echo '      <h4>'.$featuredProduct["name"].'</h4>';
          echo '      <h5>'.$featuredProduct["price"].' $</h5>';
          echo '      <a class="btn btn-outline-light btn-lg m-2" href="./products/product_detail/'.$featuredProduct['id'].'" role="button">Learn more</a>';
          echo '    </div>';
          echo '  </div>';
          echo '</div>';
          echo '</div>';
          echo '</div>';
        }
      ?>
    </section>
    <!--Section: Content-->

  </div>
</main>
<!--Main layout-->
<script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@17.5.0/dist/lazyload.min.js"></script>
<script src="./public/js/home.js"></script>
