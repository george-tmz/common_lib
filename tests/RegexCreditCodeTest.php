<?php

use georgeT\CommonLib\RegexCreditCode;
use PHPUnit\Framework\TestCase;

require '../vendor/autoload.php';

class RegexCreditCodeTest extends TestCase
{
    public function testIsValid()
    {
        $b = RegexCreditCode::isValid('91510124MA61TWJ56k');
        if ($b) {
            $this->expectError();
        }
    }
}