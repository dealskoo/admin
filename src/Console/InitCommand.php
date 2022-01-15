<?php

namespace Dealskoo\Admin\Console;

use Dealskoo\Admin\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class InitCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initial default account and password';

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
     * @return int
     */
    public function handle()
    {
        $name = 'admin';
        $email = 'admin@admin.com';
        $password = 'admin888';
        $admin = new Admin([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'owner' => true,
            'email_verified_at' => now(),
        ]);
        if ($admin->save()) {
            $this->info('Admin create success!');
            $this->line('<info>email: </info>' . $email);
            $this->line('<info>password: </info>' . $password);
        }
        return true;
    }
}
