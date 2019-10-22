<?php declare(strict_types=1);

namespace App\Http\Requests;

use App\Repositories\CurrencyRepository;

interface CurrencyRepositoryProviderInterface
{
    public function getRepository(): CurrencyRepository;
    public function setRepository(CurrencyRepository $currencyRepository);
}
