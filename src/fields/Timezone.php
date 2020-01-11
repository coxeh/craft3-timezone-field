<?php
/**
 * Timezone Select Field plugin for Craft CMS 3.x
 *
 * Select a timezone
 *
 * @link      https://github.com/coxeh
 * @copyright Copyright (c) 2020 Carl Glaysher
 */

namespace coxeh\timezoneselectfield\fields;

use coxeh\timezoneselectfield\TimezoneSelectField;
use coxeh\timezoneselectfield\assetbundles\timezonefield\TimezoneFieldAsset;

use Craft;
use craft\base\ElementInterface;
use craft\base\Field;
use craft\helpers\DateTimeHelper;
use craft\helpers\Db;
use yii\db\Schema;
use craft\helpers\Json;

/**
 * @author    Carl Glaysher
 * @package   TimezoneSelectField
 * @since     1.0.0
 */
class Timezone extends Field
{


    // Static Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public static function displayName(): string
    {
        return Craft::t('timezone-select-field', 'Timezone');
    }

    /**
     * @inheritdoc
     */
    public function getContentColumnType(): string
    {
        return Schema::TYPE_STRING;
    }

    /**
     * @inheritdoc
     */
    public function normalizeValue($value, ElementInterface $element = null)
    {
        return $value;
    }

    /**
     * @inheritdoc
     */
    public function serializeValue($value, ElementInterface $element = null)
    {
        return parent::serializeValue($value, $element);
    }


    public function getInputHtml($value, ElementInterface $element = null): string
    {
        $value = (is_null($value) ? Craft::$app->getTimeZone() : $value);
        return Craft::$app->getView()->renderTemplate('_includes/forms/select', [
            'name' => $this->handle,
            'value' => $value,
            'options' => $this->getTimezoneOptions(),
        ]);
    }

    public function getTimezoneOptions() {
        return array_map(function($tz) {
            $date = (new \DateTime('now',new \DateTimeZone($tz)));
            $name = str_replace('_',' ',$date->format('e'));
            return [
                'value'=>$tz,
                'label'=>$name.' '.$date->format('(P)')
            ];
        },timezone_identifiers_list());
    }
}
