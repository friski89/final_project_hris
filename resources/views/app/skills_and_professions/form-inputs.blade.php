@php $editing = isset($skillsAndProfession) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $skillsAndProfession->user_id : '')) @endphp
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
            value="{{ old('emp_no', ($editing ? $skillsAndProfession->emp_no : '')) }}"
            maxlength="255"
            placeholder="Emp No"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="employee_name"
            label="Employee Name"
            value="{{ old('employee_name', ($editing ? $skillsAndProfession->employee_name : '')) }}"
            maxlength="255"
            placeholder="Employee Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="certificate_name"
            label="Certificate Name"
            value="{{ old('certificate_name', ($editing ? $skillsAndProfession->certificate_name : '')) }}"
            maxlength="255"
            placeholder="Certificate Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="institution"
            label="Institution"
            value="{{ old('institution', ($editing ? $skillsAndProfession->institution : '')) }}"
            maxlength="255"
            placeholder="Institution"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="start_date"
            label="Start Date"
            value="{{ old('start_date', ($editing ? optional($skillsAndProfession->start_date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="end_date"
            label="End Date"
            value="{{ old('end_date', ($editing ? optional($skillsAndProfession->end_date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="other_competencies_id"
            label="Other Competencies"
        >
            @php $selected = old('other_competencies_id', ($editing ? $skillsAndProfession->other_competencies_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Other Competencies</option>
            @foreach($allOtherCompetencies as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="competence_fanctional_id"
            label="Competence Fanctional"
        >
            @php $selected = old('competence_fanctional_id', ($editing ? $skillsAndProfession->competence_fanctional_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Competence Fanctional</option>
            @foreach($competenceFanctionals as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="competence_leadership_id"
            label="Competence Leadership"
        >
            @php $selected = old('competence_leadership_id', ($editing ? $skillsAndProfession->competence_leadership_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Competence Leadership</option>
            @foreach($competenceLeaderships as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="competence_core_value_id"
            label="Competence Core Value"
        >
            @php $selected = old('competence_core_value_id', ($editing ? $skillsAndProfession->competence_core_value_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Competence Core Value</option>
            @foreach($competenceCoreValues as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
