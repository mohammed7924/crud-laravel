<?php

namespace App\Console\Commands;

use App\Models\Customer;
use Illuminate\Console\Command;

class DeleteInactiveUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-inactive-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will delete all inactive users';

    /**
     * Execute the console command.
     */
    public function handle()
    {

//        $name=$this->ask('what is your name');
//        $password=$this->secret('enter your password');


// if($this->confirm('are you sure you wanna delete tis user')){
//     dd('yes proceed');
// }
// dd($password);

$name=$this->anticipate('what is your name',['Mohammed','Shibu']);
dd($name);

}
}