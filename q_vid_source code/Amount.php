<?php

interface Amount
{
    public function createFirst(): AbstractFirst;

    public function createSecond(): AbstractSecond;

    public function createThird(): AbstractThird;
}

?>