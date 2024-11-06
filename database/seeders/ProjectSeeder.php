<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create([
            'title' => 'Boolflix',
            'description' => "Un'applicazione web simile a Netflix sviluppata con Vue.js e Vite.",
            'url' => 'https://github.com/Francesco-Matteucci/vite-boolflix',
        ]);

        Project::create([
            'title' => 'Boolzapp',
            'description' => "Boolzapp è una semplice applicazione di messaggistica che replica le funzionalità base di WhatsApp.",
            'url' => 'https://github.com/Francesco-Matteucci/vue-boolzapp',
        ]);

        Project::create([
            'title' => 'Yu-Gi-Oh Card Viewer',
            'description' => "Un'applicazione Vue 3 che permette di visualizzare un elenco di carte Yu-Gi-Oh",
            'url' => 'https://github.com/Francesco-Matteucci/vite-yu-gi-oh',
        ]);
    }
}