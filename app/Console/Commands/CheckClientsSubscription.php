<?php

namespace App\Console\Commands;

use App\Models\subscribtion;
use Illuminate\Console\Command;

class CheckClientsSubscription extends Command
{
    
    protected $signature = 'app:check-clients-subscription';

   
    protected $description = 'check clients subscription and remove it if expired';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $activeSubscriptions = subscribtion::where('is_active', '1')->get();

        foreach ($activeSubscriptions as $subscription) {
            if ($subscription->end_date < now()) {
                $subscription->update([
                    'is_active' => 0,
                ]);
                
                
            }
        }
    }
}
