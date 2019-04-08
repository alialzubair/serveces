<?php
session_start();

include '../init.php';
$data=DB::getInstace()->query('SELECT orders.*,members.* FROM orders

JOIN members ON
orders.me_id=members.me_id
where members.me_id=9');

print_r($data);

/*

SELECT orders.*,members.* FROM orders

JOIN members ON
orders.me_id=members.me_id
where members.me_id=9
*/