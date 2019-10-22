<?php

namespace App\Console\Commands;

use App\Jobs\GetExchangeRates;
use App\Repositories\CurrencyRepository;
use App\Services\NBPRatesFetcher;
use Illuminate\Console\Command;

class FetchData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch & save data from NBP';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }


    public function handle(NBPRatesFetcher $fetcher, CurrencyRepository $repository)
    {
        try {
            $data = $fetcher->fetchRates();
            $saved = 0;
            foreach ($data as $rate) {
                $repository->createOrUpdate($rate['code'], $rate['mid'], $rate['currency']);
                $saved++;
            }

            $this->output->writeln(sprintf('Saved %d records', $saved));
        } catch (\Exception $exception) {
            $this->output->error($exception->getMessage());
        }

    }
}
