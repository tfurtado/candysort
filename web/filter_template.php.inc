<?php
function filter_template($attribute) { ?>
    <p>
        <?= $attribute ?>:
        <select name="filter[<?= $attribute ?>]">
            <option>Don't filter</option>
            <option value="equals">equals to</option>
            <option value="contains">contains</option>
        </select>
        <input type="text" name="filter_value[<?= $attribute ?>]">
    </p>
<?php }