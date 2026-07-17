<?php

/**
 * Currency List
 */
trait JobWP_Currency
{
    protected $hmCurrency = '';

    protected function hm_get_all_currency() {
        $this->hmCurrency = '[
            {
              "currency": "Albania Lek",
              "abbreviation": "ALL",
              "symbol": "&#76;&#101;&#107;"
            },
            {
              "currency": "Afghanistan Afghani",
              "abbreviation": "AFN",
              "symbol": "&#1547;"
            },
            {
              "currency": "Argentina Peso",
              "abbreviation": "ARS",
              "symbol": "&#36;"
            },
            {
              "currency": "Aruba Guilder",
              "abbreviation": "AWG",
              "symbol": "&#402;"
            },
            {
              "currency": "Australia Dollar",
              "abbreviation": "AUD",
              "symbol": "&#36;"
            },
            {
              "currency": "Azerbaijan New Manat",
              "abbreviation": "AZN",
              "symbol": "&#1084;&#1072;&#1085;"
            },
            {
              "currency": "Bahamas Dollar",
              "abbreviation": "BSD",
              "symbol": "&#36;"
            },
            {
              "currency": " Bangladeshi Taka",
              "abbreviation": "BDT",
              "symbol": "&#2547;"
            },
            {
              "currency": "Barbados Dollar",
              "abbreviation": "BBD",
              "symbol": "&#36;"
            },
            {
              "currency": "Belarus Ruble",
              "abbreviation": "BYR",
              "symbol": "&#112;&#46;"
            },
            {
              "currency": "Belize Dollar",
              "abbreviation": "BZD",
              "symbol": "&#66;&#90;&#36;"
            },
            {
              "currency": "Bermuda Dollar",
              "abbreviation": "BMD",
              "symbol": "&#36;"
            },
            {
              "currency": "Bolivia Boliviano",
              "abbreviation": "BOB",
              "symbol": "&#36;&#98;"
            },
            {
              "currency": "Bosnia and Herzegovina Convertible Marka",
              "abbreviation": "BAM",
              "symbol": "&#75;&#77;"
            },
            {
              "currency": "Botswana Pula",
              "abbreviation": "BWP",
              "symbol": "&#80;"
            },
            {
              "currency": "Bulgaria Lev",
              "abbreviation": "BGN",
              "symbol": "&#1083;&#1074;"
            },
            {
              "currency": "Brazil Real",
              "abbreviation": "BRL",
              "symbol": "&#82;&#36;"
            },
            {
              "currency": "Brunei Darussalam Dollar",
              "abbreviation": "BND",
              "symbol": "&#36;"
            },
            {
              "currency": "Cambodia Riel",
              "abbreviation": "KHR",
              "symbol": "&#6107;"
            },
            {
              "currency": "Canada Dollar",
              "abbreviation": "CAD",
              "symbol": "&#36;"
            },
            {
              "currency": "Cayman Islands Dollar",
              "abbreviation": "KYD",
              "symbol": "&#36;"
            },
            {
              "currency": "Chile Peso",
              "abbreviation": "CLP",
              "symbol": "&#36;"
            },
            {
              "currency": "China Yuan Renminbi",
              "abbreviation": "CNY",
              "symbol": "&#165;"
            },
            {
              "currency": "Colombia Peso",
              "abbreviation": "COP",
              "symbol": "&#36;"
            },
            {
              "currency": "Costa Rica Colon",
              "abbreviation": "CRC",
              "symbol": "&#8353;"
            },
            {
              "currency": "Croatia Kuna",
              "abbreviation": "HRK",
              "symbol": "&#107;&#110;"
            },
            {
              "currency": "Cuba Peso",
              "abbreviation": "CUP",
              "symbol": "&#8369;"
            },
            {
              "currency": "Czech Republic Koruna",
              "abbreviation": "CZK",
              "symbol": "&#75;&#269;"
            },
            {
              "currency": "Denmark Krone",
              "abbreviation": "DKK",
              "symbol": "&#107;&#114;"
            },
            {
              "currency": "Dominican Republic Peso",
              "abbreviation": "DOP",
              "symbol": "&#82;&#68;&#36;"
            },
            {
              "currency": "East Caribbean Dollar",
              "abbreviation": "XCD",
              "symbol": "&#36;"
            },
            {
              "currency": "Egypt Pound",
              "abbreviation": "EGP",
              "symbol": "&#163;"
            },
            {
              "currency": "El Salvador Colon",
              "abbreviation": "SVC",
              "symbol": "&#36;"
            },
            {
              "currency": "Estonia Kroon",
              "abbreviation": "EEK",
              "symbol": "&#107;&#114;"
            },
            {
              "currency": "Euro Member Countries",
              "abbreviation": "EUR",
              "symbol": "&#8364;"
            },
            {
              "currency": "Falkland Islands (Malvinas) Pound",
              "abbreviation": "FKP",
              "symbol": "&#163;"
            },
            {
              "currency": "Fiji Dollar",
              "abbreviation": "FJD",
              "symbol": "&#36;"
            },
            {
              "currency": "Ghana Cedis",
              "abbreviation": "GHC",
              "symbol": "&#162;"
            },
            {
              "currency": "Gibraltar Pound",
              "abbreviation": "GIP",
              "symbol": "&#163;"
            },
            {
              "currency": "Guatemala Quetzal",
              "abbreviation": "GTQ",
              "symbol": "&#81;"
            },
            {
              "currency": "Guernsey Pound",
              "abbreviation": "GGP",
              "symbol": "&#163;"
            },
            {
              "currency": "Guyana Dollar",
              "abbreviation": "GYD",
              "symbol": "&#36;"
            },
            {
              "currency": "Honduras Lempira",
              "abbreviation": "HNL",
              "symbol": "&#76;"
            },
            {
              "currency": "Hong Kong Dollar",
              "abbreviation": "HKD",
              "symbol": "&#36;"
            },
            {
              "currency": "Hungary Forint",
              "abbreviation": "HUF",
              "symbol": "&#70;&#116;"
            },
            {
              "currency": "Iceland Krona",
              "abbreviation": "ISK",
              "symbol": "&#107;&#114;"
            },
            {
              "currency": "India Rupee",
              "abbreviation": "INR",
              "symbol": "&#8377;"
            },
            {
              "currency": "Indonesia Rupiah",
              "abbreviation": "IDR",
              "symbol": "&#82;&#112;"
            },
            {
              "currency": "Iran Rial",
              "abbreviation": "IRR",
              "symbol": "&#65020;"
            },
            {
              "currency": "Isle of Man Pound",
              "abbreviation": "IMP",
              "symbol": "&#163;"
            },
            {
              "currency": "Israel Shekel",
              "abbreviation": "ILS",
              "symbol": "&#8362;"
            },
            {
              "currency": "Jamaica Dollar",
              "abbreviation": "JMD",
              "symbol": "&#74;&#36;"
            },
            {
              "currency": "Japan Yen",
              "abbreviation": "JPY",
              "symbol": "&#165;"
            },
            {
              "currency": "Jersey Pound",
              "abbreviation": "JEP",
              "symbol": "&#163;"
            },
            {
              "currency": "Kazakhstan Tenge",
              "abbreviation": "KZT",
              "symbol": "&#1083;&#1074;"
            },
            {
              "currency": "Korea (North) Won",
              "abbreviation": "KPW",
              "symbol": "&#8361;"
            },
            {
              "currency": "Korea (South) Won",
              "abbreviation": "KRW",
              "symbol": "&#8361;"
            },
            {
              "currency": "Kyrgyzstan Som",
              "abbreviation": "KGS",
              "symbol": "&#1083;&#1074;"
            },
            {
              "currency": "Laos Kip",
              "abbreviation": "LAK",
              "symbol": "&#8365;"
            },
            {
              "currency": "Latvia Lat",
              "abbreviation": "LVL",
              "symbol": "&#76;&#115;"
            },
            {
              "currency": "Lebanon Pound",
              "abbreviation": "LBP",
              "symbol": "&#163;"
            },
            {
              "currency": "Liberia Dollar",
              "abbreviation": "LRD",
              "symbol": "&#36;"
            },
            {
              "currency": "Lithuania Litas",
              "abbreviation": "LTL",
              "symbol": "&#76;&#116;"
            },
            {
              "currency": "Macedonia Denar",
              "abbreviation": "MKD",
              "symbol": "&#1076;&#1077;&#1085;"
            },
            {
              "currency": "Malaysia Ringgit",
              "abbreviation": "MYR",
              "symbol": "&#82;&#77;"
            },
            {
              "currency": "Mauritius Rupee",
              "abbreviation": "MUR",
              "symbol": "&#8360;"
            },
            {
              "currency": "Mexico Peso",
              "abbreviation": "MXN",
              "symbol": "&#36;"
            },
            {
              "currency": "Mongolia Tughrik",
              "abbreviation": "MNT",
              "symbol": "&#8366;"
            },
            {
              "currency": "Mozambique Metical",
              "abbreviation": "MZN",
              "symbol": "&#77;&#84;"
            },
            {
              "currency": "Namibia Dollar",
              "abbreviation": "NAD",
              "symbol": "&#36;"
            },
            {
              "currency": "Nepal Rupee",
              "abbreviation": "NPR",
              "symbol": "&#8360;"
            },
            {
              "currency": "Netherlands Antilles Guilder",
              "abbreviation": "ANG",
              "symbol": "&#402;"
            },
            {
              "currency": "New Zealand Dollar",
              "abbreviation": "NZD",
              "symbol": "&#36;"
            },
            {
              "currency": "Nicaragua Cordoba",
              "abbreviation": "NIO",
              "symbol": "&#67;&#36;"
            },
            {
              "currency": "Nigeria Naira",
              "abbreviation": "NGN",
              "symbol": "&#8358;"
            },
            {
              "currency": "Korea (North) Won",
              "abbreviation": "KPW",
              "symbol": "&#8361;"
            },
            {
              "currency": "Norway Krone",
              "abbreviation": "NOK",
              "symbol": "&#107;&#114;"
            },
            {
              "currency": "Oman Rial",
              "abbreviation": "OMR",
              "symbol": "&#65020;"
            },
            {
              "currency": "Pakistan Rupee",
              "abbreviation": "PKR",
              "symbol": "&#8360;"
            },
            {
              "currency": "Panama Balboa",
              "abbreviation": "PAB",
              "symbol": "&#66;&#47;&#46;"
            },
            {
              "currency": "Paraguay Guarani",
              "abbreviation": "PYG",
              "symbol": "&#71;&#115;"
            },
            {
              "currency": "Peru Nuevo Sol",
              "abbreviation": "PEN",
              "symbol": "&#83;&#47;&#46;"
            },
            {
              "currency": "Philippines Peso",
              "abbreviation": "PHP",
              "symbol": "&#8369;"
            },
            {
              "currency": "Poland Zloty",
              "abbreviation": "PLN",
              "symbol": "&#122;&#322;"
            },
            {
              "currency": "Qatar Riyal",
              "abbreviation": "QAR",
              "symbol": "&#65020;"
            },
            {
              "currency": "Romania New Leu",
              "abbreviation": "RON",
              "symbol": "&#108;&#101;&#105;"
            },
            {
              "currency": "Russia Ruble",
              "abbreviation": "RUB",
              "symbol": "&#1088;&#1091;&#1073;"
            },
            {
              "currency": "Saint Helena Pound",
              "abbreviation": "SHP",
              "symbol": "&#163;"
            },
            {
              "currency": "Saudi Arabia Riyal",
              "abbreviation": "SAR",
              "symbol": "&#65020;"
            },
            {
              "currency": "Serbia Dinar",
              "abbreviation": "RSD",
              "symbol": "&#1044;&#1080;&#1085;&#46;"
            },
            {
              "currency": "Seychelles Rupee",
              "abbreviation": "SCR",
              "symbol": "&#8360;"
            },
            {
              "currency": "Singapore Dollar",
              "abbreviation": "SGD",
              "symbol": "&#36;"
            },
            {
              "currency": "Solomon Islands Dollar",
              "abbreviation": "SBD",
              "symbol": "&#36;"
            },
            {
              "currency": "Somalia Shilling",
              "abbreviation": "SOS",
              "symbol": "&#83;"
            },
            {
              "currency": "South Africa Rand",
              "abbreviation": "ZAR",
              "symbol": "&#82;"
            },
            {
              "currency": "Korea (South) Won",
              "abbreviation": "KRW",
              "symbol": "&#8361;"
            },
            {
              "currency": "Sri Lanka Rupee",
              "abbreviation": "LKR",
              "symbol": "&#8360;"
            },
            {
              "currency": "Sweden Krona",
              "abbreviation": "SEK",
              "symbol": "&#107;&#114;"
            },
            {
              "currency": "Switzerland Franc",
              "abbreviation": "CHF",
              "symbol": "&#67;&#72;&#70;"
            },
            {
              "currency": "Suriname Dollar",
              "abbreviation": "SRD",
              "symbol": "&#36;"
            },
            {
              "currency": "Syria Pound",
              "abbreviation": "SYP",
              "symbol": "&#163;"
            },
            {
              "currency": "Taiwan New Dollar",
              "abbreviation": "TWD",
              "symbol": "&#78;&#84;&#36;"
            },
            {
              "currency": "Thailand Baht",
              "abbreviation": "THB",
              "symbol": "&#3647;"
            },
            {
              "currency": "Trinidad and Tobago Dollar",
              "abbreviation": "TTD",
              "symbol": "&#84;&#84;&#36;"
            },
            {
              "currency": "Turkey Lira",
              "abbreviation": "TRL",
              "symbol": "&#8356;"
            },
            {
              "currency": "Tuvalu Dollar",
              "abbreviation": "TVD",
              "symbol": "&#36;"
            },
            {
              "currency": "Ukraine Hryvna",
              "abbreviation": "UAH",
              "symbol": "&#8372;"
            },
            {
              "currency": "United Kingdom Pound",
              "abbreviation": "GBP",
              "symbol": "&#163;"
            },
            {
              "currency": "United States Dollar",
              "abbreviation": "USD",
              "symbol": "&#36;"
            },
            {
              "currency": "Uruguay Peso",
              "abbreviation": "UYU",
              "symbol": "&#36;&#85;"
            },
            {
              "currency": "Uzbekistan Som",
              "abbreviation": "UZS",
              "symbol": "&#1083;&#1074;"
            },
            {
              "currency": "Venezuela Bolivar",
              "abbreviation": "VEF",
              "symbol": "&#66;&#115;"
            },
            {
              "currency": "Viet Nam Dong",
              "abbreviation": "VND",
              "symbol": "&#8363;"
            },
            {
              "currency": "Yemen Rial",
              "abbreviation": "YER",
              "symbol": "&#65020;"
            },
            {
              "currency": "Zimbabwe Dollar",
              "abbreviation": "ZWD",
              "symbol": "&#90;&#36;"
            }
          ]';

        return json_decode($this->hmCurrency);
    }

    protected function hm_get_all_country() {
        $countryList = [
            'AF' => 'Afghanistan',
            'AX' => 'Aland Islands',
            'AL' => 'Albania',
            'DZ' => 'Algeria',
            'AS' => 'American Samoa',
            'AD' => 'Andorra',
            'AO' => 'Angola',
            'AI' => 'Anguilla',
            'AQ' => 'Antarctica',
            'AG' => 'Antigua and Barbuda',
            'AR' => 'Argentina',
            'AM' => 'Armenia',
            'AW' => 'Aruba',
            'AU' => 'Australia',
            'AT' => 'Austria',
            'AZ' => 'Azerbaijan',
            'BS' => 'Bahamas the',
            'BH' => 'Bahrain',
            'BD' => 'Bangladesh',
            'BB' => 'Barbados',
            'BY' => 'Belarus',
            'BE' => 'Belgium',
            'BZ' => 'Belize',
            'BJ' => 'Benin',
            'BM' => 'Bermuda',
            'BT' => 'Bhutan',
            'BO' => 'Bolivia',
            'BA' => 'Bosnia and Herzegovina',
            'BW' => 'Botswana',
            'BV' => 'Bouvet Island (Bouvetoya)',
            'BR' => 'Brazil',
            'IO' => 'British Indian Ocean Territory (Chagos Archipelago)',
            'VG' => 'British Virgin Islands',
            'BN' => 'Brunei Darussalam',
            'BG' => 'Bulgaria',
            'BF' => 'Burkina Faso',
            'BI' => 'Burundi',
            'KH' => 'Cambodia',
            'CM' => 'Cameroon',
            'CA' => 'Canada',
            'CV' => 'Cape Verde',
            'KY' => 'Cayman Islands',
            'CF' => 'Central African Republic',
            'TD' => 'Chad',
            'CL' => 'Chile',
            'CN' => 'China',
            'CX' => 'Christmas Island',
            'CC' => 'Cocos (Keeling) Islands',
            'CO' => 'Colombia',
            'KM' => 'Comoros the',
            'CD' => 'Congo',
            'CG' => 'Congo the',
            'CK' => 'Cook Islands',
            'CR' => 'Costa Rica',
            'CI' => 'Cote d\'Ivoire',
            'HR' => 'Croatia',
            'CU' => 'Cuba',
            'CY' => 'Cyprus',
            'CZ' => 'Czech Republic',
            'DK' => 'Denmark',
            'DJ' => 'Djibouti',
            'DM' => 'Dominica',
            'DO' => 'Dominican Republic',
            'EC' => 'Ecuador',
            'EG' => 'Egypt',
            'SV' => 'El Salvador',
            'GQ' => 'Equatorial Guinea',
            'ER' => 'Eritrea',
            'EE' => 'Estonia',
            'ET' => 'Ethiopia',
            'FO' => 'Faroe Islands',
            'FK' => 'Falkland Islands (Malvinas)',
            'FJ' => 'Fiji the Fiji Islands',
            'FI' => 'Finland',
            'FR' => 'France, French Republic',
            'GF' => 'French Guiana',
            'PF' => 'French Polynesia',
            'TF' => 'French Southern Territories',
            'GA' => 'Gabon',
            'GM' => 'Gambia the',
            'GE' => 'Georgia',
            'DE' => 'Germany',
            'GH' => 'Ghana',
            'GI' => 'Gibraltar',
            'GR' => 'Greece',
            'GL' => 'Greenland',
            'GD' => 'Grenada',
            'GP' => 'Guadeloupe',
            'GU' => 'Guam',
            'GT' => 'Guatemala',
            'GG' => 'Guernsey',
            'GN' => 'Guinea',
            'GW' => 'Guinea-Bissau',
            'GY' => 'Guyana',
            'HT' => 'Haiti',
            'HM' => 'Heard Island and McDonald Islands',
            'VA' => 'Holy See (Vatican City State)',
            'HN' => 'Honduras',
            'HK' => 'Hong Kong',
            'HU' => 'Hungary',
            'IS' => 'Iceland',
            'IN' => 'India',
            'ID' => 'Indonesia',
            'IR' => 'Iran',
            'IQ' => 'Iraq',
            'IE' => 'Ireland',
            'IM' => 'Isle of Man',
            'IL' => 'Israel',
            'IT' => 'Italy',
            'JM' => 'Jamaica',
            'JP' => 'Japan',
            'JE' => 'Jersey',
            'JO' => 'Jordan',
            'KZ' => 'Kazakhstan',
            'KE' => 'Kenya',
            'KI' => 'Kiribati',
            'KP' => 'Korea',
            'KR' => 'Korea',
            'KW' => 'Kuwait',
            'KG' => 'Kyrgyz Republic',
            'LA' => 'Lao',
            'LV' => 'Latvia',
            'LB' => 'Lebanon',
            'LS' => 'Lesotho',
            'LR' => 'Liberia',
            'LY' => 'Libyan Arab Jamahiriya',
            'LI' => 'Liechtenstein',
            'LT' => 'Lithuania',
            'LU' => 'Luxembourg',
            'MO' => 'Macao',
            'MK' => 'Macedonia',
            'MG' => 'Madagascar',
            'MW' => 'Malawi',
            'MY' => 'Malaysia',
            'MV' => 'Maldives',
            'ML' => 'Mali',
            'MT' => 'Malta',
            'MH' => 'Marshall Islands',
            'MQ' => 'Martinique',
            'MR' => 'Mauritania',
            'MU' => 'Mauritius',
            'YT' => 'Mayotte',
            'MX' => 'Mexico',
            'FM' => 'Micronesia',
            'MD' => 'Moldova',
            'MC' => 'Monaco',
            'MN' => 'Mongolia',
            'ME' => 'Montenegro',
            'MS' => 'Montserrat',
            'MA' => 'Morocco',
            'MZ' => 'Mozambique',
            'MM' => 'Myanmar',
            'NA' => 'Namibia',
            'NR' => 'Nauru',
            'NP' => 'Nepal',
            'AN' => 'Netherlands Antilles',
            'NL' => 'Netherlands the',
            'NC' => 'New Caledonia',
            'NZ' => 'New Zealand',
            'NI' => 'Nicaragua',
            'NE' => 'Niger',
            'NG' => 'Nigeria',
            'NU' => 'Niue',
            'NF' => 'Norfolk Island',
            'MP' => 'Northern Mariana Islands',
            'NO' => 'Norway',
            'OM' => 'Oman',
            'PK' => 'Pakistan',
            'PW' => 'Palau',
            'PS' => 'Palestinian Territory',
            'PA' => 'Panama',
            'PG' => 'Papua New Guinea',
            'PY' => 'Paraguay',
            'PE' => 'Peru',
            'PH' => 'Philippines',
            'PN' => 'Pitcairn Islands',
            'PL' => 'Poland',
            'PT' => 'Portugal, Portuguese Republic',
            'PR' => 'Puerto Rico',
            'QA' => 'Qatar',
            'RE' => 'Reunion',
            'RO' => 'Romania',
            'RU' => 'Russian Federation',
            'RW' => 'Rwanda',
            'BL' => 'Saint Barthelemy',
            'SH' => 'Saint Helena',
            'KN' => 'Saint Kitts and Nevis',
            'LC' => 'Saint Lucia',
            'MF' => 'Saint Martin',
            'PM' => 'Saint Pierre and Miquelon',
            'VC' => 'Saint Vincent and the Grenadines',
            'WS' => 'Samoa',
            'SM' => 'San Marino',
            'ST' => 'Sao Tome and Principe',
            'SA' => 'Saudi Arabia',
            'SN' => 'Senegal',
            'RS' => 'Serbia',
            'SC' => 'Seychelles',
            'SL' => 'Sierra Leone',
            'SG' => 'Singapore',
            'SK' => 'Slovakia (Slovak Republic)',
            'SI' => 'Slovenia',
            'SB' => 'Solomon Islands',
            'SO' => 'Somalia, Somali Republic',
            'ZA' => 'South Africa',
            'GS' => 'South Georgia and the South Sandwich Islands',
            'ES' => 'Spain',
            'LK' => 'Sri Lanka',
            'SD' => 'Sudan',
            'SR' => 'Suriname',
            'SJ' => 'Svalbard & Jan Mayen Islands',
            'SZ' => 'Swaziland',
            'SE' => 'Sweden',
            'CH' => 'Switzerland, Swiss Confederation',
            'SY' => 'Syrian Arab Republic',
            'TW' => 'Taiwan',
            'TJ' => 'Tajikistan',
            'TZ' => 'Tanzania',
            'TH' => 'Thailand',
            'TL' => 'Timor-Leste',
            'TG' => 'Togo',
            'TK' => 'Tokelau',
            'TO' => 'Tonga',
            'TT' => 'Trinidad and Tobago',
            'TN' => 'Tunisia',
            'TR' => 'Turkey',
            'TM' => 'Turkmenistan',
            'TC' => 'Turks and Caicos Islands',
            'TV' => 'Tuvalu',
            'UG' => 'Uganda',
            'UA' => 'Ukraine',
            'AE' => 'United Arab Emirates',
            'GB' => 'United Kingdom',
            'US' => 'United States of America',
            'UM' => 'United States Minor Outlying Islands',
            'VI' => 'United States Virgin Islands',
            'UY' => 'Uruguay, Eastern Republic of',
            'UZ' => 'Uzbekistan',
            'VU' => 'Vanuatu',
            'VE' => 'Venezuela',
            'VN' => 'Vietnam',
            'WF' => 'Wallis and Futuna',
            'EH' => 'Western Sahara',
            'YE' => 'Yemen',
            'ZM' => 'Zambia',
            'ZW' => 'Zimbabwe'
        ];

        return $countryList;
    }

    protected function hm_get_currency_symbol( $currancy ) {

      $currancy_list = $this->hm_get_all_currency();
      
      foreach ( $currancy_list as $wpsdcurr ) { 
        
        if ( $currancy === $wpsdcurr->abbreviation ) {

          return $wpsdcurr->symbol;

        }
      
      }
      
      return null;

    }
}