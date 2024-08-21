<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Enums\InvestStatus;
use App\Models\LevelReferral;
use App\Models\Invest;
use Carbon\Carbon;
use App\Models\User;
use App\Enums\TxnStatus;
use App\Enums\TxnType;
use Txn;
use App\Models\Schema;
use App\Traits\NotifyTrait;


class investmentCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'investment:cron';
    use NotifyTrait;
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Investment cron';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $ongoingInvestment = Invest::where('status', InvestStatus::Ongoing)->where('next_profit_time', '<=', Carbon::now()->format('Y-m-d H:i:s'))->cursor();

        foreach ($ongoingInvestment as $invest) {
            $schema = Schema::find($invest->schema_id);

            $profitOffDays = json_decode($schema->off_days, true);
            $date = Carbon::now();
            $today = $date->format('l');
//dd($invest);
            
            if ($profitOffDays == null || ! in_array($today, $profitOffDays)) {

                $user = User::find($invest->user_id);
                $calculateInterest = ($invest->interest * $invest->invest_amount) / 100;
                $interest = $invest->interest_type != 'percentage' ? $invest->interest : $calculateInterest;
                $nextProfitTime = Carbon::now()->addHour($invest->period_hours);

                $updateData = [
                    'next_profit_time' => $nextProfitTime,
                    'last_profit_time' => Carbon::now(),
                    'number_of_period' => ($invest->number_of_period - 1),
                    'already_return_profit' => ($invest->already_return_profit + 1),
                    'total_profit_amount' => ($invest->total_profit_amount + $interest),
                ];

                $shortcodes = [
                    '[[full_name]]' => $user->full_name,
                    '[[plan_name]]' => $schema->name,
                    '[[invest_amount]]' => $invest->invest_amount,
                    '[[roi]]' => $interest,
                    '[[site_title]]' => setting('site_title', 'global'),
                    '[[site_url]]' => route('home'),
                ];

                
                if ($invest->return_type == 'lifetime') {
                    $invest->update($updateData);

                    $user->increment('profit_balance', $interest);
                    $tnxInfo = Txn::new($interest, 0, $interest, 'system', $schema->name.' Plan Interest', TxnType::Interest, TxnStatus::Success, null, null, $user->id);

                    //dd(setting('site_referral', 'global')); 
                    
                    if (setting('site_referral', 'global') == 'level' && setting('profit_level')) {
                        $level = LevelReferral::where('type', 'profit')->max('the_order') + 1;
                                                //dd($tnxInfo->user, 'profit', $interest, $level);

                        creditReferralBonus($tnxInfo->user, 'profit', $interest, $level);
                    }

                    //Notify newsletter
                    $this->mailNotify($tnxInfo->user->email, 'invest_roi', array_merge($shortcodes, ['[[txn]]' => $tnxInfo->tnx]));
                    $this->smsNotify('invest_roi', array_merge($shortcodes, ['[[txn]]' => $tnxInfo->tnx]), $tnxInfo->user->phone);
                    $this->pushNotify('invest_roi', $shortcodes, route('user.transactions'), $tnxInfo->user->id);

                } else {

                    if ($invest->number_of_period > 0) {
                        if ($invest->number_of_period == 1) {
                            $updateData = array_merge($updateData, [
                                'status' => InvestStatus::Completed,
                            ]);
//dd($invest->capital_back);
                            if ($invest->capital_back == 1) {
                                $user->increment('balance', $invest->invest_amount);
                                $tnxInfo = Txn::new($invest->invest_amount, 0, $invest->invest_amount, 'system', $schema->name.' Capital Back', TxnType::Refund, TxnStatus::Success, null, null, $user->id);

                                //notify newsletter
                                $this->mailNotify($tnxInfo->user->email, 'investment_end', array_merge($shortcodes, ['[[roi]]' => '']));
                                $this->smsNotify('investment_end', array_merge($shortcodes, ['[[roi]]' => '']), $tnxInfo->user->phone);
                                $this->pushNotify('investment_end', array_merge($shortcodes, ['[[roi]]' => '']), route('user.transactions'), $tnxInfo->user->id);
                            }

                        }

                        $invest->update($updateData);

                        $user->increment('profit_balance', $interest);
                        $tnxInfo = Txn::new($interest, 0, $interest, 'system', $schema->name.' Plan Interest', TxnType::Interest, TxnStatus::Success, null, null, $user->id);

                        if (setting('site_referral', 'global') == 'level' && setting('profit_level')) {
                            $level = LevelReferral::where('type', 'profit')->max('the_order') + 1;
                            creditReferralBonus($tnxInfo->user, 'profit', $interest, $level);
                        }

                        //Notify newsletter
                        $this->mailNotify($tnxInfo->user->email, 'invest_roi', array_merge($shortcodes, ['[[txn]]' => $tnxInfo->tnx]));
                        $this->smsNotify('invest_roi', array_merge($shortcodes, ['[[txn]]' => $tnxInfo->tnx]), $tnxInfo->user->phone);
                        $this->pushNotify('invest_roi', array_merge($shortcodes, ['[[txn]]' => $tnxInfo->tnx]), route('user.transactions'), $tnxInfo->user->id);
                    }

                }
            }
        }
        $this->info('Successfully Send Investment Referral.');
    }
}
