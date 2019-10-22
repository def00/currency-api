<?php declare(strict_types=1);
namespace App\Factories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Builder;

class CurrencyFactory
{
    public function getNewCurrency(): Currency
    {
        return new Currency();
    }

    public function getQuery(): Builder
    {
        return Currency::query();
    }
}
