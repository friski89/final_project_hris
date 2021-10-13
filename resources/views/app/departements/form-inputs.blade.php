@php $editing = isset($departement) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $departement->name : '')) }}"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="division_id" label="Division" required>
            @php $selected = old('division_id', ($editing ? $departement->division_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Division</option>
            @foreach($divisions as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
