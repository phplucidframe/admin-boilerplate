<?php

list($qb, $pager, $total) = db_findWithPager('user', array('deleted' => null), array('role' => 'asc', 'full_name' => 'asc'));

if ($qb->getNumRows()) {
?>
    <table class="list table users">
        <tr class="label">
            <td class="tableLeft" colspan="2"><?php echo _t('Actions'); ?></td>
            <td><?php echo _t('Full Name') ?></td>
            <td><?php echo _t('Username') ?></td>
            <td><?php echo _t('Email') ?></td>
            <td><?php echo _t('User Role') ?></td>
        </tr>
        <?php while ($row = $qb->fetchRow()): ?>
            <tr>
                <td class="tableLeft actions colAction">
                    <a href="<?php echo _url(_cfg('baseDir') . '/user/setup',array($row->id)); ?>" class="edit edit-ico" title="Edit" >
                        <span><?php echo _t('Edit'); ?></span>
                    </a>
                </td>
                <td class="actions colAction">
                    <?php if ($row->is_master): ?>
                        <span class="delete delete-ico disabled"></span>
                    <?php else: ?>
                        <a href="#" class="delete delete-ico" title="Delete" rel="<?php echo $row->id; ?>">
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
