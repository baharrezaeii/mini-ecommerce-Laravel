<?php

namespace App\Console\Commands;

use App\Enums\AdminStatus;
use App\Http\Models\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class AdminGeneratorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:admin-generator';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Admin::create([
            'full_name' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('123456789'),
            'status' => AdminStatus::ENABLE,
        ]);
        $this->info('Admin created successfully.');
    }
}
