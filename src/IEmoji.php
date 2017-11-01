<?php

namespace kdaviesnz\emoji;


interface IEmoji
{
    public function checkEmoji(string $str):bool;
    public function removeEmoji(string $text):string;
}