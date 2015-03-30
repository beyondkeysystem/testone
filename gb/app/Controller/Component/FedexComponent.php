<?php
class FedexComponent extends Component {

//////////////////////////////////////////////////

/*

$_['text_title']                               = 'Fedex';
$_['text_weight']                              = 'Weight:';
$_['text_eta']                                 = 'Estimated Time:';
$_['text_europe_first_international_priority'] = 'Europe First International Priority';
$_['text_fedex_1_day_freight']                 = 'Fedex 1 Day Freight';
$_['text_fedex_2_day']                         = 'Fedex 2 Day';
$_['text_fedex_2_day_am']                      = 'Fedex 2 Day AM';
$_['text_fedex_2_day_freight']                 = 'Fedex 2 Day Freight';
$_['text_fedex_3_day_freight']                 = 'Fedex 3 Day Freight';
$_['text_fedex_express_saver']                 = 'Fedex Express Saver';
$_['text_fedex_first_freight']                 = 'Fedex First Fright';
$_['text_fedex_freight_economy']               = 'Fedex Fright Economy';
$_['text_fedex_freight_priority']              = 'Fedex Fright Priority';
$_['text_fedex_ground']                        = 'Fedex Ground';
$_['text_first_overnight']                     = 'First Overnight';
$_['text_ground_home_delivery']                = 'Ground Home Delivery';
$_['text_international_economy']               = 'International Economy';
$_['text_international_economy_freight']       = 'International Economy Freight';
$_['text_international_first']                 = 'International First';
$_['text_international_priority']              = 'International Priority';
$_['text_international_priority_freight']      = 'International Priority Freight';
$_['text_priority_overnight']                  = 'Priority Overnight';
$_['text_smart_post']                          = 'Smart Post';
$_['text_standard_overnight']                  = 'Standard Overnight';

*/

//////////////////////////////////////////////////

	public $fedex_dropoff_type = '';
	public $fedex_packaging_type = '';

	//public $url = 'https://gateway.fedex.com/web-services/';
	public $url = 'https://gatewaybeta.fedex.com/web-services/';

	public $handlingFee  = 0;

	public $defaults     = array(
		'ShipperZip' => '94901',
		'ShipperCountry' => 'US',
		'ShipFromZip' => '94901',
		'ShipFromCountry' => 'US',
		'ShipToZip' => '76086',
		'ShipToCountry' => 'US',

		'ShipperNumber' => '01',
		'PickupType' => '01',
		'PackagingType' => '02',

		'DimensionsUnit' => 'IN',

		'DimensionsLength' => '8',
		'DimensionsHeight' => '8',
		'DimensionsWidth' => '8',

		'WeightUnit' => 'LBS',
		'Weight' => '1',

		'Service' => '03'
	);

	public function startup(Controller $controller, $options=array()) {
		$this->defaults = array_merge((array)$this->defaults, (array)$options);
	}

//////////////////////////////////////////////////

	public function getRate($data = null) {
		if ($data['Weight'] < .1) {
			$data['Weight'] = .1;
		}

		$res = $this->request($data);
		if (!empty($res)) {
			return $res;
		}
		return false;
	}

//////////////////////////////////////////////////

	protected function request($data = null) {
		App::uses('Xml', 'Utility');
		$xml = $this->buildRequest($data);
		//print_r($xml);
		$ch = curl_init($this->url);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 60);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
		$res = curl_exec($ch);
		$res = strstr($res, '<?');
		$response = Xml::toArray(Xml::build($res));
		//print_r($response);
		return $response;
	}

//////////////////////////////////////////////////

	protected function buildRequest($data=array()) {

		$this->defaults = array_merge((array)$this->defaults, (array)$data);

		$date = time();

		$day = date('l', $date);

		if ($day == 'Saturday') {
			$date += 172800;
		} elseif ($day == 'Sunday') {
			$date += 86400;
		}

		$xml  = '<?xml version="1.0"?>';
		$xml .= '<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://fedex.com/ws/rate/v10">';
		$xml .= '	<SOAP-ENV:Body>';
		$xml .= '		<ns1:RateRequest>';
		$xml .= '			<ns1:WebAuthenticationDetail>';
		$xml .= '				<ns1:UserCredential>';
		$xml .= '					<ns1:Key>' . Configure::read('Settings.FEDEX_KEY') . '</ns1:Key>';
		$xml .= '					<ns1:Password>' . Configure::read('Settings.FEDEX_PASSWORD') . '</ns1:Password>';
		$xml .= '				</ns1:UserCredential>';
		$xml .= '			</ns1:WebAuthenticationDetail>';
		$xml .= '			<ns1:ClientDetail>';
		$xml .= '				<ns1:AccountNumber>' . Configure::read('Settings.FEDEX_ACCOUNT') . '</ns1:AccountNumber>';
		$xml .= '				<ns1:MeterNumber>' . Configure::read('Settings.FEDEX_METER') . '</ns1:MeterNumber>';
		$xml .= '			</ns1:ClientDetail>';
		$xml .= '			<ns1:Version>';
		$xml .= '				<ns1:ServiceId>crs</ns1:ServiceId>';
		$xml .= '				<ns1:Major>10</ns1:Major>';
		$xml .= '				<ns1:Intermediate>0</ns1:Intermediate>';
		$xml .= '				<ns1:Minor>0</ns1:Minor>';
		$xml .= '			</ns1:Version>';
		$xml .= '			<ns1:ReturnTransitAndCommit>true</ns1:ReturnTransitAndCommit>';
		$xml .= '			<ns1:RequestedShipment>';
		$xml .= '				<ns1:ShipTimestamp>' . date('c', $date) . '</ns1:ShipTimestamp>';
		$xml .= '				<ns1:DropoffType>' . $this->fedex_dropoff_type . '</ns1:DropoffType>';
		$xml .= '				<ns1:PackagingType>' . $this->fedex_packaging_type . '</ns1:PackagingType>';
		$xml .= '				<ns1:Shipper>';
		$xml .= '					<ns1:Contact>';
		$xml .= '						<ns1:PersonName>' . $this->config->get('config_owner') . '</ns1:PersonName>';
		$xml .= '						<ns1:CompanyName>' . $this->config->get('config_name') . '</ns1:CompanyName>';
		$xml .= '						<ns1:PhoneNumber>' . $this->config->get('config_telephone') . '</ns1:PhoneNumber>';
		$xml .= '					</ns1:Contact>';
		$xml .= '					<ns1:Address>';

		if ($country_info['iso_code_2'] == 'US') {
			$xml .= '						<ns1:StateOrProvinceCode>' . ($zone_info ? $zone_info['code'] : '') . '</ns1:StateOrProvinceCode>';
		} else {
			$xml .= '						<ns1:StateOrProvinceCode>' . ($zone_info ? $zone_info['name'] : '') . '</ns1:StateOrProvinceCode>';
		}

		$xml .= '						<ns1:PostalCode>' . $this->config->get('fedex_postcode') . '</ns1:PostalCode>';
		$xml .= '						<ns1:CountryCode>' . $country_info['iso_code_2'] . '</ns1:CountryCode>';
		$xml .= '					</ns1:Address>';
		$xml .= '				</ns1:Shipper>';

		$xml .= '				<ns1:Recipient>';
		$xml .= '					<ns1:Contact>';
		$xml .= '						<ns1:PersonName>' . $address['firstname'] . ' ' . $address['lastname'] . '</ns1:PersonName>';
		$xml .= '						<ns1:CompanyName>' . $address['company'] . '</ns1:CompanyName>';
		$xml .= '						<ns1:PhoneNumber>' . $this->customer->getTelephone() . '</ns1:PhoneNumber>';
		$xml .= '					</ns1:Contact>';
		$xml .= '					<ns1:Address>';
		$xml .= '						<ns1:StreetLines>' . $address['address_1'] . '</ns1:StreetLines>';
		$xml .= '						<ns1:City>' . $address['city'] . '</ns1:City>';

		if ($address['iso_code_2'] == 'US') {
			$xml .= '						<ns1:StateOrProvinceCode>' . $address['zone_code'] . '</ns1:StateOrProvinceCode>';
		} else {
			$xml .= '						<ns1:StateOrProvinceCode>' . $address['zone'] . '</ns1:StateOrProvinceCode>';
		}

		$xml .= '						<ns1:PostalCode>' . $address['postcode'] . '</ns1:PostalCode>';
		$xml .= '						<ns1:CountryCode>' . $address['iso_code_2'] . '</ns1:CountryCode>';
		$xml .= '						<ns1:Residential>' . ($address['company'] ? 'true' : 'false') . '</ns1:Residential>';
		$xml .= '					</ns1:Address>';
		$xml .= '				</ns1:Recipient>';
		$xml .= '				<ns1:ShippingChargesPayment>';
		$xml .= '					<ns1:PaymentType>SENDER</ns1:PaymentType>';
		$xml .= '					<ns1:Payor>';
		$xml .= '						<ns1:AccountNumber>' . $this->fedex_account . '</ns1:AccountNumber>';
		$xml .= '						<ns1:CountryCode>' . $country_info['iso_code_2'] . '</ns1:CountryCode>';
		$xml .= '					</ns1:Payor>';
		$xml .= '				</ns1:ShippingChargesPayment>';
		$xml .= '				<ns1:RateRequestTypes>' . $this->config->get('fedex_rate_type') . '</ns1:RateRequestTypes>';
		$xml .= '				<ns1:PackageCount>1</ns1:PackageCount>';
		$xml .= '				<ns1:RequestedPackageLineItems>';
		$xml .= '					<ns1:SequenceNumber>1</ns1:SequenceNumber>';
		$xml .= '					<ns1:GroupPackageCount>1</ns1:GroupPackageCount>';
		$xml .= '					<ns1:Weight>';
		$xml .= '						<ns1:Units>' . $weight_code . '</ns1:Units>';
		$xml .= '						<ns1:Value>' . $weight . '</ns1:Value>';
		$xml .= '					</ns1:Weight>';
		$xml .= '					<ns1:Dimensions>';
		$xml .= '						<ns1:Length>20</ns1:Length>';
		$xml .= '						<ns1:Width>20</ns1:Width>';
		$xml .= '						<ns1:Height>10</ns1:Height>';
		$xml .= '						<ns1:Units>IN</ns1:Units>';
		$xml .= '					</ns1:Dimensions>';
		$xml .= '				</ns1:RequestedPackageLineItems>';
		$xml .= '			</ns1:RequestedShipment>';
		$xml .= '		</ns1:RateRequest>';
		$xml .= '	</SOAP-ENV:Body>';
		$xml .= '</SOAP-ENV:Envelope>';

		return $xml;
	}

//////////////////////////////////////////////////

	protected function getQuote($address) {
		$this->load->language('shipping/fedex');

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('fedex_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");

		if (!$this->config->get('fedex_geo_zone_id')) {
			$status = true;
		} elseif ($query->num_rows) {
			$status = true;
		} else {
			$status = false;
		}

		$error = '';

		$quote_data = array();

		if ($status) {
			$weight = $this->weight->convert($this->cart->getWeight(), $this->config->get('config_weight_class_id'), $this->config->get('fedex_weight_class_id'));
			$weight_code = strtoupper($this->weight->getUnit($this->config->get('fedex_weight_class_id')));

			$date = time();

			$day = date('l', $date);

			if ($day == 'Saturday') {
				$date += 172800;
			} elseif ($day == 'Sunday') {
				$date += 86400;
			}

			$this->load->model('localisation/country');

			$country_info = $this->model_localisation_country->getCountry($this->config->get('config_country_id'));

			$this->load->model('localisation/zone');

			$zone_info = $this->model_localisation_zone->getZone($this->config->get('config_zone_id'));

			if (!$this->config->get('fedex_test')) {
				$url = 'https://gateway.fedex.com/web-services/';
			} else {
				$url = 'https://gatewaybeta.fedex.com/web-services/';
			}

			// Whoever introduced xml to shipping companies should be flogged
			$xml  = '<?xml version="1.0"?>';
			$xml .= '<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/" xmlns:ns1="http://fedex.com/ws/rate/v10">';
			$xml .= '	<SOAP-ENV:Body>';
			$xml .= '		<ns1:RateRequest>';
			$xml .= '			<ns1:WebAuthenticationDetail>';
			$xml .= '				<ns1:UserCredential>';
			$xml .= '					<ns1:Key>' . $this->config->get('fedex_key') . '</ns1:Key>';
			$xml .= '					<ns1:Password>' . $this->config->get('fedex_password') . '</ns1:Password>';
			$xml .= '				</ns1:UserCredential>';
			$xml .= '			</ns1:WebAuthenticationDetail>';
			$xml .= '			<ns1:ClientDetail>';
			$xml .= '				<ns1:AccountNumber>' . $this->config->get('fedex_account') . '</ns1:AccountNumber>';
			$xml .= '				<ns1:MeterNumber>' . $this->config->get('fedex_meter') . '</ns1:MeterNumber>';
			$xml .= '			</ns1:ClientDetail>';
			$xml .= '			<ns1:Version>';
			$xml .= '				<ns1:ServiceId>crs</ns1:ServiceId>';
			$xml .= '				<ns1:Major>10</ns1:Major>';
			$xml .= '				<ns1:Intermediate>0</ns1:Intermediate>';
			$xml .= '				<ns1:Minor>0</ns1:Minor>';
			$xml .= '			</ns1:Version>';
			$xml .= '			<ns1:ReturnTransitAndCommit>true</ns1:ReturnTransitAndCommit>';
			$xml .= '			<ns1:RequestedShipment>';
			$xml .= '				<ns1:ShipTimestamp>' . date('c', $date) . '</ns1:ShipTimestamp>';
			$xml .= '				<ns1:DropoffType>' . $this->config->get('fedex_dropoff_type') . '</ns1:DropoffType>';
			$xml .= '				<ns1:PackagingType>' . $this->config->get('fedex_packaging_type') . '</ns1:PackagingType>';
			$xml .= '				<ns1:Shipper>';
			$xml .= '					<ns1:Contact>';
			$xml .= '						<ns1:PersonName>' . $this->config->get('config_owner') . '</ns1:PersonName>';
			$xml .= '						<ns1:CompanyName>' . $this->config->get('config_name') . '</ns1:CompanyName>';
			$xml .= '						<ns1:PhoneNumber>' . $this->config->get('config_telephone') . '</ns1:PhoneNumber>';
			$xml .= '					</ns1:Contact>';
			$xml .= '					<ns1:Address>';

			if ($country_info['iso_code_2'] == 'US') {
				$xml .= '						<ns1:StateOrProvinceCode>' . ($zone_info ? $zone_info['code'] : '') . '</ns1:StateOrProvinceCode>';
			} else {
				$xml .= '						<ns1:StateOrProvinceCode>' . ($zone_info ? $zone_info['name'] : '') . '</ns1:StateOrProvinceCode>';
			}

			$xml .= '						<ns1:PostalCode>' . $this->config->get('fedex_postcode') . '</ns1:PostalCode>';
			$xml .= '						<ns1:CountryCode>' . $country_info['iso_code_2'] . '</ns1:CountryCode>';
			$xml .= '					</ns1:Address>';
			$xml .= '				</ns1:Shipper>';

			$xml .= '				<ns1:Recipient>';
			$xml .= '					<ns1:Contact>';
			$xml .= '						<ns1:PersonName>' . $address['firstname'] . ' ' . $address['lastname'] . '</ns1:PersonName>';
			$xml .= '						<ns1:CompanyName>' . $address['company'] . '</ns1:CompanyName>';
			$xml .= '						<ns1:PhoneNumber>' . $this->customer->getTelephone() . '</ns1:PhoneNumber>';
			$xml .= '					</ns1:Contact>';
			$xml .= '					<ns1:Address>';
			$xml .= '						<ns1:StreetLines>' . $address['address_1'] . '</ns1:StreetLines>';
			$xml .= '						<ns1:City>' . $address['city'] . '</ns1:City>';

			if ($address['iso_code_2'] == 'US') {
				$xml .= '						<ns1:StateOrProvinceCode>' . $address['zone_code'] . '</ns1:StateOrProvinceCode>';
			} else {
				$xml .= '						<ns1:StateOrProvinceCode>' . $address['zone'] . '</ns1:StateOrProvinceCode>';
			}

			$xml .= '						<ns1:PostalCode>' . $address['postcode'] . '</ns1:PostalCode>';
			$xml .= '						<ns1:CountryCode>' . $address['iso_code_2'] . '</ns1:CountryCode>';
			$xml .= '						<ns1:Residential>' . ($address['company'] ? 'true' : 'false') . '</ns1:Residential>';
			$xml .= '					</ns1:Address>';
			$xml .= '				</ns1:Recipient>';
			$xml .= '				<ns1:ShippingChargesPayment>';
			$xml .= '					<ns1:PaymentType>SENDER</ns1:PaymentType>';
			$xml .= '					<ns1:Payor>';
			$xml .= '						<ns1:AccountNumber>' . $this->config->get('fedex_account') . '</ns1:AccountNumber>';
			$xml .= '						<ns1:CountryCode>' . $country_info['iso_code_2'] . '</ns1:CountryCode>';
			$xml .= '					</ns1:Payor>';
			$xml .= '				</ns1:ShippingChargesPayment>';
			$xml .= '				<ns1:RateRequestTypes>' . $this->config->get('fedex_rate_type') . '</ns1:RateRequestTypes>';
			$xml .= '				<ns1:PackageCount>1</ns1:PackageCount>';
			$xml .= '				<ns1:RequestedPackageLineItems>';
			$xml .= '					<ns1:SequenceNumber>1</ns1:SequenceNumber>';
			$xml .= '					<ns1:GroupPackageCount>1</ns1:GroupPackageCount>';
			$xml .= '					<ns1:Weight>';
			$xml .= '						<ns1:Units>' . $weight_code . '</ns1:Units>';
			$xml .= '						<ns1:Value>' . $weight . '</ns1:Value>';
			$xml .= '					</ns1:Weight>';
			$xml .= '					<ns1:Dimensions>';
			$xml .= '						<ns1:Length>20</ns1:Length>';
			$xml .= '						<ns1:Width>20</ns1:Width>';
			$xml .= '						<ns1:Height>10</ns1:Height>';
			$xml .= '						<ns1:Units>IN</ns1:Units>';
			$xml .= '					</ns1:Dimensions>';
			$xml .= '				</ns1:RequestedPackageLineItems>';
			$xml .= '			</ns1:RequestedShipment>';
			$xml .= '		</ns1:RateRequest>';
			$xml .= '	</SOAP-ENV:Body>';
			$xml .= '</SOAP-ENV:Envelope>';

			$curl = curl_init($url);

			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $xml);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($curl, CURLOPT_HEADER, false);
			curl_setopt($curl, CURLOPT_TIMEOUT, 30);
			curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

			$response = curl_exec($curl);

			curl_close($curl);

			$dom = new DOMDocument('1.0', 'UTF-8');
			$dom->loadXml($response);

			if ($dom->getElementsByTagName('HighestSeverity')->item(0)->nodeValue == 'FAILURE' || $dom->getElementsByTagName('HighestSeverity')->item(0)->nodeValue == 'ERROR') {
				$error = $dom->getElementsByTagName('HighestSeverity')->item(0)->nodeValue;
			} else {
				$rate_reply_details = $dom->getElementsByTagName('RateReplyDetails');

				foreach ($rate_reply_details as $rate_reply_detail) {
					$code = strtolower($rate_reply_detail->getElementsByTagName('ServiceType')->item(0)->nodeValue);

					if (in_array(strtoupper($code), $this->config->get('fedex_service'))) {
						$title = $this->language->get('text_' . $code);

						if ($this->config->get('fedex_display_time')) {
							$title .= ' (' . $this->language->get('text_eta') . ' ' . date($this->language->get('date_format_short') . ' ' . $this->language->get('time_format'), strtotime($rate_reply_detail->getElementsByTagName('DeliveryTimestamp')->item(0)->nodeValue)) . ')';
						}

						$total_net_charge = $rate_reply_detail->getElementsByTagName('RatedShipmentDetails')->item(0)->getElementsByTagName('ShipmentRateDetail')->item(0)->getElementsByTagName('TotalNetCharge')->item(0);

						$cost = $total_net_charge->getElementsByTagName('Amount')->item(0)->nodeValue;

						$currency = $total_net_charge->getElementsByTagName('Currency')->item(0)->nodeValue;

						$quote_data[$code] = array(
							'code'         => 'fedex.' . $code,
							'title'        => $title,
							'cost'         => $this->currency->convert($cost, $currency, $this->config->get('config_currency')),
							'tax_class_id' => $this->config->get('fedex_tax_class_id'),
							'text'         => $this->currency->format($this->tax->calculate($this->currency->convert($cost, $currency, $this->currency->getCode()), $this->config->get('fedex_tax_class_id'), $this->config->get('config_tax')), $this->currency->getCode(), 1.0000000)
						);
					}
				}
			}
		}

		$method_data = array();

		if ($quote_data || $error) {
			$title = $this->language->get('text_title');

			if ($this->config->get('fedex_display_weight')) {
				$title .= ' (' . $this->language->get('text_weight') . ' ' . $this->weight->format($weight, $this->config->get('fedex_weight_class_id')) . ')';
			}

			$method_data = array(
				'code'       => 'fedex',
				'title'      => $title,
				'quote'      => $quote_data,
				'sort_order' => $this->config->get('fedex_sort_order'),
				'error'      => $error
			);
		}

		return $method_data;
	}

}

