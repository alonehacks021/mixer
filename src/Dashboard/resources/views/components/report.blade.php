<div class="card">
    <div class="card-header" data-toggle="collapse" data-target="#report-{{$id = rand(1, 999999)}}">
        {{$title ?? 'گزارش ساز'}}
        <i class="fas fa-file-excel fa-lg float-right mt-1"></i>
    </div>
    <div class="card-body collapse" id="report-{{$id}}">
        <form autocomplete="off" method="get" action="/dashboard/download-report">

            @foreach (\Request::except('page') as $name => $value)
                @if (is_array($value))
                    @foreach ($value as $index => $subValue)
                    <input type="hidden" name="{{$name}}[{{$index}}]" value="{{$subValue}}"/>
                    @endforeach
                @else
                <input type="hidden" name="{{$name}}" value="{{$value}}"/>
                @endif
            
            @endforeach

            <input type="hidden" name="model" value="{{$report['model']}}"/>

            <div class="row mb-2">
                <div class="col">
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="check-all-{{$id}}"
                                checked />
                            <label class="custom-control-label" for="check-all-{{$id}}">همه</label>
                        </div>
                    </div>
                    <hr/>
                </div>
            </div>
            <div class="row">
                @foreach ($report['columns'] ?? [] as $column)
                <div class="form-group col-12 col-sm-4 col-md-3">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input filter filter-{{$id}}" id="{{$column['name']}}-{{$id}}" name="columns[{{$column['lang']}}]" value="{{$column['name']}}"
                            checked />
                        <label class="custom-control-label" for="{{$column['name']}}-{{$id}}">@lang($column['lang'])</label>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-12">{!! $slot !!}</div>  
                <hr/>  
            </div>
            <div class="row">
                <div class="col-12 col-sm-4 col-md-3 mb-2 mb-sm-0" href="#">
                    <button type="submit" class="btn btn-success btn-block" name="report_type" value="excel">
                        دانلود اکسل
                    </button>
                </div> 

                <div class="col-12 col-sm-4 col-md-3 mb-2 mb-sm-0" href="#">
                    <button type="submit" class="btn btn-success btn-block" name="report_type" value="csv">
                        دانلود CSV
                    </button>
                </div> 
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    $('#check-all-{{$id}}').on('change', checkAll);

    function checkAll() {
        var checked = $('#check-all-{{$id}}').is(':checked');

        if(checked) {
            $('.filter-{{$id}}').prop('checked', true);
        }
        else {
            $('.filter-{{$id}}').prop('checked', false);
        }
    }
});
</script>
@endpush