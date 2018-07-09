@extends('layout.admin')

@section('content')

<div class="ibox float-e-margins">

    <form method="post" class="form-horizontal" action="{{ isset($id) ? route('Feedback.postUpdate') : route('Feedback.postCreate') }}" id="sform">
        {!! csrf_field() !!}
        <div class="col-sm-12 col-md-6">
            <div class="ibox-title">
                @if(isset($id))
                    <h5>编辑</h5>
                    <input type="hidden" name="id" value="{{ $id }}">
                @else
                    <h5>添加</h5>
                @endif
            </div>
            <div class="ibox-content">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">标题</label>
                        <div class="col-sm-10">
                            <input id="title" type="text" class="form-control" name="title" value="{{ isset($title) ? $title : old('title') }}">
                            <span class="help-block m-b-none">标题</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">内容</label>
                        <div class="col-sm-10">
                            <input id="content" type="text" class="form-control" name="content" value="{{ isset($content) ? $content : old('content') }}">
                            <span class="help-block m-b-none">内容</span>
                        </div>
                    </div>
                    <div class="hr-line-dashed"></div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <button class="btn btn-primary" type="submit">保存内容</button>
                            <a class="btn btn-white" href="{{ route('Feedback.getIndex') }}">返回</a>
                        </div>
                    </div>
            </div>
        </div>
    </form>
</div>

<!-- jQuery Validation plugin javascript-->
{!! jquery_validate_js() !!}
<script>

    $(function(){
        {!! jquery_validate_default() !!}

        @if(isset($id))

        $("#sform").validate({
            debug:false,
            rules:{
                title:{
                    required:true,
                    minlength:1,
                },
                content:{
                    required:true,
                    minlength:1,
                },
            }
        });

        @else

        $("#sform").validate({
            debug:false,
            rules:{
                title:{
                    required:true,
                    minlength:1,
                },
                content:{
                    required:true,
                    minlength:1,
                },
            }
        });

        @endif
    });
</script>
@endsection('content')