# common_lib

**安装** 

composer require george-t/common_lib

**用法**

身份证号码验证

```
<?php
use georgeT\CommonLib\IdentityCard;

$idCardNo = '510715198907254875';
$bool = IdentityCard::isValid($idCardNo);
var_dump($bool);
```

营业执行号验证

```
<?php
use georgeT\CommonLib\RegexCreditCode;

$idCardNo = '91510124MA61TWJ56K';
$bool = RegexCreditCode::isValid($idCardNo);
var_dump($bool);
```