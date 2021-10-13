@php $editing = isset($trainingHistory) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="emp_no"
            label="Emp No"
            value="{{ old('emp_no', ($editing ? $trainingHistory->emp_no : '')) }}"
            maxlength="255"
            placeholder="Emp No"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="employee_name"
            label="Employee Name"
            value="{{ old('employee_name', ($editing ? $trainingHistory->employee_name : '')) }}"
            maxlength="255"
            placeholder="Employee Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="training_name"
            label="Training Name"
            value="{{ old('training_name', ($editing ? $trainingHistory->training_name : '')) }}"
            maxlength="255"
            placeholder="Training Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="institution"
            label="Institution"
            value="{{ old('institution', ($editing ? $trainingHistory->institution : '')) }}"
            maxlength="255"
            placeholder="Institution"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="start_date"
            label="Start Date"
            value="{{ old('start_date', ($editing ? optional($trainingHistory->start_date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="years_of_training"
            label="Years Of Training"
            value="{{ old('years_of_training', ($editing ? $trainingHistory->years_of_training : '')) }}"
            maxlength="255"
            placeholder="Years Of Training"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="training_duration"
            label="Training Duration"
            value="{{ old('training_duration', ($editing ? $trainingHistory->training_duration : '')) }}"
            maxlength="255"
            placeholder="Training Duration"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="end_date"
            label="End Date"
            value="{{ old('end_date', ($editing ? optional($trainingHistory->end_date)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="training_force"
            label="Training Force"
            value="{{ old('training_force', ($editing ? $trainingHistory->training_force : '')) }}"
            maxlength="255"
            placeholder="Training Force"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="rating"
            label="Rating"
            value="{{ old('rating', ($editing ? $trainingHistory->rating : '')) }}"
            maxlength="255"
            placeholder="Rating"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="trnevent_topic"
            label="Trnevent Topic"
            value="{{ old('trnevent_topic', ($editing ? $trainingHistory->trnevent_topic : '')) }}"
            maxlength="255"
            placeholder="Trnevent Topic"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="trncourse_cost"
            label="Trncourse Cost"
            value="{{ old('trncourse_cost', ($editing ? $trainingHistory->trncourse_cost : '')) }}"
            maxlength="255"
            placeholder="Trncourse Cost"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="trnevent_type"
            label="Trnevent Type"
            value="{{ old('trnevent_type', ($editing ? $trainingHistory->trnevent_type : '')) }}"
            maxlength="255"
            placeholder="Trnevent Type"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="trn_flag"
            label="Trn Flag"
            value="{{ old('trn_flag', ($editing ? $trainingHistory->trn_flag : '')) }}"
            maxlength="255"
            placeholder="Trn Flag"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $trainingHistory->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select
            name="other_competencies_id"
            label="Other Competencies"
        >
            @php $selected = old('other_competencies_id', ($editing ? $trainingHistory->other_competencies_id : '')) @endphp
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
            @php $selected = old('competence_fanctional_id', ($editing ? $trainingHistory->competence_fanctional_id : '')) @endphp
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
            @php $selected = old('competence_leadership_id', ($editing ? $trainingHistory->competence_leadership_id : '')) @endphp
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
            @php $selected = old('competence_core_value_id', ($editing ? $trainingHistory->competence_core_value_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Competence Core Value</option>
            @foreach($competenceCoreValues as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
