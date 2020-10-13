<?php
$get  = _get($_GET);
$lang = _getLang();

# Count query for the pager
$rowCount = db_count('post')
    ->where()->condition('deleted', null)
    ->fetch();

# Prerequisite for the Pager
$pager = _pager()
    ->set('itemsPerPage', _cfg('itemsPerPage'))
    ->set('pageNumLimit', _cfg('pageNumLimit'))
    ->set('total', $rowCount)
    ->set('ajax', true)
    ->calculate();

$qb = db_select('post', 'p')
    ->join('category', 'c', 'p.cat_id = c.id')
    ->join('user', 'u', 'p.user_id = u.id')
    ->fields('p', array(
        'id', 'created', 'title', 'body',
        array('title_'.$lang, 'title_i18n'),
        array('body_'.$lang, 'body_i18n')
    ))
    ->fields('c', array(
        array('name', 'catName'),
        array('name_'.$lang, 'catName_i18n')
    ))
    ->fields('u', array('full_name'))
    ->where()->condition('p.deleted', null)
    ->orderBy('p.created', 'DESC')
    ->orderBy('u.full_name')
    ->limit($pager->get('offset'), $pager->get('itemsPerPage'));

$lang = _urlLang($lang);

if ($qb->getNumRows()) {
?>
    <table cellpadding="0" cellspacing="0" border="0" class="list news">
        <tr class="label">
            <td class="tableLeft" colspan="2"><?php echo _t('Actions'); ?></td>
            <td>
                <span><?php echo _t('Title'); ?></span>
                <label class="lang">(<?php echo _langName($lang); ?>)</label>
            </td>
            <td><?php echo _t('Author'); ?></td>
            <td><?php echo _t('Category'); ?></td>
            <td><?php echo _t('Date') ?></td>
        </tr>
        <?php
        while ($row = $qb->fetchRow()) {
            $row->title     = $row->title_i18n ?: $row->title;
            $row->body      = $row->body_i18n ?: $row->body;
            $row->catName   = $row->catName_i18n ?: $row->catName;
            ?>
            <tr>
                <td class="tableLeft colAction">
                    <a href="<?php echo _url(_cfg('baseDir') . '/post/setup', array($row->id, 'lang' => $lang)); ?>" class="edit" title="Edit" >
                        <span><?php echo _t('Edit'); ?></span>
                    </a>
                </td>
                <td class="colAction">
                    <a href="#" class="delete" title="Delete" rel="<?php echo $row->id; ?>">
                        <span><?php echo _t('Delete'); ?></span>
                    </a>
                </td>
                <td class="colTitle <?php echo $lang; ?>"><?php echo $row->title;?></td>
                <td class=""><?php echo $row->full_name; ?></td>
                <td class="<?php echo $lang; ?>"><?php echo $row->catName; ?></td>
                <td class=""><?php echo _fdateTime($row->created); ?></td>
            </tr>
            <?php
        }
?>
    </table>
    <div class="pager-container"><?php echo $pager->display(); ?></div>
<?php
} else {
?>
    <div class="no-record"><?php echo _t("You don't have any post! %sLet's go make a new post!%s", '<a href="'._url(_cfg('baseDir') . '/post/setup').'">', '</a>'); ?></div>
<?php
}

