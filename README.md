# emoji

## Install

Via Composer

``` bash
$ composer require kdaviesnz/emoji
```

## Usage

``` php
$emoji = new \kdaviesnz\emoji\Emoji();
// String is an emoji
$isEmoji = $emoji->checkEmoji("😄");

// String is not an emoji as it contains other characters.
$isEmoji = $emoji->checkEmoji("😐 ");

$withEmoticon = "‘😐";
// Returns "‘";
$withoutEmoticon = $emoji->removeEmoji($withEmoticon);

```

## Change log

Please see CHANGELOG.md for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see CONTRIBUTING.md and CODE_OF_CONDUCT.md for details.

## Security

If you discover any security related issues, please email kdaviesnz@gmail.com instead of using the issue tracker.

## Credits

- kdaviesnz@gmail.com

## License

The MIT License (MIT). Please see LICENSE.md for more information.

# emoji
