<?php

/**
 * @file plugins/generic/alm/SettingsForm.inc.php
 *
 * Copyright (c) 2013-2014 Simon Fraser University Library
 * Copyright (c) 2003-2014 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class SettingsForm
 * @ingroup plugins_generic_almPlugin
 *
 * @brief Form for journal managers to modify ALM plugin settings
 */


import('lib.pkp.classes.form.Form');

class SettingsForm extends Form {

	/** @var $journalId int */
	var $journalId;

	/** @var $plugin object */
	var $plugin;

	/**
	 * Constructor
	 * @param $plugin object
	 * @param $journalId int
	 */
	function SettingsForm(&$plugin, $journalId) {
		$this->journalId = $journalId;
		$this->plugin =& $plugin;

		parent::Form($plugin->getTemplatePath() . 'settingsForm.tpl');
		$this->addCheck(new FormValidator($this, 'apiKey', 'string', __('plugins.generic.alm.apiKeyRequired')));
		$this->addCheck(new FormValidator($this, 'depositUrl', 'string', __('plugins.generic.alm.depositUrlRequired')));
		$this->addCheck(new FormValidatorPost($this));
	}

	/**
	 * Initialize form data.
	 */
	function initData() {
		$journalId = $this->journalId;
		$plugin =& $this->plugin;

		$this->setData('apiKey', $plugin->getSetting($journalId, 'apiKey'));
		$this->setData('depositUrl', $plugin->getSetting(CONTEXT_ID_NONE, 'depositUrl'));

	}

	/**
	 * Assign form data to user-submitted data.
	 */
	function readInputData() {
		$this->readUserVars(array('apiKey', 'depositUrl'));
	}

	/**
	 * Save settings.
	 */
	function execute() {
		$plugin =& $this->plugin;
		$journalId = $this->journalId;

		$plugin->updateSetting($journalId, 'apiKey', $this->getData('apiKey'));
		$plugin->updateSetting(CONTEXT_ID_NONE, 'depositUrl', $this->getData('depositUrl'));
	}
}

?>
