<h2>Реестр накладных</h2>
<table class="table">
    <tbody>
    <thead>
    <tr>

        <th>ref</th>
        <th>cost_on_site</th>
        <th>estimated_deliveryDate</th>
        <th>int_doc_number</th>
        <th>type_document</th>
        <th>entered_date</th>
    </tr>
    </thead>
    {foreach from=$reestr item=foo}


        </th>
        <tr>
            <td>{$foo.ref}</td>
            <td>{$foo.cost_on_site}</td>
            <td>{$foo.estimated_deliveryDate}</td>
            <td><a href="https://my.novaposhta.ua/orders/printDocument/orders/{$foo.int_doc_number}/type/pdf/apiKey/{$api_key}" target="_blank">{$foo.int_doc_number}<a></td>
            <td>{$foo.type_document}</td>
            <td>{$foo.entered_date}</td>
        </tr>
    {/foreach}
    </tbody>
</table>