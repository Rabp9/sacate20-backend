<?php
declare(strict_types=1);

namespace App\Command;

use Cake\Command\Command;
use Cake\Console\Arguments;
use Cake\Console\ConsoleIo;
use Cake\Console\ConsoleOptionParser;

/**
 * DatabaseSeed command.
 */
class DatabaseSeedCommand extends Command
{
    public function execute(Arguments $args, ConsoleIo $io) {
        exec('bin\cake migrations seed --seed StatesSeed');
        exec('bin\cake migrations seed --seed PostsSeed');
        exec('bin\cake migrations seed --seed TagsSeed');
        exec('bin\cake migrations seed --seed PostsTagsSeed');
        
        $io->out("¡Seed Completo!");
    }
}