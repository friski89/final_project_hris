@php $editing = isset($division) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $division->name : '')) }}"
            maxlength="100"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="direktorat_id" label="Direktorat" required>
            @php $selected = old('direktorat_id', ($editing ? $division->direktorat_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Direktorat</option>
            @foreach($direktorats as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
