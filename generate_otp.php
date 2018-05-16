 <?php

  $key="4e570000-5377-11e8-a895-0200cd936042";
function send_otp($contact,$otp,$key)
{
   $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => "http://2factor.in/API/V1/$key/SMS/$contact/$otp",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET",
      CURLOPT_POSTFIELDS => "",
      CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded"
      ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
    if ($err) {
      return $err;
    } else {
      return $response;
    }
}
    
    ?>