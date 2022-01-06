@php $editing = isset($district) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $district->name : '')) }}"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="regencie_id" label="Regencie" required>
            @php $selected = old('regencie_id', ($editing ? $district->regencie_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Regencie</option>
            @foreach($regencies as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
