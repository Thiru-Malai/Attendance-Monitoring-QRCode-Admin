<?php
    require './vendor/autoload.php';
    include_once('database.php');
    session_start();
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
                // $tokenarray = iterator_to_array($key->tokens);
                // $lastelement = $tokenarray[sizeof($tokenarray) - 1];
                // $exitid = $lastelement->_id;
                $exittime = $session->find();
                $userid = $key->_id;
                $item = $session->findOne(["entryUser" => $userid]);
                if($item != null){
                }
                $exitarray = iterator_to_array($exittime);
                //print_r($exitid);
                // foreach($exitarray as $val){
                //   if((string)$val->_id == (string)$lastelement->_id){
                //     print_r($val->_id);
                //   }
                

                $logintime = strtotime($key->createdAt->toDateTime()->format('H:i:s')); 
                $logouttime = strtotime($key->updatedAt->toDateTime()->format('H:i:s'));
            echo'
            <tbody>
                <tr>
                  <th scope="row">'.$key->regNumber.'</th>
                  <td>'.$key->userName.'</td>
                  <td>'.$key->updatedAt->toDateTime()->format('H:i').'</td>
                  <td>'.date('H:i',time()).'</td>
                  <td>'.totaltime($logintime, $logouttime).'</td>
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
        function totaltime($logintime, $logouttime){
          $in = date($logintime);
          $out = date($logouttime);
          $login = date('H:i:s', $in);
          $logout = date('H:i:s ',$out);
          $currentDate =  time();
          $Date1 = date("H:i:s", strtotime($login));
          $Date2 = date("H:i:s", strtotime($logout));
          // $datetime1 = new DateTime($Date1, new DateTimeZone('UTC'));
          // $datetime2 = new DateTime($Date2, new DateTimeZone('UTC'));
          // $datetime1->setTimezone(new DateTimeZone('IST'));
          // $datetime2->setTimezone(new DateTimeZone('IST'));
          // $interval = $datetime1->diff($datetime2); 
          $totalSecondsDiff = abs($logouttime - $currentDate);
          $totalMinutesDiff = $totalSecondsDiff/60;
          return round($totalMinutesDiff);
        }
        ?>
    </div>
</body>



</html>