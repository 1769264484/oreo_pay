<?php
include "../../Oreo.Config.php";
?>
<?php
try {
    $DB = new PDO("mysql:host={$oreoconfig['host']};dbname={$oreoconfig['dbname']};port={$oreoconfig['port']}",$oreoconfig['user'],$oreoconfig['pwd']);
}catch(Exception $e){
    exit('�������ݿ�ʧ��:'.$e->getMessage());
}
$DB->exec("set names utf8");
$rs=$DB->query("select * from oreo_config");
while($row=$rs->fetch()){ 
	$conf[$row['k']]=$row['v'];
}
/**
 * �뵽 http://connect.opensns.qq.com/����appid, appkey, ��ע��callback��ַ��http://�������/user/connect.php
 */
//���뵽��appid
$QC_config["appid"]  = $conf['qopen_id'];

//���뵽��appkey
$QC_config["appkey"] =  $conf['qopen_key'];

//callback url
$QC_config["callback"] =  'http://'.$conf['local_domain'].'/user/connect.php';
?>