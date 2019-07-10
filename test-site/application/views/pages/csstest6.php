    <main class="csstest-6">
      <p>Testing out grid template areas</p>
      <div class="grid-test-container">
        <div class="box box1">
          <p>header </p>
        </div>
        <div class="box-main">
          <div class="box box2">
            <p>main1 </p>
          </div>
          <div class="box box3">
            <p>main2 </p>
          </div>
          <div class="box box4">
            <p>main3  </p>
          </div>
          <div class="box box5">
            <p>main4  </p>
          </div>
        </div>
        <div class="box nested-boxes box6">
          <?php for ($i = 0; $i<12; $i++) {
            echo '<div class="box-within-a-box"> </div>';
          } ?>
          <p>footer</p>
        </div>
      </div>
    </main>