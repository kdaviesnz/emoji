<?php

require_once("src/IEmoji.php");
require_once("src/Emoji.php");


/**
 * Class EmojiTest
 */
class EmojiTest extends PHPUnit_Framework_TestCase
{

    public function setUp()
    {

    }

    public function tearDown()
    {

    }


    public function testcheckEmoji()
    {

        $emoji = new \kdaviesnz\emoji\Emoji();

        // All text, no emoji.
        $isEmoji = $emoji->checkEmoji("hello world");
        $this->assertTrue(!$isEmoji, "String is not an emoji");

        // String is an emoji
        $isEmoji = $emoji->checkEmoji("😄");
        $this->assertTrue($isEmoji, "String is an emoji");
        $isEmoji = $emoji->checkEmoji("😇");
        $this->assertTrue($isEmoji, "String is an emoji");
        $isEmoji = $emoji->checkEmoji("😐");
        $this->assertTrue($isEmoji, "String is an emoji");

        // String is not an emoji as it contains other characters.
        $isEmoji = $emoji->checkEmoji("😐 ");
        $this->assertTrue(!$isEmoji, "String is not an emoji");
        $isEmoji = $emoji->checkEmoji(" 😐");
        $this->assertTrue(!$isEmoji, "String is not an emoji");
        $isEmoji = $emoji->checkEmoji(" 😐 ");
        $this->assertTrue(!$isEmoji, "String is not an emoji");
        $isEmoji = $emoji->checkEmoji("😐 ADE");
        $this->assertTrue(!$isEmoji, "String is not an emoji");
        $isEmoji = $emoji->checkEmoji("ADE 😐");
        $this->assertTrue(!$isEmoji, "String is not an emoji");
        $isEmoji = $emoji->checkEmoji("😐ADE");
        $this->assertTrue(!$isEmoji, "String is not an emoji");
        $isEmoji = $emoji->checkEmoji("ADE😐");
        $this->assertTrue(!$isEmoji, "String is not an emoji");

        $isEmoji = $emoji->checkEmoji("‘😐");
        $this->assertTrue(!$isEmoji, "String is not an emoji");
        $isEmoji = $emoji->checkEmoji("😐‘");
        $this->assertTrue(!$isEmoji, "String is not an emoji");
        $isEmoji = $emoji->checkEmoji("😐”");
        $this->assertTrue(!$isEmoji, "String is not an emoji");
        $isEmoji = $emoji->checkEmoji("”😐");
        $this->assertTrue(!$isEmoji, "String is not an emoji");
        $isEmoji = $emoji->checkEmoji("‘😐");
        $this->assertTrue(!$isEmoji, "String is not an emoji");
    }

    public function testRemoveEmoji()
    {

        $emoji = new \kdaviesnz\emoji\Emoji();

        $withEmoticon = "HELLO😐";
        $withoutEmoticon = $emoji->removeEmoji($withEmoticon);
        $this->assertTrue("HELLO"==$withoutEmoticon, "Emoticon was not correctly removed");

        $withEmoticon = "😐BYE";
        $withoutEmoticon = $emoji->removeEmoji($withEmoticon);
        $this->assertTrue("BYE"==$withoutEmoticon, "Emoticon was not correctly removed");

        $withEmoticon = "HELLO 😐";
        $withoutEmoticon = $emoji->removeEmoji($withEmoticon);
        $this->assertTrue("HELLO "==$withoutEmoticon, "Emoticon was not correctly removed");

        $withEmoticon = "😐 BYE";
        $withoutEmoticon = $emoji->removeEmoji($withEmoticon);
        $this->assertTrue(" BYE"==$withoutEmoticon, "Emoticon was not correctly removed");

        $withEmoticon = "HELLO 😐";
        $withoutEmoticon = $emoji->removeEmoji($withEmoticon);
        $this->assertTrue("HELLO "==$withoutEmoticon, "Emoticon was not correctly removed");

        $withEmoticon = "HELLO😐 WORLD";
        $withoutEmoticon = $emoji->removeEmoji($withEmoticon);
        $this->assertTrue("HELLO WORLD"==$withoutEmoticon, "Emoticon was not correctly removed");

        $withEmoticon = "HELLO 😐WORLD";
        $withoutEmoticon = $emoji->removeEmoji($withEmoticon);
        $this->assertTrue("HELLO WORLD"==$withoutEmoticon, "Emoticon was not correctly removed");


        $withEmoticon = "😐‘";
        $withoutEmoticon = $emoji->removeEmoji($withEmoticon);
        $this->assertTrue("‘"==$withoutEmoticon, "Emoticon was not correctly removed");
        $withEmoticon = "😐”";
        $withoutEmoticon = $emoji->removeEmoji($withEmoticon);
        $this->assertTrue("”"==$withoutEmoticon, "Emoticon was not correctly removed");
        $withEmoticon = "”😐";
        $withoutEmoticon = $emoji->removeEmoji($withEmoticon);
        $this->assertTrue("”"==$withoutEmoticon, "Emoticon was not correctly removed");
        $withEmoticon = "😐”";
        $withoutEmoticon = $emoji->removeEmoji($withEmoticon);
        $this->assertTrue("”"==$withoutEmoticon, "Emoticon was not correctly removed");
        $withEmoticon = "”😐";
        $withoutEmoticon = $emoji->removeEmoji($withEmoticon);
        $this->assertTrue("”"==$withoutEmoticon, "Emoticon was not correctly removed");
        $withEmoticon = "‘😐";
        $withoutEmoticon = $emoji->removeEmoji($withEmoticon);
        $this->assertTrue("‘"==$withoutEmoticon, "Emoticon was not correctly removed");

    }

}
