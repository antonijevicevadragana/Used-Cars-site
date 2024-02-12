<div class="input-group row searchDiv">
    <div class="col-md-6">
        <select class="form-select" name="brand" id="brand">
            <option value="">{{__('Brend')}}</option>
            @foreach ($brendCars as $car)
                <option value="{{ $car->brend }}">{{ $car->brend }}</option>
            @endforeach
        </select>

        <select class="form-select" name="model" id="model">
            <option value="">{{__('Model')}}</option>
            @foreach ($modelsByBrand as $brand => $models)
                @foreach ($models as $model)
                    <option value="{{ $model }}" data-brand="{{ $brand }}">{{ $model }}
                    </option>
                @endforeach
            @endforeach
        </select>

    </div>
    <div class="col-md-6">
    
        <select class="form-select" name="category" id="category">
            <option value="">{{__('Category')}}</option>
            <option value="limousine"> {{__('Limousine')}}</option>
            <option value="pickup"> {{__('Pickup')}}</option>
            <option value="hatchback"> {{__('Hatchback')}}</option>
            <option value="station Wagon"> {{__('Station Wagon')}}</option>
            <option value="convertible/cabriolet"> {{__('Cabriolet')}}</option>
            <option value="coupe"> {{__('Coupe')}}</option>
            <option value="minivan"> {{__('Minivan')}}</option>
            <option value="jeep"> {{__('Jeep')}}</option>
          </select>
   
        

        <select class="form-select" name="fuel" id="fuel">
            <option value="" data-image=""> {{__('Fuel')}}</option>
            <option value="gasoline"> {{__('Gasoline')}}</option>
            <option value="diesel"> {{__('Diesel')}}</option>
            <option value="gas"> {{__('Gas')}}</option>
            <option value="gasoline+gas">{{__('Gasoline+gas ')}}</option>
            <option value="hybrid">{{__('Hybrid ')}}</option>
          </select>
    </div>

    <div class="col-md-6">
        <input type="text" name="yearFrom" class="form-control rounded searchInput"
            placeholder="{{ __('Year from') }} " aria-label="Search" aria-describedby="search-addon" />

        <input type="text" name="yearTo" class="form-control rounded searchInput" placeholder="{{ __('to Year') }} "
            aria-label="Search" aria-describedby="search-addon" />
    </div>
    <div class="col-md-6">
        <input type="text" name="price" class="form-control rounded searchInput"
            placeholder="{{ __('Price up to') }} " aria-label="Search" aria-describedby="search-addon" />

        <button type="submit" class="btn btn-sm grey">{{ __('Search') }}</button>
    </div>
</div>


<script>
    document.getElementById('brand').addEventListener('change', function() {
        let selectedBrand = this.value;
        let modelSelect = document.getElementById('model');

        // Clear existing options
        modelSelect.innerHTML = '<option value="">Model</option>';

        // Add options for the selected brand
        @foreach ($modelsByBrand as $brand => $models)
            if ("{{ $brand }}" === selectedBrand || selectedBrand === '') {
                @foreach ($models as $model)
                    var option = document.createElement('option');
                    option.value = "{{ $model }}";
                    option.text = "{{ $model }}";
                    modelSelect.add(option);
                @endforeach
            }
        @endforeach
    });


</script>