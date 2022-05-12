<?php
/**
 * Invoice Ninja (https://invoiceninja.com).
 *
 * @link https://github.com/invoiceninja/sdk-php source repository
 *
 * @copyright Copyright (c) 2022. Invoice Ninja LLC (https://invoiceninja.com)
 *
 * @license https://opensource.org/licenses/MIT
 */

namespace InvoiceNinja\Sdk\Tests;

use InvoiceNinja\Sdk\InvoiceNinja;
use PHPUnit\Framework\TestCase;

class StaticsTest extends TestCase
{

    protected string $token = "company-token-test";
    protected string $url = "http://ninja.test:8000";

    public function testGetCurrencies()
    {
        
        $ninja = new InvoiceNinja($this->token);
        $ninja->setUrl($this->url);

        $currencies = $ninja->statics->currencies();

        $this->assertTrue(is_array($currencies));
        
    } 

    
}