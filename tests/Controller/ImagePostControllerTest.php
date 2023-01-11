<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImagePostControllerTest extends WebTestCase 
{
    public function testCreate()
    {
        // test 1
        // $this->assertEquals(42, 42);

        //test 2
        $client = static::createClient();

        $uploadedFile = new UploadedFile(
            __DIR__ . '/../fixtures/cave-cp.jpg',
            'cave-cp.jpg'
        );

        $client->request('POST', '/api/images', [], [
            'file' => $uploadedFile
        ]);

        // test 2
        dd($client->getResponse()->getContent());

        //test 3
        // $this->assertResponseIsSuccessful();

        //test 4
        /** @var InMemoryTransport $transport */
        // $transport = self::$container->get('messenger.transport.async_priority_high');
        // $this->assertCount(1, $transport->get());


    }
}
