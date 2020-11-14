<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Tags seed.
 */
class TagsSeed extends AbstractSeed
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
            
            $data[] = [
                'descripcion' => $faker->text(60),
                'created' => $faker->dateTime()->format('Y-m-d H:i:s'),
                'modified' => $modified,
                'state_id' => 1
            ];
        }

        $table = $this->table('tags');
        $table->insert($data)->save();
    }
}
