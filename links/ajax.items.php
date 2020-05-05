<?php
require "db_connect.php";
if (isset($_POST['start']) && is_numeric($_POST['start'])){
    $start = $_POST['start'];
    $res = R::getAll("SELECT id, overview, topic, logo FROM `courses` ORDER BY `id` DESC LIMIT {$start}, 10");
}
echo json_encode($res);