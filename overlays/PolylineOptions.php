<?php

/*
 *
 * @copyright Copyright (c) 2013-2019 2amigos 
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 *
 */

namespace jonaslinderoth\google\maps\overlays;

use jonaslinderoth\google\maps\LatLng;
use jonaslinderoth\google\maps\ObjectAbstract;
use jonaslinderoth\google\maps\OptionsTrait;
use yii\helpers\ArrayHelper;
use yii\web\JsExpression;

/**
 * PolylineOptions
 *
 * Eases the configuration of a polyline
 *
 * @property boolean $clickable Indicates whether this Polyline handles mouse events. Defaults to true.
 * @property boolean $draggable If set to true, the user can drag this shape over the map. The geodesic property defines
 * the mode of dragging. Defaults to false.
 * @property boolean $editable If set to true, the user can edit this shape by dragging the control points shown at the
 * vertices and on each segment. Defaults to false.
 * @property boolean $geodesic When true, edges of the polygon are interpreted as geodesic and will follow the curvature
 * of the Earth. When false, edges of the polygon are rendered as straight lines in screen space. Note that the shape
 * of a geodesic polygon may appear to change when dragged, as the dimensions are maintained relative to the surface of
 * the earth. Defaults to false.
 * @property IconSequence[] $icons The icons to be rendered along the polyline.
 * @property string $map Map name on which to display Polyline.
 * @property LatLng[] $path The ordered sequence of coordinates of the Polyline. This path may be specified using either
 * a simple array of LatLngs, or an MVCArray of LatLngs. Note that if you pass a simple array, it will be converted to
 * an MVCArray Inserting or removing LatLngs in the MVCArray will automatically update the polyline on the map.
 * @property string $strokeColor The stroke color. All CSS3 colors are supported except for extended named colors.
 * @property int $strokeOpacity The stroke opacity between 0.0 and 1.0
 * @property int $strokeWeight The stroke width in pixels.
 * @property boolean $visible Whether this polygon is visible on the map. Defaults to true.
 * @property int $zIndex The zIndex compared to other polylines.
 *
 * @author Antonio Ramirez <hola@2amigos.us>
 * 
 * @link http://www.2amigos.us/
 * @package jonaslinderoth\google\maps
 */
class PolylineOptions extends ObjectAbstract
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
                'clickable' => null,
                'draggable' => null,
                'editable' => null,
                'geodesic' => null,
                'icons' => [],
                'map' => null,
                'path' => [],
                'strokeColor' => null,
                'strokeOpacity' => null,
                'strokeWeight' => null,
                'visible' => null,
                'zIndex' => null,
            ],
            $this->options
        );

        parent::__construct($config);
    }

    /**
     * Adds an IconSequence
     *
     * @param IconSequence $icon
     */
    public function addIcon(IconSequence $icon)
    {
        $copy = clone $icon;
        $copy->setName(null);
        $this->options['icons'][] = new JsExpression($copy->getJs());
    }

    /**
     * Adds a coordinate to the path array
     *
     * @param LatLng $coord
     */
    public function addCoord(LatLng $coord)
    {
        $this->options['path'][] = $coord;
    }

    /**
     * Sets the path of the polygon
     *
     * @param LatLng[] $coords
     */
/*    public function setPath($coords)
    {
        foreach ($coords as $coord) {
            $this->addCoord($coord);
        }
    }*/
}
