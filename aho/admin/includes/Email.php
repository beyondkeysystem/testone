<?php
class Email {
  private $to;
  private $from;
  private $subject;
  private $message;
  private $format;
  private $cc;
  private $bcc;
  private $replyTo;
  private $headers;
  function __construct($to, $from, $subject, $message, $format='text', $cc=null, $bcc=null, $replyTo=null) {
    $this->to = $to;
    $this->from = $from;
    $this->subject = $subject;
    $this->message = $message;
    $this->format = $format;
    $this->cc = $cc;
    $this->bcc = $bcc;
    $this->replyTo = $replyTo;
  }
  function buildHeaders() {
    $this->headers = 'MIME-Version: 1.0' . "\r\n";
    if ($this->format == 'html')
      $this->headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    else
      $this->headers .= 'Content-type: text/plain; charset=UTF-8' . "\r\n";
    if (!is_null($this->from))
      $this->headers .= 'From: ' . $this->from . "\r\n";
    if (!is_null($this->cc))
      $this->headers .= 'Cc: ' . $this->cc . "\r\n";
    if (!is_null($this->bcc))
      $this->headers .= 'Bcc: ' . $this->bcc . "\r\n";
  }
  function send() {
    $this->buildHeaders();
    return mail($this->to, $this->subject, $this->message, $this->headers);
  }
  function setTo($to) {
    $this->to = $to;
  }
  function setFrom($from) {
    $this->from = $from;
  }
  function setSubject($subject) {
    $this->subject = $subject;
  }
  function setMessage($message) {
    $this->message = $message;
  }
  function setCC($cc) {
    $this->cc = $cc;
  }
  function setBCC($bcc) {
    $this->bcc = $bcc;
  }
  function setReplyTo($replyTo) {
    $this->replyTo = $replyTo;
  }
}
?>