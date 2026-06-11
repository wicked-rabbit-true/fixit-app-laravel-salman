<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Zone;
use App\Models\Currency;
use Illuminate\Database\Seeder;
use MatanYadaev\EloquentSpatial\Objects\Polygon;
use MatanYadaev\EloquentSpatial\Objects\LineString;
use MatanYadaev\EloquentSpatial\Objects\Point;

class PerhourZoneSeeder extends Seeder
{
    public function run(): void
    {
        if (Zone::where('name', 'UAE')->exists()) {
            return;
        }

        $currency = Currency::where('code', 'AED')->first();

        $uaePolygon = new Polygon([
            new LineString([
                new Point(24.2167, 51.5833),
                new Point(24.2167, 56.3833),
                new Point(22.6333, 56.3833),
                new Point(22.6333, 55.7500),
                new Point(24.0000, 55.0000),
                new Point(24.5000, 52.5000),
                new Point(24.2167, 51.5833),
            ]),
        ]);

        $zone = Zone::create([
            'name' => 'UAE',
            'place_points' => $uaePolygon,
            'locations' => [
                ['lat' => 24.4539, 'lng' => 54.3773],
                ['lat' => 25.2048, 'lng' => 55.2708],
                ['lat' => 24.2992, 'lng' => 54.6973],
                ['lat' => 25.3333, 'lng' => 55.5167],
                ['lat' => 24.4667, 'lng' => 54.3667],
                ['lat' => 25.1167, 'lng' => 56.3333],
                ['lat' => 24.2167, 'lng' => 55.7500],
            ],
            'status' => 1,
            'currency_id' => $currency?->id,
        ]);

        $categoryIds = Category::where('category_type', 'service')
            ->whereNull('parent_id')
            ->pluck('id');

        if ($categoryIds->isNotEmpty()) {
            $zone->categories()->syncWithoutDetaching($categoryIds);
        }
    }
}
