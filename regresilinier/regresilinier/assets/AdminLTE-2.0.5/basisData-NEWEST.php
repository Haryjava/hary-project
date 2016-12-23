<?php
/**
 * Created by PhpStorm.
 * User: hary
 * Date: 7/16/2016
 * Time: 5:33 PM
 */

class database{
    var $koneksi;
    var $selectDB;
    var $query;
    var $result;
    var $row;
    var $jumlah;

    function koneksiDB(){
        $nameserver = "127.0.0.1";
        $username   = "root";
        $passwd     = "";
        $dbname     = "regresi";
        $koneksi    = mysql_connect($nameserver, $username, $passwd)or die('error'.mysql_errno());

        $this->selectDB = mysql_select_db($dbname, $koneksi);
        if(!$this->selectDB){
            echo "Gagal";
        }
    }

    function query($query){
        $this->result = mysql_query($query);
    }

    function tampilkanData(){
        $this->row = mysql_fetch_array($this->result);
        return $this->row;
    }

    function view(){
        $this->row = mysql_fetch_object($this->result);
        return $this->row;
    }

    function get($table){
        $this->result = mysql_query("SELECT sum(number_ticket) as sample from ".$table);
    }
}

/*class nilaiPerhitungan extends database{
    function getJumlahSample(){
        $this->result = mysql_query("SELECT sum(number_ticket) as sample from tbltransact");
    }
}

$nilaiSample = new nilaiPerhitungan();
echo $nilaiSample->getJumlahSample();*/
$resultx = new database();
$resultx->query("SELECT sum(number_ticket) as sample from tbltransact");