@php $editing = isset($serviceHistory) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="emp_no"
            label="Emp No"
            value="{{ old('emp_no', ($editing ? $serviceHistory->emp_no : '')) }}"
            maxlength="255"
            placeholder="Emp No"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="emoloyee_name"
            label="Emoloyee Name"
            value="{{ old('emoloyee_name', ($editing ? $serviceHistory->emoloyee_name : '')) }}"
            maxlength="255"
            placeholder="Emoloyee Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="start_date"
            label="Start Date"
            value="{{ old('start_date', ($editing ? optional($serviceHistory->start_date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="type"
            label="Type"
            value="{{ old('type', ($editing ? $serviceHistory->type : '')) }}"
            maxlength="255"
            placeholder="Type"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="company_home_id" label="Company Home" required>
            @php $selected = old('company_home_id', ($editing ? $serviceHistory->company_home_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Company Home</option>
            @foreach($companyHomes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="company_host_id" label="Company Host" required>
            @php $selected = old('company_host_id', ($editing ? $serviceHistory->company_host_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Company Host</option>
            @foreach($companyHosts as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="band_position_id" label="Band Position" required>
            @php $selected = old('band_position_id', ($editing ? $serviceHistory->band_position_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Band Position</option>
            @foreach($bandPositions as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="job_title_id" label="Job Title" required>
            @php $selected = old('job_title_id', ($editing ? $serviceHistory->job_title_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Job Title</option>
            @foreach($jobTitles as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $serviceHistory->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
