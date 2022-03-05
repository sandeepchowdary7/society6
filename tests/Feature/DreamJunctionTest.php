<?php

namespace Tests\Feature;

use App\Http\Controllers\ApiController;
use Tests\TestCase;

class DreamJunctionTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_dream_junction()
    {
        echo "\n";
        echo "http://127.0.0.1:8000/api/dream-junction";
        echo "\n";
        $api = new ApiController();
        $response = $api->getDreamJunctions();
        $this->assertEquals('application/xml', $response->headers->get('Content-Type'));
    }
}
