<?php

namespace dungphanxuan\yii2reveal;

use Yii;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\JsExpression;
use yii\widgets\InputWidget;

class RevealJsWidget extends InputWidget
{
    const PLUGIN_NAME = 'Reveal';

    /**
     * KindEditor Options
     * @var array
     */
    public $clientOptions = [];

    /**
     * csrf cookie param
     * @var string
     */
    public $csrfCookieParam = '_csrfCookie';

    /**
     * @var boolean
     */
    public $render = true;

    public $data ='';

    /**
     * @inheritdoc
     */
    public function run()
    {
        if ($this->render) {
                echo Html::tag('div',Html::tag('div',$this->data,['class'=>'slides']),['class'=>'reveal']);
        }
        $this->registerClientScript();
    }
    /**
     * register client scripts(css, javascript)
     */
    public function registerClientScript()
    {
        $view = $this->getView();
        $this->initClientOptions();

        $asset = RevealAsset::register($view);


        $options = empty($this->options) ? '' : Json::encode($this->options);
        $id = $this->options['id'];

        $js = "

            Reveal.initialize({
            controls: true,
            progress: true,
            history: true,
            center: true,

            theme: Reveal.getQueryHash().theme, // available themes are in /css/theme
            transition: Reveal.getQueryHash().transition || 'fade', // default/cube/page/concave/zoom/linear/fade/none

            // Optional libraries used to extend on reveal.js
            dependencies: [
              { src: 'lib/js/classList.js', condition: function() { return !document.body.classList; } },
              { src: 'plugin/highlight/highlight.js', async: true, callback: function() { hljs.initHighlightingOnLoad(); } }
            ]
          });

          // Autoplay video on slide 3

          Reveal.addEventListener( 'slidechanged', function( event ) {
            var video = document.getElementById('sample-video');
            if (event.indexh == 3) {
              video.load();
              video.play();
            } else {
              video.pause();
            }
          });

        ";
        $view->registerJs($js);
    }
    /*
     *
     * */
    public function updateAsset(){
//Replace jquery 2
        Yii::$app->assetManager->bundles['yii\web\JqueryAsset'] = [
            'sourcePath' => null,
            'js' => ['jquery.js' => 'http://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.0/jquery.min.js'],
        ];
    }
    /**
     * client options init
     */
    protected function initClientOptions()
    {
        // KindEditor optional parameters
        $params = [

        ];
        $options = [];
        // $options['them'] = 'dark';
        foreach ($params as $key) {
            if (isset($this->clientOptions[$key])) {
                $options[$key] = $this->clientOptions[$key];
            }
        }
        $this->clientOptions = $options;
    }

}
