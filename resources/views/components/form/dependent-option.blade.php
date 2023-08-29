<style>
    #input-exam_id{
    height: 64px;
    font-size: 20px;
    padding: 0 20px;
    border-radius: 12px;
    font-weight: 300;
    }

    #input-college_id{
    height: 64px;
    font-size: 20px;
    padding: 0 20px;
    border-radius: 12px;
    font-weight: 300;
    }

    #input-cource_id{
    height: 64px;
    font-size: 20px;
    padding: 0 20px;
    border-radius: 12px;
    font-weight: 300;
    }
</style>
    <x-form.select label="Preferred College" attribute="college_id"  style="">
        <option value="">Select the College</option>
    </x-form.select>

    <x-form.select label="Exam" attribute="exam_id"  required>
        <option value="">Select the Exam</option>
    </x-form.select>


@push('js')
    <script>
        $(document).ready(function() {
        
            $('#input-cource_id').change(function() {
                $('#input-exam_id').html('<option value="" selected>Select the Exam</option>');
                let cid = $(this).val();
                $.ajax({
                    url: '{{ route('common.states') }}?cid=' + cid + '&_token={{ csrf_token() }}',
                    type: 'GET',
                    success: function(result) {
                        console.log(result.college);
                        $('#input-college_id').html(
                            '<option value="" selected>Select the college</option>');
                        $.each(result.college, function(key, value) {
                        //    / console.log(selectedStateId);
                            // let selected = value.college.id == selectedStateId ? 'selected' :
                            //     '';
                            $('#input-college_id').append(
                                `<option value="${value.college.id}">${value.college.name}</option>`
                            );
                        });

                        // trigger change event to load cities
                        $('#input-college_id').change();
                    }
                });
            });

            $('#input-college_id').change(function() {
                let sid = $(this).val();

                $.ajax({
                    url: '{{ route('common.cities') }}?sid=' + sid + '&_token={{ csrf_token() }}',
                    type: 'GET',
                    dataType: 'json',
                    success: function(result) {
                        $('#input-exam_id').html(
                            '<option value="" selected>Select the Exam</option>');
                        $.each(result.exams, function(key, value) {
                            $('#input-exam_id').append(
                                '<option value="' + value.id + '"' +
                                '>' + value.name + '</option>'
                            );
                        });
                    }
                });
            });
            $('#input-cource_id').change();
        });
    </script>
@endpush
