<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * States seed.
 */
class StatesSeed extends AbstractSeed
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
        $data = [
            [
                'descripcion' => 'Habilitado',
                'entidad' => '*'
            ],
            [
                'descripcion' => 'Deshabilitado',
                'entidad' => '*'
            ]
        ];
        
        $table = $this->table('states');
        $table->insert($data)->save();
    }
}
