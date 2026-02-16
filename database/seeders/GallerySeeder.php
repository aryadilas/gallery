<?php

namespace Database\Seeders;

use App\Models\GalleryImage;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $galleryPath = public_path('storage/galleries');
        $files = glob($galleryPath . '/*.jpg');

        $sortOrder = 0;

        foreach ($files as $file) {
            $filename = basename($file);
            $title = $this->extractTitleFromFilename($filename);
            $altText = $title;

            GalleryImage::create([
                'filename' => $filename,
                'title' => $title,
                'description' => null,
                'alt_text' => $altText,
                'sort_order' => $sortOrder,
                'is_active' => true,
            ]);

            $sortOrder++;
        }
    }

    private function extractTitleFromFilename(string $filename): string
    {
        $name = pathinfo($filename, PATHINFO_FILENAME);
        
        if (preg_match('/^(.+)-([a-zA-Z0-9]+)-unsplash$/', $name, $matches)) {
            $photographer = str_replace('-', ' ', $matches[1]);
            $hash = $matches[2];
            
            return ucwords($photographer) . ' ' . $hash;
        }

        return $name;
    }
}
