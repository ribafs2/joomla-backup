<?php
/**
* @author-name Ribamar FS
* @copyright	Copyright (C) 2023 Ribamar FS.
* @license		GNU/GPL, see http://www.gnu.org/licenses/old-licenses/gpl-2.0.txt
* backupfiles is free and open source software. This version may have been modified 
* pursuant to the GNU General Public License, and as distributed it includes or is 
* derivative of works licensed under the GNU General Public License or other free or 
* open source software licenses. 
*/

defined('_JEXEC') or die('Restricted access');

use Joomla\CMS\Uri\Uri;
$url = Uri::root();
//use JHtml::_('bootstrap.loadCss', true); 
// Add Bootstrap
JHtml::_('stylesheet', 'media/vendor/bootstrap/css/bootstrap.css', array('relative' => false));
JHtml::_('script', 'media/vendor/bootstrap/js/bootstrap-es5.js', array('relative' => false));
?>

<div class="container mt-3">
<div class="mt-4 p-5 bg-primary text-white rounded">
<h1>Joomla Backup</h1> 
<h4><?=JText::_('COM_BACKUP_SUBJUMB')?></h4> 
</div>
<form action="" method="post">
<div class="row mb-3">
<label for="folder" class="col-sm-2 col-form-label"><?=JText::_('COM_BACKUP_IGNORE')?></label>
<input type=text class="form-control form-control-sm" name="folder" value="down" style="width: 15rem; font-size:16px">
</div>
<input type=submit class="btn btn-primary" value="<?=JText::_('COM_BACKUP_START')?>">
</form>

</div>

<?php

if(isset($_POST['folder'])){
    $exclude=$_POST['folder'];
    $exclude = "'*$exclude*'";
    
    $site_dir = basename(JPATH_SITE);
    
    // Backup do banco
    $config = JFactory::getApplication(); 
    
    $dbhost = $config->getCfg('host');
    $dbuser = $config->getCfg('user');
    $dbpass = $config->getCfg('password');
    $database = $config->getCfg('db');
    
    if(!defined('DS')){
        define('DS',DIRECTORY_SEPARATOR);
    }
    
    // Backup do Banco
    JToolBarHelper::title( 'Backup do banco', 'addedit.png' );
    
    // Pre-Load configuration
    require_once( JPATH_CONFIGURATION.DS.'configuration.php' );
    
    $date = date("Y_m_d-H_i");
    $config = JFactory::getApplication(); 
    
    $delzip=JPATH_SITE.DS.'*.zip';
    $delsql=JPATH_SITE.DS.'*.sql';
    system("rm $delzip; rm $delsql");
    
    $db = JPATH_SITE.DS.$database.'_'.$date.'.sql';
    $jp=JPATH_SITE;
    
    system("mysqldump -u$dbuser -p$dbpass $database > $db");
    
    $zip = JPATH_SITE.DS.$database.'_'.$date.'.zip';

    //system("cd $jp ; cd .. ; zip -rq $zip $site_dir -x '*down*'");
    system("cd $jp ; cd .. ; zip -rq $zip $site_dir");
    
    //system("cd $jp ; mv $zip $backupmv");
    
    $zipw = $url.DS.$database.'_'.$date.'.zip';
    $sqlw = $url.DS.$database.'_'.$date.'.sql';
    
    JFactory::getApplication()->enqueueMessage( JText::_('COM_BACKUP_SUCCESS'),'message');
    
    ?>
    <br>
    <a href="<?php print $zipw;?>"> <?=JText::_('COM_BACKUP_FILES')?></a><br><br>
    <a href="<?php print $sqlw;?>"> <?=JText::_('COM_BACKUP_DATABASE')?></a><br>
    <?php
}
?>
