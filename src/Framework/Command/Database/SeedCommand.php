<?php

declare(strict_types=1);

namespace Cincho\Framework\Command\Database;

use Cincho\Framework\Command\CommandInterface;
use Cincho\Framework\Database\Seeder\SeederInterface;
use Cincho\Framework\DependencyInjection\Container;

class SeedCommand implements CommandInterface
{
    public function __construct(private Container $container, private string $directory) {}

    public function execute(): int
    {
        $dir = new \DirectoryIterator($this->directory);
        $declared_classes = get_declared_classes();
        $seeder_classes = [];
        
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {
                require_once $fileinfo->getPathname();
                $new_class = reset(array_diff(get_declared_classes(), $declared_classes));
                $class = new \ReflectionClass($new_class);
                $declared_classes[] = $new_class;

                if ($class->implementsInterface(SeederInterface::class)) {
                    $seeder_classes[] = $new_class;
                }
            }
        }

        foreach ($seeder_classes as $seeder_class) {
            $seeder = $this->container->get($seeder_class);
            $seeder->seed();
        }

        return CommandInterface::EXIT_SUCCESS;
    }
}