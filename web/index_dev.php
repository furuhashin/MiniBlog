<?php

require '../bootstrap.php';
require '../MiniBlogApplication.php';

$app = new MiniBlogApplication(true);//デバッグモードをOn。Applicationクラスのコンストラクタの引数にtrueを渡している。
$app->run();//applicationクラスのrunメソッド