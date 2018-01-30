<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


class AnimeSeederCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:animes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'insert animes';


    /**
     *
     */
    public function handle()
    {
        $path = "public/files/animes.csv";

        $sql = <<<EOT
LOAD DATA LOCAL INFILE '{$path}' REPLACE
INTO TABLE animes
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 LINES
;
EOT;
        $pdo = \DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
