@php $editing = isset($jobTitle) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $jobTitle->name : '')) }}"
            maxlength="100"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
