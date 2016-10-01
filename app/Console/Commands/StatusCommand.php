<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\Helper;
use Carbon\Carbon;
use App\Models\User;
use DB;

class StatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'challenges:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update challenge status based on date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //select all challenges id, start_date, end_date, status
        $results = DB::select('select id, name, start_date, end_date, status, timezone from challenges ');
        $out = [];

        foreach($results as $r){
            $start = Helper::tz(Carbon::parse($r->start_date), 'Y-m-d H:i:s', 'UTC' );
            $end = Helper::tz(Carbon::parse($r->end_date), 'Y-m-d H:i:s', 'UTC' );
            $now = Carbon::now();
            

           //challenge is active
           if( $now->between(Carbon::parse($r->start_date), Carbon::parse($r->end_date) ) ){
                $status='active';
                DB::table('challenges')
                ->where('id', $r->id)
                ->update(['status' => $status]);
                $out[]=['id' => $r->id, 'name' => $r->name, 'start_date' => $r->start_date, 'end_date' => $r->end_date, 'status' => $status];
            
           }

           //challenge to be archived
           if($now->between(Carbon::parse($r->end_date), Carbon::parse($r->end_date)->addDay() ) ){
                $status= 'ended_today';
                DB::table('challenges')
                ->where('id', $r->id)
                ->update(['status' => $status]);
                $out[]=['id' => $r->id, 'name' => $r->name, 'start_date' => $r->start_date, 'end_date' => $r->end_date, 'status' => $status];
            break;
           }

           //challenge is over
           if($now->gt(Carbon::parse($r->end_date) ) ){
                $status='ended';
                DB::table('challenges')
                ->where('id', $r->id)
                ->update(['status' => $status]);
                $out[]=['id' => $r->id, 'name' => $r->name, 'start_date' => $r->start_date, 'end_date' => $r->end_date, 'status' => $status];
            
           }

           //challenge to be archived
           if($now->gt(Carbon::parse($r->end_date)->addMonths(3) ) ){
                $status='archived';
                DB::table('challenges')
                ->where('id', $r->id)
                ->update(['status' => $status]);
                $out[]=['id' => $r->id, 'name' => $r->name, 'start_date' => $r->start_date, 'end_date' => $r->end_date, 'status' => $status];
            
           }
        }
        
        $headers = ['id', 'name', 'start', 'end', 'status'];
        // $users = User::all(['last_name', 'email'])->take(10)->toArray();
        $this->table($headers, $out);
    }
}
