<?php declare(strict_types=1);
namespace App\Services;

use App\Models\Currency;
use App\Models\ExchangeData;
use App\Repositories\CurrencyRepository;
use Illuminate\Support\Collection;

class Converter
{
    private $currencyRepository;

    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepository = $currencyRepository;
    }

    public function convert(Currency $from, Currency $to, float $amount): ExchangeData
    {
        $value = 0.0;
        if ($amount > 0 && $from->rate > 0 && $to->rate > 0) {
            $value = $from->rate / $to->rate * $amount;
        }

        return new ExchangeData($from, $to, $amount, $value);
    }

    /**
     * @param Currency $from
     *
     * @return ExchangeData[]
     */
    public function getRatesFor(Currency $from): Collection
    {
        $rates = new Collection();
        foreach ($this->currencyRepository->all() as $to) {
            $rates->add($this->convert($from, $to, 1));
        }

        return $rates;
    }
}
