<?php

declare(strict_types=1);

namespace Cincho\Framework\Template;

class Engine
{
    private string $template;
    private ?string $extend = null;
    private array $components = [];
    private array $directories = [];

    public function appendDirectory(string $directory): self
    {
        $this->directories[] = $directory;

        return $this;
    }

    public function getDirectories(): array
    {
        return $this->directories;
    }

    public function extend(string $template)
    {
        $this->extend = $this->templateFilename($template);
    }

    public function start(string $id)
    {
        if (isset($this->components[$id])) {
            ob_start();
            return;
        }

        ob_start();
        $this->components[$id] = null;
    }
    
    public function end(string $id)
    {
        if (isset($this->components[$id])) {
            ob_get_clean();
            echo $this->components[$id];
            return;
        }

        $content = ob_get_clean();
        $this->components[$id] = $content;
    }

    private function templateFilename(string $template): string
    {
        foreach ($this->directories as $dir) {
            $filename = sprintf('%s%s', $dir, $template);

            if (file_exists($filename)) {
                return $filename;
            }
        }

        throw new \Exception(sprintf('Template %s could not be found in: "%s"',
            $template,
            implode('", "', $this->directories)
        ));
    }

    public function render(string $template, array ...$data): string
    {
        $filename = $this->templateFilename($template);
        $this->template = $filename;

        ob_start();
        include($filename);

        if ($this->extend) {
            include($this->extend);
        }

        $content = ob_get_contents();

        ob_end_clean();

        return $content;
    }
}