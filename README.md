yii-sendgrid extension
============

YiiSendGrid is an application component used for sending email through [sendgrid](http://sendgrid.com).  
It's a wrapper for [SendGrid php library](https://github.com/sendgrid/sendgrid-php)

## Requirements

+ PHP 5.6+  

## Instalattion

- download the file and extract to protected/extensions (or anywhere you like, but then adjust the example accordingly)
- go to the extension directory and run `composer install`

Add the component to your configuration file (usually protected/configs/main.php) as below:  

``` php
return array(  
	'components' => array(  
		//...
 		'sendgrid' => array(  
 			'class' => 'ext.yii-sendgrid.YiiSendGrid', //path to YiiSendGrid class  
 			'apiKey'=>'myApiKey', //replace with your actual api key  
 		),  
 		//...  
 	)  
 );  
```  
 
## How to use

Examples  
``` php  
$message = Yii::app()->sendgrid->createEmail();
//shortcut to $message = new Mail();

$message->addContent(
    "text/html", "<strong>Example message</strong>"
);
$message->setSubject('Test message');
$message->addTo('to@mydomain.com');
$message->setFrom(from@mydomain.com);

Yii::app()->sendgrid->send($message);  
``` 
  
## Resources  

+ [SendGrid php library](https://github.com/sendgrid/sendgrid-php)
