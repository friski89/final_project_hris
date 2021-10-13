@php $editing = isset($officeFacilities) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $officeFacilities->user_id : '')) @endphp
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
            value="{{ old('emp_no', ($editing ? $officeFacilities->emp_no : '')) }}"
            maxlength="255"
            placeholder="Emp No"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="employee_name"
            label="Employee Name"
            value="{{ old('employee_name', ($editing ? $officeFacilities->employee_name : '')) }}"
            maxlength="255"
            placeholder="Employee Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="jenis_fasilitas"
            label="Jenis Fasilitas"
            value="{{ old('jenis_fasilitas', ($editing ? $officeFacilities->jenis_fasilitas : '')) }}"
            maxlength="255"
            placeholder="Jenis Fasilitas"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="jenis_pemberian"
            label="Jenis Pemberian"
            value="{{ old('jenis_pemberian', ($editing ? $officeFacilities->jenis_pemberian : '')) }}"
            maxlength="255"
            placeholder="Jenis Pemberian"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nilai_perolehan"
            label="Nilai Perolehan"
            value="{{ old('nilai_perolehan', ($editing ? $officeFacilities->nilai_perolehan : '')) }}"
            maxlength="255"
            placeholder="Nilai Perolehan"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date"
            label="Date"
            value="{{ old('date', ($editing ? optional($officeFacilities->date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>
</div>
