<?php

declare(strict_types=1);

namespace Cincho\Framework\Command\Database;

use Cincho\Framework\Command\CommandInterface;
use Cincho\Framework\Database\Migration\MigrationInterface;
use Cincho\Framework\DependencyInjection\Container;

class MigrateCommand implements CommandInterface
{
    public function __construct(private Container $container, private string $directory) {}

    public function execute(): int
    {
        $dir = new \DirectoryIterator($this->directory);
        $declared_classes = get_declared_classes();
        $migration_classes = [];
        
        foreach ($dir as $fileinfo) {
            if (!$fileinfo->isDot()) {
                require_once $fileinfo->getPathname();
                $new_class = reset(array_diff(get_declared_classes(), $declared_classes));
                $class = new \ReflectionClass($new_class);
                $declared_classes[] = $new_class;

                if ($class->implementsInterface(MigrationInterface::class)) {
                    $migration_classes[] = $new_class;
                }
            }
        }

        foreach ($migration_classes as $migration_class) {
            $migration = $this->container->get($migration_class);
            $migration->up();
        }

        return CommandInterface::EXIT_SUCCESS;
    }
}