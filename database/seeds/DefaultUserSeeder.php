<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class DefaultUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $email    = 'chachanurholis29@gmail.com';
        $password = 'p@ssw0rd';

        $this->command->line("");
        $this->command->line("Create Default User...");
        $user     = User::where('email', $email)->first();
        $dataUser = [
            'name'              => "Chacha Nurholis",
            'email'             => $email,
            'password'          => Hash::make($password),
            'email_verified_at' => now()
        ];

        if (!$user) {
            $user = User::create($dataUser);
        } else {
            $user->update($dataUser);
        }

        $this->command->line(" + Email: " .  $dataUser['email']);
        $this->command->line(" + Password: {$password}");
        $this->command->line("");
    }
}
