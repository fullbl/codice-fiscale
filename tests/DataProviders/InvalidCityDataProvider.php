<?php


namespace IvanoMatteo\CodiceFiscale\Tests\DataProviders;

class InvalidCityDataProvider
{
    public $firstName = 'Paolo';
    public $lastName = 'Rossi';
    public $birthDate = '1980-01-01';
    public $sex = 'M';
    public $cityCode = 'XXXX';
    public $cf = 'PLARSS80A01A757R';

    public $exception = 'wrong city code format';
}
