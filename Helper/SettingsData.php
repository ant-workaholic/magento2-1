<?php
namespace PCAPredict\Tag\Helper;

class SettingsData extends \Magento\Framework\App\Helper\AbstractHelper
{

	/**
	 * @var \Magento\Framework\Escaper
	 */
	protected $_escaper;
    
	/**
	 * @param \Magento\Framework\App\Helper\Context $context
	 * @param \Magento\Framework\Escaper $_escaper
	 */
	public function __construct(
		\Magento\Framework\App\Helper\Context $context,
		\Magento\Framework\Escaper $escaper
	) {
		$this->_escaper = $escaper;
		parent::__construct($context);
	}
    
	public function getSettings() {
		$config = [];
		$config['account_code'] = $this->scopeConfig->getValue(
                'pca_settings_section/settings/account_code',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );
		return json_encode($config);
	}
    
    
    public function getAccountCode() {
        return $this->_escaper->escapeHtml(
            $this->scopeConfig->getValue(
                'pca_settings_section/settings/account_code',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            )
        );
    }

}
