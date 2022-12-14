 <style>
     #pagination {
         display: flex;
         justify-content: center;
     }

     .page-item {
         margin-top: 1cm;
         margin-left: 5px;
         border-radius: 5px;
         background-color: #FF7000;
         padding: 12px;
         font-size: 16px;
         color: white;
     }
 </style>
 <div id="pagination">
     <?php
        if ($current_page > 5) {
            $first_page = 1;
        ?>
         <a class="page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $first_page ?>">First</a>
     <?php
        }
        if ($current_page > 1) {
            $prev_page = $current_page - 1;
        ?>
         <a class="page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>">Prev</a>
     <?php }
        ?>
     <?php for ($num = 1; $num <= $totalPages; $num++) { ?>
         <?php if ($num != $current_page) { ?>
             <?php if ($num > $current_page - 5 && $num < $current_page + 5) { ?>
                 <a class="page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $num ?>"><?= $num ?></a>
             <?php } ?>
         <?php } else { ?>
             <strong class="current-page page-item"><?= $num ?></strong>
         <?php } ?>
     <?php } ?>
     <?php
        if ($current_page < $totalPages - 1) {
            $next_page = $current_page + 1;
        ?>
         <a class="page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $next_page ?>">Next</a>
     <?php
        }
        if ($current_page < $totalPages - 5) {
            $end_page = $totalPages;
        ?>
         <a class="page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $end_page ?>">Last</a>
     <?php
        }
        ?>
 </div>