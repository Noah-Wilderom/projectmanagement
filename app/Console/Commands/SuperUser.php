<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class SuperUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'management:superuser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a superuser';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('Name: ');
        $email = $this->ask('Email: ');
        $password = Hash::make($this->secret('Password: '));

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password
        ]);

        $user->assignRole('Super Admin');

        return 0;
    }
}
