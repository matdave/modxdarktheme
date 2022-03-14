<?php

class MODXDarkTheme
{
    public $modx = null;
    public $namespace = 'modxdarktheme';
    public $options = [];

    public function __construct(modX &$modx, array $options = [])
    {
        $this->modx =& $modx;

        $corePath = $this->getOption('core_path', $options, $this->modx->getOption('core_path', null, MODX_CORE_PATH) . 'components/modxdarktheme/');

        /* loads some default paths for easier management */
        $this->options = array_merge([
            'namespace' => $this->namespace,
            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
        ], $options);

        $this->modx->addPackage('modxdarktheme', $this->getOption('modelPath'));
        $this->modx->lexicon->load('modxdarktheme:default');
    }

    public function getOption($key, $options = [], $default = null)
    {
        $option = $default;
        if (!empty($key) && is_string($key)) {
            if ($options != null && array_key_exists($key, $options)) {
                $option = $options[$key];
            } elseif (array_key_exists($key, $this->options)) {
                $option = $this->options[$key];
            } elseif (array_key_exists("{$this->namespace}.{$key}", $this->modx->config)) {
                $option = $this->modx->getOption("{$this->namespace}.{$key}");
            }
        }
        return $option;
    }
}
