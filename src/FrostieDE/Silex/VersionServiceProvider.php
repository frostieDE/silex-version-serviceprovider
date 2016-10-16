<?php

namespace FrostieDE\Silex;

use Pimple\Container;
use Pimple\ServiceProviderInterface;

class VersionServiceProvider implements ServiceProviderInterface {
    /**
     * @inheritDoc
     */
    public function register(Container $app) {
        $app['version.suffix'] = '';

        $app['version'] = function() use($app) {
            if(isset($app['version.file']) && file_exists($app['version.file'])) {
                $version = file_get_contents($app['version.file']);
            } else {
                throw new \RuntimeException('Cannot find version file specified in $app[\'version.file\']');
            }

            $suffix = $app['version.suffix'];

            if(!empty($suffix)) {
                $version .= $suffix;
            }

            return $version;
        };
    }
}