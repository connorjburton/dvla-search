[![Code Climate](https://codeclimate.com/github/connorjburton/dvla-search/badges/gpa.svg)](https://codeclimate.com/github/connorjburton/dvla-search)
[![Test Coverage](https://codeclimate.com/github/connorjburton/dvla-search/badges/coverage.svg)](https://codeclimate.com/github/connorjburton/dvla-search/coverage)
[![Build Status](https://travis-ci.org/connorjburton/dvla-search.svg?branch=master)](https://travis-ci.org/connorjburton/dvla-search)

# DVLA Search PHP SDK
PHP SDK for DVLASearch API

# Requirements

* PHP >=7.0.0

# Installation

`composer require dvlasearch/sdk`

# Usage

Each request will return an object of the related request, this object will have methods to request other information about the same vehicle.

The library will throw an exception if it encounters an error from the API.

## Vehicle Client

```php
<?php

use DVLASearch\SDK\Clients\Vehicle;

$plate = 'MT09 MEL';
$client = new Vehicle('API KEY HERE');
$vehicle = $client->get($plate);

//$vehicle->error will be set if the number plate isn't attached to a vehicle
if(!isset($vehicle->error)) {
  var_dump($vehicle);
} else {
  var_dump('No vehicle found for ' . $plate);
}
```

Returns on success

```
object(DVLASearch\SDK\Objects\Vehicle)#17 (21) {
  ["make"]=> string(10) "VOLKSWAGEN"
  ["dateOfFirstRegistration"]=> string(12) "23 July 2009"
  ["yearOfManufacture"]=> string(4) "2009"
  ["cylinderCapacity"]=> string(6) "1968cc"
  ["co2Emissions"]=> string(8) "167 g/km"
  ["fuelType"]=> string(6) "DIESEL"
  ["taxStatus"]=> string(11) "Tax not due"
  ["colour"]=> string(6) "SILVER"
  ["typeApproval"]=> string(2) "M1"
  ["wheelPlan"]=> string(17) "2 AXLE RIGID BODY"
  ["revenueWeight"]=> string(13) "Not available"
  ["taxDetails"]=> string(24) "Tax due: 01 October 2016"
  ["motDetails"]=> string(22) "Expires: 28 April 2017"
  ["taxed"]=> bool(true)
  ["mot"]=> bool(true)
  ["vin"]=> string(17) "WVGZZZ5NZAW007903"
  ["model"]=> string(6) "Tiguan"
  ["transmission"]=> string(6) "Manual"
  ["numberOfDoors"]=> string(1) "5"
  ["sixMonthRate"]=> string(0) ""
  ["twelveMonthRate"]=> string(0) ""
}
```

### Methods

_mot()_

Returns mot data for that vehicle

```php
$vehicle->mot();
```

_tyres()_

Returns tyre data for that vehicle

```php
$vehicle->tyres();
```

## MOT Client

```php
<?php

use DVLASearch\SDK\Clients\Mot;

$plate = 'MT09 MEL';
$client = new Mot('API KEY HERE');
$mot = $client->get($plate);

// $vehicle->error will be set if the number plate isn't attached to a vehicle
if(!isset($mot->error)) {
  var_dump($mot);
} else {
  var_dump('No MOT found for ' . $plate);
}
```

Returns on success

```
object(DVLASearch\SDK\Objects\Mot)#26 (9) {
  ["key":"DVLASearch\SDK\Objects\Mot":private]=>
  string(0) ""
  ["plate":"DVLASearch\SDK\Objects\Mot":private]=>
  string(0) ""
  ["DvlaSearchDemoAccount"]=>
  string(21) "DvlaSearchDemoAccount"
  ["mt09nks"]=>
  string(7) "mt09nks"
  ["make"]=>
  string(10) "VOLKSWAGEN"
  ["model"]=>
  string(6) "Tiguan"
  ["dateFirstUsed"]=>
  string(0) ""
  ["colour"]=>
  string(6) "SILVER"
  ["motTestReports"]=>
  array(6) {
    [0]=>
    object(stdClass)#20 (7) {
      ["testDate"]=>
      string(13) "29 April 2016"
      ["expiryDate"]=>
      string(13) "28 April 2017"
      ["testResult"]=>
      string(4) "Pass"
      ["odometerReading"]=>
      int(80084)
      ["motTestNumber"]=>
      int(244794981138)
      ["advisoryItems"]=>
      array(0) {
      }
      ["failureItems"]=>
      array(0) {
      }
    }
    ...
```

### Methods

_vehicle()_

Returns the vehicle the mot data relates to

```php
$vehicle->vehicle();
```

_tyres()_

Returns tyre data for the vehicle the mot data relates to

```php
$vehicle->tyres();
```

## Tyres Client

```php
<?php

use DVLASearch\SDK\Clients\Tyres;

$plate = 'MT09 MEL';
$client = new Tyres('API KEY HERE');
$tyres = $client->get($plate);

// $vehicle->error will be set if the number plate isn't attached to a vehicle
if(!isset($tyres->error)) {
  var_dump($tyres);
} else {
  var_dump('No MOT found for ' . $plate);
}
```

Returns on success

```
object(DVLASearch\SDK\Objects\Tyres)#20 (9) {
  ["key":"DVLASearch\SDK\Objects\Tyres":private]=>
  string(0) ""
  ["plate":"DVLASearch\SDK\Objects\Tyres":private]=>
  string(0) ""
  ["DvlaSearchDemoAccount"]=>
  string(21) "DvlaSearchDemoAccount"
  ["mt09nks"]=>
  string(7) "mt09nks"
  ["make"]=>
  string(10) "VOLKSWAGEN"
  ["model"]=>
  string(21) "TIGUAN SE TDI 4MOTION"
  ["year"]=>
  int(2009)
  ["frontTyres"]=>
  array(2) {
    [0]=>
    object(stdClass)#24 (6) {
      ["width"]=>
      int(235)
      ["ratio"]=>
      int(55)
      ["rim"]=>
      string(3) "R17"
      ["speedRating"]=>
      string(1) "H"
      ["psi"]=>
      int(29)
      ["loadIndex"]=>
      int(99)
    }
    [1]=>
    object(stdClass)#23 (6) {
      ["width"]=>
      int(235)
      ["ratio"]=>
      int(50)
      ["rim"]=>
      string(3) "R18"
      ["speedRating"]=>
      string(1) "H"
      ["psi"]=>
      int(29)
      ["loadIndex"]=>
      int(97)
    }
  }
  ...
```

### Methods

_vehicle()_

Returns the vehicle the tyre data relates to

```php
$tyres->vehicle();
```

_mot()_

Returns mot data for the vehicle the tyre data relates to

```php
$tyres->mot();
```

## Running Tests

`phpunit`
