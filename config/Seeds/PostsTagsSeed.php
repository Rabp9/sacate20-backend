<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * PostsTags seed.
 */
class PostsTagsSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run() {
        $faker = Faker\Factory::create();
        $data = [];
        
        for ($i = 0; $i < 50; $i++) {
            for ($j = 0; $j < 50; $j++) {
                $data[] = [
                    'post_id' => $i + 1,
                    'tag_id' => $j + 1
                ];
            }
        }
        
        do {
            $n = sizeof($data);
            $index = $faker->numberBetween(0, $n - 1);
            unset($data[$index]);
        } while ($n > 1800);
        
        $table = $this->table('posts_tags');
        $table->insert($data)->save();
    }
}
