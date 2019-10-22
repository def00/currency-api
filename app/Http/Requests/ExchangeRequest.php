<?php

namespace App\Http\Requests;

use App\Models\Currency;
use App\Repositories\CurrencyRepository;
use Illuminate\Foundation\Http\FormRequest;

class ExchangeRequest extends FormRequest implements CurrencyRepositoryProviderInterface
{
    private $repository;

    public function setRepository(CurrencyRepository $currencyRepository)
    {
        $this->repository = $currencyRepository;
    }

    public function getRepository(): CurrencyRepository
    {
        return $this->repository;
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'from'   => 'required|string|exists:currencies,symbol',
            'to'     => 'required|string|exists:currencies,symbol',
            'amount' => 'required|numeric',
        ];
    }

    public function getFrom(): Currency
    {
        return $this->getRepository()->bySymbol($this->get('from'));
    }

    public function getTo(): Currency
    {
        return $this->getRepository()->bySymbol($this->get('to'));
    }

    public function getAmount(): float
    {
        return (float) $this->get('amount');
    }
}
