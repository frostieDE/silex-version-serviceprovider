<?php

namespace FrostieDE\Silex\Tests;

use FrostieDE\Silex\VersionServiceProvider;
use Pimple\Container;

class VersionServiceProviderTest extends \PHPUnit_Framework_TestCase {
    public function testVersion() {
        $app = new Container();
        $app->register(new VersionServiceProvider(), [
            'version.file' => __DIR__ . '/VERSION'
        ]);

        $this->assertEquals('1.0.0', $app['version']);
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testMissingVersionParameter() {
        $app = new Container();
        $app->register(new VersionServiceProvider());

        $app['version'];
    }

    /**
     * @expectedException \RuntimeException
     */
    public function testMissingVersionFile() {
        $app = new Container();
        $app->register(new VersionServiceProvider(), [
            'version.file' => __DIR__ . '/MISSING_FILE'
        ]);

        $app['version'];
    }

    public function testSuffix() {
        $app = new Container();
        $app->register(new VersionServiceProvider(), [
            'version.file' => __DIR__ . '/VERSION',
            'version.suffix' => '-dev'
        ]);

        $this->assertEquals('1.0.0-dev', $app['version']);
    }
}