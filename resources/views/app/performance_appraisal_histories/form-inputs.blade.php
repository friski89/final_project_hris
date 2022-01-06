@php $editing = isset($performanceAppraisalHistory) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="emp_no"
            label="Emp No"
            value="{{ old('emp_no', ($editing ? $performanceAppraisalHistory->emp_no : '')) }}"
            maxlength="255"
            placeholder="Emp No"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="employee_name"
            label="Employee Name"
            value="{{ old('employee_name', ($editing ? $performanceAppraisalHistory->employee_name : '')) }}"
            maxlength="255"
            placeholder="Employee Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="year"
            label="Year"
            value="{{ old('year', ($editing ? $performanceAppraisalHistory->year : '')) }}"
            max="255"
            placeholder="Year"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="performance_value"
            label="Performance Value"
            value="{{ old('performance_value', ($editing ? $performanceAppraisalHistory->performance_value : '')) }}"
            maxlength="255"
            placeholder="Performance Value"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="performance_score"
            label="Performance Score"
            value="{{ old('performance_score', ($editing ? $performanceAppraisalHistory->performance_score : '')) }}"
            maxlength="255"
            placeholder="Performance Score"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="competency_value"
            label="Competency Value"
            value="{{ old('competency_value', ($editing ? $performanceAppraisalHistory->competency_value : '')) }}"
            maxlength="255"
            placeholder="Competency Value"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="behavioral_value"
            label="Behavioral Value"
            value="{{ old('behavioral_value', ($editing ? $performanceAppraisalHistory->behavioral_value : '')) }}"
            maxlength="255"
            placeholder="Behavioral Value"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $performanceAppraisalHistory->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
