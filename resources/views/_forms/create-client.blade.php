<x-input label="Client Name" class='form-control form-control-xlg' name="name"/>
<x-input label="Client Email" type="email" class='form-control form-control-xlg' name="email"/>
<x-input label="Client Address" type="text" class='form-control form-control-xlg' name="address"/>

<x-input class='form-control form-control-xlg' name="user_id" value="{{ Auth::user()->id }}" hidden />
