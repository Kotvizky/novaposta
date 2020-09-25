<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-21 16:53:32
  from 'C:\openserver\domains\novaPoshta.local\app\tpl\warehouses.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f68b05c8eb772_66658475',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79e84eff94177a892db99943d6955a3e755f1e9e' => 
    array (
      0 => 'C:\\openserver\\domains\\novaPoshta.local\\app\\tpl\\warehouses.tpl',
      1 => 1600696410,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f68b05c8eb772_66658475 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Склады</h2>
<div class = "panel">
        <div class="form-group">
                <label for="np-area">Регион</label>
                <select class="form-control" id="np-area">
                        <option disabled selected value> Выберите регион </option>

                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['areas']->value, 'foo');
$_smarty_tpl->tpl_vars['foo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
$_smarty_tpl->tpl_vars['foo']->do_else = false;
?>
                        <option value=<?php echo $_smarty_tpl->tpl_vars['foo']->value['city_area'];?>
><?php echo $_smarty_tpl->tpl_vars['foo']->value['area_description'];?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
        </div>

        <div class="form-group">
                <label for="np-city">Город</label>
                <select class="form-control" id="np-city" disabled>
                </select>
        </div>

        <div class="form-group">
                <label for="np-warehouse">Склад</label>
                <select class="form-control" id="np-warehouse" disabled>
                </select>
        </div>
</div><?php }
}
