    <main class="csstest-5">
      <p>Testing out flexbox instead of grid</p>
      <div class="flex-test-container">
        <div class="box box1">
          <p>box 1 </p>
        </div>
        <div class="box box2">
          <p>box 2 </p>
        </div>
        <div class="box box3">
          <p>box 3 </p>
        </div>
        <div class="box box4">
          <p>box 4 </p>
        </div>
        <div class="box nested-boxes box5">
        
          <?php for ($i = 0; $i<12; $i++) {
            echo '<div class="box-within-a-box"> </div>';
          } ?>
        </div>
      </div>
    </main>
