<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    public function run()
    {
        // Planes Mensuales
        Plan::create([
            'name' => 'Free',
            'description' => 'Try AiTools for free',
            'price' => 0,
            'billing_cycle' => 'monthly',
            'coins' => 10,
            'benefits' => json_encode([
                'Relaxed generations',
                'Use history available',
                'Earn & spend coins available'
            ]),
        ]);

        Plan::create([
            'name' => 'Base',
            'description' => 'For personal use',
            'price' => 19,
            'billing_cycle' => 'monthly',
            'coins' => 500,
            'benefits' => json_encode([
                'Everything in Free, plus:',
                'Fast generation access',
                'Buy coins available ($10 = 200 coins)',
                'Download HD results',
                'Professional mode available for generation of more refined details',
                'Private assets and data security (uploaded & downloaded images visible to self only)'
            ]),
        ]);

        Plan::create([
            'name' => 'Standard',
            'description' => 'Enhance your visual impact',
            'price' => 39,
            'billing_cycle' => 'monthly',
            'coins' => 2000,
            'benefits' => json_encode([
                'Everything in Base, plus:',
                'Video generation access',
                'Buy coins at 20% discount ($10 = 250 coins)',
                '24-hour customer support',
                'Unlimited use of 3000+ styles',
                'Unlimited use of all Modes',
                'Newest AI mode options'
            ]),
        ]);

        Plan::create([
            'name' => 'Pro',
            'description' => 'Unleash your creative power',
            'price' => 79,
            'billing_cycle' => 'monthly',
            'coins' => 6000,
            'benefits' => json_encode([
                'Everything in Standard, plus:',
                'Buy coins at 80% discount ($10 = 1000 coins)',
                'Priority support'
            ]),
        ]);

        // Planes Anuales
        Plan::create([
            'name' => 'Free',
            'description' => 'Try AiTools for free',
            'price' => 0,
            'billing_cycle' => 'yearly',
            'coins' => 120,
            'benefits' => json_encode([
                'Relaxed generations',
                'Use history available',
                'Earn & spend coins available'
            ]),
        ]);

        Plan::create([
            'name' => 'Base',
            'description' => 'For personal use',
            'price' => 16,
            'billing_cycle' => 'yearly',
            'coins' => 6000,
            'benefits' => json_encode([
                'Everything in Free, plus:',
                'Fast generation access',
                'Buy coins available ($100 = 2400 coins)',
                'Download HD results',
                'Professional mode available for generation of more refined details',
                'Private assets and data security (uploaded & downloaded images visible to self only)'
            ]),
        ]);

        Plan::create([
            'name' => 'Standard',
            'description' => 'Enhance your visual impact',
            'price' => 29,
            'billing_cycle' => 'yearly',
            'coins' => 24000,
            'benefits' => json_encode([
                'Everything in Base, plus:',
                'Video generation access',
                'Buy coins at 20% discount ($100 = 3000 coins)',
                '24-hour customer support',
                'Unlimited use of 3000+ styles',
                'Unlimited use of all Modes',
                'Newest AI mode options'
            ]),
        ]);

        Plan::create([
            'name' => 'Pro',
            'description' => 'Unleash your creative power',
            'price' => 59,
            'billing_cycle' => 'yearly',
            'coins' => 72000,
            'benefits' => json_encode([
                'Everything in Standard, plus:',
                'Buy coins at 80% discount ($100 = 12000 coins)',
                'Priority support'
            ]),
        ]);
    }
}
