<?php
$get = _get($_GET);

$args = array();

# Count query for the pager
$rowCount = db_count('category')
    ->where()->condition('deleted', null)
    ->fetch();

# Prerequisite for the Pager
$pager = _pager()
    ->set('itemsPerPage', _cfg('itemsPerPage'))
    ->set('pageNumLimit', _cfg('pageNumLimit'))
    ->set('total', $rowCount)
    ->set('ajax', true)
    ->calculate();

$qb = db_select('user', 'u')
    ->where()->condition('deleted', null)
    ->orderBy('role')
    ->orderBy('full_name')
    ->limit($pager->get('offset'), $pager->get('itemsPerPage'));

if ($qb->getNumRows()) {
?>
    <table cellpadding="0" cellspacing="0" border="0" class="list users">
        <tr class="label">
            <td class="tableLeft" colspan="2"><?php echo _t('Actions'); ?></td>
            <td><?php echo _t('Full Name') ?></td>
            <td><?php echo _t('Username') ?></td>
            <td><?php echo _t('Email') ?></td>
            <td><?php echo _t('User Role') ?></td>
        </tr>
        <?php while ($row = $qb->fetchRow()): ?>
            <tr>
                <td class="tableLeft colAction">
                    <a href="<?php echo _url(_cfg('baseDir') . '/user/setup',array($row->id)); ?>" class="edit" title="Edit" >
                        <span><?php echo _t('Edit'); ?></span>
                    </a>
                </td>
                <td class="colAction">
                    <?php if ($row->is_master): ?>
                        <span class="delete disabled"></span>
                    <?php else: ?>
                        <a href="#" class="delete" title="Delete" rel="<?php echo $row->id; ?>">
                            <span><?php echo _t('Delete'); ?></span>
                        </a>
                    <?php endif ?>
                </td>
                <td class="colFullName">
                    <div class="overflow"><?php echo $row->full_name; ?></div>
                </td>
                <td class="colUsername">
                    <div class="overflow"><?php echo $row->username; ?></div>
                </td>
                <td class="colEmail">
                    <div class="overflow"><?php echo $row->email; ?></div>
                </td>
                <td class="colRole"><?php echo ucfirst($row->role); ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
    <div class="pager-container"><?php echo $pager->display(); ?></div>
<?php
} else {
?>
    <div class="no-record">
        <?php echo _t("You don't have any user! %sLet's go create a new user!%s", '<a href="'._url(_cfg('baseDir') . '/user/setup').'">', '</a>'); ?>
    </div>
<?php
}
