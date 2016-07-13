# Grav DateTranslations plugin

Date Translations provides twig function `date_translate(DATE, FORMAT)` that provides translations for dates using [Date](https://github.com/jenssegers/date) as a wrapper around Carbon.

# Installation

As this plugin is not yet in the Grav repository, you need to install it manually. From your plugins folder:
```
git clone https://github.com/paulcmal/grav-plugin-datetranslations
mv grav-plugin-socialmeta datetranslations
```

# Usage

`date_translate()` takes two arguments:
- a string parsable by the [Carbon API](https://github.com/briannesbitt/Carbon) for a date
- a [dateformat](http://php.net/manual/fr/function.date.php)

For example, to display the current date formatted like '13 July 2016':
`{{ date.translate('now', 'd F Y') }}`

Or to display the day of the week of the 1st of next month:
`{{ date_translate('first day of next month', 'l'}}`

```

# License

This work is too short and generic to be subject to intellectual property laws. It is therefore considered to be in the public domain.

However, if need be, you can consider this work to be released under the `Fuck Property Public License`.

## Fuck Property Public License

This production is released as part of the public domain. I renounce every so-called right of intellectual property over it.

As [property is theft](https://propertyistheft.wordpress.com/what-i-believe-in/property-is-theft/) and oppression, and no form of property is ever tolerable, feel free to [do what the fuck you want with it](http://www.wtfpl.net/), but don't forget to share around in the pure copyleft spirit.

# Contributing

If you feel like improving something, feel free to!
