<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-21 16:36:56
  from 'C:\openserver\domains\novaPoshta.local\app\tpl\nav.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f68ac78d31e41_29758937',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1a72d93143584f4456bf78f14d8c039d2dbb9cee' => 
    array (
      0 => 'C:\\openserver\\domains\\novaPoshta.local\\app\\tpl\\nav.tpl',
      1 => 1600695414,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f68ac78d31e41_29758937 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">NP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['navbar']->value, 'foo');
$_smarty_tpl->tpl_vars['foo']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
$_smarty_tpl->tpl_vars['foo']->do_else = false;
?>
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo $_smarty_tpl->tpl_vars['foo']->value['param'];?>
"><?php echo $_smarty_tpl->tpl_vars['foo']->value['name'];?>
 <span class="sr-only">(current)</span></a>
                </li>
            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </ul>
    </div>
</nav>
<?php }
}
