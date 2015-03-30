<?php

App::uses('Controller', 'Controller');

class IcodesController extends AppController {

    function crc($s, $length, $crc_value=0x5c) {
        for ($i = 0; $i < $length; $i++) {
            //~ echo $crc_value, "\n";
            $crc_value = IcodesController::$crc_table[$crc_value ^ ord($s[$i])];
        }

        return $crc_value;
    }

    function strip_icode($icode) {
        return substr($icode, 2, 6) . "\x00" . substr($icode, 8, 8) . "\x00";
    }

    function get_leak_chars($icode) {
        //return [$icode[6], $icode[11]];
        return array($icode[6], $icode[11]);
    }

    function get_icode_period($total_days) {
        foreach (IcodesController::$icode_periods as $period) {
            if ($total_days >= $period)
                return $period;
        }

        throw new Exception("invalid total day count: " . $total_days);
    }

    public static $crc_table = array(
        0, 94, 188, 226, 97, 63, 221, 131, 194, 156, 126, 32, 163, 253, 31, 65,
        157, 195, 33, 127, 252, 162, 64, 30, 95, 1, 227, 190, 62, 96, 130, 220,
        35, 125, 159, 193, 66, 28, 254, 160, 225, 191, 93, 3, 128, 222, 60, 98,
        190, 224, 2, 92, 223, 129, 99, 61, 124, 34, 192, 158, 29, 67, 161, 255,
        70, 24, 250, 164, 39, 121, 155, 197, 132, 218, 56, 102, 229, 187, 89, 7,
        219, 133, 103, 57, 186, 228, 6, 88, 25, 71, 165, 251, 120, 38, 196, 154,
        101, 59, 217, 135, 4, 90, 184, 230, 167, 249, 27, 69, 198, 152, 122, 36,
        248, 166, 68, 26, 153, 199, 37, 123, 58, 100, 134, 216, 91, 5, 231, 185,
        140, 210, 48, 110, 237, 179, 81, 15, 78, 16, 242, 172, 47, 113, 147, 205,
        17, 79, 173, 243, 112, 46, 204, 146, 211, 141, 111, 49, 178, 236, 14, 80,
        175, 241, 19, 77, 206, 144, 114, 44, 109, 51, 209, 143, 12, 82, 176, 238,
        50, 108, 142, 208, 83, 13, 239, 177, 240, 174, 76, 18, 145, 207, 45, 115,
        202, 148, 118, 40, 171, 245, 23, 73, 8, 86, 180, 234, 105, 55, 213, 139,
        87, 9, 235, 181, 54, 104, 138, 212, 149, 203, 41, 119, 244, 170, 72, 22,
        233, 183, 85, 11, 136, 214, 52, 106, 43, 117, 151, 201, 74, 20, 246, 168,
        116, 43, 200, 150, 21, 75, 169, 247, 182, 232, 10, 84, 215, 137, 107, 53
    );
    public static $icode_periods = array(365, 182, 90, 30, 7, 1);
    public static $ICODE_VERSION = array(
        'OLD' => 0x5a,
        'NEW' => 0x5b,
        'HIGH' => 0x5b,
        '1_3' => 0x5c,
    );
    public static $icode_charset = '0123456789ABCDEFGHJKLMNPQRUTVWXY';
    public $serial, $icode, $serial_crc, $version, $leak, $icode_period,
    $compliant_days, $minutes, $pressure, $p95, $best30, $ahi, $sni;

    function construct_report($serial, $icode) {
        $this->serial = strtoupper($serial);
        $this->icode = strtoupper($icode);

        $this->parse();
    }

    function parse() {
        $this->validate();

        $this->parse_days();

        $this->parse_minutes();

        $this->parse_pressure();

        $this->parse_p95_best30();

        $this->parse_ahi();

        $this->parse_sni();

        $this->parse_leak();

        //~ $this->validate_post_parse();
    }

    function parse_leak() {
        if ($this->version == "HIGH" || $this->version == "1_3") {
            $leak_chars = $this->get_leak_chars($this->icode);
            $value = ($leak_chars[0] << 5) + $leak_chars[1];
            $this->leak = $value - $this->serial_crc;
        } else {
            $this->leak = 0;
        }
    }

    function get_icode_value($offset, $length) {
        $icode = $this->icode;
        $value = 0;

        for ($i = $offset; $i < $offset + $length; $i++) {
            $value <<= 5;
            $value += strpos(self::$icode_charset, $icode[$i]);
        }
        return $value;
    }

    function parse_days() {
        $value = $this->get_icode_value(2, 2);
        $total_days = $value - $this->serial_crc;
        $this->icode_period = $this->get_icode_period($total_days);

        $this->compliant_days = $total_days - $this->icode_period;
    }

    function parse_minutes() {
        $value = $this->get_icode_value(4, 2);
        $this->minutes = $value - ($this->serial_crc & 0xf);
    }

    function parse_pressure() {
        $value = $this->get_icode_value(7, 2);
        $this->pressure = ($value - $this->serial_crc) / 2.0;
    }

    function parse_p95_best30() {
        $value = $this->get_icode_value(9, 2);

        if ($this->version == "OLD") {
            $this->p95 = $value - $this->serial_crc;
            $this->best30 = 0;
        } else if ($this->version == "1_3") {
            $value -= $this->serial_crc & 0xf;
            $this->p95 = ($value & 31) / 2.0 + $this->pressure;
            $this->best30 = ($value >> 5) & 255;
        } else {
            $value -= $this->serial_crc;
            $this->p95 = ($value & 31) / 2.0 + $this->pressure;
            $this->best30 = ($value >> 5) & 255;
        }
    }

    function parse_ahi() {
        $value = $this->get_icode_value(12, 2);
        $this->ahi = ($value - ($this->serial_crc & 0xf)) / 2.0;
    }

    function parse_sni() {
        $value = $this->get_icode_value(14, 2);
        $this->sni = ($value - ($this->serial_crc & 0xf) - 1) / 2.0;
    }

    function try_validate($crc_sum, $stripped_icode, $version) {
        $icode_crc = $this->crc($stripped_icode, 15, self::$ICODE_VERSION[$version]);
        $serial_crc = $this->crc($this->serial, 8, self::$ICODE_VERSION[$version]);
        //~ echo "$icode_crc, $this->serial, $serial_crc, $crc_sum\n";
        if ($icode_crc + $serial_crc == $crc_sum) {
            $this->serial_crc = $serial_crc;
            if ($version == 'HIGH') {
                if ($this->icode[6] == '-')
                    $this->version = "NEW";
                else
                    $this->version = "HIGH";
            } else {
                $this->version = $version;
            }

            return true;
        } else {
            return false;
        }
    }

    function validate() {
        $icode = $this->icode;
        $serial = $this->serial;

        if (strlen($serial) != 8)
            throw new Exception("serial number must be 8 characters long");

        if (strlen($icode) != 16)
            throw new Exception("iCode must be 16 characters long");

        $crc_sum = $this->get_icode_value(0, 2);
        $stripped = $this->strip_icode($icode);

        foreach (self::$ICODE_VERSION as $version => $seed) {
            if ($this->try_validate($crc_sum, $stripped, $version))
                return true;
        }

        throw new Exception("iCode invalid: " . $icode);
    }

    function print_report() {
        return $result = array('icode period' => $this->icode_period,
            'days' => $this->compliant_days,
            'minutes' => $this->minutes,
            'avg_pressure' => $this->pressure,
            'p95' => $this->p95,
            'best30' => $this->best30,
            'ahi' => $this->ahi,
            'sni' => $this->sni);
    }

////////////////////////////////////////////////////////////////////////////////
    
    function add_report() {
        //access data by ajax from report page   
        $this->autoRender = false;
        if (isset($this->data) && !empty($this->data)) {
            $patient_id = $this->data['patient_id'];
            $icode = $this->data['icode'];
            $serial_no = $this->data['serial_no'];

            $report = $this->construct_report($serial_no, $icode);
            $report = $this->print_report();

            //loadModel
            $this->loadModel('Report');

            //check the existence of id  and save iCode and patient id into reports table
            $str = $icode;
            $str_length = strlen($str);
            $str_serial_no = $serial_no;
            $str_serial_length = strlen($str_serial_no);
            $Compliance_percentage = 100 * ($report['days'] / $report['icode period']);
            $percentage = round($Compliance_percentage, 2);

            //check length of iCode digits
            if ($str_length != 16) {
                $this->Session->setFlash('iCode string should be 16 digits');
            } else if ($str_serial_length != 8) {
                $this->Session->setFlash('Serial number should be 8 digits');
            }
            //save iCode and patient id into reports table
            else {
                $data = array('Report' => array(
                        'icode' => $icode,
                        'serial_no' => $serial_no,
                        'patient_id' => $patient_id,
                        'icode_period' => $report['icode period'],
                        'days' => $report['days'],
                        'minutes' => $report['minutes'],
                        'avg_pressure'=>$report['avg_pressure'],
                        'p95' => $report['p95'],
                        'best30' => $report['best30'],
                        'ahi' => $report['ahi'],
                        'sni' => $report['sni'],
                        'percentage' => $percentage,
                        'status' => "P",
                        'created_date' => date("Y-m-d H:i:s"),
                        ));
                $this->loadModel('Report');
                $ExitPatientId = $this->Report->findByPatientId($patient_id);
                if (!empty($ExitPatientId['Report']['patient_id']) && $ExitPatientId['Report']['status'] == 'D') {
                    if ($ExitPatientId['Report']['patient_id'] == $patient_id) {
                        $this->Report->id = $ExitPatientId['Report']['id'];
                        $this->Report->delete();
                        $this->Report->save($data);
                        echo json_encode($data['Report']);
                    }
                } else {
                    $this->Report->save($data);
                    echo json_encode($data['Report']);
                }
            }
        }
    }
    

}

