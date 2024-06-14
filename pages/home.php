<main>
    <article id="main-wrapper">
      <div class="shoe">
        <p>
          SHOE THE
        </p>
        <p>RIGHT <span class="one">ONE</span>.
        </p>
        <a href="?c=products"><button class="btn btn-primary btn-sm">See our store</button></a>
      </div>
      <div class="nike">
      <p class="container2">
        <img class="shoe1" src="shoe_one.png" >
       NIKE
      </p>
      </div>
    </article>
  </main>
<section class="OurProduct">
  
  <p class="lproducts">
    <span class="our">Our</span>
    Last Products
  </p>
  <div class="container1">
    <?php

    include("pages/lastproducts.php");

    ?>
  </div>
  <div class="see-more-div">
    <a href="?c=products">
      <i class="fas fa-arrow-right"></i>
       <strong>See more</strong> 
      <i class="fas fa-arrow-left"></i>
    </a>
  </div>
</section>
<?php
    include("pages/components/feedback.php");
?>