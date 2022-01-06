@php $editing = isset($insuranceFacility) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $insuranceFacility->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="emp_no"
            label="Emp No"
            value="{{ old('emp_no', ($editing ? $insuranceFacility->emp_no : '')) }}"
            maxlength="255"
            placeholder="Emp No"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="employee_name"
            label="Employee Name"
            value="{{ old('employee_name', ($editing ? $insuranceFacility->employee_name : '')) }}"
            maxlength="255"
            placeholder="Employee Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="jenis_asuransi"
            label="Jenis Asuransi"
            value="{{ old('jenis_asuransi', ($editing ? $insuranceFacility->jenis_asuransi : '')) }}"
            maxlength="255"
            placeholder="Jenis Asuransi"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="provider_asuransi"
            label="Provider Asuransi"
            value="{{ old('provider_asuransi', ($editing ? $insuranceFacility->provider_asuransi : '')) }}"
            maxlength="255"
            placeholder="Provider Asuransi"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nama_peserta"
            label="Nama Peserta"
            value="{{ old('nama_peserta', ($editing ? $insuranceFacility->nama_peserta : '')) }}"
            maxlength="255"
            placeholder="Nama Peserta"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="status_peserta"
            label="Status Peserta"
            value="{{ old('status_peserta', ($editing ? $insuranceFacility->status_peserta : '')) }}"
            maxlength="255"
            placeholder="Status Peserta"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date"
            label="Date"
            value="{{ old('date', ($editing ? optional($insuranceFacility->date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="peserta_manfaat"
            label="Peserta Manfaat"
            value="{{ old('peserta_manfaat', ($editing ? $insuranceFacility->peserta_manfaat : '')) }}"
            maxlength="255"
            placeholder="Peserta Manfaat"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
