Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist dungphanxuan/yii2-reveal "*"
```

or add

```
"dungphanxuan/yii2-reveal": "dev-master"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?php echo dungphanxuan\yii2reveal\RevealWidget::widget([
    'name' => 'content',
    'options'=>[// html attributes
        'id'=>'content'
    ],
    'clientOptions'=>[
       
    ]
]);; ?>
```


