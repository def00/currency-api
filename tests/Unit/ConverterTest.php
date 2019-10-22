<?php declare(strict_types=1);
namespace Tests\Unit;

use App\Models\Currency;
use App\Models\ExchangeData;
use App\Repositories\CurrencyRepository;
use App\Services\Converter;
use Illuminate\Support\Collection;
use Tests\TestCase;

class ConverterTest extends TestCase
{
    public function testReturningType()
    {
        $converter = new Converter($this->createMock(CurrencyRepository::class));
        $result = $converter->convert(
            factory(Currency::class)->make(),
            factory(Currency::class)->make(),
            0
        );
        $this->assertInstanceOf(ExchangeData::class, $result);
    }

    /**
     * @dataProvider amount
     */
    public function testConvert($amount, $fromRate, $toRate, $expected)
    {

        $converter = new Converter($this->createMock(CurrencyRepository::class));
        $result = $converter->convert(
            $this->getCurrencyMockWithValue($fromRate),
            $this->getCurrencyMockWithValue($toRate),
            $amount
        );

        $this->assertEquals($result->getFromAmount(), $amount);
        $this->assertEquals($result->getToAmount(), $expected);
    }

    /**
     * @dataProvider currencyCount
     */
    public function testGetRatesFor(int $count)
    {
        $converter = new Converter($this->getRepositoryMock($count));
        $result = $converter->getRatesFor(factory(Currency::class)->make());
        $this->assertInstanceOf(Collection::class, $result);
        $this->assertEquals($result->count(), $count);
    }

    public function currencyCount()
    {
        return [
            [1], [2], [100]
        ];
    }

    private function getRepositoryMock(int $count)
    {
        $mock = $this->getMockBuilder(CurrencyRepository::class)
            ->disableOriginalConstructor()
            ->getMock();
        $mock
            ->method('all')
            ->willReturn(factory(Currency::class, $count)->make());
        return $mock;

    }

    public function amount()
    {
        return [
            [1.0, 1.0, 1.0, 1],
            [100.0, 10.0, 5.0, 200],
            [0.0, 1.0, 2.0, 0.0]
        ];
    }

    private function getCurrencyMockWithValue($value)
    {
        return factory(Currency::class)->make([
            'rate' => $value,
        ]);
    }
}
