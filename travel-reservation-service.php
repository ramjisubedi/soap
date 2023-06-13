<?php
// Include the required files
require_once('./lib/nusoap.php');
require_once('./TravelReservationService.php');
require_once('./TravelReservationServiceImpl.php');

// Create a new SOAP server and bind the TravelReservationServiceImpl class to it
$server = new nusoap_server();
$server->configureWSDL('TravelReservationService', 'http://localhost/soap/travel-reservation-service.php');
$server->register('TravelReservationServiceImpl.reserveTravel',
    array('customerId' => 'xsd:int', 'travelId' => 'xsd:int'),
    array('return' => 'xsd:boolean'),
    'http://localhost/soap/travel-reservation-service');
$server->register('TravelReservationServiceImpl.cancelReservation',
    array('customerId' => 'xsd:int', 'reservationId' => 'xsd:int'),
    array('return' => 'xsd:boolean'),
    'http://localhost/soap/travel-reservation-service');
$server->register('TravelReservationServiceImpl.getAvailableTravels',
    array(),
    array('return' => 'xsd:Array'),
    'http://localhost/soap/travel-reservation-service');

    // Generate the WSDL file
    $wsdl = $server->getWSDL();

// Handle SOAP requests
$server->service(file_get_contents("php://input"));



?>