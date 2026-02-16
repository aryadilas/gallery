<?php

use App\Models\GalleryImage;

test('gallery page loads successfully', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('gallery displays active images', function () {
    $activeImage = GalleryImage::factory()->create([
        'is_active' => true,
        'filename' => 'test-active.jpg',
    ]);

    $inactiveImage = GalleryImage::factory()->create([
        'is_active' => false,
        'filename' => 'test-inactive.jpg',
    ]);

    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertSee($activeImage->title);
    $response->assertDontSee($inactiveImage->title);
});

test('gallery images are ordered by sort order', function () {
    GalleryImage::factory()->create([
        'title' => 'First Image',
        'sort_order' => 2,
        'filename' => 'first.jpg',
    ]);

    GalleryImage::factory()->create([
        'title' => 'Second Image',
        'sort_order' => 1,
        'filename' => 'second.jpg',
    ]);

    $response = $this->get('/');

    $response->assertStatus(200);

    $firstPosition = strpos($response->getContent(), 'Second Image');
    $secondPosition = strpos($response->getContent(), 'First Image');

    expect($firstPosition)->toBeLessThan($secondPosition);
});

test('inactive images are not shown', function () {
    GalleryImage::factory()->create([
        'is_active' => false,
        'title' => 'Hidden Image',
        'filename' => 'hidden.jpg',
    ]);

    $response = $this->get('/');

    $response->assertStatus(200);
    $response->assertDontSee('Hidden Image');
});
