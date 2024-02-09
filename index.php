<?php

require 'vendor/autoload.php';

use Google\Cloud\PubSub\PubSubClient;

// Create a Pub/Sub client
$pubsub = new PubSubClient([
    'projectId' => 'chatbot-401803'
]);

// Get the subscription name
$subscriptionName = 'projects/chatbot-401803/subscriptions/new-club-sub';

// Get the subscription
$subscription = $pubsub->subscription($subscriptionName);

// Pull messages from the subscription
$messages = $subscription->pull([
    'maxMessages' => 10, // Maximum number of messages to retrieve
]);

// Process received messages
foreach ($messages as $message) {
    // Handle each message
    echo 'Received message: ' . $message->data() . PHP_EOL;

    // Acknowledge the message (optional, depending on your use case)
    $subscription->acknowledge($message);
}
