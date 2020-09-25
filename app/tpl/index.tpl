{include file="header.tpl" title=foo}
{include file="nav.tpl" title=foo}
<div class="container">

    <div id = 'message' class="alert alert-danger d-none" role="alert">
        <p id = 'message-text'></p>
        <button id="btn-close">Close</button>
    </div>

    {$index_content}

</div>
{include file="footer.tpl"}