<?php
/**
 * Timezone Select Field plugin for Craft CMS 3.x
 *
 * Select a timezone
 *
 * @link      https://github.com/coxeh
 * @copyright Copyright (c) 2020 Carl Glaysher
 */

namespace coxeh\timezoneselectfield;

use coxeh\timezoneselectfield\fields\Timezone as TimezoneField;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\services\Fields;
use craft\events\RegisterComponentTypesEvent;

use yii\base\Event;

/**
 * Class TimezoneSelectField
 *
 * @author    Carl Glaysher
 * @package   TimezoneSelectField
 * @since     1.0.0
 *
 */
class TimezoneSelectField extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var TimezoneSelectField
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            Fields::class,
            Fields::EVENT_REGISTER_FIELD_TYPES,
            function (RegisterComponentTypesEvent $event) {
                $event->types[] = TimezoneField::class;
            }
        );

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Craft::info(
            Craft::t(
                'timezone-select-field',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

}
