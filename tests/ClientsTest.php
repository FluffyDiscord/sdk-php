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

class ClientsTest extends TestCase
{
    protected string $token = "company-token-test";
    protected string $url = "http://ninja.test:8000";

    public function testClients()
    {
        $ninja = new InvoiceNinja($this->token);
        $ninja->setUrl($this->url);

        $clients = $ninja->clients->create(['name' => 'Brand spanking new client']);
        
        $this->assertTrue(is_array($clients));
    
        $clients = $ninja->clients->all(['balance' => '0:gt']);

        $this->assertTrue(is_array($clients));
        
    } 

    public function testClientGet()
    {
    
        $ninja = new InvoiceNinja($this->token);
        $ninja->setUrl($this->url);

        $client = $ninja->clients->create(['name' => 'Brand spanking new client']);
        
        $this->assertTrue(is_array($client));

        $ninja = new InvoiceNinja($this->token);
        $ninja->setUrl($this->url);

        $clients = $ninja->clients->get($client['data']['id']);

        $this->assertTrue(is_array($clients));
        
    } 


    public function testClientPut()
    {
        
        $ninja = new InvoiceNinja($this->token);
        $ninja->setUrl($this->url);

        $client = $ninja->clients->create(['name' => 'Brand spanking new client']);

        $clients = $ninja->clients->update($client['data']['id'], ['name' => 'A new client name updated']);
        
        $this->assertTrue(is_array($clients));
        
    } 


    public function testClientPost()
    {
        
        $ninja = new InvoiceNinja($this->token);
        $ninja->setUrl($this->url);

        $clients = $ninja->clients->create(['name' => 'Brand spanking new client']);
        
        $this->assertTrue(is_array($clients));
        
    } 


    public function testClientWithContactPost()
    {
        
        $ninja = new InvoiceNinja($this->token);
        $ninja->setUrl($this->url);

        $clients = $ninja->clients->create([
            'name' => 'Brand spanking new client',
            'contacts' => [
                [
                    'first_name' => 'first',
                    'last_name' => 'last',
                    'send_email' => true,
                    'email' => 'joe@gmail.com',
                ],

            ]
        ]);
        
        $this->assertTrue(is_array($clients));
        
    } 
}