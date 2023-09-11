@if (session('info'))
    @foreach (session('info') as $title => $message)
        <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-info"></i> {{ $title }}</h4>
            {{ $message }}
        </div>
    @endforeach
@endif
@if (session('success'))
    @foreach (session('success') as $title => $message)
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> {{ $title }}</h4>
            {{ $message }}
        </div>
    @endforeach
@endif
@if (session('error'))
    @foreach (session('error') as $title => $message)
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> {{ $title }}</h4>
            {{ $message }}
        </div>
    @endforeach
@endif
@if (session('warning'))
    @foreach (session('warning') as $title => $message)
        <div class="alert alert-warning alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> {{ $title }}</h4>
            {{ $message }}
        </div>
    @endforeach
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
