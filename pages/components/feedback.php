<?php
?>
<section class="nike2-section">
    <div class="nike2">
        <img class="shoe2" src="/assets/images/shoe_two.png">
        <h2>WE PROVIDE YOU THE <strong>BEST</strong> QUALITY</h2>
    </div>
    <p>Our customers <strong>love</strong> our products! Read their reviews to see why they keep coming back.
         From the superior craftsmanship to the <strong>exceptional</strong> comfort, each pair of shoes is designed
          to exceed your expectations and deliver unparalleled <strong>satisfaction</strong>. Join our community of
           happy customers and <strong>experience</strong> the difference for yourself.</p>
</section>

<section class="feedback">
    <?php
    $feedbacksJson = file_get_contents('feedback.json');
    $feedbacks = json_decode($feedbacksJson, true);
    
    foreach ($feedbacks as $key => $value) {
        ?>
        <article class="feedback-client">
        <img src="<?=$value['picture']?>">
        <p>
        <?php
            for ($i=0; $i < $value['rating']; $i++) { 
                ?><i class="fa-solid fa-star"></i><?php
            }
            for ($i=$value['rating']; $i < 5; $i++) { 
               ?><i class="fa-regular fa-star"></i><?php
            }
        ?>
        </p>
        <h4><?=$value['name']?></h4>
        <p><?=$value['feedback']?></p>
        </article>
        <?php
    }
    ?>
</section>