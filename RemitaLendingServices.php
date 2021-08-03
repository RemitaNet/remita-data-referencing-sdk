<?php
include 'Config/Credentials.php';
include 'Constants/ApplicationUrl.php';
include 'Util/HTTPUtil.php';

class RemitaLendingServices
{

    // SALARY HISTORY
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

        // echo "\n";
        // echo "headers: ", json_encode($headers);
        // echo "\n";
        // echo "phpArray: ", json_encode($phpArray);

        // POST CALL
        $result = HTTPUtil::postMethod($url, $headers, json_encode($phpArray));
        return json_decode($result);
    }

    // LOAN DISBURSEMENT NOTIFICATION
    public static function loanDisbursement($loanDisbursementRequest, $credentials)
    {
        if (is_null($credentials)) {
            echo 'Credentials must be initialized';
            return;
        }

        $url = $credentials->url . ApplicationUrl::$loanDisbursementNotificationPath;
        $merchantId = utf8_encode($credentials->merchantId);
        $apiKey = utf8_encode($credentials->apiKey);
        $apiToken = utf8_encode($credentials->apiToken);
        $requestId = utf8_encode(round(microtime(true) * 1000));
        $hash = hash('sha512', $apiKey . $requestId . $apiToken);
        $authorization = "remitaConsumerKey=" . $apiKey . ", remitaConsumerToken=" . $hash;

        $headers = $headers = array(
            'Content-Type: application/json',
            'API_KEY:' . $apiKey,
            'MERCHANT_ID:' . $merchantId,
            'REQUEST_ID:' . $requestId,
            'AUTHORIZATION:' . $authorization
        );

        // POST BODY
        $phpArray = array(
            'customerId' => $loanDisbursementRequest->customerId,
            'authorisationCode' => $loanDisbursementRequest->authorisationCode,
            'authorisationChannel' => $loanDisbursementRequest->authorisationChannel,
            'phoneNumber' => $loanDisbursementRequest->phoneNumber,
            'accountNumber' => $loanDisbursementRequest->accountNumber,
            'currency' => $loanDisbursementRequest->currency,
            'loanAmount' => $loanDisbursementRequest->loanAmount,
            'collectionAmount' => $loanDisbursementRequest->collectionAmount,
            'dateOfDisbursement' => $loanDisbursementRequest->dateOfDisbursement,
            'dateOfCollection' => $loanDisbursementRequest->dateOfCollection,
            'totalCollectionAmount' => $loanDisbursementRequest->totalCollectionAmount,
            'numberOfRepayments' => $loanDisbursementRequest->numberOfRepayments,
            'bankCode' => $loanDisbursementRequest->bankCode
        );

        // echo "\n";
        // echo "headers: ", json_encode($headers);
        // echo "\n";
        // echo "phpArray: ", json_encode($phpArray);

        // POST CALL
        $result = HTTPUtil::postMethod($url, $headers, json_encode($phpArray));
        return json_decode($result);
    }

    // STOP LOAN COLLECTION
    public static function stopLoanCollection($stopLoanCollectionRequest, $credentials)
    {
        if (is_null($credentials)) {
            echo 'Credentials must be initialized';
            return;
        }

        $url = $credentials->url . ApplicationUrl::$stopLoanCollectionPath;
        $merchantId = utf8_encode($credentials->merchantId);
        $apiKey = utf8_encode($credentials->apiKey);
        $apiToken = utf8_encode($credentials->apiToken);
        $requestId = utf8_encode(round(microtime(true) * 1000));
        $hash = hash('sha512', $apiKey . $requestId . $apiToken);
        $authorization = "remitaConsumerKey=" . $apiKey . ", remitaConsumerToken=" . $hash;

        $headers = $headers = array(
            'Content-Type: application/json',
            'API_KEY:' . $apiKey,
            'MERCHANT_ID:' . $merchantId,
            'REQUEST_ID:' . $requestId,
            'AUTHORIZATION:' . $authorization
        );

        // POST BODY
        $phpArray = array(
            'authorisationCode' => $stopLoanCollectionRequest->authorisationCode,
            'customerId' => $stopLoanCollectionRequest->customerId,
            'mandateReference' => $stopLoanCollectionRequest->mandateReference
        );

        // echo "\n";
        // echo "headers: ", json_encode($headers);
        // echo "\n";
        // echo "phpArray: ", json_encode($phpArray);

        // POST CALL
        $result = HTTPUtil::postMethod($url, $headers, json_encode($phpArray));
        return json_decode($result);
    }

    // MANDATE PAYMENT HISTORY
    public static function mandatePaymentHistory($mandatePaymentHistoryRequest, $credentials)
    {
        if (is_null($credentials)) {
            echo 'Credentials must be initialized';
            return;
        }

        $url = $credentials->url . ApplicationUrl::$paymentHistoryPath;
        $merchantId = utf8_encode($credentials->merchantId);
        $apiKey = utf8_encode($credentials->apiKey);
        $apiToken = utf8_encode($credentials->apiToken);
        $requestId = utf8_encode(round(microtime(true) * 1000));
        $hash = hash('sha512', $apiKey . $requestId . $apiToken);
        $authorization = "remitaConsumerKey=" . $apiKey . ", remitaConsumerToken=" . $hash;

        $headers = $headers = array(
            'Content-Type: application/json',
            'API_KEY:' . $apiKey,
            'MERCHANT_ID:' . $merchantId,
            'REQUEST_ID:' . $requestId,
            'AUTHORIZATION:' . $authorization
        );

        // POST BODY
        $phpArray = array(
            'authorisationCode' => $mandatePaymentHistoryRequest->authorisationCode,
            'customerId' => $mandatePaymentHistoryRequest->customerId,
            'mandateRef' => $mandatePaymentHistoryRequest->mandateRef
        );

        // echo "\n";
        // echo "headers: ", json_encode($headers);
        // echo "\n";
        // echo "phpArray: ", json_encode($phpArray);

        // POST CALL
        $result = HTTPUtil::postMethod($url, $headers, json_encode($phpArray));
        return json_decode($result);
    }
}

?>

