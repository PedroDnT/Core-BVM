```php
<?php

// Load environment variables
require_once 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Node credentials from .env file
$nodeHost = getenv('NODE_HOST');
$nodePort = getenv('NODE_PORT');
$nodeUser = getenv('NODE_USER');
$nodePass = getenv('NODE_PASS');

// Function to connect to the Bitcoin node
function connectToNode($host, $port, $user, $pass) {
    try {
        $url = "http://$user:$pass@$host:$port/";
        $client = new \Nbobtc\Http\Client($url);
        $command = new \Nbobtc\Command\Command('getblockchaininfo');
        $response = $client->sendCommand($command);
        $info = json_decode($response->getBody()->getContents(), true);
        return $info;
    } catch (Exception $e) {
        echo "NodeConnectionError: " . $e->getMessage();
        return null;
    }
}

// Function to fetch data for a specific block
function fetchBlockData($client, $blockHash) {
    try {
        $command = new \Nbobtc\Command\Command('getblock', $blockHash);
        $response = $client->sendCommand($command);
        $block = json_decode($response->getBody()->getContents(), true);
        return $block;
    } catch (Exception $e) {
        echo "Error fetching block data: " . $e->getMessage();
        return null;
    }
}

// Function to fetch data for a specific transaction
function fetchTransactionData($client, $txid) {
    try {
        $command = new \Nbobtc\Command\Command('getrawtransaction', $txid, 1);
        $response = $client->sendCommand($command);
        $transaction = json_decode($response->getBody()->getContents(), true);
        return $transaction;
    } catch (Exception $e) {
        echo "Error fetching transaction data: " . $e->getMessage();
        return null;
    }
}

// Example usage
$client = connectToNode($nodeHost, $nodePort, $nodeUser, $nodePass);
if ($client) {
    // Fetch and display blockchain info
    $blockchainInfo = connectToNode($nodeHost, $nodePort, $nodeUser, $nodePass);
    echo "<pre>" . print_r($blockchainInfo, true) . "</pre>";

    // Fetch and display block data
    // Replace '0000000000000000000769b0bebb8a4d805c12e1b5f5aeabb8ec9192e1e5e4d5' with actual block hash
    $blockData = fetchBlockData($client, '0000000000000000000769b0bebb8a4d805c12e1b5f5aeabb8ec9192e1e5e4d5');
    echo "<pre>" . print_r($blockData, true) . "</pre>";

    // Fetch and display transaction data
    // Replace 'b6f6991d7c2d....' with actual transaction id
    $transactionData = fetchTransactionData($client, 'b6f6991d7c2d....');
    echo "<pre>" . print_r($transactionData, true) . "</pre>";
}

?>
```