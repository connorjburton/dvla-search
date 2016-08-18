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

$client = new Vehicle('API KEY HERE');
$vehicle = $client->get('MT09 VCA');

// $vehicle->error will be set if the number plate isn't attached to a vehicle
if(!isset($vehicle->error)) {
  var_dump($vehicle);
} else {
  var_dump('No vehicle found for ' . $vehicle->plate);
}
```

Returns on success

```
Vehicle {#348 ▼
  -key: "DvlaSearchDemoAccount"
  +plate: "mt09vca"
  +"make": "SAAB"
  +"dateOfFirstRegistration": "27 July 2009"
  +"yearOfManufacture": "2009"
  +"cylinderCapacity": "1910cc"
  +"co2Emissions": "177 g/km"
  +"fuelType": "DIESEL"
  +"taxStatus": "Tax not due"
  +"colour": "GREY"
  +"typeApproval": "M1"
  +"wheelPlan": "2 AXLE RIGID BODY"
  +"revenueWeight": "Not available"
  +"taxDetails": "Tax due: 01 October 2016"
  +"motDetails": "Expires: 02 October 2016"
  +"taxed": true
  +"mot": true
  +"vin": "YS3FF41W391018057"
  +"model": "9-3 VECTOR S ANNIVERSARY LTD TID"
  +"transmission": "AUTOMATIC"
  +"numberOfDoors": "4"
  +"sixMonthRate": ""
  +"twelveMonthRate": ""
}
```

Returns on error

```
Vehicle {#348 ▼
  -key: "DvlaSearchDemoAccount"
  +plate: "mt09vca"
  +"message": "No vehicle found"
  +"error": 0
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

$client = new Mot('API KEY HERE');
$mot = $client->get('MT09 VCA');

// $vehicle->error will be set if the number plate isn't attached to a vehicle
if(!isset($mot->error)) {
  var_dump($mot);
} else {
  var_dump('No MOT found for ' . $mot->plate);
}
```

Returns on success

```
Mot {#380 ▼
  -key: "DvlaSearchDemoAccount"
  +plate: "mt09vca"
  +"make": "SAAB"
  +"model": "9-3 VECTOR S ANNIVERSARY LTD TID"
  +"dateFirstUsed": ""
  +"colour": "GREY"
  +"motTestReports": array:5 [▶]
}
```

Returns on error

```
Mot {#380 ▼
  -key: "DvlaSearchDemoAccount"
  +"plate": "mt09vca"
  +"message": "No vehicle found"
  +"error": 0
}
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

$client = new Tyres('API KEY HERE');
$tyres = $client->get('MT09 VCA');

// $vehicle->error will be set if the number plate isn't attached to a vehicle
if(!isset($tyres->error)) {
  var_dump($tyres);
} else {
  var_dump('No MOT found for ' . $tyres->plate);
}
```

Returns on success

```
Tyres {#381 ▼
  -key: "DvlaSearchDemoAccount"
  +plate: "mt09vca"
  +"make": "SAAB"
  +"model": "9-3 VECTOR S ANNIVERSARY LTD TID"
  +"year": 2009
  +"frontTyres": array:3 [▶]
  +"rearTyres": array:3 [▶]
}
```

Returns on error

```
Tyres {#381 ▼
  -key: "DvlaSearchDemoAccount"
  +"plate": "mt09vca"
  +"message": "No vehicle found"
  +"error": 0
}
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
