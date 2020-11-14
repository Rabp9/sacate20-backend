<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Posts seed.
 */
class PostsSeed extends AbstractSeed
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
            $dateModified = $faker->optional()->dateTime();
            $modified = $dateModified ? $dateModified->format('Y-m-d H:i:s') : $dateModified;
            
            $datePublished = $faker->optional()->dateTime();
            $published = $datePublished ? $datePublished->format('Y-m-d H:i:s') : $datePublished;
            
            $data[] = [
                'title' => $faker->text(60),
                'subtitle' => $faker->text(180),
                'resumen' => $faker->realText(300),
                'body' => $faker->randomHtml(2,3),
                'portada' => $faker->imageUrl(),
                'created' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'modified' => $modified,
                'published' => $published,
                'vistos' => $faker->numberBetween(0, 8000),
                'state_id' => 1
            ];
        }

        $table = $this->table('posts');
        $table->insert($data)->save();
    }
}
