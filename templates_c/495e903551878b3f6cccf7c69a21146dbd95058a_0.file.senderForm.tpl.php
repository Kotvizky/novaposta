<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-25 09:53:37
  from 'C:\openserver\domains\novaPoshta.local\app\tpl\senderForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6d93f1092e56_41964517',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '495e903551878b3f6cccf7c69a21146dbd95058a' => 
    array (
      0 => 'C:\\openserver\\domains\\novaPoshta.local\\app\\tpl\\senderForm.tpl',
      1 => 1601016813,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6d93f1092e56_41964517 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Отправитель</h2>

<form action="app/action/saveSender.php">

    <div class="form-group">
        <label for="np-key">API Key</label>
        <input type="text" name="np-key" class="form-control" id="np-key"  value = "<?php echo $_smarty_tpl->tpl_vars['apiKey']->value;?>
">
    </div>

    <div class="form-group">
        <label for="np-sender-ref">Sender ref</label>
        <input type="text" class="form-control" name="np-sender-ref" id="np-sender-ref" readonly placeholder="">
    </div>


    <div class="panel">
        <div class="form-group">
            <label for="np-area">Регион</label>
            <select class="form-control" name="np-area" id="np-area" >
                <option disabled <?php if ($_smarty_tpl->tpl_vars['cityArea']->value == '') {?> selected <?php }?> value> Выберите регион </option>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['areas']->value, 'foo');
$_smarty_tpl->tpl_vars['foo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
$_smarty_tpl->tpl_vars['foo']->do_else = false;
?>
                    <option value=<?php echo $_smarty_tpl->tpl_vars['foo']->value['ref'];?>
 <?php if ($_smarty_tpl->tpl_vars['foo']->value['ref'] == $_smarty_tpl->tpl_vars['cityArea']->value) {?> selected <?php }?> ><?php echo $_smarty_tpl->tpl_vars['foo']->value['description'];?>
</option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
        </div>

        <div class="form-group">
            <label for="np-city">Город</label>
            <select class="form-control" name="np-city" id="np-city" <?php if ($_smarty_tpl->tpl_vars['cityRef']->value == '') {?> disabled <?php }?>>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cities']->value, 'foo');
$_smarty_tpl->tpl_vars['foo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
$_smarty_tpl->tpl_vars['foo']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['foo']->value['ref'];?>
" <?php if ($_smarty_tpl->tpl_vars['foo']->value['ref'] == $_smarty_tpl->tpl_vars['cityRef']->value) {?> selected <?php }?> ><?php echo $_smarty_tpl->tpl_vars['foo']->value['description'];?>
</option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
        </div>

        <div class="form-group">
            <label for="np-warehouse">Склад</label>
            <select class="form-control" name="np-warehouse" id="np-warehouse" <?php if ($_smarty_tpl->tpl_vars['warehouseRef']->value == '') {?> disabled <?php }?>>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['warehouses']->value, 'foo');
$_smarty_tpl->tpl_vars['foo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
$_smarty_tpl->tpl_vars['foo']->do_else = false;
?>
                    <option value="<?php echo $_smarty_tpl->tpl_vars['foo']->value['ref'];?>
" <?php if ($_smarty_tpl->tpl_vars['foo']->value['ref'] == $_smarty_tpl->tpl_vars['warehouseRef']->value) {?> selected <?php }?> ><?php echo $_smarty_tpl->tpl_vars['foo']->value['description'];?>
</option>
                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </select>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Записать</button>
    <button type="button" id="getSenderRef" class="btn btn-success">Получить ref</button>

</form><?php }
}
