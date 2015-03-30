<?php
class Database {
  private $hostname;
  private $username;
  private $password;
  private $name;
  private $connected;
  private $lastResult;
  function __construct($username, $password, $name, $hostname='localhost') {
    $this->hostname = $hostname;
    $this->username = $username;
    $this->password = $password;
    $this->name = $name;
    $this->connected = mysql_pconnect($this->hostname, $this->username, $this->password) or trigger_error(mysql_error(),E_USER_ERROR);
  }
  function select($query) {
    mysql_select_db($this->name, $this->connected);
    $rows = mysql_query($query, $this->connected);
    for ($i = 0; $row = mysql_fetch_assoc($rows); $i++)
      $ret[$i] = $row;
    $this->lastResult = $ret;
    return $ret;
  }
  function insert($query) {
    mysql_select_db($this->name, $this->connected);
    return mysql_query($query, $this->connected);
  }
  function delete($query) {
    mysql_select_db($this->name, $this->connected);
    return mysql_query($query, $this->connected);
  }
  function update($query) {
    mysql_select_db($this->name, $this->connected);
    return mysql_query($query, $this->connected);
  }
  function getLast() {
    return $this->lastResult;
  }
}

// $db = new Database('americanhomes', 'JCJRbbYdafJwLjGq', 'americanhomes', '192.168.0.19');
$db = new Database('ahomain', ',O8bOcL6JUXK', 'ahomain_las_rc', 'localhost');
?>