@php $editing = isset($regencie) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $regencie->name : '')) }}"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="province_id" label="Province" required>
            @php $selected = old('province_id', ($editing ? $regencie->province_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Province</option>
            @foreach($provinces as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
