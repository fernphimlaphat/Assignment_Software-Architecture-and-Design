<?php
include_once('Amount.php');
include_once('AbstractFirst.php');
include_once('FirstStatus.php');
include_once('AbstractSecond.php');
include_once('SecondStatus.php');
include_once('AbstractThird.php');
include_once('ThirdStatus.php');

class StatusFactory implements Amount
{
    
    public function createFirst(): AbstractFirst
    {
        return new FirstStatus();
    }

    public function createSecond(): AbstractSecond
    {
        return new SecondStatus();
    }

    public function createThird(): AbstractThird
    {
        return new ThirdStatus();
    }
}
?>