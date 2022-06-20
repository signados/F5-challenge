<?php

namespace App\Tests;

use Symfony\Component\Panther\PantherTestCase;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageTest extends PantherTestCase
{
    public function testIndex(): void
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/');

        $this->assertSelectorTextContains('h1', 'Imágenes');
        $this->assertSelectorTextContains('p', 'No tienes ninguna imagen en tu lista. ¡Añade una!');
       
    }

    public function testUploadImage(): void
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/image/new');

        $this->assertSelectorTextContains('h1', 'Nueva imagen');;

        $buttonCrawlerNode = $crawler->selectButton('Guardar');
        $form = $buttonCrawlerNode->form();
        $form['image[name]'] = 'Test';
        $form['image[file]']->upload(dirname(__FILE__).'/autotestunit.png');

        $client->submit($form);

        $this->assertSelectorTextContains('h1', 'Imágenes');
        $this->assertSelectorIsVisible('.btn-danger');

    }

    public function testEditImage(): void
    {

        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/');

        $this->assertSelectorTextContains('h1', 'Imágenes');

        $link = $crawler->selectLink('Editar nombre')->link();
        $client->click($link);

        $this->assertSelectorTextContains('h1', 'Editar imagen');

    }

    public function testDeleteImage(): void
    {

        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/');

        $this->assertSelectorTextContains('h1', 'Imágenes');

        $link = $crawler->selectLink('Borrar')->link();
        $client->click($link);

        $this->assertSelectorTextContains('h1', 'Imágenes');
        $this->assertSelectorTextContains('p', 'No tienes ninguna imagen en tu lista. ¡Añade una!');

    }
}
