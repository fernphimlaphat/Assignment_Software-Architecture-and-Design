<?php
include_once('Amount.php');
include_once('AbstractFirst.php');
include_once('FirstLevel.php');
include_once('AbstractSecond.php');
include_once('SecondLevel.php');
include_once('AbstractThird.php');
include_once('ThirdLevel.php');

class LevelFactory implements Amount
{
    public function createFirst(): AbstractFirst
    {
        return new FirstLevel();
    }

    public function createSecond(): AbstractSecond
    {
        return new SecondLevel();
    }

    public function createThird(): AbstractThird
    {
        return new ThirdLevel();
    }
}
?>