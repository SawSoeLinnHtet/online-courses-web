<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="name">Name</label>
    <div class="col-sm-10">
        <input class="form-control" type="text" id="name" name="name" value="{{ $instructor->name ?? '' }}"/>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="email">Email</label>
    <div class="col-sm-10">
        <input class="form-control" type="email" id="email" name="email" value="{{ $instructor->email ?? '' }}"/>
        <p class="form-text d-flex justify-content-end text-warning">You can use letters, numbers & periods</p>
    </div>
</div>
@if(!$disable)
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="password">Password</label>
        <div class="col-sm-10">
            <input class="form-control" type="password" id="password" name="password"/>
        </div>
    </div>
    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="confirm-password">Confirm Password</label>
        <div class="col-sm-10">
            <input class="form-control" type="password" id="confirm-password" name="password_confirmation"/>
        </div>
    </div>
@endif
<div class="row mb-3">
    <label for="gender" class="col-sm-2 col-form-label">Gender</label>
    <div class="col-sm-10 d-flex gap-3">
        <div class="form-check">
            <input
                name="gender"
                class="form-check-input"
                type="radio"
                value="male"
                id="male"
                {{ $instructor->gender ?? '' }}
            />
            <label class="form-check-label" for="male"> Male</label>
        </div>
        <div class="form-check">
            <input
                name="gender"
                class="form-check-input"
                type="radio"
                value="female"
                id="female"
                {{ $instructor->gender ?? '' }}
            />
            <label class="form-check-label" for="female"> Female </label>
        </div>
        <div class="form-check">
            <input
                name="gender"
                class="form-check-input"
                type="radio"
                value="other"
                id="other"
                {{ $instructor->gender ?? '' }}
            />
            <label class="form-check-label" for="other"> Other </label>
        </div>
    </div>
</div>
<div class="mb-3 row">
    <label for="dob" class="col-md-2 col-form-label">Date Of Birth</label>
    <div class="col-md-10">
        <input class="form-control" type="date" id="dob" name="dob" value="{{ $instructor->dob ?? '' }}"/>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="phone">Phone No</label>
    <div class="col-sm-10">
        <input class="form-control" type="text" id="phone" name="phone" value="{{ $instructor->phone ?? '' }}"/>
    </div>
</div>
<div class="row mb-3">
    <label class="col-sm-2 col-form-label" for="address">Address</label>
    <div class="col-sm-10">
        <textarea class="form-control" id="address" rows="5" name="address">{{ $instructor->address ?? '' }}</textarea>
    </div>
</div>
