<?php
    include_once('database.php');
    $data = $users->find();
    $array = iterator_to_array($data);
?>
<html>

<head>  
    <meta charset="UTF-8">
    <title> Session </title>
    <!-- Boxicons CDN Link -->
    <link rel="stylesheet" href="table.css">

    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet">
</head>

<body>
    <div class="session-details" id='session-user'>
        <?php
              if($data == NULL){
                echo'
                <table class="table">
                <thead>
                  <tr>
                    <th scope="col">REG NO</th>
                    <th scope="col">NAME</th>
                    <th scope="col">LOGIN TIME</th>
                    <th scope="col">TOTAL TIME SPENT (MIN)</th>
                  </tr>
                </thead>
            </div>
          </div>';
        }
        else{
          echo'
          <table class="table">
          <thead>
            <tr>
              <th scope="col">REG NO</th>
              <th scope="col">NAME</th>
              <th scope="col">LOGIN TIME</th>
              <th scope="col">EXIT TIME</th>
              <th scope="col">TOTAL TIME SPENT (MIN)</th>
            </tr>
          </thead>';
          
              foreach($array as $key){
                if($key->currentLab == 1){
                $userid = $key->_id;
                $item = $session->findOne(["entryUser" => $userid]);
                if($item != null){
                }
    
                date_default_timezone_set('Asia/Kolkata');
                $logintime = strtotime($key->createdAt->toDateTime()->format('d-m-y H:i:s')); 
                $logouttime = strtotime($key->updatedAt->toDateTime()->format('d-m-y H:i:s'));
                $updatedtime = date('d-m-y H:i', strToTime('330 minutes',$logouttime));

            echo'
            <tbody>
                <tr>
                  <th scope="row">'.$key->regNumber.'</th>
                  <td>'.$key->userName.'</td>
                  <td>'.date('H:i', strToTime('330 minutes',$logouttime)).'</td>
                  <td>'.date('H:i',time()).'</td>
                  <td>'.totaltime(strToTime($updatedtime)).'</td>
                </tr>
            </tbody>
            </div>
            </div>
        </div>
          ';
        }
    }
        echo' </table></div>  ';
        }
        function totaltime($logintime){
          date_default_timezone_set('Asia/Kolkata');
          $currentDate =  time();
          $totalSecondsDiff = abs($logintime - $currentDate);
          $totalMinutesDiff = $totalSecondsDiff/60;
          return round($totalMinutesDiff);
        }
        ?>
    </div>
</body>
</html>