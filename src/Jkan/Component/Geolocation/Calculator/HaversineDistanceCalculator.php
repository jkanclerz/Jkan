<?php

namespace Jkan\Component\Geolocation\Calculator;
/**
 * Distance calculator, using The haversine formula is an equation important in navigation,
 * giving great-circle distances between two points on a sphere from their longitudes and latitudes.
 *
 * @package Jkan\Components\Geolocation
 * @author Jakub Kanclerz <jakub.kanclerz@gmail.com>
 **/

class HaversineDistanceCalculator
{
    protected $xlat;
    protected $xlng;
    protected $ylat;
    protected $ylng;

    /* return distance in km */
    public function getDistance()
    {
        if (!$this->isValid()) {
            throw new \InvalidArgumentException('All factors must be provided');
        }

        $dlng = ($this->xlng - $this->ylng);

        $distanceDeg = rad2deg(
                acos(
                    (sin(
                        deg2rad($this->xlat)
                    )
                    * sin(
                        deg2rad($this->ylat)
                    )
                ) 
                + (cos(
                    deg2rad($this->xlat)
                )
                *cos(
                    deg2rad($this->ylat)
                )
                *cos(
                    deg2rad($dlng)
                    )
                )
            )
        );

        $distance = $distanceDeg * 111.13384;

        return $distance;
    }

    protected function isValid()
    {   
        if (!$this->xlat || !$this->xlng || !$this->ylat || !$this->ylng) {
            return false;
        }

        return true;
    }

    public function getXlat()
    {
        return $this->xlat;
    }
    
    public function setXlat($xlat)
    {
        $this->xlat = $xlat;
        return $this;
    }

    public function getXlng()
    {
        return $this->xlng;
    }
    
    public function setXlng($xlng)
    {
        $this->xlng = $xlng;
        return $this;
    }

    public function getYlat()
    {
        return $this->ylat;
    }
    
    public function setYlat($ylat)
    {
        $this->ylat = $ylat;
        return $this;
    }

    public function getYlng()
    {
        return $this->ylng;
    }
    
    public function setYlng($ylng)
    {
        $this->ylng = $ylng;
        return $this;
    }
} // END class 
