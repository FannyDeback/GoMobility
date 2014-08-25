<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

function get_experience_info($origin, $destination, $type)
{
    $origin = urlencode($origin);
    $destination = urlencode($destination);
    $url='http://maps.googleapis.com/maps/api/directions/xml?language=fr&origin='.$origin.'&destination='.$destination.'&sensor=false&mode='.strtolower($type);
    $xml=file_get_contents($url);
    $root = simplexml_load_string($xml);

    if ($root->status == 'OK')
    {
        $distance = $root->route->leg->distance->value;
        $distance /= 1000;
        $ges = $distance;

        switch ($type) {
            case 'WALKING':
                $ges *= 1;
                break;
            case 'DRIVING':
                $ges *= 50;
                break;
            case 'BICYCLING':
                $ges *= 5;
                break;
            case 'TRANSIT':
                $ges *= 20;
                break;

            default:
                $ges *= 1;
                break;
        }

        return array(
            'distance' => $distance,
            'ges'      => $ges
        );
    }
    else
    {
        return array(
            'distance'  => 10000,
            'ges'       => 10000
        );
    }
}
