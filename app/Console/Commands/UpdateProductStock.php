<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class UpdateProductStock extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:update-stock';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update product stock if it is 0';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Product::where('stock', 0)->update(['stock' => 100]);

        $this->info('Product stock updated successfully.');
    }
}
