<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coordinates = [
            [35.6895, 139.6917], [40.7128, -74.0060], [19.4326, -99.1332], [-23.533773, -46.625290], [51.5074, -0.1278], [48.8566, 2.3522],
            [55.7558, 37.6173], [50.850346, 4.351721], [5.614818, -0.205874], [6.4541, 3.3947], [19.0760, 72.8777], [39.9042, 116.4074],
            [37.5665, 126.9780], [-6.1750, 106.8283], [-34.6037, -58.3816], [35.6892, 51.3890], [24.7136, 46.6753], [-26.2041, 28.0473],
            [-33.8688, 151.2093], [43.6532, -79.3832]
        ];

        foreach ($coordinates as $coordinate){
            User::factory()->create([
                'latitude' => $coordinate[0],
                'longitude' => $coordinate[1],
            ]);
        }
    }
}
