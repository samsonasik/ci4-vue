<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use Kint\Renderer\AbstractRenderer;

class Kint extends BaseConfig
{
    /*
    |--------------------------------------------------------------------------
    | Kint
    |--------------------------------------------------------------------------
    |
    | We use Kint's RichRenderer and CLIRenderer. This area contains options
    | that you can set to customize how Kint works for you.
    |
    | For details on these settings, see Kint's docs:
    |	https://kint-php.github.io/kint/
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Global Settings
    |--------------------------------------------------------------------------
    */

    public $plugins;
    public $maxDepth          = 6;
    public $displayCalledFrom = true;
    public $expanded          = false;

    /*
    |--------------------------------------------------------------------------
    | RichRenderer Settings
    |--------------------------------------------------------------------------
    */
    public $richTheme  = 'aante-light.css';
    public $richFolder = false;
    public $richSort   = AbstractRenderer::SORT_FULL;
    public $richObjectPlugins;
    public $richTabPlugins;

    /*
    |--------------------------------------------------------------------------
    | CLI Settings
    |--------------------------------------------------------------------------
    */
    public $cliColors      = true;
    public $cliForceUTF8   = false;
    public $cliDetectWidth = true;
    public $cliMinWidth    = 40;
}
