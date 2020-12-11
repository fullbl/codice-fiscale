<?php


namespace IvanoMatteo\CodiceFiscale\Tests\DataProviders;

class InvalidNameDataProvider
{
    public $firstName = 'P';
    public $lastName = 'Rossi';
    public $birthDate = '1980-01-01';
    public $sex = 'M';
    public $cityCode = 'A757';
    public $cf = 'PLARSS80A01A757R';

    public $exception = 'the fields name and familyName must be at least 2 character long';
}
