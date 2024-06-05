<?php

namespace App\Console\Commands;

use App\Models\Category;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        // Añadir páginas estáticas
        $sitemap->add(Url::create('/'));
        // Añade más URLs estáticas según sea necesario

        // Añadir productos dinámicos (ejemplo)
        // Supongamos que tienes un modelo Product
        $categories = Category::all();
        foreach ($categories as $category) {
            $sitemap->add(Url::create("/categories/{$category->slug}")
                ->setLastModificationDate($category->updated_at)
                ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                ->setPriority(0.8));
        }

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully.');
        return 0;
    }
}
