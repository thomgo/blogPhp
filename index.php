<?php
include'data/products.php';
include'data/siteInfo.php';
include'header.php';
?>
        <!-- Add your site or application content here -->
        <main class="container">
          <h2><?php echo $site_information["sub_title"]; ?></h2>

          <div class="row my-5">

            <?php
              foreach ($products as $key => $product) {
            ?>
            <div class="col-lg-4 my-3">
              <div class="card">
                <img class="card-img-top img-fluid" src=<?php echo $product["img_path"]; ?> alt="Card image cap">
                <div class="card-block">
                  <h4 class="card-title"><?php echo $product["product_title"]; ?></h4>
                  <p class="card-text"><?php echo $product["catcher"]; ?></p>
                  <a href=<?php echo "single.php?key=" . $key; ?> class="btn backgroundDark">See more</a>
                </div>
              </div>
            </div>
            <?php
              }
            ?>

          </div>
        </main>

<?php  include'footer.php'; ?>