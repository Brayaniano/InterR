<?php
declare(strict_types=1);

namespace InterR\DescripcionCustom\Block\Product\View;

class Description extends \Magento\Catalog\Block\Product\View\Description
{
    public function toHtml(): string
    {
        $html = parent::toHtml();

        if ($this->getNameInLayout() === 'product.info.description') {
            $html .= '<p class="descripcion-custom-message">' . $this->escapeHtml(
                __('Descripción modificada por InterR_DescripcionCustom')
            ) . '</p>';
        }

        return $html;
    }
}
