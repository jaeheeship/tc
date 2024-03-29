<?php $this->load->helper('url') ?>
<?php $this->load->helper('asset') ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>새글</title>
    <?echo common_css_asset('bootstrap/css/bootstrap.css')?>
    <?echo common_css_asset('bootstrap/css/bootstrap-responsive.css')?>
    <?echo common_css_asset('bootstrap/css/docs.css')?>
    <?echo common_css_asset('jquery/css/smoothness/jquery-ui-1.8.22.custom.css')?>
    <?echo common_js_asset('jquery/js/jquery-1.7.2.min.js')?>
    <?echo common_js_asset('jquery/js/jquery-ui-1.8.22.custom.min.js')?>
    <?echo js_asset('admin','bootstrap/js/bootstrap.min.js') ?>
    <?echo js_asset('admin','bootstrap/js/bootstrap-responsive.min.js') ?>

    <style>
    .active {background:#00aeef;color:#fff;}
    </style>
</head>
<body> 
<header class="jumbotron subhead">
    <div class="container">
        <h1>Hello! Cloud</h1>
        <p class="lead"> Enjoy Cloud </p>
    </div>
</header>
<div class="container">
<div class="row">
    <div class="span3 bs-docs-sidebar">
        <ul class="nav nav-list bs-docs-sidenav affix-top"> 
            <li <?php if($step=='checkEnvironment'):?> class="active" <?php endif;?>><a ><i class="icon-chevron-right"></i> 1STEP : 설치 조건 확인 </a></li>
            <li <?php if($step=='checkDatabase'):?> class="active" <?php endif;?>><a><i class="icon-chevron-right"></i> 2STEP : 데이터베이스 입력</a></li>
            <li <?php if($step=='checkAdmin'):?> class="active" <?php endif;?>><a><i class="icon-chevron-right"></i> 3STEP : 관리자 설정 </a></li>
        </ul> 
    </div> 
    <div class="span9">
        <div class="well" style="margin-top:30px;">
