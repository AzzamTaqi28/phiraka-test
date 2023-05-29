@extends('layouts.layout')

@section('title', 'Fibonacci')

@section('content')

    <div class="h-100 d-flex align-items-center justify-content-center flex-column">
        <div class="d-flex flex-column mb-5" style="width:15%;">
            <div class="d-flex align-items-center justify-content-between  mb-2">
                <label for="form2Example1">Row</label>
                <input type="text" id="form2Example1" style="width:30%" />
            </div>
            <div class="d-flex align-items-center justify-content-between">
                <label for="form2Example2">Columns</label>
                <input type="text" id="form2Example2" style="width:30%" />
            </div>
            <div class="d-flex align-items-center justify-content-between mt-4">
                <div></div>
                <button type="button" class="text-center border border-dark submit" style="width:30%">Submit</button>
            </div>
        </div>
        <div name="table">
        </div>
    </div>



@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('.submit').click(function() {
                $('[name="table"]').empty();
                var row = $('#form2Example1').val();
                var col = $('#form2Example2').val();
                $.ajax({
                    url: "{{ route('get-fibonacci') }}",
                    type: "POST",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        row: row,
                        col: col
                    },
                    success: function(response) {
                        console.log(response);
                        var table = '<table class="table table-bordered border-dark">';
                        for (var i = 0; i < row; i++) {
                            table += '<tr>';
                            for (var j = 0; j < col; j++) {
                                table += '<td>' + response[i][j] + '</td>';
                            }
                            table += '</tr>';
                        }
                        table += '</table>';
                        $('[name="table"]').append(table);
                    },
                    error: function(response) {
                        console.log(response);
                    }
                });
            });
        });
    </script>
@endpush
