<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Invest;
use App\Models\Transaction;
use App\Models\Ranking;
use Str;

class userRank extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rank:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rank user';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $users = User::all();
        //$users = User::where('id', 2)->get();

    foreach ($users as $user) {
        $firstLevelReferrals = User::where('ref_id', $user->id)->get();
        $subgroupsInvestments = [];

        // Calculate investments for each subgroup
        foreach ($firstLevelReferrals as $referral) {
            $subgroupInvestment = Invest::where('user_id', $referral->id)->sum('invest_amount');

            // Include investments of users below each first-level referral
            $subgroupInvestment += $this->calculateSubgroupInvestment($referral);

            $subgroupsInvestments[] = $subgroupInvestment;
        }

        // Check if at least three subgroups have investments
        $countSubgroupsAbove0 = collect($subgroupsInvestments)->filter(function ($investment) {
            return $investment > 0;
        })->count();

        // If at least three subgroups have investments, check the rank based on minimum subgroup investments
        if ($countSubgroupsAbove0 >= 3) {
            $minInvestment1 = collect($subgroupsInvestments)->filter(function ($investment) {
                $ranking = Ranking::where('ranking', 'Level 1')->first();
                return $investment >= $ranking->minimum_earning_per_link;
            })->count();

            $minInvestment2 = collect($subgroupsInvestments)->filter(function ($investment) {
                $ranking = Ranking::where('ranking', 'Level 2')->first();
                return $investment >= $ranking->minimum_earning_per_link; $investment >= 5000;
            })->count();
            
            $minInvestment3 = collect($subgroupsInvestments)->filter(function ($investment) {
                $ranking = Ranking::where('ranking', 'Level 3')->first();
                return $investment >= $ranking->minimum_earning_per_link;
            })->count();
            $minInvestment4 = collect($subgroupsInvestments)->filter(function ($investment) {
                $ranking = Ranking::where('ranking', 'Level 4')->first();
                return $investment >= $ranking->minimum_earning_per_link;
            })->count();
            $minInvestment5 = collect($subgroupsInvestments)->filter(function ($investment) {
                $ranking = Ranking::where('ranking', 'Level 5')->first();
                return $investment >= $ranking->minimum_earning_per_link;
            })->count();
       
        $currentRank = $user->ranking_id;      

            if ($minInvestment1 >= 3 && $currentRank <1 && $user->is_active == 1) {
               $user->update(['ranking_id' => 1, 'rankings' => json_encode([1])]);
                $this->awardRankBonus($user, 'Level 1');
            }
            
            if ($minInvestment2 >= 3 && $currentRank <2 && $user->is_active == 1) {
                $user->update(['ranking_id' => 2, 'rankings' => json_encode([2])]);
                $this->awardRankBonus($user, 'Level 2');
            }
            
            if ($minInvestment3 >= 3 && $currentRank <3 && $user->is_active == 1) {
                $user->update(['ranking_id' => 3, 'rankings' => json_encode([3])]);
                $this->awardRankBonus($user, 'Level 3');
            }
            
            if ($minInvestment4 >= 3 && $currentRank <4 && $user->is_active == 1) {
                $user->update(['ranking_id' => 4, 'rankings' => json_encode([4])]);
                $this->awardRankBonus($user, 'Level 4');
            }
            if ($minInvestment4 >= 3 && $currentRank <5 && $user->is_active == 1) {
                $user->update(['ranking_id' => 5, 'rankings' => json_encode([5])]);
                $this->awardRankBonus($user, 'Level 5');
            }
    }}

    $this->info('Successfully Ranked Users.');
    }

    private function calculateSubgroupInvestment($user)
    {
        $subReferrals = User::where('ref_id', $user->id)->get();
        $subgroupInvestment = 0;
    
        foreach ($subReferrals as $subReferral) {
            $subgroupInvestment += Invest::where('user_id', $subReferral->id)->sum('invest_amount');
            // Recursively calculate subgroup investments of the current sub-referral
            $subgroupInvestment += $this->calculateSubgroupInvestment($subReferral);
        }
    
        return $subgroupInvestment;
    }
    
    private function awardRankBonus($user, $rankName)
    {
    $rankBonus = Ranking::where('ranking', $rankName)->first();

    if ($rankBonus) {
        $description = $rankBonus->bonus .' Rank Bonus for Achievement ' . $rankBonus->ranking_name ;
        $type = 'Rank Bonus';

        $transaction = new Transaction();
        $transaction->user_id = $user->id;
        $transaction->from_user_id = $user->id;
        $transaction->tnx = 'TRX'.strtoupper(Str::random(10));
        $transaction->description = $description;
        $transaction->amount = $rankBonus->bonus;
        $transaction->type = 'interest';
        $transaction->charge = 0;
        $transaction->final_amount = $rankBonus->bonus;
        $transaction->method = 'System';
        $transaction->pay_currency = '$';
        $transaction->pay_amount = $rankBonus->bonus;
        $transaction->status = 'success';
        $transaction->save();
        }
                $user->profit_balance += $rankBonus->bonus;
                $user->save();
    }
}
