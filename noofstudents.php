<?php
    include_once('database.php');
    $data = $users->find();
    $sessionhistory = $session->find();
    $array = iterator_to_array($data);
    $sessionhistoryarray = iterator_to_array($sessionhistory);?>

<html>
<div class="number">
    <?php $count = 0;
    foreach($sessionhistoryarray as $key){
        if($key->recordStatus == 1){
            $item = $users->findOne(["_id" => ($key->entryUser)]);

        if($item != null){
            $item = $users->find(["_id" => $key->entryUser]);
            foreach($item as $val){
                $count++;
        }
        }  
        }
    }
       echo $count;
  ?></div>
</html>