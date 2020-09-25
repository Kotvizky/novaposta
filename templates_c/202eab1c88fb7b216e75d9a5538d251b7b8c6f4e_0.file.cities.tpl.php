<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-21 14:24:59
  from 'C:\openserver\domains\novaPoshta.local\app\tpl\cities.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f688d8b21c975_11960372',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '202eab1c88fb7b216e75d9a5538d251b7b8c6f4e' => 
    array (
      0 => 'C:\\openserver\\domains\\novaPoshta.local\\app\\tpl\\cities.tpl',
      1 => 1600687496,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f688d8b21c975_11960372 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Города</h2>

<div class="form-group">
        <label for="np-area">Регион</label>
        <select class="form-control" id="np-area">
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
        <select class="form-control" id="np-city">
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
<?php }
}
