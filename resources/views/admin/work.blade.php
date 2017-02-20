@extends('model.adminmodel')
@section('amodel_main')
    @foreach($work as $works)
        <form action="{{url('admin/work/'.$uid )}}" method="post">
            {{csrf_field()}}
        公司: <input type="text" name="company" class="input-class" value="{{$works->company}}"><br><br>
        行业: <select name="indutry" id="indutry" class="input-class">
            <option value="0" {{($works->indutry)=='0'?'selected':''}}>请选择行业</option>
            <option value="1" {{($works->indutry)=='1'?'selected':''}}>高新技术</option>
            <option value="2" {{($works->indutry)=='2'?'selected':''}}>人事招聘</option>
            <option value="3" {{($works->indutry)=='3'?'selected':''}}>广告公关</option>
            <option value="4" {{($works->indutry)=='4'?'selected':''}}>企业服务</option>
            <option value="5" {{($works->indutry)=='5'?'selected':''}}>媒体</option>
            <option value="6" {{($works->indutry)=='6'?'selected':''}}>文化艺术</option>
            <option value="7" {{($works->indutry)=='7'?'selected':''}}>法律</option>
            <option value="8" {{($works->indutry)=='8'?'selected':''}}>金融财务</option>
            <option value="9" {{($works->indutry)=='9'?'selected':''}}>餐饮/旅游/娱乐/体育</option>
            <option value="10"{{($works->indutry)=='10'?'selected':''}}>服务业</option>
            <option value="11"{{($works->indutry)=='11'?'selected':''}}>教育/科研</option>
            <option value="12"{{($works->indutry)=='12'?'selected':''}}>消费品</option>
            <option value="13"{{($works->indutry)=='13'?'selected':''}}>房地产/建筑/装潢</option>
            <option value="14"{{($works->indutry)=='14'?'selected':''}}>医疗保健</option>
            <option value="15"{{($works->indutry)=='15'?'selected':''}}>运输物流</option>
            <option value="16"{{($works->indutry)=='16'?'selected':''}}>制造加工业</option>
            <option value="17"{{($works->indutry)=='17'?'selected':''}}>农林牧渔业</option>
            <option value="18"{{($works->indutry)=='18'?'selected':''}}>政府及公共事业机构</option>
            <option value="19"{{($works->indutry)=='19'?'selected':''}}>非盈利机构/协会/社团</option>
            <option value="99"{{($works->indutry)=='99'?'selected':''}}>其他</option>
        </select><br><br>
        职位: <select name="position" id="position" class="input-class">
            <option value="0" {{($works->position)=='0'?'selected':''}}>请选择职位</option>
            <option value="1" {{($works->position)=='1'?'selected':''}}>销售</option>
            <option value="2" {{($works->position)=='2'?'selected':''}}>市场/市场拓展/公关</option>
            <option value="3" {{($works->position)=='3'?'selected':''}}>商务/采购/贸易</option>
            <option value="4" {{($works->position)=='4'?'selected':''}}>计算机软、硬件/互联网/IT</option>
            <option value="5" {{($works->position)=='5'?'selected':''}}>电子/半导体/仪表仪器</option>
            <option value="6" {{($works->position)=='6'?'selected':''}}>通信技术</option>
            <option value="7" {{($works->position)=='7'?'selected':''}}>客户服务/技术支持</option>
            <option value="8" {{($works->position)=='8'?'selected':''}}>行政/后勤</option>
            <option value="9" {{($works->position)=='9'?'selected':''}}>人力资源</option>
            <option value="10"{{($works->position)=='10'?'selected':''}}>高级管理</option>
            <option value="11"{{($works->position)=='11'?'selected':''}}>生产/加工/制造</option>
            <option value="12"{{($works->position)=='12'?'selected':''}}>质控/安检</option>
            <option value="13"{{($works->position)=='13'?'selected':''}}>工程机械</option>
            <option value="14"{{($works->position)=='14'?'selected':''}}>技工</option>
            <option value="15"{{($works->position)=='15'?'selected':''}}>财会/审计/统计</option>
            <option value="16"{{($works->position)=='16'?'selected':''}}>金融/银行/保险/证券/投资</option>
            <option value="17"{{($works->position)=='17'?'selected':''}}>建筑/房地产/装修/物业</option>
            <option value="18"{{($works->position)=='18'?'selected':''}}>交通/仓储/物流</option>
            <option value="19"{{($works->position)=='19'?'selected':''}}>普通劳动力/家政服务</option>
            <option value="20"{{($works->position)=='20'?'selected':''}}>零售业</option>
            <option value="21"{{($works->position)=='21'?'selected':''}}>教育/培训</option>
            <option value="22"{{($works->position)=='22'?'selected':''}}>咨询/顾问</option>
            <option value="23"{{($works->position)=='23'?'selected':''}}>学术/科研</option>
            <option value="24"{{($works->position)=='24'?'selected':''}}>法律</option>
            <option value="25"{{($works->position)=='25'?'selected':''}}>美术/设计/创意</option>
            <option value="26"{{($works->position)=='26'?'selected':''}}>编辑/文案/传媒/影视/新闻</option>
            <option value="27"{{($works->position)=='27'?'selected':''}}>酒店/餐饮/旅游/娱乐</option>
            <option value="28"{{($works->position)=='28'?'selected':''}}>化工</option>
            <option value="29"{{($works->position)=='29'?'selected':''}}>能源/矿产/地质勘查</option>
            <option value="30"{{($works->position)=='30'?'selected':''}}>医疗/护理/保健/美容</option>
            <option value="31"{{($works->position)=='31'?'selected':''}}>生物/制药/医疗器械</option>
            <option value="32"{{($works->position)=='32'?'selected':''}}>翻译（口译与笔译）</option>
            <option value="33"{{($works->position)=='33'?'selected':''}}>公务员</option>
            <option value="34"{{($works->position)=='34'?'selected':''}}>环境科学/环保</option>
            <option value="35"{{($works->position)=='35'?'selected':''}}>农/林/牧/渔业</option>
            <option value="36"{{($works->position)=='36'?'selected':''}}>兼职/临时/培训生/储备干部</option>
            <option value="37"{{($works->position)=='37'?'selected':''}}>在校学生</option>
            <option value="99"{{($works->position)=='99'?'selected':''}}>其他</option>
        </select><br><br>
        <input type="submit" value="保存" class="btn btn-default">
            <a href="{{url('admin/index')}}" class="btn btn-default">退出</a>
    @endforeach
@endsection