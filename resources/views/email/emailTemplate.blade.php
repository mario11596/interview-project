<form action="{{ route('company.email_send_applications', 1) }}" method="POST" >
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <strong>Naslov:</strong>
                <input type="text" name="title" class="form-control" >
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Sadržaj:</strong>
                <input class="form-control" name="content" type="text"/>
            </div>
        </div>

        

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Pošalji</button>
        </div>
    </div>
</form>