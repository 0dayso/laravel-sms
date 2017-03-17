<?php
/**
 * author: crisen
 * email: crisen@crisen.org
 * date: 2017/3/16 11:44
 * description:
 */


namespace LaravelSms\Drivers;

use Exception;

class DriverFactory
{

    protected $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    public function make(array $config, $agent)
    {
        return $this->createSingleAgent($config, $agent);
    }

    protected function createSingleAgent($config, $agent)
    {
        return $this->createDriver($config, $agent);
    }


    protected function createDriver($config, $agent)
    {
        switch ($agent) {
            case 'alidayu':
                return new Alidayu($config);
            case 'ronglian':
                return new Ronglian($config);
            case '253':
                return new TwoFiveThree($config);
        }

        throw new Exception("Unsupported driver [$agent]");
    }
}