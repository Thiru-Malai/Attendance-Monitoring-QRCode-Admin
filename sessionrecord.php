<?php
    include_once('database.php');
    $data = $users->find();
    $sessionhistory1 = $session->find();
    $array = iterator_to_array($data);
    $sessionhistoryarray = iterator_to_array($sessionhistory1);
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
            $regNumber = "";
            $name = ""; 
              foreach($sessionhistoryarray as $key){
                if($key->recordStatus == 1){
                $item = $users->findOne(["_id" => ($key->entryUser)]);

                if($item != null){
                    $item = $users->find(["_id" => $key->entryUser]);
                    foreach($item as $val){
                        $regNumber = $val->regNumber;
                        $name = $val->userName;
                    }   

                
                    date_default_timezone_set('Asia/Kolkata');

                $logintime = strtotime($key->entryTime->toDateTime()->format('d-m-y H:i:s')); 
                $logouttime = strtotime($key->exitTime->toDateTime()->format('d-m-y H:i:s'));

            echo'
            <tbody>
                <tr>
                  <th scope="row">'.$regNumber.'</th>
                  <td>'.$name.'</td>
                  <td>'.date('H:i', strToTime('330 minutes',$logintime)).'</td>
                  <td>'.date('H:i', strToTime('330 minutes',$logouttime)).'</td>
                  <td>'.totaltime($logintime, $logouttime).'</td>
                </tr>
            </tbody>
            </div>
            </div>
        </div>
          ';
        }   
        }
        }
        echo' </table></div>  ';
        }
        function totaltime($logintime, $logouttime){
          $totalSecondsDiff = abs($logintime - $logouttime);
          $totalMinutesDiff = $totalSecondsDiff/60;
          return round($totalMinutesDiff);
        }
        ?>
    </div>

</body>
</html>