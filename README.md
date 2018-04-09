
# ridvanbaluyos/noah
A PHP Library built for [NOAH API Documentation](http://noah.up.edu.ph/apidocs/).

[![Actively Maintained](https://maintained.tech/badge.svg)](https://maintained.tech/) [![Latest Stable Version](https://poser.pugx.org/ridvanbaluyos/noah/v/stable)](https://packagist.org/packages/ridvanbaluyos/noah) [![Total Downloads](https://poser.pugx.org/ridvanbaluyos/noah/downloads)](https://packagist.org/packages/ridvanbaluyos/noah) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ridvanbaluyos/noah/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ridvanbaluyos/noah/?branch=master) [![Build Status](https://scrutinizer-ci.com/g/ridvanbaluyos/noah/badges/build.png?b=master)](https://scrutinizer-ci.com/g/ridvanbaluyos/noah/build-status/master) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/3547b6eacdc347babf408539a5f82df5)](https://www.codacy.com/app/ridvanbaluyos/noah?utm_source=github.com&amp;utm_medium=referral&amp;utm_content=ridvanbaluyos/noah&amp;utm_campaign=Badge_Grade) [![License](https://poser.pugx.org/ridvanbaluyos/haveibeenpwned/license)](https://packagist.org/packages/ridvanbaluyos/haveibeenpwned)

## Table of contents ##
- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
    - [Doppler](#get-doppler)
    - [Station by Type and ID](#get-station-by-type-and-id)
    - [Flood Maps](#get-flood-maps)
    - [Flood Report](#get-flood-report)
    - [Landslide Maps](#get-landslide-maps)
    - [Storm Surge Maps](#get-storm-surge-maps)
    - [Four-Hour Forecast](#get-four-hour-forecast)
    - [Seven-Day Forecast](#get-seven-day-forecast)
    - [Latest Contour](#get-latest-contour)
    - [MT Satellite](#get-mt-satellite)
- [References](#references)

### Requirements ###
1. PHP 7 or higher.
2.  Composer

### Installation ###
Open your `composer.json` file and add the following to the `require` key:

    "ridvanbaluyos/noah": "v0.2"

---

After adding the key, run composer update from the command line to install the package

```bash
composer install
```

or

```bash
composer update
```

### Usage ##
```php
<?php
error_reporting(E_ALL);

use Ridvanbaluyos\Noah\Noah as Noah;

require_once __DIR__ . '/vendor/autoload.php';

$noah = new Noah();
$stations = $noah->getStations();
var_dump($stations);
```

#### Get Doppler
```php
$noah = new Noah();
$stations = $noah->getDoppler();
```

#### Get Station by Type and ID
```php
$noah = new Noah();
// First parameter is station type, second parameter is station id.
$stations = $noah->getStationByTypeAndId(1, 27); 
```

#### Get Stations
```php
$noah = new Noah();
$stations = $noah->getStations();
```

#### Get Flood Maps
```php
<?php
$noah = new Noah();
$stations = $noah->getFloodMaps();
```

#### Get Flood Reports
```php
<?php
$noah = new Noah();
$stations = $noah->getFloodReport(2011);
```

#### Get Landslide Maps
```php
<?php
$noah = new Noah();
$stations = $noah->getFloogetLandslideMapsReport();
```

#### Get Storm Surge Maps
```php
<?php
$noah = new Noah();
$stations = $noah->getStormSurgeMaps();
```

#### Get Four-Hour Forecast
```php
<?php
$noah = new Noah();
$stations = $noah->getFourHourForecast();
```

#### Get Seven-Day Forecast
```php
<?php
$noah = new Noah();
// Parameter is location id (optional)
$stations = $noah->getSevenDayForecast(1); 
```
*Note: I don't know yet where the reference to the the location id parameter. I will update this once I get a word from the developers.*

#### Get Latest Contour
```php
<?php
$noah = new Noah();
$stations = $noah->getLatestContour();
```

#### Get MT Satellite
```php
<?php
$noah = new Noah();
$stations = $noah->getMtSat();
```

## References
* [NOAH API Documentation](http://noah.up.edu.ph/apidocs/)
* [NOAH API using the Swagger API Documentation](https://app.swaggerhub.com/apis/ridvanbaluyos/project-noah/0.0.1)
