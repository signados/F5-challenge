<?php

namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;

class ImageTest extends PantherTestCase
{
    public function testSomething(): void
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/');

        $this->assertSelectorTextContains('h1', 'Imágenes');
    }
}
