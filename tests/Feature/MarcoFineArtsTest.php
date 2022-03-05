<?php

namespace Tests\Feature;

use App\Http\Controllers\ApiController;
use Tests\TestCase;

class MarcoFineArtsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_marco_fine_arts()
    {
        echo "\n";
        echo "http://127.0.0.1:8000/api/marco-fine-arts";
        echo "\n";
        $api = new ApiController();
        $response = $api->getMarcosFineArts();
        $data = json_decode($response->content(), true);

        $this->assertEquals('application/json', $response->headers->get('Content-Type'));
        $this->assertArrayHasKey('data', $data);
    }
}
