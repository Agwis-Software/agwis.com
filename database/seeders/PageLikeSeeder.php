<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PageLike;

class PageLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $u = 8;
		$datetime = strtotime('+1 minutes');
        for ($s = 1; $s <= $u; $s++) {
            for ($r = 1; $r <= 2; $r++) {
				PageLike::create(array(
					'user_id' => $s,
					'page_post_id' => $r,
					'created_at' => date('Y-m-d H:i:s', $datetime),
				));
				$datetime = strtotime('+1 minutes', $datetime);
            }
        }
    }
}
