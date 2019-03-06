<?php

require_once '../models/dbConnect.php';
require_once '../models/userModel.php';

$user = new user();
$list = $user->UserInfosAdmin();
