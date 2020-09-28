<h2>Отправитель</h2>

<form action="app/action/saveSender.php">

    <div class="form-group">
        <label for="np-key">API Key</label>
        <input type="text" name="np-key" class="form-control" id="np-key"  value = "{$apiKey}">
    </div>

    <div class="form-group">
        <label for="np-sender-ref">Sender ref</label>
        <input type="text" class="form-control" name="np-sender-ref"
               id="np-sender-ref" readonly placeholder="" value = "{$senderRef.sender_ref}">
    </div>

    <div class="form-group">
        <label for="np-SendersPhonef">SendersPhone</label>
        <input type="number" class="form-control" name="sender_phone"
               id="np-SendersPhone" placeholder="" value = "{$senderRef.sender_phone}">
    </div>


    <div class="panel">
        <div class="form-group">
            <label for="np-area">Регион</label>
            <select class="form-control" name="np-area" id="np-area" >
                <option disabled {if $cityArea == '' } selected {/if} value> Выберите регион </option>
                {foreach from=$areas item=foo}
                    <option value={$foo.ref} {if $foo.ref == $cityArea } selected {/if} >{$foo.description}</option>
                {/foreach}
            </select>
        </div>

        <div class="form-group">
            <label for="np-city">Город</label>
            <select class="form-control" name="np-city" id="np-city" {if $cityRef == '' } disabled {/if}>
                {foreach from=$cities item=foo}
                    <option value="{$foo.ref}" {if $foo.ref == $cityRef } selected {/if} >{$foo.description}</option>
                {/foreach}
            </select>
        </div>

        <div class="form-group">
            <label for="np-warehouse">Склад</label>
            <select class="form-control" name="np-warehouse" id="np-warehouse" {if $warehouseRef == '' } disabled {/if}>
                {foreach from=$warehouses item=foo}
                    <option value="{$foo.ref}" {if $foo.ref == $warehouseRef } selected {/if} >{$foo.description}</option>
                {/foreach}
            </select>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Записать</button>
    <button type="button" id="getSenderRef" class="btn btn-success">Получить ref</button>

</form>