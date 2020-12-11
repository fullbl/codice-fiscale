<?php

namespace IvanoMatteo\CodiceFiscale;

class CodicefiscaleException extends \Exception
{
    public static $errMsgs = [
        'invalid-format' => 'Invalid Format',
        'dob-not-match' => 'Date of birth do not match',
        'cdigit-not-match' => 'Control digit do not match',
        'variation-not-exists' => 'variation do not exists',
        'date-parse-failed' => 'variation do not exists',
        'wrong-city-code-format' => 'wrong city code format',
        'name-or-familyname-too-short' => 'the fields name and familyName must be at least 2 character long',
        'sex-wrong-format' => 'the sex field can be only M or F',
        'bad-character-format' => 'bad character format',
        'too-short-for-checkdigit' => 'the control digit is calculated on first 15 digits, the input is only',
    ];

    protected $messageCode;
    protected $context;

    public function __construct($message = "", array $context = null, $code = 0, $previous = null)
    {
        $msg = static::$errMsgs[$message] ?? $message;

        if (isset($context)) {
            $this->context = $context;
            $msg .= ' ' . json_encode($context, JSON_PRETTY_PRINT);
        }

        parent::__construct($msg, $code, $previous);
        $this->messageCode = isset(static::$errMsgs[$message]) ? $message : null;
    }

    public function getContext()
    {
        return $this->context;
    }

    public function getMessageCode()
    {
        return $this->messageCode;
    }
}
