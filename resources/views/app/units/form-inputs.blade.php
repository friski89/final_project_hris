@php $editing = isset($unit) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $unit->name : '')) }}"
            maxlength="100"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="departement_id" label="Departement" required>
            @php $selected = old('departement_id', ($editing ? $unit->departement_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Departement</option>
            @foreach($departements as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
