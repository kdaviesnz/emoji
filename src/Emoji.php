<?php

namespace kdaviesnz\emoji;

/**
 * Class Emoji
 * @package kdaviesnz\emoji
 */
class Emoji implements IEmoji
{
    /**
     * Emoji constructor.
     */
    public function __construct()
    {
    }

    /**
     * @param string $str
     * @return bool
     */
    public function checkEmoji(string $str):bool
    {
        preg_match( '/^[\x{1F600}-\x{1F64F}]$/u', $str, $matches_emo );
        return !empty( $matches_emo[0] ) ? true : false;
    }

    /**
     * @param string $text
     * @return string
     */
    public function removeEmoji(string $text):string
    {
        return (
        preg_replace(
            '/[\x{1F600}-\x{1F64F}]/u',
            '',
            mb_convert_encoding( $text, "UTF-8" )
        )
        );
    }
}
