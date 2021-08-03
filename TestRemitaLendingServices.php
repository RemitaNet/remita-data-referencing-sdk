<?php
include 'RemitaLendingServices.php';
include 'Request/SalaryHistoryByPhoneNumberRequest.php';
include 'Request/LoanDisbursementNotificationRequest.php';
include 'Request/StopLoanCollectionRequest.php';
include 'Request/MandatePaymentHistoryRequest.php';

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
        $credentials = initCredentials();

        echo "// Salary History ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
        $salaryHistoryRequest = new SalaryHistoryByPhoneNumberRequest();
        $salaryHistoryRequest->authorisationCode = round(microtime(true) * 1000); // random number
        $salaryHistoryRequest->phoneNumber = "07038684773";
        $salaryHistoryRequest->authorisationChannel = "USSD";
        $response = RemitaLendingServices::getSalaryHistory($salaryHistoryRequest, $credentials);
        echo "\n";
        echo "\n";
        echo "Response:\n", json_encode($response);
        echo "\n";
        echo "\n";

        echo "// Loan Disbursement ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
        echo "\n";
        $loanDisbursementNotificationRequest = new LoanDisbursementNotificationRequest();
        $loanDisbursementNotificationRequest->customerId = "456783897";
        $loanDisbursementNotificationRequest->authorisationCode = "764386"; // random number
        $loanDisbursementNotificationRequest->authorisationChannel = "USSD";
        $loanDisbursementNotificationRequest->phoneNumber = "07038684773";
        $loanDisbursementNotificationRequest->accountNumber = "1234657893";
        $loanDisbursementNotificationRequest->currency = "NGN";
        $loanDisbursementNotificationRequest->loanAmount = 2000;
        $loanDisbursementNotificationRequest->collectionAmount = 2100;
        $loanDisbursementNotificationRequest->dateOfDisbursement = "14-05-2021 10:16:18+0000";
        $loanDisbursementNotificationRequest->dateOfCollection = "11-07-2021 10:16:18+0000";
        $loanDisbursementNotificationRequest->totalCollectionAmount = 2100;
        $loanDisbursementNotificationRequest->numberOfRepayments = 1;
        $loanDisbursementNotificationRequest->bankCode = "214";
        $response = RemitaLendingServices::loanDisbursement($loanDisbursementNotificationRequest, $credentials);
        echo "\n";
        echo "\n";
        echo "Response:\n", json_encode($response);
        echo "\n";
        echo "\n";

        echo "// Stop Loan Collection ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
        $stopLoanCollectionRequest = new StopLoanCollectionRequest();
        $stopLoanCollectionRequest->authorisationCode = "764386";
        $stopLoanCollectionRequest->customerId = "456783897";
        $stopLoanCollectionRequest->mandateReference = "280008217475";
        $response = RemitaLendingServices::stopLoanCollection($stopLoanCollectionRequest, $credentials);
        echo "\n";
        echo "\n";
        echo "Response:\n", json_encode($response);
        echo "\n";
        echo "\n";

        echo "// Mandate Payment History ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++";
        $mandatePaymentHistoryRequest = new MandatePaymentHistoryRequest();
        $mandatePaymentHistoryRequest->authorisationCode = "30519";
        $mandatePaymentHistoryRequest->customerId = "456783897";
        $mandatePaymentHistoryRequest->mandateRef = "280008217475";
        $response = RemitaLendingServices::mandatePaymentHistory($mandatePaymentHistoryRequest, $credentials);
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

