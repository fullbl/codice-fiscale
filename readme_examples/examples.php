<?php
include __DIR__.'/../vendor/autoload.php';


use IvanoMatteo\CodiceFiscale\CodiceFiscale;



try{

    // will raise an exception if the format is not valid
    $c = CodiceFiscale::parse("RSSMRAULRL1H50MM",1900); // passing the "century" arg, help to validate in case of leap years
    $c = CodiceFiscale::parse("RSSMRAULRL1H50MM");

    echo "\n"."matchName ".($c->matchName('Mario')? 'si' : 'no');
    echo "\n"."isOmocodia ".($c->isOmocodia()? 'si' : 'no');

    // to extract the date of birth, the "century" argumenti is required
    echo "\n"."getDateOfBirth ".$c->getDateOfBirth(1900)->format('Y-m-d');

    // is possible to extract the raw date of birth:  { "year":"yy", "month":"mm", "day":"dd" }
    echo "\n"."getDateOfBirthObj ".json_encode($c->getDateOfBirthRaw());

    // the library can provide the nearest date of birth according to current date:
    echo "\n"."getProbableDateOfBirth ".$c->getProbableDateOfBirth()->format('Y-m-d');
    // also according to minimum age and current date arguments
    echo "\n"."getProbableDateOfBirth 18 ".$c->getProbableDateOfBirth(18,'2019-01-01')->format('Y-m-d');

}catch(\Exception $ex){
  echo $ex->getMessage();
}


//
// calculate using person data 
//
$name = 'Mario';
$familyName = 'Rossi';
$dateOfBirth = '1980-10-01';
$sex = 'M';
$cityCode = 'H501';

$cf = CodiceFiscale::calculate($name, $familyName, $dateOfBirth, $sex, $cityCode);

//
// calcumate using an array (it accept an object as well)
//
$person = [
    'name' => $name,
    'familyName' => $familyName,
    'date' => $dateOfBirth,
    'sex' => $sex,
    'cityCode' => $cityCode,
];
$map = [  // it possible to provide a map, to match fields with different names
    'dateOfBirth' => 'date'
];
$cfx = CodiceFiscale::calculateObj($person, $map);


// generate all the 127 possible "omocodia" variations
$variazioni = $cf->generateVariations();

// generate variation n. 7 only
$variazioni = $cf->generateVariations(7);


