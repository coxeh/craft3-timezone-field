<?php
/**
 * Timezone Select Field plugin for Craft CMS 3.x
 *
 * Select a timezone
 *
 * @link      https://github.com/coxeh
 * @copyright Copyright (c) 2020 Carl Glaysher
 */

namespace coxeh\timezoneselectfield\assetbundles\timezonefield;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    Carl Glaysher
 * @package   TimezoneSelectField
 * @since     1.0.0
 */
class TimezoneFieldAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@coxeh/timezoneselectfield/assetbundles/timezonefield/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/Timezone.js',
        ];

        $this->css = [
            'css/Timezone.css',
        ];

        parent::init();
    }
}
