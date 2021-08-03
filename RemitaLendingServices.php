<?php
include 'Config/Credentials.php';
include 'Constants/ApplicationUrl.php';
include 'Util/HTTPUtil.php';

class RemitaLendingServices
{

    // SETUP MANDATE
    public static function getSalaryHistory($salaryHistoryRequest, $credentials)
    {
        if (is_null($credentials)) {
            echo 'Credentials must be initialized';
            return;
        }

        $url = $credentials->url . ApplicationUrl::$salaryHistoryPath;
        $merchantId = utf8_encode($credentials->merchantId);
        $apiKey = utf8_encode($credentials->apiKey);
        $apiToken = utf8_encode($credentials->apiToken);
        $requestId = utf8_encode(round(microtime(true) * 1000));
        $hash = hash('sha512', $apiKey . $requestId . $apiToken);
        $authorization = "remitaConsumerKey=" . $apiKey . ", remitaConsumerToken=" . $hash;
        
        $headers = $headers = array(
            'Content-Type: application/json',
            'Api_Key:' . $apiKey,
            'Merchant_id:' . $merchantId,
            'Request_id:' . $requestId,
            'Authorization:' . $authorization
        );

        // POST BODY
        $phpArray = array(
            'authorisationCode' => $salaryHistoryRequest->authorisationCode,
            'phoneNumber' => $salaryHistoryRequest->phoneNumber,
            'authorisationChannel' => $salaryHistoryRequest->authorisationChannel
        );

//         echo "\n";
//         echo "headers: ", json_encode($headers);
//         echo "\n";
//         echo "phpArray: ", json_encode($phpArray);

        // POST CALL
        $result = HTTPUtil::postMethod($url, $headers, json_encode($phpArray));
        return json_decode($result);
    }
}

?>

