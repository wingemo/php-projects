<?php

// List all accounts and sum togheter
function accounts_sum() {
  $accounts = apiCall( 'GET', 'accounts');
  return $accounts;
}

// Retrieve a list of orders and sum together
function orders_sum() {
  $orders = apiCall( 'GET', 'orders');
  return $orders;
}

// Send outgoing SMS message
foreach ($arr as &$value) {
    $message = accounts_sum(). orders_sum();
    sms_send($message);
}

?>
