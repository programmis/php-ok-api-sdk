1) Download composer :
<pre>
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === 'e115a8dc7871f15d853148a7fbac7da27d6c0030b848d9b3dc09e2a0388afed865e6a3d6b3c0fad45c48e2b5fc1196ae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
</pre>
2) Install:
<pre>
php composer.phar require programmis/php-ok-api-sdk
</pre>

```php
require __DIR__ . "/vendor/autoload.php";

$groupGetInfo = new \OkSdk\Group\GroupGetInfo();
$groupGetInfo->setAccessToken($token);
$groupGetInfo->setApplicationKey($app_key);
$groupGetInfo->setApplicationSecretKey($app_secret_key);
if($groupGetInfo->doRequest()){
    var_dump($groupGetInfo->getGroups());
}

$photosUploadUrl = new \OkSdk\PhotosV2\PhotosV2GetUploadUrl();
if($photosUploadUrl->doRequest()){
    if($photosUploadUrl->upload(['293339.jpg'])){
        var_dump($photosUploadUrl->getPhotos());
    }
}    
```
