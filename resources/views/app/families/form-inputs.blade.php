@php $editing = isset($family) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="employee_name"
            label="Employee Name"
            value="{{ old('employee_name', ($editing ? $family->employee_name : '')) }}"
            maxlength="255"
            placeholder="Employee Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="emp_no"
            label="Emp No"
            value="{{ old('emp_no', ($editing ? $family->emp_no : '')) }}"
            maxlength="255"
            placeholder="Emp No"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="marital_status" label="Marital Status">
            @php $selected = old('marital_status', ($editing ? $family->marital_status : '')) @endphp
            <option value="Menikah" {{ $selected == 'Menikah' ? 'selected' : '' }} >Menikah</option>
            <option value="Belum Menikah" {{ $selected == 'Belum Menikah' ? 'selected' : '' }} >Belum menikah</option>
            <option value="Duda" {{ $selected == 'Duda' ? 'selected' : '' }} >Duda</option>
            <option value="Janda" {{ $selected == 'Janda' ? 'selected' : '' }} >Janda</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="no_kk"
            label="No Kk"
            value="{{ old('no_kk', ($editing ? $family->no_kk : '')) }}"
            maxlength="255"
            placeholder="No Kk"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="family_name"
            label="Family Name"
            value="{{ old('family_name', ($editing ? $family->family_name : '')) }}"
            maxlength="255"
            placeholder="Family Name"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="nik_id"
            label="Nik Id"
            value="{{ old('nik_id', ($editing ? $family->nik_id : '')) }}"
            maxlength="255"
            placeholder="Nik Id"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="place_of_birth"
            label="Place Of Birth"
            value="{{ old('place_of_birth', ($editing ? $family->place_of_birth : '')) }}"
            maxlength="255"
            placeholder="Place Of Birth"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date_of_birth"
            label="Date Of Birth"
            value="{{ old('date_of_birth', ($editing ? optional($family->date_of_birth)->format('Y-m-d') : '')) }}"
            max="255"
            required
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="gender" label="Gender">
            @php $selected = old('gender', ($editing ? $family->gender : '')) @endphp
            <option value="male" {{ $selected == 'male' ? 'selected' : '' }} >Male</option>
            <option value="female" {{ $selected == 'female' ? 'selected' : '' }} >Female</option>
            <option value="other" {{ $selected == 'other' ? 'selected' : '' }} >Other</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.date
            name="date_marital"
            label="Date Marital"
            value="{{ old('date_marital', ($editing ? optional($family->date_marital)->format('Y-m-d') : '')) }}"
            max="255"
        ></x-inputs.date>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="religion" label="Religion">
            @php $selected = old('religion', ($editing ? $family->religion : '')) @endphp
            <option value="Islam" {{ $selected == 'Islam' ? 'selected' : '' }} >Islam</option>
            <option value="Kristen" {{ $selected == 'Kristen' ? 'selected' : '' }} >Kristen</option>
            <option value="Hindu" {{ $selected == 'Hindu' ? 'selected' : '' }} >Hindu</option>
            <option value="Budha" {{ $selected == 'Budha' ? 'selected' : '' }} >Budha</option>
            <option value="Konghucu" {{ $selected == 'Konghucu' ? 'selected' : '' }} >Konghucu</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="citizenship"
            label="Citizenship"
            value="{{ old('citizenship', ($editing ? $family->citizenship : '')) }}"
            maxlength="255"
            placeholder="Citizenship"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="work"
            label="Work"
            value="{{ old('work', ($editing ? $family->work : '')) }}"
            maxlength="255"
            placeholder="Work"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="health_status"
            label="Health Status"
            value="{{ old('health_status', ($editing ? $family->health_status : '')) }}"
            max="255"
            placeholder="Health Status"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="blood_group" label="Blood Group">
            @php $selected = old('blood_group', ($editing ? $family->blood_group : '')) @endphp
            <option value="Tidak Tahu" {{ $selected == 'Tidak Tahu' ? 'selected' : '' }} >Tidak tahu</option>
            <option value="O" {{ $selected == 'O' ? 'selected' : '' }} >O</option>
            <option value="A" {{ $selected == 'A' ? 'selected' : '' }} >A</option>
            <option value="B" {{ $selected == 'B' ? 'selected' : '' }} >B</option>
            <option value="AB" {{ $selected == 'AB' ? 'selected' : '' }} >Ab</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="blood_rhesus"
            label="Blood Rhesus"
            value="{{ old('blood_rhesus', ($editing ? $family->blood_rhesus : '')) }}"
            maxlength="255"
            placeholder="Blood Rhesus"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="house_number"
            label="House Number"
            value="{{ old('house_number', ($editing ? $family->house_number : '')) }}"
            maxlength="255"
            placeholder="House Number"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="handphone_number"
            label="Handphone Number"
            value="{{ old('handphone_number', ($editing ? $family->handphone_number : '')) }}"
            maxlength="255"
            placeholder="Handphone Number"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="emergency_number"
            label="Emergency Number"
            value="{{ old('emergency_number', ($editing ? $family->emergency_number : '')) }}"
            maxlength="255"
            placeholder="Emergency Number"
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea
            name="address"
            label="Address"
            maxlength="255"
            required
            >{{ old('address', ($editing ? $family->address : ''))
            }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="city"
            label="City"
            value="{{ old('city', ($editing ? $family->city : '')) }}"
            maxlength="255"
            placeholder="City"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="province"
            label="Province"
            value="{{ old('province', ($editing ? $family->province : '')) }}"
            maxlength="255"
            placeholder="Province"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="postal_code"
            label="Postal Code"
            value="{{ old('postal_code', ($editing ? $family->postal_code : '')) }}"
            maxlength="255"
            placeholder="Postal Code"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="relationship" label="Relationship">
            @php $selected = old('relationship', ($editing ? $family->relationship : '')) @endphp
            <option value="Suami" {{ $selected == 'Suami' ? 'selected' : '' }} >Suami</option>
            <option value="Istri" {{ $selected == 'Istri' ? 'selected' : '' }} >Istri</option>
            <option value="Anak" {{ $selected == 'Anak' ? 'selected' : '' }} >Anak</option>
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="alive"
            label="Alive"
            value="{{ old('alive', ($editing ? $family->alive : '')) }}"
            max="255"
            placeholder="Alive"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="urutan"
            label="Urutan"
            value="{{ old('urutan', ($editing ? $family->urutan : '')) }}"
            max="255"
            placeholder="Urutan"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="dependent_status"
            label="Dependent Status"
            value="{{ old('dependent_status', ($editing ? $family->dependent_status : '')) }}"
            max="255"
            placeholder="Dependent Status"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="User" required>
            @php $selected = old('user_id', ($editing ? $family->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the User</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="edu_id" label="Edu" required>
            @php $selected = old('edu_id', ($editing ? $family->edu_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>Please select the Edu</option>
            @foreach($edus as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
