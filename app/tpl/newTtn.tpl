<h2>Новая накладная</h2>
<form action="app/action/newTtn.php">
<!-- отправитель -->
    <h3>Отправитель</h3>
    <div class="row">
            <div class="col">
            <div class="form-group">
                <label for="api-key">API Key</label>
                <input type="text" name="api-key" class="form-control" id="api-key"  value = "{$setting.api_key}" readonly>
            </div>

            <div class="form-group">
                <label for="np-sender-ref">Sender ref</label>
                <input type="text" class="form-control"
                       id="sender-ref" name="sender-Sender"  value = "{$setting.sender_ref}" readonly>
            </div>
                <div class="form-group">
                    <label for="np-sender-ref">CitySender</label>
                    <input type="text" class="form-control"
                           id="sender-ref" name="sender-CitySender"  value = "{$setting.city_ref}" readonly>
                </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="np-sender-phone">SendersPhone</label>
                <input type="number" class="form-control"
                       id="sender-ref" name="sender-SendersPhone"  value = "3805275055" readonly>
            </div>

            <div class="form-group">
                <label for="np-sender-ref">Sender warehouse ref</label>
                <input type="text" class="form-control" name="sender-SenderAddress"
                       id="sender-ref" readonly  value = "{$setting.warehouse_ref}" readonly>
            </div>
        </div>
    </div>

    <div class="row">
<!-- получатель -->
        <div class="col">
    <div class="panel">
        <h3>Получатель</h3>
        {foreach from=$recipient key=key item=value}
            {if $key eq 'Warehouse'}
                <div class="form-group">
                    <label for="np-area">Регион</label>
                    <select class="form-control" id="np-area" name="receiver-areaRef">
                        <option disabled selected value> Выберите регион </option>
                        {foreach from=$areas item=foo}
                            <option value="{$foo.ref}">{$foo.description }</option>
                        {/foreach}
                    </select>
                </div>

                <div class="form-group">
                    <label for="np-city">Город</label>
                    <select class="form-control" id="np-city" name="receiver-CityRef" disabled>
                    </select>
                </div>

                <div class="form-group">
                    <label for="np-warehouse" >Склад</label>
                    <select class="form-control" id="np-warehouse"  name="receiver-RecipientAddress" disabled>
                    </select>
                </div>
            {else}
                <div class="form-group">
                    <label for="{$key}">{$key}</label>
                    <input type="{$value[1]}" name="receiver-{$key}" class="form-control" id="sender-lastname"  value = "{$value[0]}">
                </div>
            {/if}
        {/foreach}
    </div>
        </div>

<!-- Параметры  -->
        <div class="col">
        <div class="Параметры">
        <h3>Свойства</h3>
        {foreach from=$properties key=key item=value}
            {if  $value[1] eq 'select'}
                <div class="form-group">
                    <label for="{$key}">{$key}</label>
                    <select class="form-control" name="params-{$key}"
                            id="sender-{$key}"  value = "{$value[0]}" {$value[2]}>
                        {foreach from=$value[2] item=foo}
                            <option value="{$foo}">{$foo}</option>
                        {/foreach}
                    </select>
                </div>
            {else}
                <div class="form-group">
                    <label for="{$key}">{$key}</label>
                    <input type="{$value[1]}" class="form-control" name="params-{$key}"
                           id="sender-{$key}"  value = "{$value[0]}" {$value[2]}>
                </div>
            {/if}

        {/foreach}
    </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Создать</button>
</form>