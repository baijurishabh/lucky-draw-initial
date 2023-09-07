<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Models\Winner;

class ClearUnverifiedUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'my-command:clear-unverified-users';

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
    // public function handle()
    // {
    //     return Command::SUCCESS;
    // }
    public function __construct()
    {
     parent::__construct();
    }

    public function handle()
   {
    $winner = Winner::get();
     $sales = DB::table('winnners')->where('countdown','<', Carbon::now()->subMinutes(10))->delete();
        //    ->join('sales', 'sales.id', '=', 'sale_product.sale_id')

           echo "DeleteOldSales has been send successfully";
   }
}
