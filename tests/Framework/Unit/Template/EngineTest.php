<?php

declare(strict_types=1);

namespace Cincho\Framework\Test\Unit\Template;

use Cincho\Framework\Template\Engine;
use PHPUnit\Framework\TestCase;

final class EngineTest extends TestCase
{
    public function testInstanceOf(): void
    {
        $this->assertInstanceOf(Engine::class, new Engine());
    }

    public function testDirectoriesAccessors(): void
    {
        $engine = new Engine();
        $engine->appendDirectory('foo');

        $this->assertEquals(['foo'], $engine->getDirectories());

        $engine->appendDirectory('bar');

        $this->assertEquals(['foo', 'bar'], $engine->getDirectories());
    }

    public function testRenderSimpleTemplate(): void
    {
        $content = '<div>Hello</div>';
        $file = uniqid();

        file_put_contents('/tmp/' . $file, $content);

        $engine = new Engine();
        $engine->appendDirectory('/tmp/');

        $this->assertEquals('<div>Hello</div>', $engine->render($file));

        unlink('/tmp/' . $file);
    }

    public function testTemplateNotFoundException(): void
    {
        $engine = new Engine();
        $engine->appendDirectory('/tmp/');

        $this->expectException(\Exception::class);

        $engine->render('foo');
    }

    public function testRenderTemplateExtendingAnother(): void
    {
        $content = '<div>Hello</div>';
        $file1 = uniqid();

        file_put_contents('/tmp/' . $file1, $content);

        $content = '<?php $this->extend("' . $file1 . '"); ?><div>World</div>';
        $file2 = uniqid();

        file_put_contents('/tmp/' . $file2, $content);

        $engine = new Engine();
        $engine->appendDirectory('/tmp/');

        $this->assertEquals('<div>World</div><div>Hello</div>', $engine->render($file2));

        unlink('/tmp/' . $file1);
        unlink('/tmp/' . $file2);
    }

    public function testRenderTemplateExtendingAnotherWithSections(): void
    {
        $content = '<div>Hello <?php $this->start("foo"); ?>Foo<?php $this->end("foo"); ?></div>';
        $file1 = uniqid();

        file_put_contents('/tmp/' . $file1, $content);

        $content = '<?php $this->extend("' . $file1 . '"); ?><?php $this->start("foo"); ?>World<?php $this->end("foo"); ?>';
        $file2 = uniqid();

        file_put_contents('/tmp/' . $file2, $content);

        $engine = new Engine();
        $engine->appendDirectory('/tmp/');

        $this->assertEquals('<div>Hello World</div>', $engine->render($file2));

        unlink('/tmp/' . $file1);
        unlink('/tmp/' . $file2);
    }
}