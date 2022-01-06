@php $editing = isset($user) @endphp

<div class="row">
    <x-inputs.group class="col-sm-6">
        <div
            x-data="imageViewer('{{ $editing && $user->avatar ? $user->avatar_url : '' }}')"
        >
            <x-inputs.partials.label
                name="avatar"
                label="Avatar"
            ></x-inputs.partials.label
            ><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img
                    :src="imageUrl"
                    class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;"
                />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div
                    class="border rounded border-gray-200 bg-gray-100"
                    style="width: 100px; height: 100px;"
                ></div>
            </template>

            <div class="mt-2">
                <input
                    type="file"
                    name="avatar"
                    id="avatar"
                    @change="fileChosen"
                />
            </div>

            @error('avatar') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>
    <x-inputs.group class="col-sm-6">
        <x-inputs.text
            name="name"
            label="Name"
            value="{{ old('name', ($editing ? $user->name : '')) }}"
            maxlength="255"
            placeholder="Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.email
            name="email"
            label="Email"
            value="{{ old('email', ($editing ? $user->email : '')) }}"
            maxlength="255"
            placeholder="Email"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.password
            name="password"
            label="Password"
            maxlength="255"
            placeholder="Password"
            :required="!$editing"
        ></x-inputs.password>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.text
            name="nik_telkom"
            label="Nik Telkom"
            value="{{ old('nik_telkom', ($editing ? $user->nik_telkom : '')) }}"
            maxlength="255"
            placeholder="Nik Telkom"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.text
            name="nik_company"
            label="Nik Company"
            value="{{ old('nik_company', ($editing ? $user->nik_company : '')) }}"
            maxlength="255"
            placeholder="Nik Company"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.date
            name="date_in"
            label="Date In"
            value="{{ old('date_in', ($editing ? optional($user->date_in)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.select name="band_position_id" label="Band Position" required>
            @php $selected = old('band_position_id', ($editing ? $user->band_position_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Band Position</option>
            @foreach($bandPositions as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.select name="job_grade_id" label="Job Grade">
            @php $selected = old('job_grade_id', ($editing ? $user->job_grade_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Job Grade</option>
            @foreach($jobGrades as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.select name="job_family_id" label="Job Family">
            @php $selected = old('job_family_id', ($editing ? $user->job_family_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Job Family</option>
            @foreach($jobFamilies as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.select name="job_function_id" label="Job Function">
            @php $selected = old('job_function_id', ($editing ? $user->job_function_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Job Function</option>
            @foreach($jobFunctions as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.select name="city_recuite_id" label="City Recuite" required>
            @php $selected = old('city_recuite_id', ($editing ? $user->city_recuite_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the City Recuite</option>
            @foreach($cityRecuites as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.select
            name="status_employee_id"
            label="Status Employee"
            required
        >
            @php $selected = old('status_employee_id', ($editing ? $user->status_employee_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Status Employee</option>
            @foreach($statusEmployees as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.select name="company_home_id" label="Company Home" required>
            @php $selected = old('company_home_id', ($editing ? $user->company_home_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Company Home</option>
            @foreach($companyHomes as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.date
            name="date_sk"
            label="Date Sk"
            value="{{ old('date_sk', ($editing ? optional($user->date_sk)->format('Y-m-d') : '')) }}"
            max="255"
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.select name="company_host_id" label="Company Host">
            @php $selected = old('company_host_id', ($editing ? $user->company_host_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Company Host</option>
            @foreach($companyHosts as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.select name="sub_status_id" label="Sub Status">
            @php $selected = old('sub_status_id', ($editing ? $user->sub_status_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Sub Status</option>
            @foreach($subStatuses as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.select name="unit_id" label="Unit" required>
            @php $selected = old('unit_id', ($editing ? $user->unit_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Unit</option>
            @foreach($units as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.text
            name="place_of_birth"
            label="Place Of Birth"
            value="{{ old('place_of_birth', ($editing ? $user->place_of_birth : '')) }}"
            maxlength="150"
            placeholder="Place Of Birth"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.select name="division_id" label="Division" required>
            @php $selected = old('division_id', ($editing ? $user->division_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Division</option>
            @foreach($divisions as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.date
            name="date_of_birth"
            label="Date Of Birth"
            value="{{ old('date_of_birth', ($editing ? optional($user->date_of_birth)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.select name="work_location_id" label="Work Location" required>
            @php $selected = old('work_location_id', ($editing ? $user->work_location_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Work Location</option>
            @foreach($workLocations as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.number
            name="age"
            label="Age"
            value="{{ old('age', ($editing ? $user->age : '')) }}"
            max="255"
            placeholder="Age"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.select name="job_title_id" label="Job Title" required>
            @php $selected = old('job_title_id', ($editing ? $user->job_title_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Job Title</option>
            @foreach($jobTitles as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.select name="edu_id" label="Edu" required>
            @php $selected = old('edu_id', ($editing ? $user->edu_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Edu</option>
            @foreach($edus as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.select name="direktorat_id" label="Direktorat" required>
            @php $selected = old('direktorat_id', ($editing ? $user->direktorat_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Direktorat</option>
            @foreach($direktorats as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.select name="departement_id" label="Departement" required>
            @php $selected = old('departement_id', ($editing ? $user->departement_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Departement</option>
            @foreach($departements as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.text
            name="jabatan"
            label="Jabatan"
            value="{{ old('jabatan', ($editing ? $user->jabatan : '')) }}"
            maxlength="255"
            placeholder="Jabatan"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.date
            name="tanggal_kartap"
            label="Tanggal Kartap"
            value="{{ old('tanggal_kartap', ($editing ? optional($user->tanggal_kartap)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-6">
        <x-inputs.text
            name="no_sk_kartap"
            label="No Sk Kartap"
            value="{{ old('no_sk_kartap', ($editing ? $user->no_sk_kartap : '')) }}"
            maxlength="255"
            placeholder="No Sk Kartap"
        ></x-inputs.text>
    </x-inputs.group>

    <div class="form-group col-sm-6 mt-4">
        <h4>Assign @lang('crud.roles.name')</h4>

        @foreach ($roles as $role)
        <div>
            <x-inputs.checkbox
                id="role{{ $role->id }}"
                name="roles[]"
                label="{{ ucfirst($role->name) }}"
                value="{{ $role->id }}"
                :checked="isset($user) ? $user->hasRole($role) : false"
                :add-hidden-value="false"
            ></x-inputs.checkbox>
        </div>
        @endforeach
    </div>
</div>
