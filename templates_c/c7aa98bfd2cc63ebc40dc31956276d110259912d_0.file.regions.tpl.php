<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-21 12:48:13
  from 'C:\openserver\domains\novaPoshta.local\app\tpl\regions.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6876dd8c1b79_14990115',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7aa98bfd2cc63ebc40dc31956276d110259912d' => 
    array (
      0 => 'C:\\openserver\\domains\\novaPoshta.local\\app\\tpl\\regions.tpl',
      1 => 1600681692,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6876dd8c1b79_14990115 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Регионы</h2>
<table class="table">
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['content']->value, 'foo');
$_smarty_tpl->tpl_vars['foo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
$_smarty_tpl->tpl_vars['foo']->do_else = false;
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['foo']->value['area_description'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['foo']->value['city_area'];?>
</td>
            </tr>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>
<?php }
}
