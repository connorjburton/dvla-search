# DVLA Search PHP SDK
PHP SDK for DVLASearch API

# Requirements

* PHP >=7.0.0

# Installation

`composer require dvlasearch/sdk`

# Usage

Each request will return an object of the related request, this object will have methods to request other information about the same vehicle.

## Vehicle Client

```php
<?php

use DVLASearch\SDK\VehicleClient;

$client = new VehicleClient('API KEY HERE');
$vehicle = $client->get('NUMBER PLATE HERE');
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

Returns on error

```
object(DVLASearch\SDK\Objects\Vehicle)#17 (2) {
  ["message"]=> string(15) "API key invalid"
  ["error"]=> int(1)
}
```

### Methods

_mot()_

```php
$vehicle->mot(); // returns mot data for that vehicle
```

_tyres()_

```php
$vehicle->tyres(); // returns tyre data for that vehicle
```

## MOT Client

```php
<?php

use DVLASearch\SDK\MotClient;

$client = new MotClient('API KEY HERE');
$mot = $client->get('NUMBER PLATE HERE');
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

Returns on error

```
object(DVLASearch\SDK\Objects\Mot)#17 (2) {
  ["message"]=> string(15) "API key invalid"
  ["error"]=> int(1)
}
```

### Methods

_vehicle()_

```php
$vehicle->vehicle(); // returns the vehicle the mot data relates to
```

_tyres()_

```php
$vehicle->tyres(); // returns tyre data for the vehicle the mot data relates to
```

## Tyres Client

```php
<?php

use DVLASearch\SDK\TyresClient;

$client = new TyresClient('API KEY HERE');
$tyres = $client->get('NUMBER PLATE HERE');
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

Returns on error

```
object(DVLASearch\SDK\Objects\Tyres)#17 (2) {
  ["message"]=> string(15) "API key invalid"
  ["error"]=> int(1)
}
```

### Methods

_vehicle()_

```php
$tyres->vehicle(); // returns the vehicle the tyre data relates to
```

_mot()_

```php
$tyres->mot(); // returns mot data for the vehicle the tyre data relates to
```