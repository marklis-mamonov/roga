<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\StatisticsService;

class Statistics extends Command
{

    protected $statisticsService;

    public function __construct(StatisticsService $statisticsService)
    {
        parent::__construct();
        $this->statisticsService = $statisticsService;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:statistics';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->table(
            ['Количество автомобилей', 'Количество новостей', 'Тег, у которого больше всего новостей на сайте', 'Самая длинная строка', 'Самая короткая строка', 'Средние количество новостей у тега', 'Самая тегированная новость'],
            $this->statisticsService->getStatistics()
        );
    }
}
