@php $editing = isset($emergencyContact) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $emergencyContact->name : '')) }}"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="contact"
            label="Contact"
            value="{{ old('contact', ($editing ? $emergencyContact->contact : '')) }}"
            maxlength="255"
            placeholder="Contact"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="relation"
            label="Relation"
            value="{{ old('relation', ($editing ? $emergencyContact->relation : '')) }}"
            maxlength="255"
            placeholder="Relation"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="profile_id" label="Profile" required>
            @php $selected = old('profile_id', ($editing ? $emergencyContact->profile_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Profile</option>
            @foreach($profiles as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
