<?php /* /home/qjvqhdcz/domains/michellepizza.educationhost.cloud/public_html/administrator/components/com_akeeba/ViewTemplates/Configuration/default.blade.php */ ?>
<?php
/**
 * @package   akeebabackup
 * @copyright Copyright (c)2006-2020 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license   GNU General Public License version 3, or later
 */

// Protect from unauthorized access
defined('_JEXEC') or die();

/** @var  \Akeeba\Backup\Admin\View\Configuration\Html $this */
?>
<?php /* Configuration Wizard pop-up */ ?>
<?php if($this->promptForConfigurationWizard): ?>
	<?php echo $this->loadAnyTemplate('admin:com_akeeba/Configuration/confwiz_modal'); ?>
<?php endif; ?>

<?php /* Modal dialog prototypes */ ?>
<?php echo $this->loadAnyTemplate('admin:com_akeeba/CommonTemplates/FTPBrowser'); ?>
<?php echo $this->loadAnyTemplate('admin:com_akeeba/CommonTemplates/SFTPBrowser'); ?>
<?php echo $this->loadAnyTemplate('admin:com_akeeba/CommonTemplates/FTPConnectionTest'); ?>
<?php echo $this->loadAnyTemplate('admin:com_akeeba/CommonTemplates/ErrorModal'); ?>
<?php echo $this->loadAnyTemplate('admin:com_akeeba/CommonTemplates/FolderBrowser'); ?>

<?php if($this->secureSettings == 1): ?>
    <div class="akeeba-block--success">
		<?php echo \JText::_('COM_AKEEBA_CONFIG_UI_SETTINGS_SECURED'); ?>
    </div>
<?php elseif($this->secureSettings == 0): ?>
    <div class="akeeba-block--failure">
		<?php echo \JText::_('COM_AKEEBA_CONFIG_UI_SETTINGS_NOTSECURED'); ?>
    </div>
<?php endif; ?>

<?php echo $this->loadAnyTemplate('admin:com_akeeba/CommonTemplates/ProfileName'); ?>

<div class="akeeba-block--info">
	<?php echo \JText::_('COM_AKEEBA_CONFIG_WHERE_ARE_THE_FILTERS'); ?>
</div>

<form name="adminForm" id="adminForm" method="post" action="index.php"
      class="akeeba-form--horizontal akeeba-form--with-hidden akeeba-form--configuration">

    <div class="akeeba-panel--info" style="margin-bottom: -1em">
        <header class="akeeba-block-header">
            <h5>
                <?php echo \JText::_('COM_AKEEBA_PROFILES_LABEL_DESCRIPTION'); ?>
            </h5>
        </header>

        <div class="akeeba-form-group">
            <label for="profilename" rel="popover"
                   data-original-title="<?php echo \JText::_('COM_AKEEBA_PROFILES_LABEL_DESCRIPTION'); ?>"
                   data-content="<?php echo \JText::_('COM_AKEEBA_PROFILES_LABEL_DESCRIPTION_TOOLTIP'); ?>">
				<?php echo \JText::_('COM_AKEEBA_PROFILES_LABEL_DESCRIPTION'); ?>
            </label>
            <input type="text" name="profilename" id="profilename"
                   value="<?php echo $this->escape($this->profileName); ?>"/>
        </div>

        <div class="akeeba-form-group">
            <label class="control-label" for="quickicon" rel="popover"
                   data-original-title="<?php echo \JText::_('COM_AKEEBA_CONFIG_QUICKICON_LABEL'); ?>"
                   data-content="<?php echo \JText::_('COM_AKEEBA_CONFIG_QUICKICON_DESC'); ?>">
				<?php echo \JText::_('COM_AKEEBA_CONFIG_QUICKICON_LABEL'); ?>
            </label>
            <div>
                <input type="checkbox" name="quickicon"
                       id="quickicon" <?php echo $this->quickIcon ? 'checked="checked"' : ''; ?>/>
            </div>
        </div>
    </div>

    <!-- This div contains dynamically generated user interface elements -->
    <div id="akeebagui">
    </div>

    <div class="akeeba-hidden-fields-container">
        <input type="hidden" name="option" value="com_akeeba"/>
        <input type="hidden" name="view" value="Configuration"/>
        <input type="hidden" name="task" value=""/>
        <input type="hidden" name="<?php echo $this->container->platform->getToken(true); ?>" value="1"/>
    </div>
</form>
