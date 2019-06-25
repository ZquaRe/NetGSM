<?php
namespace ZquaRe\NetGSM\SMS;
class NetGSM {
    private $userName, $pass, $header, $message, $phoneNumber, $startDate, $stopDate, $url;
    public function __construct($userName, $pass, $header) {
        $this->userName = $userName;
        $this->pass = $pass;
        $this->header = $header;
    }
    public function sendSMS($message, $phoneNumber) {
        $this->message = $message;
        $this->phoneNumber = $phoneNumber;
        $this->header = html_entity_decode($this->header, ENT_COMPAT, "UTF-8");
        $this->header = rawurlencode($this->header);
        $this->message = html_entity_decode($this->message, ENT_COMPAT, "UTF-8");
        $this->message = rawurlencode($this->message);
        $this->startDate = date('d.m.Y H:i');
        $this->startDate = str_replace('.', '', $this->startDate);
        $this->startDate = str_replace(':', '', $this->startDate);
        $this->startDate = str_replace(' ', '', $this->startDate);
        $this->stopDate = date('d.m.Y H:i', strtotime('+1 day'));
        $this->stopDate = str_replace('.', '', $this->stopDate);
        $this->stopDate = str_replace(':', '', $this->stopDate);
        $this->stopDate = str_replace(' ', '', $this->stopDate);
        $this->url = "http://api.netgsm.com.tr/bulkhttppost.asp?usercode=$this->userName&password=$this->pass&gsmno=$this->phoneNumber&message=$this->message&msgheader=$this->header&startdate=$this->startDate&stopdate=$this->stopDate";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
}
?>
