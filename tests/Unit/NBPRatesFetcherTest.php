<?php declare(strict_types=1);
namespace Tests\Unit;

use App\Services\NBPRatesFetcher;
use GuzzleHttp\Client;
use Tests\TestCase;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class NBPRatesFetcherTest extends TestCase
{
    public function testFetchRatesException()
    {
        $fetcher = new NBPRatesFetcher(
            $this->getMockHandler(404)
        );
        $this->expectException(\Exception::class);
        $fetcher->fetchRates();
    }

    public function testFetchRates()
    {
        $fetcher = new NBPRatesFetcher(
            $this->getMockHandler(200)
        );
        $this->assertIsArray($fetcher->fetchRates());
    }

    private function getMockHandler($code)
    {
        $mock = new MockHandler([
            new Response($code),
        ]);
        $handler = HandlerStack::create($mock);
        return new Client(['handler' => $handler]);
    }
}
