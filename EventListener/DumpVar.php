<?php
/**
 * Created by PhpStorm.
 * User: cachorios
 * Date: 21/03/2016
 * Time: 20:27
 */

namespace RBSoft\ABMGeneratorBundle\EventListener;


class DumpVar
{
    private $config;

    public function __construct($config)
    {
        $this->config = $config;

    }

    public function getParameter()
    {
        return $this->config;
    }

}