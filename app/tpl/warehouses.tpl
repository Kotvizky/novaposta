<h2>Склады</h2>
<div class = "panel">
        <div class="form-group">
                <label for="np-area">Регион</label>
                <select class="form-control" id="np-area">
                        <option disabled selected value> Выберите регион </option>

                        {foreach from=$areas item=foo}
                        <option value={$foo.city_area}>{$foo.area_description}</option>
                    {/foreach}
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
</div>