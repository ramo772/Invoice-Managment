<x-input label="Client Name" class='form-control form-control-xlg' value="{{ $row->name }}" disabled />
<x-input label="Client Email" type="email" class='form-control form-control-xlg' value="{{ $row->email }}" disabled />
<x-input label="Client Address" type="text" class='form-control form-control-xlg' value="{{ $row->address }}"
    disabled />

<x-input class='form-control form-control-xlg' name="user_id" value="{{ Auth::user()->id }}" hidden />
