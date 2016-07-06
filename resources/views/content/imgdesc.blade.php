
@extends('layout.flowpage')
@section('title', 'shareapi')
@section('content')

<style type="text/css">
    .section {
        width: 100%;
        margin-left: 40px;
        margin-right: 40px;
    }

    .api_intro .pic{
        width: 120px;
        height: 100%;
        margin-right: 20px;
        float:left;
    }
    .api_intro .text{
        width: 800px;
        padding: 20px;
        height: 100%;
    }

    .clear {
        clear: both;
    }
    
    .aps_handle span{
        display:inline-block;
        width:105px;
        height:47px;
        float:left;
        line-height:47px;
        text-align:center;
        font-size:14px; 
        cursor:pointer;
    }
    .aps_handle .hover{
        font-weight:bold;
        background:url("/images/api_create_handle.png");    
    }

.plan {
  float: left;
  width: 300px;
  margin: 20px 2px;
  padding: 15px 25px;
  text-align: center;
  background: white;
  background-clip: padding-box;
  border: 2px solid #e5ded6;
  border-color: rgba(0, 0, 0, 0.1);
  border-radius: 5px;
}

.plan-title {
  margin-bottom: 2px;
  font-size: 21px;
    height: 46px;
    line-height: 23px;
    overflow: hidden;
  color: #36bce6;
}

.plan-price {
  margin-bottom: 20px;
  line-height: 1;
  font-size: 28px;
  font-weight: bold;
  color: #fd935a;
}

.plan-unit {
  display: block;
  margin-top: 5px;
  font-size: 13px;
  font-weight: normal;
  color: #aaa;
}

.plan-features {
  width: 120px;
  margin: 20px auto 15px;
  padding: 15px 0 0 15px;
  border-top: 1px solid #e5ded6;
  text-align: left;
}
.plan-price:before{
    content:'¥'
}
.plan-feature {
    height: 21px;
  line-height: 20px;
  font-size: 15px;
  font-weight: 500;
  color: #444;
  margin-right:5px;
}
.plan-feature + .plan-feature {
  margin-top: 5px;
}

.plan-feature-unit {
  margin-left: 2px;
  font-size: 16px;
}

.plan-feature-name {
  font-size: 13px;
  font-weight: normal;
  color: #aaa;
}

.plan-button {
  position: relative;
  display: block;
  line-height: 40px;
  font-size: 16px;
  font-weight: 500;
  color: white;
  text-align: center;
  text-decoration: none;
  text-shadow: 0 1px rgba(0, 0, 0, 0.1);
  background: #fd935c;
  border-bottom: 2px solid #cf7e3b;
  border-color: rgba(0, 0, 0, 0.15);
  border-radius: 4px;
}
.plan-button:hover{
    color: #FFF;
}
.plan-button:active {
  top: 2px;
  margin-bottom: 2px;
  border-bottom: 0;
}

.plan-highlight {
  margin-top: 0;
  margin-bottom: 0;
  padding-left: 15px;
  padding-right: 15px;
  width: 170px;
  border: 4px solid #37bbe6;
}
.plan-highlight .plan-button {
  font-size: 18px;
  line-height: 49px;
  background: #37bce5;
  border-color: #3996b3;
  border-color: rgba(0, 0, 0, 0.15);
}

.plan-recommended {
  margin: -15px auto 15px;
  padding-bottom: 2px;
  line-height: 22px;
  font-size: 14px;
  font-weight: bold;
  color: white;
  text-shadow: 0 1px rgba(0, 0, 0, 0.05);
  background: #37bbe6;
  border-radius: 0 0 4px 4px;
}



    div {
        /*border:1px solid red;*/
    }
</style>

<div class="section">
    <div class="api_intro">
        <div class="pic">
            <img style="border:1px solid #000" src="https://www.juhe.cn/themes/images/data/new/a11.png" style="max-width:110px;max-height:110px">
        </div>
        <div class="text" style="margin-bottom:4px;">
            <h6>手机号码归属地</h6>    
            <p style="font-size:14px;text-align:left;">根据手机号码或手机号码的前7位，查询手机号码归属地信息，包括省份 、城市、区号、邮编、运营商和卡类型。</p>
        </div>
    </div>
    <div class="clear"></div>
    <div>
        <div class="aps_handle">
            <span class="hover" id="docDiv">文档</span>
            <span id="pricetable" class="">价格一览表</span>
        </div>
    </div>
</div>

<div class="section" id = 'api_detial' style="background:rgb(242, 242, 242);">
    <div name="docDiv">    
     <form id="rightForm" style="padding:20px;">

<div class="das_right">
                        <div class="simpleline"><strong>接口地址：</strong><span class="url">http://www.shareapi.cn/mobile/get</span></div>
                        <div class="simpleline"><strong>支持格式：</strong><span class="url">json/xml</span></div>
                        <div class="simpleline"><strong>请求方式：</strong><span class="url">get</span></div>
                        <div class="simpleline"><strong>请求示例：</strong><span class="url">http://www.shareapi.cn/mobile/get?phone=13429667914&amp;key=您申请的KEY</span></div>

                        
                                                <div class="simpleline simpleTable">
                            <strong>请求参数说明：</strong>
                            <table class="api_table" border="0" cellspacing="0" cellpadding="0">
                                <tbody><tr class="title">
                                    <th width="20"></th>
                                    <th width="100">名称</th>
                                    <th width="80">类型</th>
                                    <th width="60">必填</th>
                                    <th>说明</th>
                                </tr>
                                                                  <tr>
                                    <td>&nbsp;</td>
                                    <td class="url">phone</td>
                                    <td class="url">int</td>
                                    <td class="url">是</td>
                                    <td>需要查询的手机号码或手机号码前7位</td>
                                  </tr>
                                                                    <tr>
                                    <td>&nbsp;</td>
                                    <td class="url">key</td>
                                    <td class="url">string</td>
                                    <td class="url">是</td>
                                    <td>应用APPKEY(应用详细页查询)</td>
                                  </tr>
                                                                    <tr>
                                    <td>&nbsp;</td>
                                    <td class="url">dtype</td>
                                    <td class="url">string</td>
                                    <td class="url">否</td>
                                    <td>返回数据的格式,xml或json，默认json</td>
                                  </tr>
                                                              </tbody></table>
                        </div>
                        <div class="simpleline simpleTable">
                            <strong>返回参数说明：</strong>
                            <table class="api_table" border="0" cellspacing="0" cellpadding="0">
                                <tbody><tr class="title">
                                    <th width="20"></th>
                                    <th width="100">名称</th>
                                    <th width="80">类型</th>
                                    <th>说明</th>
                                </tr>
                                                                  <tr>
                                    <td>&nbsp;</td>
                                    <td class="url">error_code</td>
                                    <td class="url">int</td>
                                    <td>返回码</td>
                                  </tr>
                                                                    <tr>
                                    <td>&nbsp;</td>
                                    <td class="url">reason</td>
                                    <td class="url">string</td>
                                    <td>返回说明</td>
                                  </tr>
                                                                    <tr>
                                    <td>&nbsp;</td>
                                    <td class="url">result</td>
                                    <td class="url">string</td>
                                    <td>返回结果集</td>
                                  </tr>
                                                                    <tr>
                                    <td>&nbsp;</td>
                                    <td class="url">province</td>
                                    <td class="url">string</td>
                                    <td>省份</td>
                                  </tr>
                                                                    <tr>
                                    <td>&nbsp;</td>
                                    <td class="url">city</td>
                                    <td class="url">string</td>
                                    <td>城市</td>
                                  </tr>
                                                                    <tr>
                                    <td>&nbsp;</td>
                                    <td class="url">areacode</td>
                                    <td class="url">string</td>
                                    <td>区号</td>
                                  </tr>
                                                                    <tr>
                                    <td>&nbsp;</td>
                                    <td class="url">zip</td>
                                    <td class="url">string</td>
                                    <td>邮编</td>
                                  </tr>
                                                                    <tr>
                                    <td>&nbsp;</td>
                                    <td class="url">company</td>
                                    <td class="url">string</td>
                                    <td>运营商</td>
                                  </tr>
                                                                    <tr>
                                    <td>&nbsp;</td>
                                    <td class="url">card</td>
                                    <td class="url">string</td>
                                    <td>卡类型</td>
                                  </tr>
                                                              </tbody></table>
                        </div>
                                                <div class="simpleline simpleTable">
                            <b>JSON返回示例：</b>
                            <div class="prediv">
                                <pre>{
"code":"200",
"desc":"Return Successd!",
"data":{
    "province":"浙江",
    "city":"杭州",
    "areacode":"0571",
    "zip":"310000",
    "company":"中国移动",
    "card":"移动动感地带卡"
}
}</pre>
                            </div>
                        </div>
                                                                        <div class="simpleline">
                        </div>
                                            </div>

    </div>

    <div name="pricetable"  style="display:none;with:620px;padding-left:240px;">
        
        <div>
            <div class="plan first-gift">
                <h3 class="plan-title">一次性礼包</h3>
                <p class="plan-price">0.01<span class="plan-unit">时间：180天</span></p>
                <ul class="plan-features">
                    <li class="plan-feature">100次<span class="plan-feature-name">调用 </span></li>
                    <li class="plan-feature">不限<span class="plan-feature-name">调用频率</span> </li>
                </ul>
                <a href="/buy?id=1">订购套餐</a>
            </div>
                    <div class="plan">
                        <h3 class="plan-title">10元/10000次</h3>
                        <p class="plan-price">10 <span class="plan-unit">时间：180天</span></p>
                        <ul class="plan-features">
                            <li class="plan-feature">10000次<span class="plan-feature-name">调用 </span></li>
                            <li class="plan-feature">不限<span class="plan-feature-name">调用频率</span> </li>
                        </ul>
                        <a href="/buy?id=2">订购套餐</a>
                    </div>
        </div>

    </div>
</div>
<div class="section">
    
</div>

<script type="text/javascript">
    $(".aps_handle span").click(function(){
        $('.aps_handle span').removeClass("hover")
        $(this).addClass("hover");
        $("#api_detial>div").hide();
        $("#api_detial div[name='"+$(this).attr("id")+"']").show();
    });

</script>
@stop



