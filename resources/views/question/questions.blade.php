@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-body">
            @if($subjects->count() > 0)
                <label for="subject">Select Subject</label>
                <select class="form-control" id="subject" name="subject">
                    <option value="">Select Subject</option>
                    @foreach ($subjects as $subject)
                        <option value="{{ $subject->id }}">{{ $subject->subject }}</option>
                    @endforeach
                </select>
                <label for="subject category">Select Subject Topic</label>
                <select class="form-control" id="topic" name="topic">
                    <option value="">Select Subject</option>
                </select>
                <label for="questions">Select Subject Topic</label>
                <select class="form-control" id="question" name="question">
                    <option value="">Select Question</option>
                </select>
            @else
                <div class="alert alert-primary" role="alert">
                    <strong>There is no subject to choose</strong>
                    <a href="{{ route('subject.create') }}" class="alert-link">Create Subject</a>
                </div>
            @endif
        </div>
    </div>

@endsection

@section('js')

{{-- <script src="/js/jquery.dataTables.min.js"></script>

<script src="/js/dataTables.bootstrap4.min.js"></script>

<script src="/js/dataTables.buttons.min.js"></script>

<script src="/js/vfs_fonts.js"></script>

<script src="/js/buttons.html5.min.js"></script> --}}
<script src="/js/jquery.min.js"></script>
<script>
    jQuery(document).ready(function(){
        jQuery('#subject').change(function(){
            let subjectID = jQuery(this).val();
            // alert(subjectID);
            jQuery.ajax({
                url:'getSubjectCategory',
                type:'post',
                data:'subjectID='+subjectID+'&_token={{ csrf_token() }}',
                success:function(result){
                    jQuery('#topic').html(result)
                }
            });
        });
        jQuery('#topic').change(function(){
            let subjectCategoryID = jQuery(this).val();
            // alert(subjectCategoryID);
            jQuery.ajax({
                url:'getQuestion',
                type:'post',
                data:'subjectCategoryID='+subjectCategoryID+'&_token={{ csrf_token() }}',
                success:function(result){
                    jQuery('#question').html(result)
                }
            });
        });
    });
</script>


@stop
