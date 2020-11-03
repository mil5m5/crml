@csrf
<div class="form-group">
    <label for="old_salary">Old Salary</label>
    <input id="old_salary" class="form-control form-control-sm @error('old_salary') is-invalid @enderror" name="old_salary" type="text" value="{{ $model->old_salary ?? '' }}">
</div>
<div class="form-group">
    <label for="new_salary">New Salary</label>
    <input id="new_salary" class="form-control form-control-sm @error('new_salary') is-invalid @enderror" name="new_salary" type="text" value="{{ $model->new_salary ?? '' }}">
</div>
<div class="form-group">
    <label for="comment">Comment</label>
    <textarea name="comment" class="form-control form-control-sm @error('comment') is-invalid @enderror" id="comment" cols="30" rows="10" >{{ $model->comment ?? '' }}</textarea>
</div>
<div class="form-group">
    <label for="employee_id">Employee</label>
    <select id="employee_id" class="form-control form-control-sm @error('employee_id') is-invalid @enderror" name="employee_id">
        <option value="" disabled selected hidden>Choose Employee...</option>
        @foreach(\App\Models\Employee::getEmployeesList() as $key => $employee)
            @if(isset($model) && ($model->employee_id == $employee))
                <option selected value="{{ $key }}">{{ $employee }}</option>
            @else
                <option value="{{ $key }}">{{ $employee }}</option>
            @endif
        @endforeach
    </select>
</div>

