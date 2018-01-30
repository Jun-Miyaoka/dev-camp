<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


class UserRankSeederCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seeder:user-rank';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'insert user rank data';


    /**
     *
     */
    public function handle()
    {
        $path = "public/files/user_rank_items.csv";

        $sql = <<<EOT
LOAD DATA LOCAL INFILE '{$path}' REPLACE
INTO TABLE user_rank
FIELDS TERMINATED BY ','
OPTIONALLY ENCLOSED BY '"'
IGNORE 1 LINES
;
EOT;
        $pdo = \DB::connection()->getPdo();
        $pdo->exec($sql);
    }
}
