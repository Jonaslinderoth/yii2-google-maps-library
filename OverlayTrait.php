<?php

/*
 *
 * @copyright Copyright (c) 2013-2019 2amigos 
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 *
 */

namespace jonaslinderoth\google\maps;

use jonaslinderoth\google\maps\overlays\InfoWindow;
use jonaslinderoth\google\maps\overlays\Marker;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;

/**
 * OverlayTrait
 *
 * Common methods of overlays
 *
 * @author Antonio Ramirez <hola@2amigos.us>
 *
 * @link http://www.2amigos.us/
 * @package jonaslinderoth\google\maps
 */
trait OverlayTrait
{
    /**
     *
     * Info window object attached to the object
     * @var InfoWindow
     */
    protected $infoWindow;
    /**
     *
     * If the Info window is shared or not
     * @var boolean
     */
    protected $isInfoWindowShared = false;

    /**
     * Attaches a info window to the object
     *
     * @param InfoWindow $infoWindow
     * @param bool $shared
     */
    public function attachInfoWindow(InfoWindow $infoWindow, $shared = true)
    {
        $this->infoWindow = $infoWindow;
        $this->isInfoWindowShared = $shared;
    }

    /**
     * Returns the attached info window object
     * @return InfoWindow|null
     */
    public function getInfoWindow()
    {
        return $this->infoWindow;
    }

    /**
     * Returns whether the info window attached is shared or not
     * @return bool
     */
    public function getIsInfoWindowShared()
    {
        return $this->isInfoWindowShared;
    }

    /**
     * Sets the map on which to display the overlay. The map is assumed to be the variable map name.
     *
     * @param $map
     */
    public function setMap($map)
    {
        $this->options['map'] = new JsExpression($map);
    }

    /**
     * Returns the initialization code from info window (if any)
     * @return array
     */
    protected function getInfoWindowJs()
    {
        $map = ArrayHelper::getValue($this->options, 'map');

        if ($this->infoWindow !== null) {
            if ($this->isInfoWindowShared) {
                $infoWindowName = $map . 'infoWindow';
                if ($this instanceof Marker) {
                    $js =
                        "$infoWindowName.setContent('{$this->infoWindow->content}');\n" .
                        "$infoWindowName.open($map, this);\n";
                } else {
                    $js =
                        "$infoWindowName.close();\n" .
                        "$infoWindowName.setContent('{$this->infoWindow->content}');\n" .
                        "$infoWindowName.setPosition({$this->getCenterOfBounds()->getJs()});\n" .
                        "$infoWindowName.open($map);\n";
                }
                $this->addEvent(
                    new Event([
                        'trigger' => 'click',
                        'js' => $js
                    ])
                );
            } else {
                $this->addEvent(
                    new Event([
                        'trigger' => 'click',
                        'js' => "{$this->infoWindow->getName()}.open($map, this);\n"
                    ])
                );
                return [$this->infoWindow->getJs()];
            }
        }
        return [];
    }
}
