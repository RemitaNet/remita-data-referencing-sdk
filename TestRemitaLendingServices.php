<?php
include 'RemitaLendingServices.php';
include 'Request/RequestSalaryHistoryByPhoneNumber.php';

function initCredentials()
{
    // SDK Credentials
    $merchantId = "27768931";
    $apiKey = "Q1dHREVNTzEyMzR8Q1dHREVNTw==";
    $apiToken = "SGlQekNzMEdMbjhlRUZsUzJCWk5saDB6SU14Zk15djR4WmkxaUpDTll6bGIxRCs4UkVvaGhnPT0=";

    // Initialize SDK
    $credentials = new Credentials();
    $credentials->url = ApplicationUrl::$demoUrl;
    $credentials->merchantId = $merchantId;
    $credentials->apiKey = $apiKey;
    $credentials->apiToken = $apiToken;

    return $credentials;
}

class TestRemitaLendingServices
{

    function test()
    {
        // Initialize Credentials++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
        echo "\n";
        $credentials = initCredentials();

        echo "// Salary History ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
        echo "\n";
        $salaryHistoryRequest = new RequestSalaryHistoryByPhoneNumber();
        $salaryHistoryRequest->authorisationCode = round(microtime(true) * 1000); // random number
        $salaryHistoryRequest->phoneNumber = "07038684773";
        $salaryHistoryRequest->authorisationChannel = "USSD";

        $response = RemitaLendingServices::getSalaryHistory($salaryHistoryRequest, $credentials);
        echo "\n";
        echo "\n";
        echo "Response:\n", json_encode($response);
        echo "\n";
        echo "\n";
    }
}

$testRITs = new TestRemitaLendingServices();
$testRITs->test();
?>

