<?php

declare(strict_types=1);

namespace InterR\HelloWorld\Block\Index;

class Index extends \Magento\Framework\View\Element\Template
{
    public function getMessage(): string
    {
        return (string) __('Hola Mundo desde mi módulo');
    }
}
