<?php

/*
 *
 * @copyright Copyright (c) 2013-2019 2amigos 
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 *
 */

namespace jonaslinderoth\google\maps\services;

use jonaslinderoth\google\maps\controls\PanControlOptions;
use jonaslinderoth\google\maps\LatLng;
use jonaslinderoth\google\maps\ObjectAbstract;
use jonaslinderoth\google\maps\OptionsTrait;
use yii\helpers\ArrayHelper;

/**
 * StreetViewPanoramaOptions
 *
 * Options defining the properties of a [StreetViewPanorama] object.
 *
 * @property boolean $addressControl The enabled/disabled state of the address control.
 * @property StreetViewAddressControlOptions $addressControlOptions The display options for the address control.
 * @property boolean $clickToGo The enabled/disabled state of click-to-go.
 * @property boolean $disableDefaultUI Enables/disables all default UI. May be overridden individually.
 * @property boolean $disableDoubleClickZoom Enables/disables zoom on double click. Disabled by default.
 * @property boolean $enableCloseButton If true, the close button is displayed. Disabled by default.
 * @property boolean $imageDateControl The enabled/disabled state of the imagery acquisition date control. Disabled by
 * default.
 * @property boolean $linksControl The enabled/disabled state of the links control.
 * @property boolean $panControl The enabled/disabled state of the pan control.
 * @property PanControlOptions $panControlOptions The display options for the pan control.
 * @property string $pano The panorama ID, which should be set when specifying a custom panorama.
 * @property [\jonaslinderoth\google\maps\LatLng]|[\jonaslinderoth\google\maps\LatLngLiteral] $position The LatLng position of the
 * Street View panorama.
 * @property [StreetViewPov] $pov The camera orientation, specified as heading and pitch, for the panorama.
 * @property boolean $scrollwheel If false, disables scrollwheel zooming in Street View. The scrollwheel is enabled by default.
 * @property boolean $visible If true, the Street View panorama is visible on load.
 * @property boolean $zoomControl The enabled/disabled state of the zoom control.
 * @property boolean $zoomControlOptions The display options for the zoom control.
 *
 * @author Antonio Ramirez <hola@2amigos.us>
 * 
 * @link http://www.2amigos.us/
 * @package jonaslinderoth\google\maps\services
 */
class StreetViewPanoramaOptions extends ObjectAbstract
{
    use OptionsTrait;

    /**
     * @inheritdoc
     *
     * @param array $config
     */
    public function __construct($config = [])
    {
        $this->options = ArrayHelper::merge(
            [
                'addressControl' => null,
                'addressControlOptions' => null,
                'clickToGo' => null,
                'disableDefaultUI' => null,
                'disableDoubleClickZoom' => null,
                'enableCloseButton' => null,
                'imageDateControl' => null,
                'linksControl' => null,
                'panControl' => null,
                'panControlOptions' => null,
                'pano' => null,
                'position' => null,
                'pov' => null,
                'scrollwheel' => null,
                'visible' => null,
                'zoomControl' => null,
                'zoomControlOptions' => null,
            ],
            $this->options
        );

        parent::__construct($config);
    }

    /**
     * Sets the coordinate object of the marker. Required.
     *
     * @param LatLng $coord
     */
    public function setPosition(LatLng $coord)
    {
        $this->options['position'] = $coord;
    }

    /**
     * Sets the pan control options.
     *
     * @param PanControlOptions $options
     */
    public function setPanControlOptions(PanControlOptions $options)
    {
        $this->options['panControlOptions'] = $options;
    }

    /**
     * Sets the camera orientation, specified as heading and pitch, for the panorama.
     *
     * @param StreetViewPov $pov
     */
    public function setPov(StreetViewPov $pov)
    {
        $this->options['pov'] = $pov;
    }

    /**
     * Sets the address control options.
     *
     * @param StreetViewAddressControlOptions $options
     */
    public function setAddressControlOptions(StreetViewAddressControlOptions $options)
    {
        $this->options['addressControlOptions'] = $options;
    }
}
