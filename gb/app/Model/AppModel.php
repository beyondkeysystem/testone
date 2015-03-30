<?php
App::uses('Model', 'Model');
class AppModel extends Model {

////////////////////////////////////////////////////////////

	public $recursive = -1;

////////////////////////////////////////////////////////////

	public $actsAs = array(
		'Containable',
		'Utils.CsvImport' => array(
			'delimiter'  => '~'
		)
	);

////////////////////////////////////////////////////////////

	public function creations($id = null) {
		$creations = array(
			'Artisinal Domestic' => 'Artisinal Domestic',
			'Artisinal Imported' => 'Artisinal Imported',
			'Packaged Domestic' => 'Packaged Domestic',
			'Packaged Imported' => 'Packaged Imported',
			'Farm Grown Domestic' => 'Farm Grown Domestic',
			'Farm Grown Imported' => 'Farm Grown Imported',
			'Packaged Gourmet Domestic' => 'Packaged Gourmet Domestic',
			'Packaged Gourmet Imported' => 'Packaged Gourmet Imported',
		);
		return $creations;
	}

////////////////////////////////////////////////////////////

	public function states($id = null) {
		$states = array(
			'AL' => 'Alabama',
			'AK' => 'Alaska',
			'AZ' => 'Arizona',
			'AR' => 'Arkansas',
			'CA' => 'California',
			'CO' => 'Colorado',
			'CT' => 'Connecticut',
			'DE' => 'Delaware',
			'DC' => 'District Of Columbia',
			'FL' => 'Florida',
			'GA' => 'Georgia',
			'HI' => 'Hawaii',
			'ID' => 'Idaho',
			'IL' => 'Illinois',
			'IN' => 'Indiana',
			'IA' => 'Iowa',
			'KS' => 'Kansas',
			'KY' => 'Kentucky',
			'LA' => 'Louisiana',
			'ME' => 'Maine',
			'MD' => 'Maryland',
			'MA' => 'Massachusetts',
			'MI' => 'Michigan',
			'MN' => 'Minnesota',
			'MS' => 'Mississippi',
			'MO' => 'Missouri',
			'MT' => 'Montana',
			'NE' => 'Nebraska',
			'NV' => 'Nevada',
			'NH' => 'New Hampshire',
			'NJ' => 'New Jersey',
			'NM' => 'New Mexico',
			'NY' => 'New York',
			'NC' => 'North Carolina',
			'ND' => 'North Dakota',
			'OH' => 'Ohio',
			'OK' => 'Oklahoma',
			'OR' => 'Oregon',
			'PA' => 'Pennsylvania',
			'RI' => 'Rhode Island',
			'SC' => 'South Carolina',
			'SD' => 'South Dakota',
			'TN' => 'Tennessee',
			'TX' => 'Texas',
			'UT' => 'Utah',
			'VT' => 'Vermont',
			'VA' => 'Virginia',
			'WA' => 'Washington',
			'WV' => 'West Virginia',
			'WI' => 'Wisconsin',
			'WY' => 'Wyoming',
			'AE' => 'AE',
			'AA' => 'AA',
			'AP' => 'AP'
		);
		if($id) {
			if(isset($states[$id])) {
				return $states[$id];
			}
		} else {
			return $states;
		}
	}

////////////////////////////////////////////////////////////

	public function countries($id = null) {
		$countries = array(
		'United States' => 'United States',
		'Canada' => 'Canada',
		'Afghanistan' => 'Afghanistan',
		'Albania' => 'Albania',
		'Algeria' => 'Algeria',
		'American Samoa' => 'American Samoa',
		'Angola' => 'Angola',
		'Argentina' => 'Argentina',
		'Armenia' => 'Armenia',
		'Australia' => 'Australia',
		'Austria' => 'Austria',
		'Azerbaijan' => 'Azerbaijan',
		'Bahamas' => 'Bahamas',
		'Bangladesh' => 'Bangladesh',
		'Belgium' => 'Belgium',
		'Bermuda' => 'Bermuda',
		'Bolivia' => 'Bolivia',
		'Bosnia And Herzegovina' => 'Bosnia And Herzegovina',
		'Botswana' => 'Botswana',
		'Brazil' => 'Brazil',
		'British Indian Ocean Territory' => 'British Indian Ocean Territory',
		'Bulgaria' => 'Bulgaria',
		'Cambodia' => 'Cambodia',
		'Cape Verde' => 'Cape Verde',
		'Chile' => 'Chile',
		'China' => 'China',
		'Colombia' => 'Colombia',
		'Costa Rica' => 'Costa Rica',
		'Croatia' => 'Croatia',
		'Cuba' => 'Cuba',
		'Cyprus' => 'Cyprus',
		'Czech Republic' => 'Czech Republic',
		'Denmark' => 'Denmark',
		'Dominican Republic' => 'Dominican Republic',
		'Ecuador' => 'Ecuador',
		'Egypt' => 'Egypt',
		'El Salvador' => 'El Salvador',
		'Estonia' => 'Estonia',
		'Ethiopia' => 'Ethiopia',
		'Fiji' => 'Fiji',
		'Finland' => 'Finland',
		'France' => 'France',
		'Georgia' => 'Georgia',
		'Germany' => 'Germany',
		'Greece' => 'Greece',
		'Guadeloupe' => 'Guadeloupe',
		'Guatemala' => 'Guatemala',
		'Haiti' => 'Haiti',
		'Honduras' => 'Honduras',
		'Hong Kong' => 'Hong Kong',
		'Hungary' => 'Hungary',
		'Iceland' => 'Iceland',
		'India' => 'India',
		'Indonesia' => 'Indonesia',
		'Iran' => 'Iran',
		'Iraq' => 'Iraq',
		'Ireland' => 'Ireland',
		'Israel' => 'Israel',
		'Italy' => 'Italy',
		'Jamaica' => 'Jamaica',
		'Japan' => 'Japan',
		'Jordan' => 'Jordan',
		'Kenya' => 'Kenya',
		'Korea' => 'Korea',
		'Kuwait' => 'Kuwait',
		'Laos' => 'Laos',
		'Lebanon' => 'Lebanon',
		'Liberia' => 'Liberia',
		'Lithuania' => 'Lithuania',
		'Luxembourg' => 'Luxembourg',
		'Macedonia' => 'Macedonia',
		'Madagascar' => 'Madagascar',
		'Malaysia' => 'Malaysia',
		'Mali' => 'Mali',
		'Martinique' => 'Martinique',
		'Mauritius' => 'Mauritius',
		'Mexico' => 'Mexico',
		'Monaco' => 'Monaco',
		'Mongolia' => 'Mongolia',
		'Montenegro' => 'Montenegro',
		'Montserrat' => 'Montserrat',
		'Morocco' => 'Morocco',
		'Mozambique' => 'Mozambique',
		'Myanmar' => 'Myanmar',
		'Nepal' => 'Nepal',
		'Netherlands' => 'Netherlands',
		'New Zealand' => 'New Zealand',
		'Nicaragua' => 'Nicaragua',
		'Norway' => 'Norway',
		'Oman' => 'Oman',
		'Pakistan' => 'Pakistan',
		'Palestinian Territory' => 'Palestinian Territory',
		'Panama' => 'Panama',
		'Papua New Guinea' => 'Papua New Guinea',
		'Peru' => 'Peru',
		'Philippines' => 'Philippines',
		'Poland' => 'Poland',
		'Portugal' => 'Portugal',
		'Puerto Rico' => 'Puerto Rico',
		'Romania' => 'Romania',
		'Russian' => 'Russian',
		'Samoa' => 'Samoa',
		'Saudi Arabia' => 'Saudi Arabia',
		'Serbia' => 'Serbia',
		'Singapore' => 'Singapore',
		'Slovakia' => 'Slovakia',
		'Slovenia' => 'Slovenia',
		'South Africa' => 'South Africa',
		'Spain' => 'Spain',
		'Sri Lanka' => 'Sri Lanka',
		'Swaziland' => 'Swaziland',
		'Sweden' => 'Sweden',
		'Switzerland' => 'Switzerland',
		'Syrian' => 'Syrian',
		'Taiwan' => 'Taiwan',
		'Thailand' => 'Thailand',
		'Trinidad And Tobago' => 'Trinidad And Tobago',
		'Tunisia' => 'Tunisia',
		'Turkey' => 'Turkey',
		'Uganda' => 'Uganda',
		'Ukraine' => 'Ukraine',
		'United Kingdom' => 'United Kingdom',
		'Uruguay' => 'Uruguay',
		'Venezuela' => 'Venezuela',
		'Viet Nam' => 'Viet Nam',
		);
		if($id) {
			if(isset($countries[$id])) {
				return $countries[$id];
			}
		} else {
			return $countries;
		}
	}

////////////////////////////////////////////////////////////

}
