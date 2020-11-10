<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">NP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

            {foreach from=$navbar item=foo}
                <li class="nav-item active">
                    <a class="nav-link" href="{$foo.param}">{$foo.name} <span class="sr-only">(current)</span></a>
                </li>
            {/foreach}
        </ul>
    </div>
</nav>