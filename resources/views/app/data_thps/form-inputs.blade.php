@php $editing = isset($dataThp) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="emp_no"
            label="Emp No"
            value="{{ old('emp_no', ($editing ? $dataThp->emp_no : '')) }}"
            maxlength="255"
            placeholder="Emp No"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="employee_name"
            label="Employee Name"
            value="{{ old('employee_name', ($editing ? $dataThp->employee_name : '')) }}"
            maxlength="255"
            placeholder="Employee Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="base_salary"
            label="Base Salary"
            value="{{ old('base_salary', ($editing ? $dataThp->base_salary : '')) }}"
            maxlength="255"
            placeholder="Base Salary"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="tunjangan_jabatan"
            label="Tunjangan Jabatan"
            value="{{ old('tunjangan_jabatan', ($editing ? $dataThp->tunjangan_jabatan : '')) }}"
            maxlength="255"
            placeholder="Tunjangan Jabatan"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="tunjangan_fixed"
            label="Tunjangan Fixed"
            value="{{ old('tunjangan_fixed', ($editing ? $dataThp->tunjangan_fixed : '')) }}"
            maxlength="255"
            placeholder="Tunjangan Fixed"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="based_jamsostek"
            label="Based Jamsostek"
            value="{{ old('based_jamsostek', ($editing ? $dataThp->based_jamsostek : '')) }}"
            maxlength="255"
            placeholder="Based Jamsostek"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="no_jamsostek"
            label="No Jamsostek"
            value="{{ old('no_jamsostek', ($editing ? $dataThp->no_jamsostek : '')) }}"
            maxlength="255"
            placeholder="No Jamsostek"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="no_bpjs"
            label="No Bpjs"
            value="{{ old('no_bpjs', ($editing ? $dataThp->no_bpjs : '')) }}"
            maxlength="255"
            placeholder="No Bpjs"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="no_npwp"
            label="No Npwp"
            value="{{ old('no_npwp', ($editing ? $dataThp->no_npwp : '')) }}"
            maxlength="255"
            placeholder="No Npwp"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="status_pajak"
            label="Status Pajak"
            value="{{ old('status_pajak', ($editing ? $dataThp->status_pajak : '')) }}"
            max="255"
            placeholder="Status Pajak"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="no_rekening"
            label="No Rekening"
            value="{{ old('no_rekening', ($editing ? $dataThp->no_rekening : '')) }}"
            maxlength="255"
            placeholder="No Rekening"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nama_bank"
            label="Nama Bank"
            value="{{ old('nama_bank', ($editing ? $dataThp->nama_bank : '')) }}"
            maxlength="255"
            placeholder="Nama Bank"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nama_pemilik"
            label="Nama Pemilik"
            value="{{ old('nama_pemilik', ($editing ? $dataThp->nama_pemilik : '')) }}"
            maxlength="255"
            placeholder="Nama Pemilik"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $dataThp->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
