<?php

list($qb, $pager, $total) = db_findWithPager('category', array('deleted' => null), array('name' => 'asc'));

if ($qb->getNumRows()) {
    $langs = _langs(_defaultLang());
    ?>
    <table class="list table">
        <tr class="label">
            <td class="tableLeft" colspan="2"><?php echo _t('Actions'); ?></td>
            <td>
                <span>Name</span>
                <label class="lang">(<?php echo _langName(); ?>)</label>
            </td>
            <?php if ($langs) { ?>
                <?php foreach ($langs as $lcode => $lname) { ?>
                <td>
                    <span>Name</span>
                    <?php if (_langName($lcode)) { ?>
                    <label class="lang">(<?php echo _langName($lcode); ?>)</label>
                    <?php } ?>
                </td>
                <?php } ?>
            <?php } ?>
        </tr>
        <?php
        $data = array();
        while ($row = $qb->fetchRow()) {
            $data[$row->id] = (array) _getTranslationStrings($row, 'name');
            ?>
            <tr>
                <td class="tableLeft actions colAction">
                    <a href="#" class="edit edit-ico" title="Edit" rel="<?php echo $row->id; ?>">
                        <span><?php echo _t('Edit'); ?></span>
                    </a>
                </td>
                <td class="colAction">
                    <a href="#" class="delete delete-ico" title="Delete" rel="<?php echo $row->id; ?>">
                        <span><?php echo _t('Delete'); ?></span>
                    </a>
                </td>
                <td class="colName">
                    <?php echo $row->name; ?>
                </td>
                <?php if ($langs) { ?>
                    <?php foreach ($langs as $lcode => $lname) { ?>
                    <td class="colName <?php echo $lcode; ?>">
                        <?php
                        $lcode = _queryLang($lcode);
                        echo isset($data[$row->id]['name_i18n'][$lcode]) ? $data[$row->id]['name_i18n'][$lcode] : '';
                        ?>
                    </td>
                    <?php } ?>
                <?php } ?>
            </tr>
        <?php
        }
        ?>
    </table>
    <div class="pager-container"><?php echo $pager->display(); ?></div>
    <?php _addFormData('form-category', $data); ?>
<?php
} else {
?>
    <div class="no-record"><?php echo _t('There is no item found. Click "Add New Category" to add a new category.'); ?></div>
<?php
}
