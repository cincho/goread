<?php

declare(strict_types=1);

namespace Cincho\Framework\Template;

class Engine
{
    private array $directories = [];

    public function appendDirectory(string $directory): self
    {
        $this->directories[] = $directory;

        return $this;
    }

    public function render(string $template, array $data = []): string
    {
        foreach ($this->directories as $dir) {
            $filename = sprintf('%s%s', $dir, $template);

            if (file_exists($filename)) {
                ob_start();
                extract($data);
                require_once($filename);
                $content = ob_get_contents();
                ob_end_clean();

                return $content;
            }
        }

        throw new \Exception(sprintf('Template %s could not be found in: "%s"',
            $template,
            implode('", "', $this->directories)
        ));
    }
}