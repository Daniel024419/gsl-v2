<?php

namespace App\Enum;

enum Language: string
{
    case AF = 'af';
    case SQ = 'sq';
    case AM = 'am';
    case AR = 'ar';
    case HY = 'hy';
    case AZ = 'az';
    case EU = 'eu';
    case BE = 'be';
    case BN = 'bn';
    case BS = 'bs';
    case BG = 'bg';
    case CA = 'ca';
    case CEB = 'ceb';
    case NY = 'ny';
    case ZH_CN = 'zh-CN';
    case ZH_TW = 'zh-TW';
    case CO = 'co';
    case HR = 'hr';
    case CS = 'cs';
    case DA = 'da';
    case NL = 'nl';
    case EN = 'en';
    case EO = 'eo';
    case ET = 'et';
    case TL = 'tl';
    case FI = 'fi';
    case FR = 'fr';
    case FY = 'fy';
    case GL = 'gl';
    case KA = 'ka';
    case DE = 'de';
    case EL = 'el';
    case GU = 'gu';
    case HT = 'ht';
    case HA = 'ha';
    case HAW = 'haw';
    case IW = 'iw';
    case HI = 'hi';
    case HMN = 'hmn';
    case HU = 'hu';
    case IS = 'is';
    case IG = 'ig';
    case ID = 'id';
    case GA = 'ga';
    case IT = 'it';
    case JA = 'ja';
    case JW = 'jw';
    case KN = 'kn';
    case KK = 'kk';
    case KM = 'km';
    case KO = 'ko';
    case KU = 'ku';
    case KY = 'ky';
    case LO = 'lo';
    case LA = 'la';
    case LV = 'lv';
    case LT = 'lt';
    case LB = 'lb';
    case MK = 'mk';
    case MG = 'mg';
    case MS = 'ms';
    case ML = 'ml';
    case MT = 'mt';
    case MI = 'mi';
    case MR = 'mr';
    case MN = 'mn';
    case MY = 'my';
    case NE = 'ne';
    case NO = 'no';
    case PS = 'ps';
    case FA = 'fa';
    case PL = 'pl';
    case PT = 'pt';
    case PA = 'pa';
    case RO = 'ro';
    case RU = 'ru';
    case SM = 'sm';
    case GD = 'gd';
    case SR = 'sr';
    case ST = 'st';
    case SN = 'sn';
    case SD = 'sd';
    case SI = 'si';
    case SK = 'sk';
    case SL = 'sl';
    case SO = 'so';
    case ES = 'es';
    case SU = 'su';
    case SW = 'sw';
    case SV = 'sv';
    case TG = 'tg';
    case TA = 'ta';
    case TE = 'te';
    case TH = 'th';
    case TR = 'tr';
    case UK = 'uk';
    case UR = 'ur';
    case UZ = 'uz';
    case VI = 'vi';
    case CY = 'cy';
    case XH = 'xh';
    case YI = 'yi';
    case YO = 'yo';
    case ZU = 'zu';

    private const ENGLISH_NAMES = [
        'af' => 'Afrikaans',
        'sq' => 'Albanian',
        'am' => 'Amharic',
        'ar' => 'Arabic',
        'hy' => 'Armenian',
        'az' => 'Azerbaijani',
        'eu' => 'Basque',
        'be' => 'Belarusian',
        'bn' => 'Bengali',
        'bs' => 'Bosnian',
        'bg' => 'Bulgarian',
        'ca' => 'Catalan',
        'ceb' => 'Cebuano',
        'ny' => 'Chichewa',
        'zh-CN' => 'Chinese (Simplified)',
        'zh-TW' => 'Chinese (Traditional)',
        'co' => 'Corsican',
        'hr' => 'Croatian',
        'cs' => 'Czech',
        'da' => 'Danish',
        'nl' => 'Dutch',
        'en' => 'English',
        'eo' => 'Esperanto',
        'et' => 'Estonian',
        'tl' => 'Filipino',
        'fi' => 'Finnish',
        'fr' => 'French',
        'fy' => 'Frisian',
        'gl' => 'Galician',
        'ka' => 'Georgian',
        'de' => 'German',
        'el' => 'Greek',
        'gu' => 'Gujarati',
        'ht' => 'Haitian Creole',
        'ha' => 'Hausa',
        'haw' => 'Hawaiian',
        'iw' => 'Hebrew',
        'hi' => 'Hindi',
        'hmn' => 'Hmong',
        'hu' => 'Hungarian',
        'is' => 'Icelandic',
        'ig' => 'Igbo',
        'id' => 'Indonesian',
        'ga' => 'Irish',
        'it' => 'Italian',
        'ja' => 'Japanese',
        'jw' => 'Javanese',
        'kn' => 'Kannada',
        'kk' => 'Kazakh',
        'km' => 'Khmer',
        'ko' => 'Korean',
        'ku' => 'Kurdish (Kurmanji)',
        'ky' => 'Kyrgyz',
        'lo' => 'Lao',
        'la' => 'Latin',
        'lv' => 'Latvian',
        'lt' => 'Lithuanian',
        'lb' => 'Luxembourgish',
        'mk' => 'Macedonian',
        'mg' => 'Malagasy',
        'ms' => 'Malay',
        'ml' => 'Malayalam',
        'mt' => 'Maltese',
        'mi' => 'Maori',
        'mr' => 'Marathi',
        'mn' => 'Mongolian',
        'my' => 'Myanmar (Burmese)',
        'ne' => 'Nepali',
        'no' => 'Norwegian',
        'ps' => 'Pashto',
        'fa' => 'Persian',
        'pl' => 'Polish',
        'pt' => 'Portuguese',
        'pa' => 'Punjabi',
        'ro' => 'Romanian',
        'ru' => 'Russian',
        'sm' => 'Samoan',
        'gd' => 'Scottish Gaelic',
        'sr' => 'Serbian',
        'st' => 'Sesotho',
        'sn' => 'Shona',
        'sd' => 'Sindhi',
        'si' => 'Sinhala',
        'sk' => 'Slovak',
        'sl' => 'Slovenian',
        'so' => 'Somali',
        'es' => 'Spanish',
        'su' => 'Sundanese',
        'sw' => 'Swahili',
        'sv' => 'Swedish',
        'tg' => 'Tajik',
        'ta' => 'Tamil',
        'te' => 'Telugu',
        'th' => 'Thai',
        'tr' => 'Turkish',
        'uk' => 'Ukrainian',
        'ur' => 'Urdu',
        'uz' => 'Uzbek',
        'vi' => 'Vietnamese',
        'cy' => 'Welsh',
        'xh' => 'Xhosa',
        'yi' => 'Yiddish',
        'yo' => 'Yoruba',
        'zu' => 'Zulu',
    ];

    private const NATIVE_NAMES = [
        'af' => 'Afrikaans',
        'sq' => 'Shqip',
        'am' => '\\u12a0\\u121b\\u122d\\u129b',
        'ar' => '\\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\\u0629',
        'hy' => '\\u0540\\u0561\\u0575\\u0565\\u0580\\u0565\\u0576',
        'az' => 'Az\\u0259rbaycan dili',
        'eu' => 'Euskara',
        'be' => '\\u0411\\u0435\\u043b\\u0430\\u0440\\u0443\\u0441\\u043a\\u0430\\u044f \\u043c\\u043e\\u0432\\u0430',
        'bn' => '\\u09ac\\u09be\\u0982\\u09b2\\u09be',
        'bs' => 'Bosanski',
        'bg' => '\\u0411\\u044a\\u043b\\u0433\\u0430\\u0440\\u0441\\u043a\\u0438',
        'ca' => 'Catal\\u00e0',
        'ceb' => 'Cebuano',
        'ny' => 'Chichewa',
        'zh-CN' => '\\u7b80\\u4f53\\u4e2d\\u6587',
        'zh-TW' => '\\u7e41\\u9ad4\\u4e2d\\u6587',
        'co' => 'Corsu',
        'hr' => 'Hrvatski',
        'cs' => '\\u010ce\\u0161tina\\u200e',
        'da' => 'Dansk',
        'nl' => 'Nederlands',
        'en' => 'English',
        'eo' => 'Esperanto',
        'et' => 'Eesti',
        'tl' => 'Filipino',
        'fi' => 'Suomi',
        'fr' => 'Fran\\u00e7ais',
        'fy' => 'Frysk',
        'gl' => 'Galego',
        'ka' => '\\u10e5\\u10d0\\u10e0\\u10d7\\u10e3\\u10da\\u10d8',
        'de' => 'Deutsch',
        'el' => '\\u0395\\u03bb\\u03bb\\u03b7\\u03bd\\u03b9\\u03ba\\u03ac',
        'gu' => '\\u0a97\\u0ac1\\u0a9c\\u0ab0\\u0abe\\u0aa4\\u0ac0',
        'ht' => 'Kreyol ayisyen',
        'ha' => 'Harshen Hausa',
        'haw' => '\\u014clelo Hawai\\u02bbi',
        'iw' => '\\u05e2\\u05b4\\u05d1\\u05b0\\u05e8\\u05b4\\u05d9\\u05ea',
        'hi' => '\\u0939\\u093f\\u0928\\u094d\\u0926\\u0940',
        'hmn' => 'Hmong',
        'hu' => 'Magyar',
        'is' => '\\u00cdslenska',
        'ig' => 'Igbo',
        'id' => 'Bahasa Indonesia',
        'ga' => 'Gaeilge',
        'it' => 'Italiano',
        'ja' => '\\u65e5\\u672c\\u8a9e',
        'jw' => 'Basa Jawa',
        'kn' => '\\u0c95\\u0ca8\\u0ccd\\u0ca8\\u0ca1',
        'kk' => '\\u049a\\u0430\\u0437\\u0430\\u049b \\u0442\\u0456\\u043b\\u0456',
        'km' => '\\u1797\\u17b6\\u179f\\u17b6\\u1781\\u17d2\\u1798\\u17c2\\u179a',
        'ko' => '\\ud55c\\uad6d\\uc5b4',
        'ku' => '\\u0643\\u0648\\u0631\\u062f\\u06cc\\u200e',
        'ky' => '\\u041a\\u044b\\u0440\\u0433\\u044b\\u0437\\u0447\\u0430',
        'lo' => '\\u0e9e\\u0eb2\\u0eaa\\u0eb2\\u0ea5\\u0eb2\\u0ea7',
        'la' => 'Latin',
        'lv' => 'Latvie\\u0161u valoda',
        'lt' => 'Lietuvi\\u0173 kalba',
        'lb' => 'L\\u00ebtzebuergesch',
        'mk' => '\\u041c\\u0430\\u043a\\u0435\\u0434\\u043e\\u043d\\u0441\\u043a\\u0438 \\u0458\\u0430\\u0437\\u0438\\u043a',
        'mg' => 'Malagasy',
        'ms' => 'Bahasa Melayu',
        'ml' => '\\u0d2e\\u0d32\\u0d2f\\u0d3e\\u0d33\\u0d02',
        'mt' => 'Maltese',
        'mi' => 'Te Reo M\\u0101ori',
        'mr' => '\\u092e\\u0930\\u093e\\u0920\\u0940',
        'mn' => '\\u041c\\u043e\\u043d\\u0433\\u043e\\u043b',
        'my' => '\\u1017\\u1019\\u102c\\u1005\\u102c',
        'ne' => '\\u0928\\u0947\\u092a\\u093e\\u0932\\u0940',
        'no' => 'Norsk bokm\\u00e5l',
        'ps' => '\\u067e\\u069a\\u062a\\u0648',
        'fa' => '\\u0641\\u0627\\u0631\\u0633\\u06cc',
        'pl' => 'Polski',
        'pt' => 'Portugu\\u00eas',
        'pa' => '\\u0a2a\\u0a70\\u0a1c\\u0a3e\\u0a2c\\u0a40',
        'ro' => 'Rom\\u00e2n\\u0103',
        'ru' => '\\u0420\\u0443\\u0441\\u0441\\u043a\\u0438\\u0439',
        'sm' => 'Samoan',
        'gd' => 'G\\u00e0idhlig',
        'sr' => '\\u0421\\u0440\\u043f\\u0441\\u043a\\u0438 \\u0458\\u0435\\u0437\\u0438\\u043a',
        'st' => 'Sesotho',
        'sn' => 'Shona',
        'sd' => '\\u0633\\u0646\\u068c\\u064a',
        'si' => '\\u0dc3\\u0dd2\\u0d82\\u0dc4\\u0dbd',
        'sk' => 'Sloven\\u010dina',
        'sl' => 'Sloven\\u0161\\u010dina',
        'so' => 'Afsoomaali',
        'es' => 'Espa\\u00f1ol',
        'su' => 'Basa Sunda',
        'sw' => 'Kiswahili',
        'sv' => 'Svenska',
        'tg' => '\\u0422\\u043e\\u04b7\\u0438\\u043a\\u04e3',
        'ta' => '\\u0ba4\\u0bae\\u0bbf\\u0bb4\\u0bcd',
        'te' => '\\u0c24\\u0c46\\u0c32\\u0c41\\u0c17\\u0c41',
        'th' => '\\u0e44\\u0e17\\u0e22',
        'tr' => 'T\\u00fcrk\\u00e7e',
        'uk' => '\\u0423\\u043a\\u0440\\u0430\\u0457\\u043d\\u0441\\u044c\\u043a\\u0430',
        'ur' => '\\u0627\\u0631\\u062f\\u0648',
        'uz' => 'O\\u2018zbekcha',
        'vi' => 'Ti\\u1ebfng Vi\\u1ec7t',
        'cy' => 'Cymraeg',
        'xh' => 'isiXhosa',
        'yi' => '\\u05d9\\u05d9\\u05d3\\u05d9\\u05e9',
        'yo' => 'Yor\\u00f9b\\u00e1',
        'zu' => 'Zulu',
    ];

    public static function englishMap(): array
    {
        return self::ENGLISH_NAMES;
    }

    public static function nativeMap(): array
    {
        return array_map(self::decodeUnicodeEscapes(...), self::NATIVE_NAMES);
    }

    public static function codes(): array
    {
        return array_column(self::cases(), 'value');
    }

    public function englishName(): string
    {
        return self::ENGLISH_NAMES[$this->value] ?? $this->value;
    }

    public function nativeName(): string
    {
        return self::decodeUnicodeEscapes(self::NATIVE_NAMES[$this->value] ?? $this->value);
    }

    private static function decodeUnicodeEscapes(string $value): string
    {
        if (!str_contains($value, '\\u')) {
            return $value;
        }

        $json = '"' . addcslashes($value, "\\\"") . '"';
        $decoded = json_decode($json, true);

        return is_string($decoded) ? $decoded : $value;
    }
}
