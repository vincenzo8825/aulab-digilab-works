<?php

namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    public function run()
    {
        $programs = [
            [
                'name' => 'Programma Onboarding Base',
                'description' => 'Programma di onboarding standard per tutti i nuovi dipendenti',
                'duration_days' => 30,
                'is_active' => true,
            ],
            [
                'name' => 'Programma Sviluppatori',
                'description' => 'Programma di onboarding specifico per sviluppatori software',
                'duration_days' => 45,
                'is_active' => true,
            ],
            [
                'name' => 'Programma Marketing',
                'description' => 'Programma di onboarding per il team marketing',
                'duration_days' => 25,
                'is_active' => true,
            ],
            [
                'name' => 'Programma HR',
                'description' => 'Programma di onboarding per il team risorse umane',
                'duration_days' => 20,
                'is_active' => true,
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }
    }
}
