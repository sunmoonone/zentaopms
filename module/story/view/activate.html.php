<?php
/**
 * The activate view file of story module of ZenTaoPMS.
 *
 * @copyright   Copyright 2009-2015 青岛易软天创网络科技有限公司(QingDao Nature Easy Soft Network Technology Co,LTD, www.cnezsoft.com)
 * @license     ZPL (http://zpl.pub/page/zplv12.html)
 * @author      Chunsheng Wang <chunsheng@cnezsoft.com>
 * @package     story
 * @version     $Id: activate.html.php 4129 2013-01-18 01:58:14Z wwccss $
 * @link        http://www.zentao.net
 */
?>
<?php include './header.html.php';?>
<div id='mainContent' class='main-content'>
  <div class='center-block'>
    <div class='main-header'>
      <h2>
        <span class='prefix'><strong><?php echo $story->id;?></strong></span>
        <strong><?php echo html::a($this->createLink('story', 'view', "storyID=$story->id"), $story->title);?></strong>
        <small><?php echo $lang->arrow . $lang->story->activate;?></small>
      </h2>
    </div>
    <form method='post' enctype='multipart/form-data' target='hiddenwin'>
      <table class='table table-form'>
        <tr>
          <th class='w-80px'><?php echo $lang->story->assignedTo;?></th>
          <td class='w-p45'><?php echo html::select('assignedTo', $users, $story->closedBy, 'class="form-control chosen"');?></td><td></td>
        </tr>
        <tr>
          <th><?php echo $lang->story->status;?></th>
          <td>
            <?php
            unset($lang->story->statusList['']);
            unset($lang->story->statusList['closed']);
            echo html::select('status', $lang->story->statusList, 'active', 'class="form-control chosen"');
            ?>
          </td>
        </tr>
        <tr>
          <th><?php echo $lang->story->comment;?></th>
          <td colspan='2'><?php echo html::textarea('comment', '', 'rows=5 class="area-1"');?></td>
        </tr>
        <tr>
          <td></td>
          <td colspan='2'>
            <?php 
            echo html::submitButton(html::icon($lang->icons['activate']) . ' ' . $lang->story->activate, '', 'btn btn-success');
            echo html::linkButton($lang->goback, $app->session->storyList ? $app->session->storyList : inlink('view', "storyID=$story->id"));
            ?>
          </td>
        </tr>
      </table>
    </form>
    <hr class='small' />
    <div class='main'><?php include '../../common/view/action.html.php';?></div>
  </div>
</div>
<?php include '../../common/view/footer.html.php';?>
