<?php declare(strict_types=1);

namespace App\Repositories;

use App\Factories\CurrencyFactory;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Collection;

class CurrencyRepository
{
    private $currencyFactory;

    public function __construct(CurrencyFactory $currencyFactory)
    {
        $this->currencyFactory = $currencyFactory;
    }

    public function createOrUpdate(string $symbol, float $rate, string $name): Currency
    {
        $currency = $this->bySymbol($symbol);
        if ($currency) {
            $currency->fill([
                'rate' => $rate,
            ]);
            $currency->save();
        }

        return $this->createNew($symbol, $rate, $name);
    }

    public function all(): Collection
    {
        return $this->currencyFactory->getQuery()->get();
    }

    public function bySymbol(string $symbol): ?Currency
    {
        return $this->currencyFactory->getQuery()->where('symbol', $symbol)->first();
    }

    /**
     * @param string $symbol
     * @param float  $rate
     * @param string $name
     *
     * @return Currency
     */
    private function createNew(string $symbol, float $rate, string $name): Currency
    {
        $currency = $this->currencyFactory->getNewCurrency();
        $currency->fill([
            'symbol' => $symbol,
            'rate'   => $rate,
            'name'   => $name,
        ]);
        $currency->save();

        return $currency;
}
}
