<?php
// Include the NuSOAP library
require_once('./lib/nusoap.php');

// Define the parameters for connecting to the web service
$wsdl_url = 'http://localhost/soap/travel-reservation-service.php?wsdl';
$service_namespace = 'http://localhost/soap/travel-reservation-service.php';
$service_endpoint = 'http://localhost/soap/travel_reservation_service.php';

// Create a new SOAP client
$client = new nusoap_client($wsdl_url, true);

$err = $client->getError();

if ($err) {
	echo '<h2>Constructor error</h2><pre>' . $err . '</pre>';
	echo '<h2>Debug</h2><pre>' . htmlspecialchars($client->getDebug(), ENT_QUOTES) . '</pre>';
	exit();
}

// Call the web service methods
$customer_id = 123;
$travel_id = 456;
$reservation_result = $client->call("$service_namespace/reserveTravel", array('customerId' => $customer_id, 'travelId' => $travel_id));
if ($reservation_result === true) {
    echo "Reservation successful";
} else {
    echo "Reservation failed";
}

$customer_id = 123;
$reservation_id = 789;
$cancellation_result = $client->call("$service_namespace/cancelReservation", array('customerId' => $customer_id, 'reservationId' => $reservation_id));
if ($cancellation_result === true) {
    echo "Cancellation successful";
} else {
    echo "Cancellation failed";
}

$available_travels = $client->call("$service_namespace/getAvailableTravels", array());
print_r($available_travels);
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login - Bejoy Tourism Agency</title>
	<style>
		body {
			background-image: url('Screenshot 2023-06-08 004056.png.jpg'), url('Screenshot 2023-06-08 004630.png.jpg'), url('Screenshot 2023-06-08 004931.png.jpg');
			background-size: 400px, 400px, 400px;
			background-position: left top, center top, right top;
			background-repeat: no-repeat, no-repeat, no-repeat;
			font-family: Arial, sans-serif;
			margin: 0;
			padding: 0;
		}

		.login-container {
			background-color: rgba(255, 255, 255, 0.8);
			border-radius: 5px;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
			margin: 50px auto;
			max-width: 400px;
			padding: 20px;
			text-align: center;
		}

		h1 {
			color: #333;
			font-size: 24px;
			margin: 0 0 20px;
		}

		form {
			display: block;
			margin-top: 20px;
		}

		label {
			display: block;
			font-size: 16px;
			margin-bottom: 5px;
			text-align: left;
		}

		input[type="text"],
		input[type="email"],
		input[type="password"] {
			border: 1px solid #ccc;
			border-radius: 3px;
			box-sizing: border-box;
			display: block;
			font-size: 16px;
			margin-bottom: 20px;
			padding: 10px;
			width: 100%;
		}

		input[type="submit"] {
			background-color: #333;
			border: none;
			border-radius: 3px;
			color: #fff;
			cursor: pointer;
			font-size: 16px;
			padding: 10px;
			width: 100%;
		}

		input[type="submit"]:hover {
			background-color: #666;
		}
	</style>
</head>
<body>
	<div class="login-container">
		<h1>Welcom in Bejoy Tourism Agency</h1>
		<form action="login.php" method="post">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" required>
			<label for="email">Email:</label>
			<input type="email" id="email" name="email" required>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password" required>
			<input type="submit" value="Login">
		</form>
	</div>
</body>
</html>