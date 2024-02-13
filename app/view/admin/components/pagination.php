<style>
  .pagination {
    display: flex;
    justify-content: center;
    gap: 5px;
  }

  .move-page {
    display: flex;
    align-items: center;
    justify-content: center;
  }


</style>
<nav aria-label="Page navigation example">
  <ul class="pagination">

    <?php 
    $current_url = $_SERVER['PHP_SELF'];

    $page_index = !empty($_GET['page']) ? $_GET['page'] : 0;

    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

     // Đảm bảo trang hiện tại không vượt quá số trang tổng cộng
    $current_page = min($total_pages, max(1, $current_page));
    if(!empty($_GET['category_id'])){
      $find_follow='&category_id='.$_GET['category_id'];
    }else if(!empty($_GET['search'])){
      $find_follow='&search='.$_GET['search'];
    }else{
      $find_follow="";
    }
    
    if(!empty($total_pages)){
      if ($page_index > 1) {
        echo '<li class="page-item">
                <a class="page-link move-page" href="'.$current_url.'?page=' . ($current_page - 1) . $find_follow. '" aria-label="Previous">
                  <ion-icon name="caret-back-outline"></ion-icon>
                </a>
             </li>';
      }
      for ($i = max(1, $current_page - 2); $i <= min($current_page + 2, $total_pages); $i++) {
        echo '  <li  class="page-item ' . (($page_index == $i) ? 'active' : '') . '"><a class="page-link" href="' . $current_url . '?page=' . $i .$find_follow.'">' . $i . '</a></li>';
      } 
      if($page_index <$total_pages){
        echo '<li class="page-item">
                <a class="page-link move-page" href="'.$current_url.'?page=' . ($current_page + 1) . $find_follow.'" aria-label="Next">
                  <ion-icon name="caret-forward-outline"></ion-icon>
                </a>
              </li>';
      }
    }
    ?>  
  </ul>
</nav>