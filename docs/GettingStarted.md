Getting Started
===============

## CONSTANTS

```php
const ACL_PRIVATE = 'private';
const ACL_PUBLIC_READ = 'public-read';
const ACL_PUBLIC_READ_WRITE = 'public-read-write';
const ACL_AUTHENTICATED_READ = 'authenticated-read';

const STORAGE_CLASS_STANDARD = 'STANDARD';
const STORAGE_CLASS_RRS = 'REDUCED_REDUNDANCY';
const STORAGE_CLASS_STANDARD_IA = 'STANDARD_IA';
```

## USAGE

### INITIALIZE
```php

$s3 = new Aws3($awsAccessKey, $awsSecretKey);
```

### SET and GET default bucket
```php
$s3->setBucket($bucket);
$s3->getBucket();
```

## SET urls 
```php
$urls = [
    'http'  => 'http://s3-eu-west-1.amazonaws.com/bucket',
    'https' => 'https://s3-eu-west-1.amazonaws.com/bucket'
];
$s3->setUrls($urls);
```

### SET ACL AND STORAGE (Optional, default acl = Aws3::ACL_PUBLIC_READ, storage = S3::STORAGE_CLASS_STANDARD)
```php
$s3->setAcl(Aws3::ACL_PRIVATE);
$s3->setStorage(Aws3::STORAGE_CLASS_STANDARD);
```

### UPLOADING OBJECTS

Put an object from $_FILES

```php
$s3->putObject($_FILES['filename']['tmp_name'], $_FILES['filename']['name']);
```

Put an object from string

```php
$s3->putObjectString(file_get_contents('bg.jpg'), 'bg.jpg');
```

Put an object from url

```php
$url = 'https://www.enterprise.es/content/dam/ecom/utilitarian/emea/business-rentals/business-rental-band.jpg.wrend.1280.720.jpeg';
$s3->putObjectUrl($url, 'car.jpg');
```

Set headers on put objects
1.- as parameter
```php
$headers = [
    'Cache-Control' => 'max-age=2592000',
    'Expires'       => 2592000,
];
$s3->putObjectUrl($url, 'car.jpg', $headers);

```
2.- as defaultheaders
```php
$headers = [
    'Cache-Control' => 'max-age=2592000',
    'Expires'       => 2592000,
];
$s3->setDefaultHeaders($headers);

```

Put response 

```
array(4) {
  ["code"]=> int(200)
  ["error"]=>  bool(false)
  ["message"]=>  string(0) ""
  ["url"]=>
  array(3) {
    ["default"]=>
    string(53) "https://bucket.s3.amazonaws.com/20130726_173253.jpg"
    ["http"]=>
    string(62) "http://s3-eu-west-1.amazonaws.com/bucket/20130726_173253.jpg"
    ["https"]=>
    string(63) "https://s3-eu-west-1.amazonaws.com/bucket/20130726_173253.jpg"
  }
}
```

### RETRIEVING OBJECTS

Get an object:

```php
$response = $s3->getObject('bg.jpg',$bucketName);
file_put_contents('bg.jpg', $response->message);
```

### DELETING OBJECTS

Delete an object:

```php
$s3->deleteObject('bg.jpg',$bucketName);
```

Delete an object from url:

```php
$s3->deleteObjectUrl('https://s3-eu-west-1.amazonaws.com/bucket/20130726_173253.jpg');
```


### BUCKETS

Get a list of buckets:

```php
$buckets = $s3->listBuckets();
```

Create a bucket:
```php
$s3->putBucket($bucketName);
```

Delete an empty bucket:
```php
$s3->deleteBucket($bucketName);
```

## FILES

Get a list of files in bucket
```php
$s3->listFiles($bucketName);
```
