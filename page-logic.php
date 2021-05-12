<?php
  $prev = $page - 1;
  $next = $page + 1;
  if($number_of_results>$results_per_page){
?>
<nav aria-label="Page navigation example mt-5">
  <ul class="pagination justify-content-center">
    <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
      <a class="page-link"
      href="<?php if($page <= 1){ echo '#'; } else { echo "?page=" . $prev; } ?>">Previous</a>
    </li>

    <?php
      if($number_of_pages<=7){
        for($i = 1; $i <= $number_of_pages; $i++ ): ?>
          <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
            <a class="page-link" href="index.php?page=<?= $i; ?>"> <?= $i; ?> </a>
          </li>
    <?php
        endfor;
      } elseif($page>=1 && $page<=3) {
        for($i = 1; $i <= 4; $i++ ): ?>
          <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
            <a class="page-link" href="index.php?page=<?= $i; ?>"> <?= $i; ?> </a>
          </li>
      <?php
        endfor;
      ?>
        <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
          <a class="page-link" >...</a>
        </li>
        <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
          <a class="page-link" href="index.php?page=<?= $number_of_pages; ?>"> <?= $number_of_pages; ?> </a>
      </li>
    <?php } elseif($page>3 && $page<$number_of_pages-2) {
      ?>
      <li class="page-item">
        <a class="page-link" href="index.php?page=1">1</a>
      </li>
      <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
        <a class="page-link" >...</a>
      </li>
      <?php
        for($i = $page-1; $i <= $page+1; $i++ ): ?>
          <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
            <a class="page-link" href="index.php?page=<?= $i; ?>"> <?= $i; ?> </a>
          </li>
      <?php
        endfor;
      ?>
        <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
          <a class="page-link" >...</a>
        </li>
      <?php
        for($i = $number_of_pages; $i <= $number_of_pages; $i++ ):
      ?>
          <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
            <a class="page-link" href="index.php?page=<?= $i; ?>"> <?= $i; ?> </a>
          </li>
      <?php
        endfor;
      ?>
    <?php } elseif($page>$number_of_pages-3 && $page<=$number_of_pages) {
        ?>
        <li class="page-item">
          <a class="page-link" href="index.php?page=1">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" >...</a>
        </li>
        <?php
          for($i = $number_of_pages-3; $i <= $number_of_pages; $i++ ): ?>
            <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
              <a class="page-link" href="index.php?page=<?= $i; ?>"> <?= $i; ?> </a>
            </li>
        <?php
          endfor;
        }
          ?>

    <li class="page-item <?php if($page >= $number_of_pages) { echo 'disabled'; } ?>">
      <a class="page-link"
      href="<?php if($page >= $number_of_pages){ echo '#'; } else {echo "?page=". $next; } ?>">Next</a>
    </li>
  </ul>
</nav>
<?php } ?>
