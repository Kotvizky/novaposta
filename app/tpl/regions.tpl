<h2>Регионы</h2>
<table class="table">
    <tbody>
        {foreach from=$content item=foo}
            <tr>
                <td>{$foo.area_description}</td>
                <td>{$foo.city_area}</td>
            </tr>
        {/foreach}
    </tbody>
</table>
