<?php /* /home/qjvqhdcz/domains/michellepizza.educationhost.cloud/public_html/administrator/components/com_akeeba/ViewTemplates/CommonTemplates/SFTPBrowser.blade.php */ ?>
<?php
/**
 * @package   akeebabackup
 * @copyright Copyright (c)2006-2020 Nicholas K. Dionysopoulos / Akeeba Ltd
 * @license   GNU General Public License version 3, or later
 */

// Protect from unauthorized access
defined('_JEXEC') or die();
?>
<?php /* SFTP browser */ ?>
<div class="modal fade" id="sftpdialog" tabindex="-1" role="dialog" aria-labelledby="sftpdialogLabel" aria-hidden="true"
     style="display: none;">
    <div class="akeeba-renderer-fef">
        <h4 id="sftpdialogLabel">
		    <?php echo \JText::_('COM_AKEEBA_CONFIG_UI_SFTPBROWSER_TITLE'); ?>
        </h4>

        <p class="instructions akeeba-block--info">
		    <?php echo \JText::_('COM_AKEEBA_SFTPBROWSER_LBL_INSTRUCTIONS'); ?>
        </p>

        <div class="error akeeba-block--failure" id="sftpBrowserErrorContainer">
            <h2><?php echo \JText::_('COM_AKEEBA_SFTPBROWSER_LBL_ERROR'); ?></h2>
            <p id="sftpBrowserError"></p>
        </div>

        <ul id="ak_scrumbs" class="breadcrumb"></ul>

        <div class="folderBrowserWrapper" id="sftpBrowserWrapper">
            <table id="sftpBrowserFolderList" class="akeeba-table akeeba-table--striped">
            </table>
        </div>

        <div class="modal-footer">
            <button type="button" id="sftpdialogOkButton" class="akeeba-btn--primary">
                <span class="akion-checkmark"></span>
		        <?php echo \JText::_('COM_AKEEBA_BROWSER_LBL_USE'); ?>
            </button>

            <button type="button" id="sftpdialogCancelButton" class="akeeba-btn--red">
                <span class="akion-ios-close"></span>
				<?php echo \JText::_('JTOOLBAR_CANCEL'); ?>
            </button>
        </div>

    </div>
</div>
