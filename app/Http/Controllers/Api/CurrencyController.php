<?php declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ExchangeRequest;
use App\Http\Resources\Currency as CurrencyResource;
use App\Http\Resources\ExchangeRate;
use App\Http\Resources\ExchangeRates;
use App\Http\Resources\ExchangeValue;
use App\Models\Currency;
use App\Repositories\CurrencyRepository;
use App\Services\Converter;
use Illuminate\Http\Resources\Json\ResourceCollection;

class CurrencyController extends Controller
{
    private $converter;

    public function __construct(Converter $converter)
    {
        $this->converter = $converter;
    }

    public function index(CurrencyRepository $currencyRepository): ResourceCollection
    {
        return CurrencyResource::collection($currencyRepository->all());
    }

    public function get(Currency $currency): ResourceCollection
    {
        return ExchangeRate::collection($this->converter->getRatesFor($currency));
    }

    public function exchange(ExchangeRequest $request)
    {
        return new ExchangeValue($this->converter->convert(
            $request->getFrom(),
            $request->getTo(),
            $request->getAmount()
        ));
    }
}
