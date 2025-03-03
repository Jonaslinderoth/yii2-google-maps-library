<?php

/*
 *
 * @copyright Copyright (c) 2013-2019 2amigos 
 * @link http://2amigos.us
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 *
 */

namespace jonaslinderoth\google\maps\services;

use jonaslinderoth\google\maps\ClientAbstract;
use jonaslinderoth\google\maps\LatLng;
use Yii;
use yii\base\InvalidConfigException;
use yii\helpers\ArrayHelper;

/**
 * GeocodingClient
 *
 * Utility class to call Google's Geocoding API to get address geo information + reverse lookup. For further information
 * please visit https://developers.google.com/maps/documentation/geocoding/
 *
 * @author Antonio Ramirez <hola@2amigos.us>
 * 
 * @link http://www.2amigos.us/
 * @package jonaslinderoth\google\maps
 */
class GeocodingClient extends ClientAbstract
{
    /**
     * @inheritdoc
     * @param array $config
     */
    public function __construct($config = [])
    {
        $this->params = ArrayHelper::merge(
            [
                'address' => null,
                'components' => null,
                'bounds' => null,
                'location' => null,
                'region' => null,
                'language' => null,
            ],
            $this->params
        );

        parent::__construct($config);
    }

    /**
     * Returns the api url
     * @return string
     */
    public function getUrl()
    {
        return 'https://maps.googleapis.com/maps/api/geocode/' . $this->format;
    }

    /**
     * Makes a geocoding request for an address or components parameters. Please, review the documentation on
     * https://developers.google.com/maps/documentation/geocoding/#GeocodingResponses for further information about the
     * expected results.
     *
     * @param array $params parameters for the request. These override [GeocodingRequest::params].
     *
     * @throws \yii\base\InvalidConfigException
     * @return mixed|null
     */
    public function lookup($params = [])
    {
        $this->params = ArrayHelper::merge($this->params, $params);

        if ($this->params['address'] == null && $this->params['components'] == null) {
            throw new InvalidConfigException('"address" or "components" must be set for the request. Both cannot be null');
        }

        return parent::request();
    }

    /**
     * Makes a reverse geocoding
     *
     * @param LatLng $coord
     * @param array $params parameters for the request. These override [GeocodingRequest::params].
     * @return mixed|null
     */
    public function reverse(LatLng $coord, $params = [])
    {
        $params['latlng'] = $coord->__toString();

        $this->params = ArrayHelper::merge($this->params, $params);

        return parent::request();
    }
}
