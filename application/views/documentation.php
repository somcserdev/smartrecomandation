<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Questionaire Interface</div>
        <div class="panel-body">
            <div>
                Request definition
                <ul>
                    <li>action : GET</li>
                    <li>server API : http://{server}/index.php?/questionaire/create_via_client</li>
                    <li>
                        parameters
                        <ul>
                            <li>imei; value:the cellphone imei string</li>
                            <li>gender; value:[male|female]</li>
                            <li>age; value:[10|30|50|70]; 10(10-);30(11~30);50(31~50);70(50+)</li>
                            <li>hobby[];</li>
                        </ul>
                    </li>
                    <li>example
                        <ul>
                            <li>http://localhost/test/index.php/questionaire/create_via_webpage?imei=ddddddddffffffffffffff&gender=male&age=50&hobby%5B%5D=Shopping&hobby%5B%5D=Eating&hobby%5B%5D=Game</li>
                        </ul>
                    </li>
                </ul>
                Response definition
                <ul>
                    <li>type : json</li>
                    <li>{'Result':'OK'}</li> 
                </ul>
            </div>
        </div>
    </div>
    <div class="panel panel-primary">
        <div class="panel-heading">Smart Recommendation Interface</div>
        <div class="panel-body">
            Request definition
                <ul>
                    <li>action : GET</li>
                    <li>server API : http://{server}/index.php?/smart_recommendation/index/{imei}</li>
                    <li>
                        parameters
                        <ul>
                            <li>imei; value:the cellphone imei string</li>
                        </ul>
                    </li>
                    <li>example
                        <ul>
                            <li>http://localhost/test/index.php?/smart_recommendation/index/ddddddddddddd</li>
                        </ul>
                    </li>
                </ul>
                Response definition
                <ul>
                    <li>type : json</li>
                    <li style="word-wrap: break-word;">{"ResultCode":1,"TotalCount":2,"AppInfoList":[{"Id":102,"Name":"\u7ecf\u5178\u65b9\u57571","PackageName":"jdfk.apk","Size":1024,"Grade":4.5,"SmallIcon":" http:\/\/xxx\/1.jpg","IsFree":true,"Price":0,"VersionCode":2,"VersionName":"1.0","Publisher":"\u7b2c\u4e5d\u57ce\u5e02","Description":"\u8fd9\u662f\u7ecf\u5178\u65b9\u5757","Type":"game"},{"Id":103,"Name":"\u7ecf\u5178\u65b9\u57572","PackageName":"jdfk2222.apk","Size":1024,"Grade":3.5,"SmallIcon":" http:\/\/xxx\/2222.jpg","IsFree":true,"Price":0,"VersionCode":2,"VersionName":"1.0","Publisher":"\u7b2c\u4e5d\u57ce\u5e0211111","Description":"\u8fd9\u662f\u7ecf\u5178\u65b9\u5757111111","Type":"app"}]}</li> 
                    <li><?php echo anchor(base_url().'smart_recommendation/index/ddddddddddddd', 'Get the Real Data', 'target="blank"'); ?></li>
                </ul>
        </div>
    </div>
</div>

