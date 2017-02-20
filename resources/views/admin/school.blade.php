@extends('model.adminmodel')
@section('amodel_main')
    <div style="width: 1247px;height: 611px">
        <div class="info-section">
            <div class="details-infoedit">
                <h4 id="educationInfo_display" class="legend">
                            <span class="icon-box">
                                <img src="{{url('home/img/study.png')}}">
                            </span>
                    <span>学校信息</span>
                </h4>
                @foreach($school as $schools)
                <form action="{{url('admin/school/'.$uid )}}" method="post">
                    {{csrf_field()}}
                        大学: <input type="text" name="school" class="input-class" value="{{$schools->school}}"><br><br>
                        身份: <select name="identity" class="input-class">
                            <option value="0"{{($schools->identity)=='0'?'selected':''}}>请选择类型</option>
                            <option value="1"{{($schools->identity)=='1'?'selected':''}}>大学生</option>
                            <option value="2"{{($schools->identity)=='2'?'selected':''}}>硕士</option>
                            <option value="3"{{($schools->identity)=='3'?'selected':''}}>博士</option>
                            <option value="4"{{($schools->identity)=='4'?'selected':''}}>教师</option>
                        </select><br><br>
                        院系: <input type="text" name="counts" class="input-class" value="{{$schools->counts}}"><br><br>
                        <input type="submit" value="保存" class="btn btn-default">
                        <a href="{{url('admin/index')}}" class="btn btn-default">退出</a>
                        @endforeach
                </form>

            </div>
        </div>
    </div>
@endsection