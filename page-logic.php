<?php

if(!isset($_GET['search'])){

  $prev = $page - 1;
  $next = $page + 1;
  if($number_of_results>$results_per_page){
?>
<?php if(isset($_GET['filter']) && $_GET['filter']!='TOTAL'){
      $filter=$_GET['filter'];
}else{
  $filter='TOTAL';
} ?>

<div class="container">
<nav aria-label="Page navigation example">
  <div class="d-flex justify-content-center">
    <div class="">
  <ul class="pagination justify-content-center mt-5">
    <?php if($page!=1){ ?>
    <li class="page-item">
      <a class="page-link"
      href="<?php echo "?page=" . $prev; ?>&filter=<?php echo $filter ?>"><</a>
    </li>
  <?php }
      if($number_of_pages<=7){
        for($i = 1; $i <= $number_of_pages; $i++ ): ?>
          <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
            <a class="page-link display-none" href="index.php?page=<?= $i; ?>&filter=<?php echo $filter ?>"> <?= $i; ?> </a>
          </li>
    <?php
        endfor;
      } elseif($page>=1 && $page<=3) {
        for($i = 1; $i <= 4; $i++ ): ?>
          <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
            <a class="page-link display-none" href="index.php?page=<?= $i; ?>&filter=<?php echo $filter ?>"> <?= $i; ?> </a>
          </li>
      <?php
        endfor;
      ?>
        <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
          <a class="page-link display-none" >...</a>
        </li>
        <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
          <a class="page-link display-none" href="index.php?page=<?= $number_of_pages; ?>&filter=<?php echo $filter ?>"> <?= $number_of_pages; ?> </a>
      </li>
    <?php } elseif($page>3 && $page<$number_of_pages-2) {
      ?>
      <li class="page-item">
        <a class="page-link display-none" href="index.php?page=1">1</a>
      </li>
      <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
        <a class="page-link display-none" >...</a>
      </li>
      <?php
        for($i = $page-1; $i <= $page+1; $i++ ): ?>
          <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
            <a class="page-link display-none" href="index.php?page=<?= $i; ?>&filter=<?php echo $filter ?>"> <?= $i; ?> </a>
          </li>
      <?php
        endfor;
      ?>
        <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
          <a class="page-link display-none" >...</a>
        </li>
      <?php
        for($i = $number_of_pages; $i <= $number_of_pages; $i++ ):
      ?>
          <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
            <a class="page-link display-none" href="index.php?page=<?= $i; ?>&filter=<?php echo $filter ?>"> <?= $i; ?> </a>
          </li>
      <?php
        endfor;
      ?>
    <?php } elseif($page>$number_of_pages-3 && $page<=$number_of_pages) {
        ?>
        <li class="page-item">
          <a class="page-link display-none" href="index.php?page=1&filter=<?php echo $filter ?>">1</a>
        </li>
        <li class="page-item">
          <a class="page-link display-none" >...</a>
        </li>
        <?php
          for($i = $number_of_pages-3; $i <= $number_of_pages; $i++ ): ?>
            <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
              <a class="page-link" href="index.php?page=<?= $i; ?>&filter=<?php echo $filter ?>"> <?= $i; ?> </a>
            </li>
        <?php
          endfor;
        }
        if($page!=$number_of_pages){
          ?>
    <li class="page-item">
      <a class="page-link"
      href="<?php echo "?page=". $next; ?>&filter=<?php echo $filter ?>">></a>
    </li>
  <?php } ?>
  </ul>
</div>
<div class="">
  <form class="mt-5" action='index.php' method="get">
    <div class="form-group search">
        <div class="input-group">
          <div class="">
            <input class="form-control project-search-input rounded" id="pageNumberInput" type="number" name="page" placeholder="#" min="1" max="<?php echo $number_of_pages ?>" required autocomplete="off" oninvalid="this.setCustomValidity('Invalid format')" oninput="this.setCustomValidity('')">
          </div>
            <div class="input-group-append  ">
                <button class="btn bg-primary text-white search-btn" type="" value="<?php echo $filter ?>"  name="filter" style="margin:0;">GO</button>
            </div>
        </div>
      </div>
  </form>
</div>
</div>
</nav>
</div>

<?php }


} else{

$search=$_GET['search'];

  $prev = $page - 1;
  $next = $page + 1;
  if($number_of_results>$results_per_page){
  ?>
  <?php if(isset($_GET['filter']) && $_GET['filter']!='TOTAL'){
        $filter=$_GET['filter'];
  }else{
    $filter='TOTAL';
  } ?>
  <div class="container">
  <nav aria-label="Page navigation example">
    <div class="d-flex justify-content-center">
      <div class="">
    <ul class="pagination justify-content-center mt-5">

    <?php if($page!=1){ ?>
    <li class="page-item">
      <a class="page-link"

      href="<?php echo "?page=" . $prev; ?>&search=<?php echo $search ?>&filter=<?php echo $filter ?>"><</a>

    </li>
  <?php }
      if($number_of_pages<=7){
        for($i = 1; $i <= $number_of_pages; $i++ ): ?>
          <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
            <a class="page-link display-none" href="index.php?page=<?= $i; ?>&search=<?php echo $search ?>&filter=<?php echo $filter ?>"> <?= $i; ?> </a>
          </li>
    <?php
        endfor;
      } elseif($page>=1 && $page<=3) {
        for($i = 1; $i <= 4; $i++ ): ?>
          <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
            <a class="page-link display-none" href="index.php?page=<?= $i; ?>&search=<?php echo $search ?>&filter=<?php echo $filter ?>"> <?= $i; ?> </a>
          </li>
      <?php
        endfor;
      ?>
        <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
          <a class="page-link display-none" >...</a>
        </li>
        <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
          <a class="page-link display-none" href="index.php?page=<?= $number_of_pages; ?>&search=<?php echo $search ?>&filter=<?php echo $filter ?>"> <?= $number_of_pages; ?> </a>
      </li>
    <?php } elseif($page>3 && $page<$number_of_pages-2) {
      ?>
      <li class="page-item">
        <a class="page-link display-none" href="index.php?page=1&search=<?php echo $search ?>&filter=<?php echo $filter ?>">1</a>
      </li>
      <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
        <a class="page-link" >...</a>
      </li>
      <?php
        for($i = $page-1; $i <= $page+1; $i++ ): ?>
          <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
            <a class="page-link display-none" href="index.php?page=<?= $i; ?>&search=<?php echo $search ?>&filter=<?php echo $filter ?>"> <?= $i; ?> </a>
          </li>
      <?php
        endfor;
      ?>
        <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
          <a class="page-link display-none" >...</a>
        </li>
      <?php
        for($i = $number_of_pages; $i <= $number_of_pages; $i++ ):
      ?>
          <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
            <a class="page-link display-none" href="index.php?page=<?= $i; ?>&search=<?php echo $search ?>&filter=<?php echo $filter ?>"> <?= $i; ?> </a>
          </li>
      <?php
        endfor;
      ?>
    <?php } elseif($page>$number_of_pages-3 && $page<=$number_of_pages) {
        ?>
        <li class="page-item">
          <a class="page-link display-none" href="index.php?page=1&search=<?php echo $search ?>&filter=<?php echo $filter ?>">1</a>
        </li>
        <li class="page-item">
          <a class="page-link display-none" >...</a>
        </li>
        <?php
          for($i = $number_of_pages-3; $i <= $number_of_pages; $i++ ): ?>
            <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
              <a class="page-link display-none" href="index.php?page=<?= $i; ?>&search=<?php echo $search ?>&filter=<?php echo $filter ?>"> <?= $i; ?> </a>
            </li>
        <?php
          endfor;
        }
        if($page!=$number_of_pages){
        ?>
        <li class="page-item">
        <a class="page-link"
        href="<?php echo "?page=". $next; ?>&search=<?php echo $search ?>&filter=<?php echo $filter ?>">></a>
        </li>
        <?php } ?>
  </ul>
</div>
<div class="">
  <form class="mt-5" action='index.php' method="get">
    <div class="form-group search">
        <div class="input-group">
          <div class="">
            <input class="form-control project-search-input rounded" id="pageNumberInput" type="number" name="page" placeholder="#" min="1" max="<?php echo $number_of_pages ?>" required autocomplete="off" oninvalid="this.setCustomValidity('Invalid format')" oninput="this.setCustomValidity('')">
          </div>
            <div class="input-group-append  ">
                <button class="btn bg-primary text-white search-btn" type="" value="<?php echo $search . $filter ?>"  name="search" style="margin:0;">GO</button>
            </div>
        </div>
      </div>
  </form>
</div>
</div>
  </nav>

</div>

  <?php }
}
?>
