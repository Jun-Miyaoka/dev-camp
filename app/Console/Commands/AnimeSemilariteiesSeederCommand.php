<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


class AnimeSemilaritiesSeederCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:similarity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'insert anime similarity';


    /**
     *
     */
    public function handle()
    {
        $path = "public/files/anime_similarities.csv";

        $sql = <<<EOT
LOAD DATA LOCAL INFILE '{$path}' REPLACE
INTO TABLE anime_similarities
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 LINES
;
EOT;
        $pdo = \DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
