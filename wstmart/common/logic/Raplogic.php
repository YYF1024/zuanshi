<?php
namespace wstmart\common\logic;
use  Snoopy; 
use  phpQuery;
/*********************************************************
*文件名：  rap.logic.php 
*使用方法：

******************************************************/
class Raplogic
{ 
	var $datadirct; 



    ////储存cookie参数
    var  $COOKIE= "ASP.NET_Rapnet=epzpuwyyocilprtw00smj004; _ga=GA1.2.267607181.1525355689; __gads=ID=7bced6ad58363938:T=1525355740:S=ALNI_MYUDmWYtMWACwMLqFhGQAvHRK4tKg; __hssrc=1; hubspotutk=addfc9aae4be62a08122774816b97c5c; __qca=P0-1633228937-1525355694042; messagesUtk=addfc9aae4be62a08122774816b97c5c; _omappvp=koNbN3yonEtHwdE7bZq67QtUclVbP5cxYfDBBUlkd7WMvSZqbL6Ws4g8Gk8QlZyUP34vrc7OzB20Zw4BnykVExyD4NG67gQQ; CookieDeviceNumber=5290547; SnapABugHistory=1#; __hs_opt_out=no; _hjIncludedInSample=1; REGULARSettingsParams=; SearchSortBy=Sort1=Discount&Sort2=LowestPrice&Sort3=&Sort4=&Sort5=&Sort6=&NumOfResults=50; __utmc=262718558; _gid=GA1.2.28897743.1525693135; __utmz=262718558.1525693187.3.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); __utma=262718558.267607181.1525355689.1525787482.1525865651.7; __utmb=262718558.1.10.1525865651; __hstc=205636236.addfc9aae4be62a08122774816b97c5c.1525355689700.1525786254214.1525865677207.11; .MEMBERRAPNETFORMSAUTH=1ABA7BCF1DD66DB265A07B8D88D35BC7E99E05CDA32B9AA3B861BB1D0E661DFFE2BD313529B5F07DE3A5AC95BE11D8E00FA6FA894C1A847BC1C94C058DEDC101944530FA00DEDA598306C31465240B2C287547484D6714B8FB898BC71AA46E645463C39BF11ABD0D3DE7981057B83399806365A6780FBE03EEEB02FDD73D7AD2D4D6BC52E6529ACF183D40D93399F5B96EE58996CE683E6AD4C924D0A41C1E62BD6E965DF130424FDF3FA44AA3D27310C37D4F9E17685A0E53B233DBEC6A6DDB5A6B46C5FFE1DC6E63A77F9A8ABE0DC645B08BD8483187680CE35EEB08C0B08990F1CF1FA71591E8A58B42AD49EEB6992B7CD165C939F5114A532BCA40706344B0BAC088; ActiveUserRowID=ActiveUserRowID=18552132; mp_af3381f753feb25a0691c6643df2e7c8_mixpanel=%7B%22distinct_id%22%3A%20%221632648b277596-06ee154cd5eab3-3c3c5905-13c680-1632648b278411%22%2C%22%24initial_referrer%22%3A%20%22%24direct%22%2C%22%24initial_referring_domain%22%3A%20%22%24direct%22%7D; __hssc=205636236.2.1525865677207; _dc_gtm_UA-1193854-36=1; SnapABugRef=https%3A%2F%2Fclassic.rapnet.com%2FRapNet%2F%20https%3A%2F%2Fclassic.rapnet.com%2FAuthentication.aspx%3FReturnUrl%3D%252fRapNet%252fSearch%252fResults.aspx%253fSearchSessionID%253d159212169%26SearchSessionID%3D159212169; SnapABugVisit=8#1525355911";

    function __Construct()
    {	 
        $this->datadirct=config('datadirct');
		print_r($this->datadirct);exit;
        $this->snoopy= new  Snoopy();///$key = array_search('VVS1', $this->color_dict);$key = array_search('VVS1', $this->color_dict);

        $this->snoopy->agent = " Mozilla/5.0 (Windows NT 6.1; WOW64; rv:59.0) Gecko/20100101 Firefox/59.0";
        $this->snoopy->rawheaders["Content-type"]="application/x-www-form-urlencoded";
        $this->snoopy->rawheaders["Auth0-Client"]="eyJuYW1lIjoibG9jay5qcyIsInZlcnNpb24iOiIxMC44LjEiLCJsaWJfdmVyc2lvbiI6IjcuNi4xIn0";
    }
    function  _login(){//
        $this->snoopy->referer = "https://classic.rapnet.com/Login/LoginPage.aspx";
        $this->snoopy->host='rapaport.auth0.com';
        $posturl='https://rapaport.auth0.com/usernamepassword/login';
       // $params=array('username'=>'105877','password'=>'105877bo'); 

        parse_str('scope=openid+email&response_type=code&connection=Username-Password-Authentication&username=105877&password=105877bo&popup=false&sso=true&client_id=FsYXds0gouXuOtlRFnYsdAjF8nysbRcp&redirect_uri=https%3A%2F%2Fclassic.rapnet.com%2Flogin%2Floginpage.aspx&tenant=rapaport', $params);
         print_r($params);
        $this->snoopy->submit($posturl,$params );  //第一步 登录 返回callback
        $this->snoopy->setcookies();  

        unset($params );

        $this->snoopy->host='rapnet.com';
        $posturl='https://rapaport.auth0.com/login/callback';
        $params =array('wa'=>'wsignin1.0','wresult'=>'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJ1c2VyX2lkIjoiNTk4YjRhOThkNDJmOGI3ODI0MTQ1YmY4IiwiZW1haWwiOiI0MDY2NDY3MzVAcXEuY29tIiwiZW1haWxfdmVyaWZpZWQiOnRydWUsIm5hbWUiOiIxMDU4NzciLCJuaWNrbmFtZSI6IjEwNTg3NyIsInVzZXJuYW1lIjoiMTA1ODc3IiwibGFzdF9wYXNzd29yZF9yZXNldCI6IjIwMTgtMDQtMThUMDg6MjQ6NTkuMTA4WiIsImp0aSI6IjVhZGM0NjhiMzJlMDYyMjFjODMwMGM4MCIsImlhdCI6MTUyNDM4NTQxOSwiZXhwIjoxNTI0Mzg1NDc5LCJhdWQiOiJ1cm46YXV0aDA6cmFwYXBvcnQ6VXNlcm5hbWUtUGFzc3dvcmQtQXV0aGVudGljYXRpb24iLCJpc3MiOiJ1cm46YXV0aDAifQ.gTDUQgutaKDJJFuTx67fO6sw-MpkB2IGlW1MyMY-fLOUBqV6yvBVTvL4KTjSbi9pkCEigUcrIs2QGJ-eDbrseWlza1DyxNXnPBKEwYTWWgGRPmLhlw9P1YzK30ZSu3lAWfqC3KTFK3BnV9uMCdvBSKkP5nk-wbfu8jr8JG_avsc','wctx'=>'{"strategy":"auth0","auth0Client":"eyJuYW1lIjoibG9jay5qcyIsInZlcnNpb24iOiIxMC44LjEiLCJsaWJfdmVyc2lvbiI6IjcuNi4xIn0","tenant":"rapaport","connection":"Username-Password-Authentication","client_id":"FsYXds0gouXuOtlRFnYsdAjF8nysbRcp","response_type":"code","scope":"openid email","redirect_uri":"https://classic.rapnet.com/login/loginpage.aspx","jti":"5adc468b32e06221c8300c80","realm":"Username-Password-Authentication","session_user":"5adc468b6628ad66086298a4"}');
        $this->snoopy->submit($posturl,$params ); 
        $this->snoopy->setcookies();  

    }
	function  analy_Results($html){//分析搜索钻石
	 	//
		phpQuery::newDocumentHTML($html); 
		$menu_a = pq(".AlternatingRowStyle" ) ;    //偶数行 数据
		foreach($menu_a as  $k=>$a){
			$tds=pq($a)->find('td');
			foreach($tds as $tdk=>$td){
				if($tdk==0){
					$d=pq($td)->find('input:last')->val() ;
					 
					$tdata[$k][]=intval($d);//break;///保存excel文件只需要 id值

				}else{
					$d=trim(pq($td)->text() );
					$tdata[$k][]=$d;
				}
				 

			}
			
		 }  

		$menu_a = pq(".RowStyle" ) ;    
		foreach($menu_a as   $a){
			++$k;
			$tds=pq($a)->find('td');
			foreach($tds as $tdk=>$td){
				if($tdk==0){
					$d=pq($td)->find('input:last')->val() ;//id
					$tdata[$k][]=intval($d);//break; 

				}else{
					$d=trim(pq($td)->text() );
					$tdata[$k][]=$d;
				} 
			}
			
		 }
		return ($tdata);
	}

    function search_Results(){//搜索钻石
        $this->snoopy->host='rapnet.com';

        $this->snoopy->rawheaders["COOKIE"]=$this->COOKIE;


        $this->snoopy->referer = "https://classic.rapnet.com/RapNet/Search/Search.aspx";
        $this->snoopy->setcookies();
		//////////SearchSessionID关键////////////////////////////////////////////////////////////////////////////////
        $url='https://classic.rapnet.com/Rapnet/Search/Results.aspx?SearchSessionID=159104849';
        $this->snoopy->fetch($url); 
		return ($this->snoopy->results);
         
    }
	function  search_pages($page=2){//搜索钻石分页
		$this->snoopy->host='rapnet.com';

        $this->snoopy->rawheaders["COOKIE"]=$this->COOKIE;

		$url='https://classic.rapnet.com/Rapnet/Search/Results.aspx?SearchSessionID=159104849';
		$this->snoopy->referer =$url;
		////////////////////////////////////////////////////////////////////////
        
		parse_str('ctl00%24ScriptManager1=ctl00%24cphMainContent%24udpMain%7Cctl00%24cphMainContent%24lbntNavigate1&ctl00%24antiforgery=3324df30-9cba-4e20-8c95-82a13729c2da&TopSearchBox=&ctl00%24cphMainContent%24txtDialogMsg=&ctl00%24cphMainContent%24txtDialogMsgType=&ctl00%24cphMainContent%24txtMarkup=&ctl00%24cphMainContent%24txtSelectedLots=&ctl00%24cphMainContent%24txtSession=&ctl00%24cphMainContent%24hidCurrentStartRow=&ctl00%24cphMainContent%24hfSelectedDiaomnds=&ctl00%24cphMainContent%24gvResults%24ctl02%24hidDiamondID=72069378&ctl00%24cphMainContent%24gvResults%24ctl02%24hidNoteDiamondID=72069378&ctl00%24cphMainContent%24gvResults%24ctl03%24hidDiamondID=72083749&ctl00%24cphMainContent%24gvResults%24ctl03%24hidNoteDiamondID=72083749&ctl00%24cphMainContent%24gvResults%24ctl04%24hidDiamondID=72083896&ctl00%24cphMainContent%24gvResults%24ctl04%24hidNoteDiamondID=72083896&ctl00%24cphMainContent%24gvResults%24ctl05%24hidDiamondID=72083998&ctl00%24cphMainContent%24gvResults%24ctl05%24hidNoteDiamondID=72083998&ctl00%24cphMainContent%24gvResults%24ctl06%24hidDiamondID=72084055&ctl00%24cphMainContent%24gvResults%24ctl06%24hidNoteDiamondID=72084055&ctl00%24cphMainContent%24gvResults%24ctl07%24hidDiamondID=72114244&ctl00%24cphMainContent%24gvResults%24ctl07%24hidNoteDiamondID=72114244&ctl00%24cphMainContent%24gvResults%24ctl08%24hidDiamondID=72114246&ctl00%24cphMainContent%24gvResults%24ctl08%24hidNoteDiamondID=72114246&ctl00%24cphMainContent%24gvResults%24ctl09%24hidDiamondID=72157216&ctl00%24cphMainContent%24gvResults%24ctl09%24hidNoteDiamondID=72157216&ctl00%24cphMainContent%24gvResults%24ctl10%24hidDiamondID=72294692&ctl00%24cphMainContent%24gvResults%24ctl10%24hidNoteDiamondID=72294692&ctl00%24cphMainContent%24gvResults%24ctl11%24hidDiamondID=72294721&ctl00%24cphMainContent%24gvResults%24ctl11%24hidNoteDiamondID=72294721&ctl00%24cphMainContent%24gvResults%24ctl12%24hidDiamondID=72294888&ctl00%24cphMainContent%24gvResults%24ctl12%24hidNoteDiamondID=72294888&ctl00%24cphMainContent%24gvResults%24ctl13%24hidDiamondID=72308093&ctl00%24cphMainContent%24gvResults%24ctl13%24hidNoteDiamondID=72308093&ctl00%24cphMainContent%24gvResults%24ctl14%24hidDiamondID=72349712&ctl00%24cphMainContent%24gvResults%24ctl14%24hidNoteDiamondID=72349712&ctl00%24cphMainContent%24gvResults%24ctl15%24hidDiamondID=72370499&ctl00%24cphMainContent%24gvResults%24ctl15%24hidNoteDiamondID=72370499&ctl00%24cphMainContent%24gvResults%24ctl16%24hidDiamondID=72424945&ctl00%24cphMainContent%24gvResults%24ctl16%24hidNoteDiamondID=72424945&ctl00%24cphMainContent%24gvResults%24ctl17%24hidDiamondID=72480467&ctl00%24cphMainContent%24gvResults%24ctl17%24hidNoteDiamondID=72480467&ctl00%24cphMainContent%24gvResults%24ctl18%24hidDiamondID=72480475&ctl00%24cphMainContent%24gvResults%24ctl18%24hidNoteDiamondID=72480475&ctl00%24cphMainContent%24gvResults%24ctl19%24hidDiamondID=72480487&ctl00%24cphMainContent%24gvResults%24ctl19%24hidNoteDiamondID=72480487&ctl00%24cphMainContent%24gvResults%24ctl20%24hidDiamondID=72480498&ctl00%24cphMainContent%24gvResults%24ctl20%24hidNoteDiamondID=72480498&ctl00%24cphMainContent%24gvResults%24ctl21%24hidDiamondID=72480500&ctl00%24cphMainContent%24gvResults%24ctl21%24hidNoteDiamondID=72480500&ctl00%24cphMainContent%24gvResults%24ctl22%24hidDiamondID=72480512&ctl00%24cphMainContent%24gvResults%24ctl22%24hidNoteDiamondID=72480512&ctl00%24cphMainContent%24gvResults%24ctl23%24hidDiamondID=72480516&ctl00%24cphMainContent%24gvResults%24ctl23%24hidNoteDiamondID=72480516&ctl00%24cphMainContent%24gvResults%24ctl24%24hidDiamondID=72480537&ctl00%24cphMainContent%24gvResults%24ctl24%24hidNoteDiamondID=72480537&ctl00%24cphMainContent%24gvResults%24ctl25%24hidDiamondID=72480968&ctl00%24cphMainContent%24gvResults%24ctl25%24hidNoteDiamondID=72480968&ctl00%24cphMainContent%24gvResults%24ctl26%24hidDiamondID=72480969&ctl00%24cphMainContent%24gvResults%24ctl26%24hidNoteDiamondID=72480969&ctl00%24cphMainContent%24gvResults%24ctl27%24hidDiamondID=72480979&ctl00%24cphMainContent%24gvResults%24ctl27%24hidNoteDiamondID=72480979&ctl00%24cphMainContent%24gvResults%24ctl28%24hidDiamondID=72480985&ctl00%24cphMainContent%24gvResults%24ctl28%24hidNoteDiamondID=72480985&ctl00%24cphMainContent%24gvResults%24ctl29%24hidDiamondID=72481000&ctl00%24cphMainContent%24gvResults%24ctl29%24hidNoteDiamondID=72481000&ctl00%24cphMainContent%24gvResults%24ctl30%24hidDiamondID=72481001&ctl00%24cphMainContent%24gvResults%24ctl30%24hidNoteDiamondID=72481001&ctl00%24cphMainContent%24gvResults%24ctl31%24hidDiamondID=72481012&ctl00%24cphMainContent%24gvResults%24ctl31%24hidNoteDiamondID=72481012&ctl00%24cphMainContent%24gvResults%24ctl32%24hidDiamondID=72491033&ctl00%24cphMainContent%24gvResults%24ctl32%24hidNoteDiamondID=72491033&ctl00%24cphMainContent%24gvResults%24ctl33%24hidDiamondID=72491320&ctl00%24cphMainContent%24gvResults%24ctl33%24hidNoteDiamondID=72491320&ctl00%24cphMainContent%24gvResults%24ctl34%24hidDiamondID=72491324&ctl00%24cphMainContent%24gvResults%24ctl34%24hidNoteDiamondID=72491324&ctl00%24cphMainContent%24gvResults%24ctl35%24hidDiamondID=72491444&ctl00%24cphMainContent%24gvResults%24ctl35%24hidNoteDiamondID=72491444&ctl00%24cphMainContent%24gvResults%24ctl36%24hidDiamondID=72491445&ctl00%24cphMainContent%24gvResults%24ctl36%24hidNoteDiamondID=72491445&ctl00%24cphMainContent%24gvResults%24ctl37%24hidDiamondID=72499757&ctl00%24cphMainContent%24gvResults%24ctl37%24hidNoteDiamondID=72499757&ctl00%24cphMainContent%24gvResults%24ctl38%24hidDiamondID=72567695&ctl00%24cphMainContent%24gvResults%24ctl38%24hidNoteDiamondID=72567695&ctl00%24cphMainContent%24gvResults%24ctl39%24hidDiamondID=72646392&ctl00%24cphMainContent%24gvResults%24ctl39%24hidNoteDiamondID=72646392&ctl00%24cphMainContent%24gvResults%24ctl40%24hidDiamondID=72646396&ctl00%24cphMainContent%24gvResults%24ctl40%24hidNoteDiamondID=72646396&ctl00%24cphMainContent%24gvResults%24ctl41%24hidDiamondID=72678262&ctl00%24cphMainContent%24gvResults%24ctl41%24hidNoteDiamondID=72678262&ctl00%24cphMainContent%24gvResults%24ctl42%24hidDiamondID=72678263&ctl00%24cphMainContent%24gvResults%24ctl42%24hidNoteDiamondID=72678263&ctl00%24cphMainContent%24gvResults%24ctl43%24hidDiamondID=72678272&ctl00%24cphMainContent%24gvResults%24ctl43%24hidNoteDiamondID=72678272&ctl00%24cphMainContent%24gvResults%24ctl44%24hidDiamondID=72678281&ctl00%24cphMainContent%24gvResults%24ctl44%24hidNoteDiamondID=72678281&ctl00%24cphMainContent%24gvResults%24ctl45%24hidDiamondID=72678286&ctl00%24cphMainContent%24gvResults%24ctl45%24hidNoteDiamondID=72678286&ctl00%24cphMainContent%24gvResults%24ctl46%24hidDiamondID=72702606&ctl00%24cphMainContent%24gvResults%24ctl46%24hidNoteDiamondID=72702606&ctl00%24cphMainContent%24gvResults%24ctl47%24hidDiamondID=72702612&ctl00%24cphMainContent%24gvResults%24ctl47%24hidNoteDiamondID=72702612&ctl00%24cphMainContent%24gvResults%24ctl48%24hidDiamondID=72702614&ctl00%24cphMainContent%24gvResults%24ctl48%24hidNoteDiamondID=72702614&ctl00%24cphMainContent%24gvResults%24ctl49%24hidDiamondID=72702623&ctl00%24cphMainContent%24gvResults%24ctl49%24hidNoteDiamondID=72702623&ctl00%24cphMainContent%24gvResults%24ctl50%24hidDiamondID=72741633&ctl00%24cphMainContent%24gvResults%24ctl50%24hidNoteDiamondID=72741633&ctl00%24cphMainContent%24gvResults%24ctl51%24hidDiamondID=72741772&ctl00%24cphMainContent%24gvResults%24ctl51%24hidNoteDiamondID=72741772&ctl00%24cphMainContent%24gvResults%24ctl52%24hidDiamondID=72741777&ctl00%24cphMainContent%24gvResults%24ctl52%24hidNoteDiamondID=72741777&ctl00%24cphMainContent%24gvResults%24ctl53%24hidDiamondID=72741800&ctl00%24cphMainContent%24gvResults%24ctl53%24hidNoteDiamondID=72741800&ctl00%24cphMainContent%24gvResults%24ctl54%24hidDiamondID=72741861&ctl00%24cphMainContent%24gvResults%24ctl54%24hidNoteDiamondID=72741861&ctl00%24cphMainContent%24gvResults%24ctl55%24hidDiamondID=72746015&ctl00%24cphMainContent%24gvResults%24ctl55%24hidNoteDiamondID=72746015&ctl00%24cphMainContent%24gvResults%24ctl56%24hidDiamondID=72797360&ctl00%24cphMainContent%24gvResults%24ctl56%24hidNoteDiamondID=72797360&ctl00%24cphMainContent%24gvResults%24ctl57%24hidDiamondID=72797366&ctl00%24cphMainContent%24gvResults%24ctl57%24hidNoteDiamondID=72797366&ctl00%24cphMainContent%24gvResults%24ctl58%24hidDiamondID=72797385&ctl00%24cphMainContent%24gvResults%24ctl58%24hidNoteDiamondID=72797385&ctl00%24cphMainContent%24gvResults%24ctl59%24hidDiamondID=72988407&ctl00%24cphMainContent%24gvResults%24ctl59%24hidNoteDiamondID=72988407&ctl00%24cphMainContent%24gvResults%24ctl60%24hidDiamondID=72988453&ctl00%24cphMainContent%24gvResults%24ctl60%24hidNoteDiamondID=72988453&ctl00%24cphMainContent%24gvResults%24ctl61%24hidDiamondID=72995062&ctl00%24cphMainContent%24gvResults%24ctl61%24hidNoteDiamondID=72995062&ctl00%24cphMainContent%24gvResults%24ctl62%24hidDiamondID=72995271&ctl00%24cphMainContent%24gvResults%24ctl62%24hidNoteDiamondID=72995271&ctl00%24cphMainContent%24gvResults%24ctl63%24hidDiamondID=72995297&ctl00%24cphMainContent%24gvResults%24ctl63%24hidNoteDiamondID=72995297&ctl00%24cphMainContent%24gvResults%24ctl64%24hidDiamondID=72995304&ctl00%24cphMainContent%24gvResults%24ctl64%24hidNoteDiamondID=72995304&ctl00%24cphMainContent%24gvResults%24ctl65%24hidDiamondID=72995421&ctl00%24cphMainContent%24gvResults%24ctl65%24hidNoteDiamondID=72995421&ctl00%24cphMainContent%24gvResults%24ctl66%24hidDiamondID=72995425&ctl00%24cphMainContent%24gvResults%24ctl66%24hidNoteDiamondID=72995425&ctl00%24cphMainContent%24gvResults%24ctl67%24hidDiamondID=72995484&ctl00%24cphMainContent%24gvResults%24ctl67%24hidNoteDiamondID=72995484&ctl00%24cphMainContent%24gvResults%24ctl68%24hidDiamondID=73114038&ctl00%24cphMainContent%24gvResults%24ctl68%24hidNoteDiamondID=73114038&ctl00%24cphMainContent%24gvResults%24ctl69%24hidDiamondID=73114063&ctl00%24cphMainContent%24gvResults%24ctl69%24hidNoteDiamondID=73114063&ctl00%24cphMainContent%24gvResults%24ctl70%24hidDiamondID=73181391&ctl00%24cphMainContent%24gvResults%24ctl70%24hidNoteDiamondID=73181391&ctl00%24cphMainContent%24gvResults%24ctl71%24hidDiamondID=73210759&ctl00%24cphMainContent%24gvResults%24ctl71%24hidNoteDiamondID=73210759&ctl00%24cphMainContent%24gvResults%24ctl72%24hidDiamondID=73210938&ctl00%24cphMainContent%24gvResults%24ctl72%24hidNoteDiamondID=73210938&ctl00%24cphMainContent%24gvResults%24ctl73%24hidDiamondID=73241709&ctl00%24cphMainContent%24gvResults%24ctl73%24hidNoteDiamondID=73241709&ctl00%24cphMainContent%24gvResults%24ctl74%24hidDiamondID=73241779&ctl00%24cphMainContent%24gvResults%24ctl74%24hidNoteDiamondID=73241779&ctl00%24cphMainContent%24gvResults%24ctl75%24hidDiamondID=73241792&ctl00%24cphMainContent%24gvResults%24ctl75%24hidNoteDiamondID=73241792&ctl00%24cphMainContent%24gvResults%24ctl76%24hidDiamondID=73241801&ctl00%24cphMainContent%24gvResults%24ctl76%24hidNoteDiamondID=73241801&ctl00%24cphMainContent%24gvResults%24ctl77%24hidDiamondID=73315043&ctl00%24cphMainContent%24gvResults%24ctl77%24hidNoteDiamondID=73315043&ctl00%24cphMainContent%24gvResults%24ctl78%24hidDiamondID=73345596&ctl00%24cphMainContent%24gvResults%24ctl78%24hidNoteDiamondID=73345596&ctl00%24cphMainContent%24gvResults%24ctl79%24hidDiamondID=73364193&ctl00%24cphMainContent%24gvResults%24ctl79%24hidNoteDiamondID=73364193&ctl00%24cphMainContent%24gvResults%24ctl80%24hidDiamondID=73369579&ctl00%24cphMainContent%24gvResults%24ctl80%24hidNoteDiamondID=73369579&ctl00%24cphMainContent%24gvResults%24ctl81%24hidDiamondID=73375305&ctl00%24cphMainContent%24gvResults%24ctl81%24hidNoteDiamondID=73375305&ctl00%24cphMainContent%24gvResults%24ctl82%24hidDiamondID=73692146&ctl00%24cphMainContent%24gvResults%24ctl82%24hidNoteDiamondID=73692146&ctl00%24cphMainContent%24gvResults%24ctl83%24hidDiamondID=73843072&ctl00%24cphMainContent%24gvResults%24ctl83%24hidNoteDiamondID=73843072&ctl00%24cphMainContent%24gvResults%24ctl84%24hidDiamondID=73930959&ctl00%24cphMainContent%24gvResults%24ctl84%24hidNoteDiamondID=73930959&ctl00%24cphMainContent%24gvResults%24ctl85%24hidDiamondID=73975062&ctl00%24cphMainContent%24gvResults%24ctl85%24hidNoteDiamondID=73975062&ctl00%24cphMainContent%24gvResults%24ctl86%24hidDiamondID=73975312&ctl00%24cphMainContent%24gvResults%24ctl86%24hidNoteDiamondID=73975312&ctl00%24cphMainContent%24gvResults%24ctl87%24hidDiamondID=74048081&ctl00%24cphMainContent%24gvResults%24ctl87%24hidNoteDiamondID=74048081&ctl00%24cphMainContent%24gvResults%24ctl88%24hidDiamondID=74048089&ctl00%24cphMainContent%24gvResults%24ctl88%24hidNoteDiamondID=74048089&ctl00%24cphMainContent%24gvResults%24ctl89%24hidDiamondID=74048108&ctl00%24cphMainContent%24gvResults%24ctl89%24hidNoteDiamondID=74048108&ctl00%24cphMainContent%24gvResults%24ctl90%24hidDiamondID=74048120&ctl00%24cphMainContent%24gvResults%24ctl90%24hidNoteDiamondID=74048120&ctl00%24cphMainContent%24gvResults%24ctl91%24hidDiamondID=74048132&ctl00%24cphMainContent%24gvResults%24ctl91%24hidNoteDiamondID=74048132&ctl00%24cphMainContent%24gvResults%24ctl92%24hidDiamondID=74048134&ctl00%24cphMainContent%24gvResults%24ctl92%24hidNoteDiamondID=74048134&ctl00%24cphMainContent%24gvResults%24ctl93%24hidDiamondID=74048176&ctl00%24cphMainContent%24gvResults%24ctl93%24hidNoteDiamondID=74048176&ctl00%24cphMainContent%24gvResults%24ctl94%24hidDiamondID=74048201&ctl00%24cphMainContent%24gvResults%24ctl94%24hidNoteDiamondID=74048201&ctl00%24cphMainContent%24gvResults%24ctl95%24hidDiamondID=74048205&ctl00%24cphMainContent%24gvResults%24ctl95%24hidNoteDiamondID=74048205&ctl00%24cphMainContent%24gvResults%24ctl96%24hidDiamondID=74048206&ctl00%24cphMainContent%24gvResults%24ctl96%24hidNoteDiamondID=74048206&ctl00%24cphMainContent%24gvResults%24ctl97%24hidDiamondID=74048212&ctl00%24cphMainContent%24gvResults%24ctl97%24hidNoteDiamondID=74048212&ctl00%24cphMainContent%24gvResults%24ctl98%24hidDiamondID=74048216&ctl00%24cphMainContent%24gvResults%24ctl98%24hidNoteDiamondID=74048216&ctl00%24cphMainContent%24gvResults%24ctl99%24hidDiamondID=74048221&ctl00%24cphMainContent%24gvResults%24ctl99%24hidNoteDiamondID=74048221&ctl00%24cphMainContent%24gvResults%24ctl100%24hidDiamondID=74048222&ctl00%24cphMainContent%24gvResults%24ctl100%24hidNoteDiamondID=74048222&ctl00%24cphMainContent%24gvResults%24ctl101%24hidDiamondID=74048233&ctl00%24cphMainContent%24gvResults%24ctl101%24hidNoteDiamondID=74048233&ctl00%24cphMainContent%24gvResults%24ctl102%24hidDiamondID=74048235&ctl00%24cphMainContent%24gvResults%24ctl102%24hidNoteDiamondID=74048235&ctl00%24cphMainContent%24gvResults%24ctl103%24hidDiamondID=74048253&ctl00%24cphMainContent%24gvResults%24ctl103%24hidNoteDiamondID=74048253&ctl00%24cphMainContent%24gvResults%24ctl104%24hidDiamondID=74048293&ctl00%24cphMainContent%24gvResults%24ctl104%24hidNoteDiamondID=74048293&ctl00%24cphMainContent%24gvResults%24ctl105%24hidDiamondID=74048301&ctl00%24cphMainContent%24gvResults%24ctl105%24hidNoteDiamondID=74048301&ctl00%24cphMainContent%24gvResults%24ctl106%24hidDiamondID=74048320&ctl00%24cphMainContent%24gvResults%24ctl106%24hidNoteDiamondID=74048320&ctl00%24cphMainContent%24gvResults%24ctl107%24hidDiamondID=74048332&ctl00%24cphMainContent%24gvResults%24ctl107%24hidNoteDiamondID=74048332&ctl00%24cphMainContent%24gvResults%24ctl108%24hidDiamondID=74048344&ctl00%24cphMainContent%24gvResults%24ctl108%24hidNoteDiamondID=74048344&ctl00%24cphMainContent%24gvResults%24ctl109%24hidDiamondID=74048346&ctl00%24cphMainContent%24gvResults%24ctl109%24hidNoteDiamondID=74048346&ctl00%24cphMainContent%24gvResults%24ctl110%24hidDiamondID=74048388&ctl00%24cphMainContent%24gvResults%24ctl110%24hidNoteDiamondID=74048388&ctl00%24cphMainContent%24gvResults%24ctl111%24hidDiamondID=74048413&ctl00%24cphMainContent%24gvResults%24ctl111%24hidNoteDiamondID=74048413&ctl00%24cphMainContent%24gvResults%24ctl112%24hidDiamondID=74048417&ctl00%24cphMainContent%24gvResults%24ctl112%24hidNoteDiamondID=74048417&ctl00%24cphMainContent%24gvResults%24ctl113%24hidDiamondID=74048418&ctl00%24cphMainContent%24gvResults%24ctl113%24hidNoteDiamondID=74048418&ctl00%24cphMainContent%24gvResults%24ctl114%24hidDiamondID=74048424&ctl00%24cphMainContent%24gvResults%24ctl114%24hidNoteDiamondID=74048424&ctl00%24cphMainContent%24gvResults%24ctl115%24hidDiamondID=74048428&ctl00%24cphMainContent%24gvResults%24ctl115%24hidNoteDiamondID=74048428&ctl00%24cphMainContent%24gvResults%24ctl116%24hidDiamondID=74048433&ctl00%24cphMainContent%24gvResults%24ctl116%24hidNoteDiamondID=74048433&ctl00%24cphMainContent%24gvResults%24ctl117%24hidDiamondID=74048434&ctl00%24cphMainContent%24gvResults%24ctl117%24hidNoteDiamondID=74048434&ctl00%24cphMainContent%24gvResults%24ctl118%24hidDiamondID=74048445&ctl00%24cphMainContent%24gvResults%24ctl118%24hidNoteDiamondID=74048445&ctl00%24cphMainContent%24gvResults%24ctl119%24hidDiamondID=74048447&ctl00%24cphMainContent%24gvResults%24ctl119%24hidNoteDiamondID=74048447&ctl00%24cphMainContent%24gvResults%24ctl120%24hidDiamondID=74048465&ctl00%24cphMainContent%24gvResults%24ctl120%24hidNoteDiamondID=74048465&ctl00%24cphMainContent%24gvResults%24ctl121%24hidDiamondID=74055003&ctl00%24cphMainContent%24gvResults%24ctl121%24hidNoteDiamondID=74055003&ctl00%24cphMainContent%24gvResults%24ctl122%24hidDiamondID=74068006&ctl00%24cphMainContent%24gvResults%24ctl122%24hidNoteDiamondID=74068006&ctl00%24cphMainContent%24gvResults%24ctl123%24hidDiamondID=74213685&ctl00%24cphMainContent%24gvResults%24ctl123%24hidNoteDiamondID=74213685&ctl00%24cphMainContent%24gvResults%24ctl124%24hidDiamondID=74263888&ctl00%24cphMainContent%24gvResults%24ctl124%24hidNoteDiamondID=74263888&ctl00%24cphMainContent%24gvResults%24ctl125%24hidDiamondID=74288996&ctl00%24cphMainContent%24gvResults%24ctl125%24hidNoteDiamondID=74288996&ctl00%24cphMainContent%24gvResults%24ctl126%24hidDiamondID=74290240&ctl00%24cphMainContent%24gvResults%24ctl126%24hidNoteDiamondID=74290240&ctl00%24cphMainContent%24gvResults%24ctl127%24hidDiamondID=74292751&ctl00%24cphMainContent%24gvResults%24ctl127%24hidNoteDiamondID=74292751&ctl00%24cphMainContent%24gvResults%24ctl128%24hidDiamondID=74292780&ctl00%24cphMainContent%24gvResults%24ctl128%24hidNoteDiamondID=74292780&ctl00%24cphMainContent%24gvResults%24ctl129%24hidDiamondID=74292819&ctl00%24cphMainContent%24gvResults%24ctl129%24hidNoteDiamondID=74292819&ctl00%24cphMainContent%24gvResults%24ctl130%24hidDiamondID=74343075&ctl00%24cphMainContent%24gvResults%24ctl130%24hidNoteDiamondID=74343075&ctl00%24cphMainContent%24gvResults%24ctl131%24hidDiamondID=74474484&ctl00%24cphMainContent%24gvResults%24ctl131%24hidNoteDiamondID=74474484&ctl00%24cphMainContent%24gvResults%24ctl132%24hidDiamondID=74474492&ctl00%24cphMainContent%24gvResults%24ctl132%24hidNoteDiamondID=74474492&ctl00%24cphMainContent%24gvResults%24ctl133%24hidDiamondID=74474493&ctl00%24cphMainContent%24gvResults%24ctl133%24hidNoteDiamondID=74474493&ctl00%24cphMainContent%24gvResults%24ctl134%24hidDiamondID=74474534&ctl00%24cphMainContent%24gvResults%24ctl134%24hidNoteDiamondID=74474534&ctl00%24cphMainContent%24gvResults%24ctl135%24hidDiamondID=74474541&ctl00%24cphMainContent%24gvResults%24ctl135%24hidNoteDiamondID=74474541&ctl00%24cphMainContent%24gvResults%24ctl136%24hidDiamondID=74474547&ctl00%24cphMainContent%24gvResults%24ctl136%24hidNoteDiamondID=74474547&ctl00%24cphMainContent%24gvResults%24ctl137%24hidDiamondID=74477582&ctl00%24cphMainContent%24gvResults%24ctl137%24hidNoteDiamondID=74477582&ctl00%24cphMainContent%24gvResults%24ctl138%24hidDiamondID=74495931&ctl00%24cphMainContent%24gvResults%24ctl138%24hidNoteDiamondID=74495931&ctl00%24cphMainContent%24gvResults%24ctl139%24hidDiamondID=74515794&ctl00%24cphMainContent%24gvResults%24ctl139%24hidNoteDiamondID=74515794&ctl00%24cphMainContent%24gvResults%24ctl140%24hidDiamondID=74515798&ctl00%24cphMainContent%24gvResults%24ctl140%24hidNoteDiamondID=74515798&ctl00%24cphMainContent%24gvResults%24ctl141%24hidDiamondID=74515799&ctl00%24cphMainContent%24gvResults%24ctl141%24hidNoteDiamondID=74515799&ctl00%24cphMainContent%24gvResults%24ctl142%24hidDiamondID=74515800&ctl00%24cphMainContent%24gvResults%24ctl142%24hidNoteDiamondID=74515800&ctl00%24cphMainContent%24gvResults%24ctl143%24hidDiamondID=74515801&ctl00%24cphMainContent%24gvResults%24ctl143%24hidNoteDiamondID=74515801&ctl00%24cphMainContent%24gvResults%24ctl144%24hidDiamondID=74784738&ctl00%24cphMainContent%24gvResults%24ctl144%24hidNoteDiamondID=74784738&ctl00%24cphMainContent%24gvResults%24ctl145%24hidDiamondID=74833092&ctl00%24cphMainContent%24gvResults%24ctl145%24hidNoteDiamondID=74833092&ctl00%24cphMainContent%24gvResults%24ctl146%24hidDiamondID=74865738&ctl00%24cphMainContent%24gvResults%24ctl146%24hidNoteDiamondID=74865738&ctl00%24cphMainContent%24gvResults%24ctl147%24hidDiamondID=74911806&ctl00%24cphMainContent%24gvResults%24ctl147%24hidNoteDiamondID=74911806&ctl00%24cphMainContent%24gvResults%24ctl148%24hidDiamondID=74911832&ctl00%24cphMainContent%24gvResults%24ctl148%24hidNoteDiamondID=74911832&ctl00%24cphMainContent%24gvResults%24ctl149%24hidDiamondID=74911834&ctl00%24cphMainContent%24gvResults%24ctl149%24hidNoteDiamondID=74911834&ctl00%24cphMainContent%24gvResults%24ctl150%24hidDiamondID=74911837&ctl00%24cphMainContent%24gvResults%24ctl150%24hidNoteDiamondID=74911837&ctl00%24cphMainContent%24gvResults%24ctl151%24hidDiamondID=74911945&ctl00%24cphMainContent%24gvResults%24ctl151%24hidNoteDiamondID=74911945&ctl00%24cphMainContent%24gvResults%24ctl152%24hidDiamondID=74911946&ctl00%24cphMainContent%24gvResults%24ctl152%24hidNoteDiamondID=74911946&ctl00%24cphMainContent%24gvResults%24ctl153%24hidDiamondID=74911947&ctl00%24cphMainContent%24gvResults%24ctl153%24hidNoteDiamondID=74911947&ctl00%24cphMainContent%24gvResults%24ctl154%24hidDiamondID=74933076&ctl00%24cphMainContent%24gvResults%24ctl154%24hidNoteDiamondID=74933076&ctl00%24cphMainContent%24gvResults%24ctl155%24hidDiamondID=74933319&ctl00%24cphMainContent%24gvResults%24ctl155%24hidNoteDiamondID=74933319&ctl00%24cphMainContent%24gvResults%24ctl156%24hidDiamondID=74965111&ctl00%24cphMainContent%24gvResults%24ctl156%24hidNoteDiamondID=74965111&ctl00%24cphMainContent%24gvResults%24ctl157%24hidDiamondID=74982532&ctl00%24cphMainContent%24gvResults%24ctl157%24hidNoteDiamondID=74982532&ctl00%24cphMainContent%24gvResults%24ctl158%24hidDiamondID=75072112&ctl00%24cphMainContent%24gvResults%24ctl158%24hidNoteDiamondID=75072112&ctl00%24cphMainContent%24gvResults%24ctl159%24hidDiamondID=75078689&ctl00%24cphMainContent%24gvResults%24ctl159%24hidNoteDiamondID=75078689&ctl00%24cphMainContent%24gvResults%24ctl160%24hidDiamondID=75078734&ctl00%24cphMainContent%24gvResults%24ctl160%24hidNoteDiamondID=75078734&ctl00%24cphMainContent%24gvResults%24ctl161%24hidDiamondID=75144983&ctl00%24cphMainContent%24gvResults%24ctl161%24hidNoteDiamondID=75144983&ctl00%24cphMainContent%24gvResults%24ctl162%24hidDiamondID=75165547&ctl00%24cphMainContent%24gvResults%24ctl162%24hidNoteDiamondID=75165547&ctl00%24cphMainContent%24gvResults%24ctl163%24hidDiamondID=75264454&ctl00%24cphMainContent%24gvResults%24ctl163%24hidNoteDiamondID=75264454&ctl00%24cphMainContent%24gvResults%24ctl164%24hidDiamondID=75276275&ctl00%24cphMainContent%24gvResults%24ctl164%24hidNoteDiamondID=75276275&ctl00%24cphMainContent%24gvResults%24ctl165%24hidDiamondID=75276345&ctl00%24cphMainContent%24gvResults%24ctl165%24hidNoteDiamondID=75276345&ctl00%24cphMainContent%24gvResults%24ctl166%24hidDiamondID=75310284&ctl00%24cphMainContent%24gvResults%24ctl166%24hidNoteDiamondID=75310284&ctl00%24cphMainContent%24gvResults%24ctl167%24hidDiamondID=75343316&ctl00%24cphMainContent%24gvResults%24ctl167%24hidNoteDiamondID=75343316&ctl00%24cphMainContent%24gvResults%24ctl168%24hidDiamondID=75359375&ctl00%24cphMainContent%24gvResults%24ctl168%24hidNoteDiamondID=75359375&ctl00%24cphMainContent%24gvResults%24ctl169%24hidDiamondID=75378076&ctl00%24cphMainContent%24gvResults%24ctl169%24hidNoteDiamondID=75378076&ctl00%24cphMainContent%24gvResults%24ctl170%24hidDiamondID=75378078&ctl00%24cphMainContent%24gvResults%24ctl170%24hidNoteDiamondID=75378078&ctl00%24cphMainContent%24gvResults%24ctl171%24hidDiamondID=75515714&ctl00%24cphMainContent%24gvResults%24ctl171%24hidNoteDiamondID=75515714&ctl00%24cphMainContent%24gvResults%24ctl172%24hidDiamondID=75591787&ctl00%24cphMainContent%24gvResults%24ctl172%24hidNoteDiamondID=75591787&ctl00%24cphMainContent%24gvResults%24ctl173%24hidDiamondID=75591818&ctl00%24cphMainContent%24gvResults%24ctl173%24hidNoteDiamondID=75591818&ctl00%24cphMainContent%24gvResults%24ctl174%24hidDiamondID=75591837&ctl00%24cphMainContent%24gvResults%24ctl174%24hidNoteDiamondID=75591837&ctl00%24cphMainContent%24gvResults%24ctl175%24hidDiamondID=75628876&ctl00%24cphMainContent%24gvResults%24ctl175%24hidNoteDiamondID=75628876&ctl00%24cphMainContent%24gvResults%24ctl176%24hidDiamondID=75659881&ctl00%24cphMainContent%24gvResults%24ctl176%24hidNoteDiamondID=75659881&ctl00%24cphMainContent%24gvResults%24ctl177%24hidDiamondID=75742612&ctl00%24cphMainContent%24gvResults%24ctl177%24hidNoteDiamondID=75742612&ctl00%24cphMainContent%24gvResults%24ctl178%24hidDiamondID=75742617&ctl00%24cphMainContent%24gvResults%24ctl178%24hidNoteDiamondID=75742617&ctl00%24cphMainContent%24gvResults%24ctl179%24hidDiamondID=75756504&ctl00%24cphMainContent%24gvResults%24ctl179%24hidNoteDiamondID=75756504&ctl00%24cphMainContent%24gvResults%24ctl180%24hidDiamondID=75797114&ctl00%24cphMainContent%24gvResults%24ctl180%24hidNoteDiamondID=75797114&ctl00%24cphMainContent%24gvResults%24ctl181%24hidDiamondID=75845577&ctl00%24cphMainContent%24gvResults%24ctl181%24hidNoteDiamondID=75845577&ctl00%24cphMainContent%24gvResults%24ctl182%24hidDiamondID=76001102&ctl00%24cphMainContent%24gvResults%24ctl182%24hidNoteDiamondID=76001102&ctl00%24cphMainContent%24gvResults%24ctl183%24hidDiamondID=76021099&ctl00%24cphMainContent%24gvResults%24ctl183%24hidNoteDiamondID=76021099&ctl00%24cphMainContent%24gvResults%24ctl184%24hidDiamondID=76032957&ctl00%24cphMainContent%24gvResults%24ctl184%24hidNoteDiamondID=76032957&ctl00%24cphMainContent%24gvResults%24ctl185%24hidDiamondID=76050468&ctl00%24cphMainContent%24gvResults%24ctl185%24hidNoteDiamondID=76050468&ctl00%24cphMainContent%24gvResults%24ctl186%24hidDiamondID=76050528&ctl00%24cphMainContent%24gvResults%24ctl186%24hidNoteDiamondID=76050528&ctl00%24cphMainContent%24gvResults%24ctl187%24hidDiamondID=76072268&ctl00%24cphMainContent%24gvResults%24ctl187%24hidNoteDiamondID=76072268&ctl00%24cphMainContent%24gvResults%24ctl188%24hidDiamondID=76072341&ctl00%24cphMainContent%24gvResults%24ctl188%24hidNoteDiamondID=76072341&ctl00%24cphMainContent%24gvResults%24ctl189%24hidDiamondID=76076539&ctl00%24cphMainContent%24gvResults%24ctl189%24hidNoteDiamondID=76076539&ctl00%24cphMainContent%24gvResults%24ctl190%24hidDiamondID=76085643&ctl00%24cphMainContent%24gvResults%24ctl190%24hidNoteDiamondID=76085643&ctl00%24cphMainContent%24gvResults%24ctl191%24hidDiamondID=76127435&ctl00%24cphMainContent%24gvResults%24ctl191%24hidNoteDiamondID=76127435&ctl00%24cphMainContent%24gvResults%24ctl192%24hidDiamondID=76175097&ctl00%24cphMainContent%24gvResults%24ctl192%24hidNoteDiamondID=76175097&ctl00%24cphMainContent%24gvResults%24ctl193%24hidDiamondID=76175100&ctl00%24cphMainContent%24gvResults%24ctl193%24hidNoteDiamondID=76175100&ctl00%24cphMainContent%24gvResults%24ctl194%24hidDiamondID=76175102&ctl00%24cphMainContent%24gvResults%24ctl194%24hidNoteDiamondID=76175102&ctl00%24cphMainContent%24gvResults%24ctl195%24hidDiamondID=76195959&ctl00%24cphMainContent%24gvResults%24ctl195%24hidNoteDiamondID=76195959&ctl00%24cphMainContent%24gvResults%24ctl196%24hidDiamondID=76232052&ctl00%24cphMainContent%24gvResults%24ctl196%24hidNoteDiamondID=76232052&ctl00%24cphMainContent%24gvResults%24ctl197%24hidDiamondID=76232163&ctl00%24cphMainContent%24gvResults%24ctl197%24hidNoteDiamondID=76232163&ctl00%24cphMainContent%24gvResults%24ctl198%24hidDiamondID=76232164&ctl00%24cphMainContent%24gvResults%24ctl198%24hidNoteDiamondID=76232164&ctl00%24cphMainContent%24gvResults%24ctl199%24hidDiamondID=76281928&ctl00%24cphMainContent%24gvResults%24ctl199%24hidNoteDiamondID=76281928&ctl00%24cphMainContent%24gvResults%24ctl200%24hidDiamondID=76326646&ctl00%24cphMainContent%24gvResults%24ctl200%24hidNoteDiamondID=76326646&ctl00%24cphMainContent%24gvResults%24ctl201%24hidDiamondID=76326648&ctl00%24cphMainContent%24gvResults%24ctl201%24hidNoteDiamondID=76326648&ctl00%24cphMainContent%24gvResults%24ctl202%24hidDiamondID=76472087&ctl00%24cphMainContent%24gvResults%24ctl202%24hidNoteDiamondID=76472087&ctl00%24cphMainContent%24gvResults%24ctl203%24hidDiamondID=76563072&ctl00%24cphMainContent%24gvResults%24ctl203%24hidNoteDiamondID=76563072&ctl00%24cphMainContent%24gvResults%24ctl204%24hidDiamondID=76563250&ctl00%24cphMainContent%24gvResults%24ctl204%24hidNoteDiamondID=76563250&ctl00%24cphMainContent%24gvResults%24ctl205%24hidDiamondID=76563400&ctl00%24cphMainContent%24gvResults%24ctl205%24hidNoteDiamondID=76563400&ctl00%24cphMainContent%24gvResults%24ctl206%24hidDiamondID=76563436&ctl00%24cphMainContent%24gvResults%24ctl206%24hidNoteDiamondID=76563436&ctl00%24cphMainContent%24gvResults%24ctl207%24hidDiamondID=76592231&ctl00%24cphMainContent%24gvResults%24ctl207%24hidNoteDiamondID=76592231&ctl00%24cphMainContent%24gvResults%24ctl208%24hidDiamondID=76611367&ctl00%24cphMainContent%24gvResults%24ctl208%24hidNoteDiamondID=76611367&ctl00%24cphMainContent%24gvResults%24ctl209%24hidDiamondID=76613562&ctl00%24cphMainContent%24gvResults%24ctl209%24hidNoteDiamondID=76613562&ctl00%24cphMainContent%24gvResults%24ctl210%24hidDiamondID=76613578&ctl00%24cphMainContent%24gvResults%24ctl210%24hidNoteDiamondID=76613578&ctl00%24cphMainContent%24gvResults%24ctl211%24hidDiamondID=76613621&ctl00%24cphMainContent%24gvResults%24ctl211%24hidNoteDiamondID=76613621&ctl00%24cphMainContent%24gvResults%24ctl212%24hidDiamondID=76613622&ctl00%24cphMainContent%24gvResults%24ctl212%24hidNoteDiamondID=76613622&ctl00%24cphMainContent%24gvResults%24ctl213%24hidDiamondID=76613623&ctl00%24cphMainContent%24gvResults%24ctl213%24hidNoteDiamondID=76613623&ctl00%24cphMainContent%24gvResults%24ctl214%24hidDiamondID=76613629&ctl00%24cphMainContent%24gvResults%24ctl214%24hidNoteDiamondID=76613629&ctl00%24cphMainContent%24gvResults%24ctl215%24hidDiamondID=76752399&ctl00%24cphMainContent%24gvResults%24ctl215%24hidNoteDiamondID=76752399&ctl00%24cphMainContent%24gvResults%24ctl216%24hidDiamondID=76793272&ctl00%24cphMainContent%24gvResults%24ctl216%24hidNoteDiamondID=76793272&ctl00%24cphMainContent%24gvResults%24ctl217%24hidDiamondID=76870880&ctl00%24cphMainContent%24gvResults%24ctl217%24hidNoteDiamondID=76870880&ctl00%24cphMainContent%24gvResults%24ctl218%24hidDiamondID=76969067&ctl00%24cphMainContent%24gvResults%24ctl218%24hidNoteDiamondID=76969067&ctl00%24cphMainContent%24gvResults%24ctl219%24hidDiamondID=76986368&ctl00%24cphMainContent%24gvResults%24ctl219%24hidNoteDiamondID=76986368&ctl00%24cphMainContent%24gvResults%24ctl220%24hidDiamondID=76986753&ctl00%24cphMainContent%24gvResults%24ctl220%24hidNoteDiamondID=76986753&ctl00%24cphMainContent%24gvResults%24ctl221%24hidDiamondID=77113300&ctl00%24cphMainContent%24gvResults%24ctl221%24hidNoteDiamondID=77113300&ctl00%24cphMainContent%24gvResults%24ctl222%24hidDiamondID=77125727&ctl00%24cphMainContent%24gvResults%24ctl222%24hidNoteDiamondID=77125727&ctl00%24cphMainContent%24gvResults%24ctl223%24hidDiamondID=77140352&ctl00%24cphMainContent%24gvResults%24ctl223%24hidNoteDiamondID=77140352&ctl00%24cphMainContent%24gvResults%24ctl224%24hidDiamondID=77229340&ctl00%24cphMainContent%24gvResults%24ctl224%24hidNoteDiamondID=77229340&ctl00%24cphMainContent%24gvResults%24ctl225%24hidDiamondID=77279907&ctl00%24cphMainContent%24gvResults%24ctl225%24hidNoteDiamondID=77279907&ctl00%24cphMainContent%24gvResults%24ctl226%24hidDiamondID=77321041&ctl00%24cphMainContent%24gvResults%24ctl226%24hidNoteDiamondID=77321041&ctl00%24cphMainContent%24gvResults%24ctl227%24hidDiamondID=77458548&ctl00%24cphMainContent%24gvResults%24ctl227%24hidNoteDiamondID=77458548&ctl00%24cphMainContent%24gvResults%24ctl228%24hidDiamondID=77476072&ctl00%24cphMainContent%24gvResults%24ctl228%24hidNoteDiamondID=77476072&ctl00%24cphMainContent%24gvResults%24ctl229%24hidDiamondID=77476076&ctl00%24cphMainContent%24gvResults%24ctl229%24hidNoteDiamondID=77476076&ctl00%24cphMainContent%24gvResults%24ctl230%24hidDiamondID=77476082&ctl00%24cphMainContent%24gvResults%24ctl230%24hidNoteDiamondID=77476082&ctl00%24cphMainContent%24gvResults%24ctl231%24hidDiamondID=77476087&ctl00%24cphMainContent%24gvResults%24ctl231%24hidNoteDiamondID=77476087&ctl00%24cphMainContent%24gvResults%24ctl232%24hidDiamondID=77476091&ctl00%24cphMainContent%24gvResults%24ctl232%24hidNoteDiamondID=77476091&ctl00%24cphMainContent%24gvResults%24ctl233%24hidDiamondID=77476093&ctl00%24cphMainContent%24gvResults%24ctl233%24hidNoteDiamondID=77476093&ctl00%24cphMainContent%24gvResults%24ctl234%24hidDiamondID=77476147&ctl00%24cphMainContent%24gvResults%24ctl234%24hidNoteDiamondID=77476147&ctl00%24cphMainContent%24gvResults%24ctl235%24hidDiamondID=77476192&ctl00%24cphMainContent%24gvResults%24ctl235%24hidNoteDiamondID=77476192&ctl00%24cphMainContent%24gvResults%24ctl236%24hidDiamondID=77476196&ctl00%24cphMainContent%24gvResults%24ctl236%24hidNoteDiamondID=77476196&ctl00%24cphMainContent%24gvResults%24ctl237%24hidDiamondID=77476202&ctl00%24cphMainContent%24gvResults%24ctl237%24hidNoteDiamondID=77476202&ctl00%24cphMainContent%24gvResults%24ctl238%24hidDiamondID=77476207&ctl00%24cphMainContent%24gvResults%24ctl238%24hidNoteDiamondID=77476207&ctl00%24cphMainContent%24gvResults%24ctl239%24hidDiamondID=77476211&ctl00%24cphMainContent%24gvResults%24ctl239%24hidNoteDiamondID=77476211&ctl00%24cphMainContent%24gvResults%24ctl240%24hidDiamondID=77476213&ctl00%24cphMainContent%24gvResults%24ctl240%24hidNoteDiamondID=77476213&ctl00%24cphMainContent%24gvResults%24ctl241%24hidDiamondID=77479566&ctl00%24cphMainContent%24gvResults%24ctl241%24hidNoteDiamondID=77479566&ctl00%24cphMainContent%24gvResults%24ctl242%24hidDiamondID=77519973&ctl00%24cphMainContent%24gvResults%24ctl242%24hidNoteDiamondID=77519973&ctl00%24cphMainContent%24gvResults%24ctl243%24hidDiamondID=77585574&ctl00%24cphMainContent%24gvResults%24ctl243%24hidNoteDiamondID=77585574&ctl00%24cphMainContent%24gvResults%24ctl244%24hidDiamondID=77625580&ctl00%24cphMainContent%24gvResults%24ctl244%24hidNoteDiamondID=77625580&ctl00%24cphMainContent%24gvResults%24ctl245%24hidDiamondID=77670551&ctl00%24cphMainContent%24gvResults%24ctl245%24hidNoteDiamondID=77670551&ctl00%24cphMainContent%24gvResults%24ctl246%24hidDiamondID=77686753&ctl00%24cphMainContent%24gvResults%24ctl246%24hidNoteDiamondID=77686753&ctl00%24cphMainContent%24gvResults%24ctl247%24hidDiamondID=77845798&ctl00%24cphMainContent%24gvResults%24ctl247%24hidNoteDiamondID=77845798&ctl00%24cphMainContent%24gvResults%24ctl248%24hidDiamondID=77959409&ctl00%24cphMainContent%24gvResults%24ctl248%24hidNoteDiamondID=77959409&ctl00%24cphMainContent%24gvResults%24ctl249%24hidDiamondID=77984192&ctl00%24cphMainContent%24gvResults%24ctl249%24hidNoteDiamondID=77984192&ctl00%24cphMainContent%24gvResults%24ctl250%24hidDiamondID=77984195&ctl00%24cphMainContent%24gvResults%24ctl250%24hidNoteDiamondID=77984195&ctl00%24cphMainContent%24gvResults%24ctl251%24hidDiamondID=77984375&ctl00%24cphMainContent%24gvResults%24ctl251%24hidNoteDiamondID=77984375&__EVENTTARGET=ctl00%24cphMainContent%24lbntNavigate1&__EVENTARGUMENT=&__VIEWSTATE=&__EVENTVALIDATION=7KV3IwTaGfFMVeKlawlVxqy8frlYHvLSUOt9uhrrxL9Vabk5QvmpIHI5mtqRqs61xiDyiQ3CXkpnFayndaa2xXO30YModlM%2F4slGjX%2BjwAHGztJMSlKjFtXA5xprfArJatEM5voVB4hjq7p%2B%2FoxgSlDdqK5GG4iohU0wEA7%2BylcQUDeLpa3uJVPUDpcggKuJgxkQ1PhHaZUv1RACSfuO%2Bw8fFopWXrnG1ng%2FbD60gY%2F23sK6DSMdTxIYi6BGOImrlGCcgog0DJSeOiRS6eDfcYeB9cZWIfZ2uIDi7HNouKk3rpSJJR%2F1AKZWG7Ml3lOpto%2BRK4%2Fp3VohV5NX9aJNsOUNMUSBsROfd%2BqmxvVP4qhI9zv3JQhuTi09jLPfCcSi%2BB3g55TuHPhUY6fiCPcbAsLuKIx7Kf6OEtJV76uVmxHi6gp8yHOl2Es1uKbZL7pYLfKiJ9xdNIYmiGjkMaRTIlSFMz2ukFqKIYy1p0jw025mCD3mTLCb%2FQs9l3zsjb3rxeV4J12fWM6i5EYQu4TOmKvXeZADUkNpIJCqResY1e46s1iR24JfMiY5%2F0NWbX77nCF%2BDRo2zvN0CWM6ULPt9ZFvcoAzJiO0AabwnZRGyGFNlbHJjoHmoCSmLxH%2FCEZw1x5jQPtsC8Apymoy%2FWSZ%2F%2BdYKGuAHbNb79xuBK%2BRLtlljYacPl8HRbRiUvuDBMLcCVv5o%2Bpb7sANWsFP9jIvlMAaIsSoba0Z3G2deCILhELb9BhSbGQFM3RxQvGhRa46VM66rgbWK%2BNjsdRSyelt6KWvPkypLJFntqA5l25%2B57ZA9wS415jjE24e4mdapHeBoB59Ya%2FvE%2BWBB9ljMx%2FYnj02XAK72wpuxeWI9gcqCrR1X0Uv%2FOmPY5zFqYd%2B8csKSFrblOOCQ9q9uVYrsFHEBNZAXF9RICEq8glnk4XpizIk4nCzSA1LMeziASKLcMnYtj8vgn0Ae%2F72qQ9%2FoZ3wvCPYwVH6VCnbaXDpCZQh3643dw6aSS09mLHo81urCEZLwT23HbXgINZFD48ddrDhJQP9p%2FTqPDCuN78OkrT4Jrr%2F9mncCukUfhPpKcRQsPgWa8sfrhskIAkGkg46jw9ezKCOooMzsnioBARkV5VJdyLCTDc3eJbJ7gjS8Mb1SrTNStG6%2BaF7rQUq7%2FBNRM2K0LUHyNWMyj%2B6lcD5YyJCMb3zhQzceeqtr67plACTa6hSfzQ7ltAypA3cERBVuSVZTWu1TFmsQUJMwG%2F2Gin4KwPqja78WKvaYbfIBKB9ogJr41bCU4yfpt%2BPcyN6jhZrbfee85H8Ilp4ZpguUx9qURdqAt9AHFTACTJ%2BKJc9QL%2FKK1FdRDxJIgXvf2qLQsmWuSrG636T4IZgmCblOe1u8AgOaE0nTzEmkNpVJrEXYZY5ZbGVvNeqVXK6h8Pf4tEnb4z%2BdgvlETC1WtHFDzFsDwMxd7FfBEgE0t%2Fa2vuRHaY0Bmv3FGzEEt5r7hpKlO0kuS1wZ5rWhvT2CJeN2Iu9eFNgkZzjJsUKwPAxMP62oYDnqY3JXTjpErvo9NerC4H36uw6KYOpaSFkKPU04rjr7PvuS%2FgJ0NKBa%2BtZYdxZ2LAxR75Vucgvr2TcLTlCj7LZkIbkrLkphoUpS9nJHOWUL0tNk65QQhnDzUIYZle165Qkx9%2F7KSJVeOGSxfiIVi5ih%2BSd0sKImPy%2FM%2Fam3AV8faty8c1YfnCt8KXTfX1fPvHnw6LuOrhIN66OhGO8sTvlqZ9mODX03nEthAYYNp1J0Y6UqBmGpsOrezlpKJbdJwwNpZsQuSvV9UzO5buF9nHkQdtyWqlOiIlstHNNyxBW1bGdudl%2BWoJkBoTv%2FVZTytyTDeWoAKL81OlA7U%2FPyn1bZ5FpN5cco9VHEUiUO7drQNP8w2ebXb4LAMN4mpFm3kxMjsmtxHtgjl7gYCDqGFKOYPz7Rb8%2Bv9AQc328XMq8Eb7c893OaxEQDi4xCDYvjRr3s3eRNF7Zyl9YKUApMFgHJ1xw7JzdsYTU%2FoeukQWwEGd5aHo4x%2BlhJk0d5V12P4QXpSo4ytRl0PsOZq4rrgVN8lvMAwnNlBHC6w5E%2BVwo%2FOsTQCQbsHLEjFJi3qNcRmuDSzOAn1Z%2FioD1pxQEFGT6YZPe%2F7sRSE8u6Fd8iDFmvp%2B6%2F9LuT9ybf6H94sGkV9q60zG35PBKaOAL9nVffnfz1rMRJFvBwYrEho%2F%2FN9GH0BZQQiwEruVLPCNWTgotBTWXwR%2BQjX8uFfbB2XCYwkOWQ%2BEzVAhKcVQ4Hg7W5826KyvdRv1H566WdJBOoeALTwh68ee83SQkTVLbd%2FYId9gHiZ8N%2Bha3uTXfnXBRjEpYJh1SQBIOF9jDFvHalMGel%2FO7rdhqo634B%2B%2FAd3TmRlmUxe%2Bmkah1jwziM%2BO1LMyHAiSLl4EO1XmpVciTviKu4F87B9cA2hNEJzpFUbc7I%2BOTlBsvcLcPighkZEFf1h%2FJpSq07%2BMxBwltyWFj3OL5MyIL4BVmEPsCjNQCUe%2FslCrDdBpakfEa9G1MEpFHoIUKC3OJDvjWDFP7tyy9%2Br6uhXJ0oubGN2opBzCMSOT9TJ%2FoN51oSAlza3ce%2FF%2FgAupXVjiYPm5HoraKYfUjcUivduJmTLwsKS5A3ziVQPwFU4q9ERiHvRRaSU0o4JqFs76aK58sUGZZ2LXS1M5dGe%2BGzKM5axkN9N8yIiF2%2FwZYyYI3QEujHhTvwbPTq1x01JaXtc51wQW92bbvjW8F%2FXVF1xItFxJOShT48pHUkzqhpc6ipSPbEJSyNRZyHJVzRlpdqQtHK0gdpLaWS3KAm1ozLb6UdprL%2B9OqJ9SdAeJ2SDI5k7GIlBgSIO1oeJFcZlC06mQ%2FN9a7BzWiMibdR4FKYQj12Au9jftkCWPn%2FXENWqUVovxQ%2FDHahsfNkXVwN2wqMfnjMVc9JcgV5V7TAJDh3ieGYiof4dhcYmeYz07PjX36jINXomUcXRTdSqVHFR8Y0xW1gAdYLra%2FTGA1hAMEO7ssCOhol5Zi11BplmXBCMzOXNblYLrtq5vVzGfQ5tjgbwnl63rsGz5sL472T2d%2BViF8mnRA%2F3JtUjhQ9QE1CvekXYmqjX%2Bfk%2BLTWCKhRK4RflZv4GXWRwHLT%2Fy4lqMEpt332tZxLOfB2PY14fp66gGrIDbKPIA092O%2Fgi6A2itsRz%2FhUxA5Zr9gdtnEJF6tFHfeNO9yr7EGT%2F1dDe1XV90nZKYPjFkQs1aQyc2sTt%2BVNoiRnA%2BBH9%2FnGCN%2BRvo6iPLJ%2FuVcdNFG0dbB0Ci77OiZ5wn%2B%2BuL4wnALtIV4TPK4C2cER14m5YYjwWGFKROnSWKbmReBC%2F%2Fni43Ph8F38RD%2BzSgZmYtQn5FIJA6XQb2NPN5Y4b0%2FAsewb5NPpTPAsV3bB8oNcP5r92EQgddJmf0XTCQE09VUEGpbPAQat36Ef0ok5TUK4Zk8PFu03aMasnETXPVjv7Jm%2Fn%2BxfkjE04Qyp10PKsZDUIn2D6SO4DRLIBFn4CwOLyq2CuAfK93cFIUQiVEZXcS1Kb3uhFmdMh3kiClPwV1cZ0OuKvEPVPK8fxpYhDTg%2Bl6Cs7ZKT8R%2BW%2BNhkMwLK%2BpSb5ZPZd03T2SLEHRlFLMtQnIfy8MMMKwOYuWEnH8ODc4KoS42lxCPDffJp8Y%2BniDW4L0mLaxS7hKrY9bHrJ5eXt5ZzwLm6W5%2BV7vOHR0nD9p2o6VWRW7vXzs8xia71Q0vllMwew%2FSZsCU8KcX%2BKOvsJBGKkdmOv0HkqCt1jr4UuiUYiWsCl0VVqu081blGIHTzSc8IKxvC2FF7MRMg6060ozcY7n1MrJYPb5q93LHQ0WbnuavLgQxvu3iM%2F%2FCpoYPw8m4JpzCiFVPTJ991lwigotJLw6x9gfrSMhHb1w6gjX3LFb4TKa3TZ3OHY%2B7U2OPCAjkVhq4nPrepAxCSoy%2BF5tkawx%2FdZ1679tZpA0TDEtJ8NHEvHPeZLQRgmkhujzjfEojjkj4UvapGLrbJWIjjYypOdbGJm4DMMVyJWg%2FDE1l5GGjOqZMFtz2cmF1sKMhx0H4IasWhqSoVvFRXriGdTb7pdc8KdgVqEyC1pMPWA2v5N4Vfak9D8X1dPvzLVKOEuKmDobbtBtuWdUeTrzV1%2FXjpEddsQhFwDjmHI0TU0Wj8WiD6QJ6JRYIE6%2BcPv6vnDbqVJD%2FMOGe99Bj1Oyj%2FCR4GKziYUZuzlE04nEv82tlvTLkT8z0drYprXx2phn1pheyCVY31VLSoLN84jOTkapgckPd26GJ1eNZ4wkaw9uadwNNbm6iapzILzVx%2FRxmkPKvmTl2VJKVyDmxm2nooiDqd4lJ1JYlFdw7kfQLr%2FrCq2Wmf43I6uGTyXFOmQB07RVFeXdv%2FO4HwW0txvnl5C9vv988IQsYIGg10a0LW5lVaG%2B6kurKekeQnge8BIP0CMtg2fBR2QprXiLXwhGwjDRMj3mTI7bblHDYU5E2v6lR0fE08eQkkHoVnRlha3wbJbMiT93dpiqsiDrQZH%2BD7x75M8US5f6xYVFn3QOYkuwf3enqz1MmatMgHbYr7Kk4Z05QmbgeB8ATfXzL20dKJIZ0gVhzOq7sRV325PXj%2BmmLZxQlu9RnY7wLMScK2qZJ974e0L1xaz0tqvxbwAnCkU5mdTSDXeIjREVn1DTdJxsglEuL6Z5%2Fzn1rnPGTkmFeOcYb3gyv4c1yNDuu%2BK8rfAyDAw4JbDrUVw9jTU4XEaO8xu%2B24YJMXUQBPcMcfsNSHSEa0fm%2F6qFkaHIzEZYHy%2FZgi0lVPnFlCRNlwZHNVoPJrnQx4lzJd9dyxv217%2BbCFzWs%2FcQ7x0w8bJ87MPuZeHlOm1RDmkBH4tvfBgOnrr4CerP7lTrVUsKZ%2BeDceVhmQMvnchPsDEfISn7xRq%2Bj9n%2FsQBtjLvVzT7PFWceLV7sw85nToZFIovGR9lWt%2BbdLv1OZJxPLu1Vm4D6biRAK7ulxCI7DyhCvpyp8npVW7fo5jPq0j0toFDhU8SLtsLiq91x8ic5TVZfnhkBeumBCsnPBQ3S1o94AwrcbfvoAXo7QOSoh%2FNc1I4Sd0mFAQfu8qPCoxwEaJ6FzkFya3xf%2F6qAv7qoGa2bf73NjesHTfN4hWdfIw3Hb%2B8uGA41sZ1zC7pmUQzAqR%2BmcgZ0c6bKod5XyCOrECt80A2zRf8Cr0Z1yLZS0lTcA9buLw%2FyOcmk6hbnEhCmjSDbBbdUpPpYbdhsst07u6KDTKiwWMZYNCcrJIygLxrCGoxlmUch6bLzod6kDMK%2BgCc%2FXBG3EyxrLL6bA8U3Nlt2qMjW0bZSIE0EixvpikooIBTPYi6ZJdKMH5hBrovGOO7FSqS2ItGPBMqg2D%2Fl27flBiYwT4aeYV9050LcvQL4z55gSvXuKmc6FWc%2FUlq4HbuWZZnf39bj6odq8GRxVJO5tv7IW539gyr6FU%2B6h3p5XXmGA1vzMJnIGu8qUf0GS%2FAAj8otA1qokAn5kzlcYpthVBFrtgy%2Bm%2BWPigq3ix%2BgdWk%2B2k1P4q0BPvoExIILrDoNSbrX4%2FryxEEbMeBOMtVZpDOpzu6hUn8ve%2FACsEkwP5zuGON%2BGGhcyXtHaK2qU5gOupSs4tf2JLHiyus6Dhse%2FqLUhku4AV2NtX1QPLVBTU1tVFigpGVTlf0W%2BEMlhPav51eOMLAmlTU7x5z8pYC%2B2YCc3EmBgiWld0K9dPd35sB%2FUYY7B46UDDqYSGC49U%2Bil4QHeaWvIkJZlfLyhXPyetTaO7uOnV5nngB0%2FBHRj93e%2FlVLkl5Pj8lbnms5gxwk3J5erZlYwziQzXSDEHaCTFMqj0B5WVgo8b98TnWV9HY0hA%2BoB%2Frnk4zyL%2FSv9J7UPfHTWLTvu8h9iUC7Z1IBA%2FUM0IlbBlJXwO%2BeqAIOYg%2BI53rIvDtZRXPA23WHscMVbMk1lOT3vvYTIgQW7z%2FcQX4MKIftHdQU6ZOs7J8ekjykPyL6FjQGUc4lxJnSj5V%2FQkvnpqDijfMN6OYmJc0XoZT8u9s8mOGm0Vhn9aqT4BZGxYiZI66%2FvAmgdkXIycvFpFRu5Zgt5qHA2Gf30xVcjDI886R%2BzCdfTBzqPFne%2F1wfHzQ%2FvkPZtiMMvqWilARCM57g0OGFQu%2B2Loe6QZW40fgksxaj9%2B%2BI0davIVAwCnQO2JzQEhsAuSozqXNfVZ6wlmZEgr3lY7B2kusVUXo9bdwxn80gEHXGgVDaadcb0dLFZNYsKYBp39qZt1Lcnd9YDIb98XimY3BH%2FzHnclqSZb4RibZQilIhj%2ByOz0r%2F4BThBX1l8Dp3q%2BUp7P5KN0onOBBvOn59qMDa%2B9KvkNewPzRsogczMIntpztDCC4TfODJDZxIVvheXFE6onPIOJojtEgfyOZVZ2wF9h60ZoA3mqKW%2FeA20Ka8MkaRyYvnjGe7fjTEzRcpMasG9OxlccPh8gTKdy%2BYFeNWdi6eNiQoXsAHv6ZDNTmyaoFecuA%2F%2FIfjm15YemAOhPUtctIGMSJO7D4WaBtBcJx6w1iSuFMgVks9S4QJdH6rB3w6XVF3UaEgJcL2oAJfTfdUCftGMNtgPdYxce8vsHntKEHt4qYfNqjd9%2FKO6bTniOZuF%2FPhCVzooE3VGy0oHD%2Ffw4dJYJ1t2B%2BzCW8sidjSfJ%2BnPfBnhxJtTOGeRGP34ArIygJOiOOWsFQNnHNgqk1DdIiCIU01jzp6Zo1%2BhxcjMXkQLYIKgk%2BkM%2BXWTNiNc541QoQ%2BBaa2PRwLJ1YpiTgqAnDccXcjhSkm2YZJd8Hbab9IS1C6r8QW1wVKPhSkO28s7RuazbR8OTUEn3SEQzuLbARqbn894nqTYJ%2BMfUBpeLQ1GNMUfsmu5p0wACw1JiogeElvLaPTXeY9SBe5tHm7JzBhj0hnD6TfhCjbSUGAQfe5Tv0fe%2Fm7FPnhMoelNJF7PjmbFcYuHzuLqHWR7%2B3QOefcPUC%2FlWC6EVjiaJfaldt02KcnMlukW%2FcCuES7d%2F%2FDE2e0vEN3Yya6Nk7tdwsHayEotY6xbXzDoN3H2RZWFaJeLsllC6vQGzr%2BtfssC56LkNHaKMEK7ez9yMqz%2B77qCDG6Of%2Fwxkt6mZUi4Zk%2Fjya%2FFjG7GtbPLabFzOLQqYF%2BdXWw6%2FR%2FkoJ8uRN3jdwDglcH8pJl%2Bt8RvqsZqzwtJRS9Uds6dluUgxTEOBGL7xqWmZbX0jueeNGcHzC%2B6xxeWScwgpn2b%2FVMy%2Fw%2BRdT0oOeRmwHWdkZnHHmApfhTX5fwtBqG%2BXYqfalWBtoeoLm42uyiQExBCSZdjZ9%2F0Tnh8JdUFORubSOyx3SasfMrAA9cl%2BS1vT71OJNYw%2FrQCNBQq%2FSWNFNO5PzrurUkBGV8E12JjOTh7XZ48MGrynnoEqj2iNccMEHe9DN%2F0HkLCRWuCQ6ckCUoBizI6RTIFVZQuGqJx4%2FPwgL%2BZJTQ0eo8aGROe%2FqVeAYvvrtsrJANwVvq1OLSImSieA0xJjzePeU0A7A04ja3QEN%2BgkKFSMrMBmf3UM9%2BdrGxYMtiivJdbnwfTHToPB0cNpzxxdUxIpy%2BSlwQmZfPCKdUduukGfB8dTdu1w1lkXKI4UQJHfYfv9cQvil4PouXcwuMD5bnG3%2F2At5%2FNE%2BlPJi42QOgq9WQ90fA1pNDuDtD71mDhLFkOD7JfnvaT2S3hfnwBJCeQN8uwNB4XebJnF1o%2F4s12kNPTEvrmmPstSB8EwsehqHVECpSI1%2FSpf4leECkyhKP37MvumlfmigJV1rmiwjaC5ulfS8g4HhJNCPzVTmb%2BDyqic1VPCjqxfjElMxSwmlJHHxzrGFrPEI3dK2i5E4Sfo2FrVuxuZ1QRO9c9nQKWzGqOBrdejnNhOdXZPjrno8PEivMM7qs23VVICY2b3bg23m1xTA8FbfgWlFiwcH7hXB%2FqowADSTcq3WsBgd0FEBMymM4qmgJ%2B0tFKcoI1xs7iF2RykQE2%2FB%2FMSbrpOTl%2FBUpD87EqADsUm%2FZXtgpagBcSiHXZpVYFXcWiMQO5gn5HU2Pp9gLZOJZQBE4ObW8pIoTtMEv3POzETKvvWCRD5vUkxaV%2FKZQVy%2FJUTD%2BH4WcyXHhGOrXVleaoWPq4oEmY8FEjQtEgbJU6fJl1CgxpuJ341bqIzzRZfKECjWMGXlO9grirWlQen0ScMFXjc%2Bx38TQpJqtuvV2uMCRIUcoz9JRXo8Z%2FeuG9JpJf%2BRpKMDmQAqU%2B%2BE2difLzlGhUzCL6Ux93HT%2BHCe2cOHztZMY0DHha1YC4%2BWxpwiK8mTI60n0vaubcGB9tveKXRdjD8PCLvExA7YxthebEmDtnVnEcsZKI%2F%2FjYzj%2FABkHJHgZVNIpyGeyt%2F5D9%2Fy%2FOJQULtsU3Odu2m8sVRBuYPDXo%2BcTLiR%2FicN50G3W0%2B5oNgLZElDn6DGNodmdnOAI46eMEH0d%2Fx3GfsAtZ3SqjXDmYdNDHfV%2F2RDJ6BXvt1UPEyiqIY%2F2NsComE011lwfBh5qvkYjkbho5iwQqoAoiaqVlemhdaG%2BaCQaO9wpPSrIt4e5gTRiUaJCC3l7VpNV%2FDbl7rK27V1oLW1sv8%2BxYT5SfYq%2F6TXIbAzoShQhya9%2BYpCIrHf8PYL0ThqLTAKmmXuqOqdkqgdQMYKl3ERiPq057eaJDlsgfzmQzXUD52WgAA2SzYFdVDKDygrinOFQhRnTCO7kaGKnRPsJwvW%2BFvX8pnAVbePxoWBVW%2FdnfqCTFfyUtSLSzf1cqjTiN9qFBLS7qsla2gMqJTB3ABZplNpy%2BZWps6wXtNDmV2An4%2FSDtCk4uFbGwLju7nTxprzwvmzEQtf3fZ3%2BrRkdEcF8umw8%2BIyRTYEimDzmCgXZM6vhYjWvCItFGLD4ViLI7hWEGnHeBjp%2B9NYLImlP97kDItvkVWuq5wO8V6ja6uiy8I6ylP%2BIVqOP%2BxSzRdy%2FXfBs2j9%2BFqZqAKloLxpcjWFklcJ9n5AEGyEoW%2B5fLTcipuK0KJ6o%2FasULKWZCIvNo1v46DXOGnLlwExBJ7XGcBkfMPifmbOnr78gg%2FcLSIZ1Wx8bablzukeHSKBOmBs%2BIBmPFZnsZshOFWcKSGTxBSPiWWq7JdpsITz2O5bxT8OL%2FRD85d%2Ff6f5L8cRH5eSizyOIP1g00Ovt%2FfF9O7FbZr09XylBXlPA8oRmH7vbKOa5gYMGRH6wjJ%2BwyJO6Z98F%2BtpkVpLt%2FxYfxHcfErbhJZvDLiKazddxpFJkFYHuuxIXlIX%2F6Wsr7hq2Dvv2FDdbyu6Wi7OjwgciUCYLUVS0SNpMKGgBMcHlJEO1xHSSxSZLYakk74oiVdpzFm8fuXU1hP%2BrIWkVFhg5PPD7R7M0TJhK1VVtCj%2Bx0TvtNvs1xZjKPAAW2irobkcDe56mUmgLtVcTOEkyGiqpSh7oZ59Q%2BIftZHOId%2FKJTSduKCXY%2BSDO96q4PHTzYyngPy6nYrbfsf12QctfrI8fRXlRa7bXh9kYV%2B9H2HLHSulH%2BV2J7mCziz6%2FLhw9BCTDDW%2BIyHMilrMFNMohu1J%2Fv5cZ4NKBaMKHJ76igvMt8toTK4eSTmjJU6U2gb%2BOCRRvNJbi1IJkWVQUPjOXlOkwkBgRq1m%2Fsub9aAaqdJeSDGISquxhGPwKLu7ASLFqxohKoYdmXROQsGRdi8%2BSNeA%2BPPPvwZjmT81%2FI0g5OZD6Ice0mmOSo9853U%2B1uI51NMBQSWiTDiFNUmsfweW1i6goxXkrwSZdCmwTxkUuPmRdfIafvvKvZBdgpOhfQYIPiIJoP3vbWcBamJAG6cKG%2FQMAa5ACr6VXCo8qhfhd2SRvuC1q%2B9KTwzBiXt%2B66ONwBowWXgjdp3DcLC0PVCotAGJS2QhhMgigotDBnbogAGapeONkvhaYQxDgAH3p1%2FGglLKflKwXBgXpa7QksAtoqz%2FfxjXIMwZYF3C1HUCGnLF1GlW9B0GQcxTBXRx6%2BKSGEm3S1gWWBFkf9GeJoqMaIPJZZDHtaH0Wd%2BfMIwZjFS3nTw%2BMM25CI%2FnplQwQCvpxM4s6zoN2h0Ty3ljAbnbEacrWbVeWt%2Fj%2BOPyLe%2BdP9qqcJ4ccyzd14c0YjQu6oHyGqp%2BP59hieZzf24jtxKX0W4RtQolUvJwMu141ER2r3n8Ba7ppFBP9vS40nE%2FzK08PXwNLsto6A0lfjpQovTs2ohkGOA1O0pTtpfoMa1dhw1OY%2FyjuQ2pmNQ7V7geQY8eIeO8FMkEj7dOQSHJhbdV1EEoA4oeif0LMcy7pCH2POetF6ziNfJrK9QOsfKPqRMrWF4Qn9zoB4qQutgJG3gPGHr8scAzTfuEMvIjUlCKEYh9Vo9BDUrzUcULgLrGDPiJ1MofWqenHhvF6KUIIf%2FzrOUQ%2BM4EQhgIE4ICCs3SwPuB4RhTHlL6Pc%2BCDo54Zf%2B%2F5%2FfxLBMfXMm8nB8voKLk4huT80ErrOKYu827CCOFMTkOxLCwj1ZIIXodb7xrBSz4l62DTfo60%2BCA8bFiDVfaFmom25jk9VAB0Hc6LgHQ3hYMEVUOO68yAG8lUnblBwtKkO5kWxnz%2Fa7KIQQa%2Fzp1mq6oGIcK8nRBjIYeriAXZm6Mr0JmTtIO9bbP6C0mgkvoVj1sNR49stzLh01pt7%2FnJ9dTivuT7rtmekjlJUHCsMalIN7pJgs1dVNE7ywHg5PZccz9YuKFHorZ66aLB2ImI3imewbx4Ci8L3Q%2FjClLGSr1Z9SG387IOCGLFpUbiuV3%2BBrB3aw01v6mNJUUfUmmBRxH4y8wKi2TPI7zfoZMZ2DKyt0ma5OaVebtD%2B%2FnOcrLvK2FfloIFlm7MD8cl11Z7yNt7AUeclLm6tLhvYnf35a8%2BVWQL2SfvzA4IgBgNHSn6hJSF0DY8Jh0pXlNbUHc0YLhK%2FTBi7CdNfsk2TNvJtO9B7KBcITy%2BVdPsMFLT868Dc8IWEIma0ihsBp4fQtWHCQeuYlr9Kr%2FxsbFcaKCPgVgIQ4i6peuV5qxvWxZweVjelRwOT09LjhRMCPv7%2FjSBhUAf49VmCQxyTUOzouTytmW%2BLv6w8dtVBsRSkZneGSysVrtD6bTMazDqYRkuM2YGJg5nElp4jqTbZLXSOORiSyUQkvwFaQ49Js9sjTbk5kv3EP4LcqjBv2TXog%2FVgS1p9JdNrSaikcA1DMiqg29sTsIU2csJRxFeQKTPujaCS8AmrD0vOT480vKY%2FLfEctQjcdoyNQklkZBWSVeCZA4DVZwlsEPM2LnETMTCZ2n8Jm0FEUs0vZlrGNq%2FFIlaIY5KxPFeoz6EMkv0KP5Zj3n3b12ArtZzhvMM0GMKk2Yrf3Z8mTbO%2F9jXCkvhj6HzvVN9Ra4jHkpq4pEI3MfHF8Bp%2Bh5L1cq4nfSEpXGTAcjtiIZBOLGHgisDmWwmnozvO6u6%2FDfDQuI1lrkx0pvYebmk9GmdovIANYJAHuaQQklqPZhEWuB1ZmoC7YRuh6gvXErhWhLLiND75BO1QBhFaNsY1tdFSc1MAfsIBBOIGoPSpPBjIl9hOp25RSTtmxcziPsr4RYC0ZRdblNb4VoA1XeQM9zuu2kBPcAopznwwQb9qoD4MSrrL2zxB74y7x5xusE5i7F905XPgfUXDXb75sOfXPkC3XwcJhl%2Fri9rkBnGZr9IBlb4Y6fVPPy1pLQOpRTbl%2BTHPug4rlQTDY6gSIRgKeVBWHntYF5PiW3suzAQyk22o%2FDHpDSxx7P7LRNnGTs%2FhtsUHiMhw7a2mGfRKJc0T0OoPGPVosESgyzwcQOW6nrtpPejtUgqYjbJjwrX2W855iFtBuZ25KFTleL21C0kewH5yW2PkxslLVE5OIdqRac2m%2FxyI%2F%2FNrIYk7GGnSpSiFxF4NIoHUrHvb7SxO7acURj6QQ%2FvN%2BGzLmudmQ8NGIQ%2FBnsk4xZA9H0TYhDPXVfihY%2Buq5s%2F%2FgmKDCgYUUDw0zVUWXnPA0uVs9QS288Qw%2F2iNqSwiz3X4D189lXSrqYGuCOSGmYyi%2BciSbHxjLQI8ZcDvu8Igt3ShAKTXsLKWGr4Szua%2FmjI1ltASUlkJAozMdEJ1huthsQdK%2FR8o8WBk%2FrqHoTMXk89hGJvs7Z68nUSImBa77rBBhPcodtqaTQy0qldEmutAqpKiWko8FjK6WNd7Vlg%3D&__COMPRESSEDVIEWSTATE=H4sIAAAAAAAEAL2ae5BU1ZnAQzPNwOA4agLRTTkc5REtZnru%2ByHiLgyliwIhDJjkr6k73Xd6rtNzu733NjD5Y0uzmIemwKQSKbNGJSghrm58B%2BILgQijKEHY5eFqkIeAb5AwLIrZ7zvnfPNiEEKVKaDnN%2Bc75zvf%2BV7ndjd%2FG1JzcSpd29zcWAyTqFiI5%2Fg3l4PIn12Mk6letv0Gv7O5eXQqfWk2KSjKuGypbaYXhDjZD5NxhZYknB35879APMtfmKRrBxXn58%2Fx43IhiWuunviV84YOGzVkxLTA6yiGuenTKr828SsnhsDLkNQP9vzX5RwefP33AlZtlXDvNgnbCdaveUzASwT33%2FmkgAfWPivgRYKD6yScfOg5AXd%2B%2FIKAdT9%2FUcDhZ9YL2PrBBgFvEBwgOEJwlOCWDyUsIribYONhCV0EWwl2EhwkOERwlODuNRulE9ZKeJbgyXUSniJ4ZFGXgCVLXxVw%2FOQWAZ8RHDu2VUA3wS3dEn5CsLgHnvpvAb8guIvgPoJb39ku4KcHJPyMYCXBfoL7frxDwKN3vyHgaYIugu4P3pEJ8KGEY8sOCNiwXMLbBAcJ3nyARAT3PCjh6XUfCtjcA1uOCPjRH44K%2BOMqCR%2BsPCbgid9JWEPQRbB3%2FwkZi22fyU33nxTw3pLP5eRnJRw58LOxws%2F%2F%2Fh8CNj92v4C7bl8u4M6fStiy%2FrcCdhK8T3CcYNGfJPyQ4FGCLoJXCV4j2Eawg%2BBNgrcIDhG8R3CS4MGXJDxCsIZgE8EOgl0EizZI%2BDXBMoLfEKwkeJjgMYLHCZ4jeIFgC8EbJySs2L1SwFOvPybgz7ueFLDv3qelzSslLHlWwsMEWwmW%2F2m1gKMbXhTwGcFJghUbJTxC8ATB4t0SnvlorYDXb18v4H8IthPsINhJsOeFbQLWr94u4OVVOwU8f%2F%2F%2FylUEuwjeJOhaJuFlglcItr30poANGyV0r%2FmLDFPXbgEfL3pHhmmVhNcIlj7%2FrsyNt94T8NLewwI%2BeeGIgNVrJGzqOio3feWYdHhXt4B73jgu4F6CtYtvHSc0775NwO1vS%2Fg1waYf%2FFjAoaM%2FEfCLTxcLuJtgx4ElAk488HMBXff9UsBrb90rtzhxn4Dntt8v4IHdywTsJth0%2B3IBv7xDwqf%2FKeGOTyS8snqFgP975HcCPiP4nKD7zw8JOPruwwL2vidhH8HGj38v4Nirjws4TrD0%2BWcE3HLbiwIe%2F6GEjT%2BS8D7BgYNrBfz283UC%2FrhkvYCXCf5KcIygm%2BAkwZJNmwSsumOzdMuhrdJ1B3dKez7eJeDWTyRs27xHwF8e3SvnLN8n4J5dhwQs3%2F%2B%2BgC0rPpJu2dEt4ODbx%2BVxCI4QdBN8SnCS4Ik9EnYT7CN4l%2BAjgk8I%2Fkqw%2BKSE%2Fas%2BFbBi9d%2BkGYdvHS9CsGWRgLc33yZgxUNLBBxedpeANXuXClhH0L1v6fjhqSG5mvQIVTVsRbVctWb0ebUj5%2FjZYpRrLJbDJHXitsraqtle3p9RTKbn4vTLF9qaYrm67dQBOLptuAIc1xLgukJkKKYJAKo1wyDAOaoJ%2FxA017BcTQAMCXAcXK4rjuLqCIZrqzhHtxXDxb1Ai2ugZsNRDMuWYNOIQyPcDABTUSRwPRwsCbqc7FoOgSvBJnCEZlWRegBUCUKhqyq6LkDXFAJDgGH0ANfjuraJm5qWbbk4YhmWzp3AAQ2zbEezNAJdgk0jjkqAk21FsxQCbg8HQ4KGy21DtXQJNtfDwRbg8HMhWCoHS1HRMNu1dUshsCRwb7gORNeWYKJm1zUVbjOAZqsSXFuArhgCDE0lMCU4INIhNxTdkYBH1lVH1V2YrGuqYpuuAJfP0cB4xZVgE6APERyMjq6rpmKgHt0wTfSqrluG6vIR8DtfpdtgGJgBA5qKmak7hq6gf3RXV1y%2BKUSLnwtBR%2FcakGEKhkCAK0BVHAmYABx0jcCQYFsCNEUlMAlIRFvwAuGg0WSNRBhKAbTcpBFXgk5b6GSPTvbohkEgt9Adabyh6gQ2AYk0g4BGyAyDDsgzXAAtt%2FiICSXIJ1uQa7ippuoWJpIB6c3rHbQ6rstFrqIZCgfNNlUJjhxxVHS4jmHC5Qb8xfzhgAkgQBdg6lJkGiqBzcE2HT4ZYqyjyISW5BoEDoErgBeIAJxsO4aNeYg%2BVfimjmWKEVeF9LMkcIdzMAhsAbx9CbAIuAgU8iQB0PlJXctUVdzUxSCDQlPBRirAsTD9EGzcwoQW4zo6gmXyk5rQU%2BDMCLaloccQdNwdklnR0HXgJNjLQgBn8DnQ27kZAuBcJnoDWwqUkmpjg0VwVEcCnsu0IIR8lWVCVwCbTQwvN5UDzkEhtgLwra1yhdA%2BTGxEFjRVsAgB69xF0DXX5CJYg%2F0ZwdQ4wE1hSdAxuACWqfNVjmlh4cPOkCgmArgIGxGCiqEUgHupkABY5tAmoRY1ASr2HwEGAuQc31TXLAvjJQBHDLzmULNpib6BoJmKAEMh0HGV6WoaJptlqZD9NgfdxN7CAf2MYGkqgUagE6CpEEOd%2B8d2dX4pWI6tOFggFlxeCtfsOpbO%2FQNgY3MAb0NuKQga3L42AnRcPDJeujpWHPZ3F7s6b7XoVUh6x8STQtJb%2FIACLAkOjaATOLgqgS5ANaRIdTUCuVxTNAI5R1NVArHcNfHegWjBrYkjYA4kE4ClmSYeGbwA3QVXWXRSyChewrDYNfCagN8MsTsHUwCmeu3Ia4MoTuYUF8wqd6TTmChK7SUzvDiZ5c0P8l5SDMLromK5BOIWP0oNr724v3BGELZL2ZDakSj7jhfjJ0u50anWmprRqdoLpoRJ0FqM8n7UObfY7odXXPndps448Tsy15WDXB3riOFZqxC01LEb%2FSgOiuFkI6PgnzrWWC4k5cifHPrlJPIKdWx2uaUQZG%2FwhabJLbbtmVkTPKobPlxF46DHG7lWXal3sy1eveFrSr2Tdc16R%2FNUHW7brJbzwLLUkJrc6HGpFLxWtNbgQApsragd3hjHjQUvjtNz5nilWX4ytZwkxZBNLXjZdsHzGs%2F1t9qK5suapqZS3DPgmIq54CY%2Fx21Bi8CAMZVfxsZjhvdsOmYEbDh0wLH%2FMbv%2Bw4%2BZ5k5ui%2FzW9L80FLww3%2BCH9eW4Qezc0OR7UbatQX7QmfHi0sJ%2FFmNNfoxpOH3aZBV6O17ibi41DNVWkabvt9Vnw3PUVCk0TenV1Jaco6rh%2FYzKl%2BuDczVqRD9NN3n1N5XOUVNVP01%2BXO9F56jpPN4%2FKm8M4qCl4LflcqlqUaXTO%2BDd2LyokFb%2FrYEzD6pXKkbUmUBXQ1PQUSoErYGfa2wLQj%2F2M6UwP2ZkHvSczzWPlJO5quFkJIgvQvGYkbjjVyFrh0HwewbGcaxO621JUoqvamiAxpTzM5FXCv0kky12NARhzl%2BYaUs6CmMbOuBc3L4gbCkuhOVGr6avSUqNIvg6h%2FzoCigTsG9EEIZ%2BhIrSNrs6Lnkhy2Jzmnw5nbaxWChGl1%2FjXN2A0mtY6C9gU8IQ3rZm%2FQ4%2FTOIcVDjoPD%2BtfaECTe2rYV4pB06BtRfzksV2kcJ2cUGqAl7Pb5UlfFGcFOZ6LU1%2Bwc9CH8ObgJdgrqfIR4kZs4rJIJOw9QwDR05Ax4enyQ4wJ%2BtHSTxZPZO6oVLdZV%2Bkbvq0OWfWVFEj7y5UN4bUwY%2BFDXMx1g05v9UDnVzlmZSlpZ5LB5g1s7OvYWfSgs2nNs1jlx4mJvJeCl6uOd3KqjQbsKf4ITzx3SScrGLq9bsKhn05nbm2%2BlthYyGAhITXbHta5186Nff%2F0qm5nG1JwilZrN24Gb%2Bgauazr0jagvjKSf26e7pSzut7rXxJxkPwhow93e6ja8SIeS3UXI6pqllnmArLiS%2FL4joWtxUXBGGeRSLaDJ%2BwVFbP8FMIPddb8sP4EVKiPQ2VWlO2KlNICi6RArsp%2BL5%2FFVPq4bEwoygsm2QmMRxj%2BSjIxVexSWxWkSWRD3Wc67FmEgMV%2FyRVRE1Q%2FiCc2nkVY%2BMxU9jVQUeexVF28jczmQb4K1vr9CwctWFKFBUXzCtl8kHrN1nDNYyNa2hM%2Fr4lsPs36CwyZvJcY6UXeJthUkLnJ28MNSytvzsqe3FEnzTgCyEZzqN6wA%2FvZCWNHDBPG1NJouoBIr1XVDNAZPSKLhwgMntFXx0gsnpFowaI7F7R1weInF7RJQNEbq%2FoG%2F1FjtIrurTXS2P6phJcbK3k9x6X%2F2ro9BDyJWTQnvxovs%2BmemE7K0Y5eDRnXqHA4EneD%2FJwkZSjyA%2BznaytWODCpMgmjMXPcSZB8OdD02amMp4VW1nS5gcRa%2FHgeSDr83lRueT7LAihKrLtBbgimZfA%2B4FSgsKs%2BLqblQrlMM9LB2dnSPkcPwvNggWwe1yCLMNHA5YvwoYh3njME6UJ2rOFcs6HLUAbDsJZEm8hfzRgHtRqyQ%2B9QhL4UKRSNTwvQE3gLDATZuXhZHwqFRD%2FBZ4siq2tzF%2BYDWJfTM6wb5UTPCrZLn0o9faxLiwuYKVijMcC9wbFMvijDcsUTy63YR1e1O4nrBDcDO%2BPgqQzMyFsiUu8elN0F4t%2BjRHbPBRvJa6xANq9mOV8r4ARAQdP9Qv5oNzBDedGgcHtPisUYfpMr5NNg38LfB%2FeS%2BWqq%2BZ7We6eDLuuWMyxf8VJN%2BDLTf4CvxB1shj0gvpyhLtBWDH2Qc7rrGO5CPwbspZOFqFXgrC6KinCvDhhMTgazcuw2TA7boOeU4oCzIQ48SB4dWxBkLQxFZsYE%2B2byf9sgCb7C6urrpgzZfb0PYt%2BcyVrLYCr4FxTQEUhw%2BY18ZPJ5zuMtRcUwLPwjpO7G12Nkc%2Bw6%2FEIfsTmwrSmclBdNaMM9l77PU1RHVgHxpd9NlHVxmMgxhmONbMOzCy2Bgmb6Npi1JqZkU6ciRcpaBfnqa7yF2LmxGyiI2ZqU%2BsYvGvOtzGRUyAxhUTN2FNBSxx5foGp3%2B7RwaSKTCaTy%2FU%2BcqX481vtyObLpkOBiO8jKkefz2%2B9qlaZATUYSQsuFbeO4XnkExiKLqUHPbgdwjxUShPcaT6bUuZVIp%2FC%2BNul3j47iLqKs1U3tK9dF6AiBy876xTDRvdomglxGcSi9AWz4FH0e8WonU1g08otXtDHxME0V5xRc%2FoU49zBjTtbr6Uv7GOjiOlAI93BjTzjDpV9bR2FmnR8bLi%2BDLP0UwyeMAPK%2FkY%2FD6%2F4acvNkMvXy5qdwL7jJZCsTfAg0sfy6p4VdWzWjX2sPu1eFX%2F3XiP6%2BZurQ73GKeZXX994A%2BtRezZWDqat4nTaRva14yKxUsG4nOrIc6mXwTWedaSrB7FOB12a8iXl5eB7nK29%2Fw9edTghlyYAAA%3D%3D&__VIEWSTATEENCRYPTED=&__ASYNCPOST=true&',$con);
			
			///分页
		echo	$con['__EVENTTARGET']= 'ctl00$cphMainContent$lbntNavigate'.$page;

			$con['ctl00$ScriptManager1']=  'ctl00$cphMainContent$udpMain|ctl00$cphMainContent$lbntNavigate'.$page;
			 
			//print_r($con);
			$this->snoopy->setcookies();
			$this->snoopy->submit($url,$con ); 
			return ($this->snoopy->results);
	}

    function rap_Details($id='80893826'){//详情页

        $this->snoopy->host='classic.rapnet.com';
        $URL='https://classic.rapnet.com/Rapnet/Search/ExpandFullDetails.aspx?DiamondID='.trim($id);
		unset($this->snoopy->lastredirectaddr);
        $this->snoopy->rawheaders["COOKIE"]=$this->COOKIE;
        $this->snoopy->setcookies();
        $this->snoopy->fetch($URL);
		return ($this->snoopy->results);
    }


	function  analy_Details($html,$type=0){//分析搜索钻石
	 	//
		phpQuery::newDocumentHTML($html); 
		$menu_a = pq("#ucDiamond_lnkReport" )->text() ;    //偶数行 数据

		$data['StockNumber']=trim(pq('.ShrinkToFitContainer:first')->text( ));//库存
		
		////详情页 左边框数据 
		$ShrinkToFitContainer=pq('.tblDiamondInfo  .CellValue');
		/// print($ShrinkToFitContainer);
		 foreach($ShrinkToFitContainer as  $k=>$a){
			$tdata[]=trim(pq($a)->text( ));
		  
		 }///print_r($tdata);
		 if(!strrpos( $tdata[0],'-')){//形状
			 $data['shape']=trim($tdata[0]);
		 }else{
			$data['shape']='';
		 } 
		 if(strrpos( $tdata[1],'-')!==0){//报告日期
			 $data['reportdate']=date('Y-m-d',strtotime($tdata[1]));
		 }else{
			$data['reportdate']='';
		 }
		 if(!strrpos( $tdata[2],'-')){// 尺寸
			 $data['size']=$tdata[2];
		 }else{
			$data['size']='';
		 }
		 if(strrpos( $tdata[3],'-')!==0){// 测量 长度-宽度x深度
			 $tmpMeas=explode ('-', $tdata[3]);
			 if($tmpMeas[1]){
				 $data['MeasLength']=$tmpMeas[0];
				 $tmpMeas=explode ('x', $tmpMeas[1]);
				 $data['MeasWidth']=$tmpMeas[0];$data['MeasDepth']=$tmpMeas[1];
			 }else{///长度x宽度x深度
				 $tmpMeas=explode ('x', $tmpMeas[0]);
				 $data['MeasLength']=$tmpMeas[0];$data['MeasWidth']=$tmpMeas[1];$data['MeasDepth']=$tmpMeas[2];
			 
			 }
		 } else{
			$data['MeasLength']=$data['MeasWidth']=$data['MeasDepth']='';
		 }
		 
		 if(strrpos( $tdata[4],'-')!==0){// 颜色
			 if($type==0){//白色数据字典:
				 $zscolordirct=$this->datadirct['color'];
			 }else{//精美数据字典
				 $zscolordirct=$this->datadirct['Fancycolor'];
			 }
			 $zscolor_arr=explode(' ',trim($tdata[4]));
			 $zscolor=array_pop($zscolor_arr);

			 $data['color']= array_search($zscolor, $zscolordirct);

			 $data['Intensity']= array_search( implode(' ',$zscolor_arr) ,$this->datadirct['Intensity']);
		 } else{
			$data['color']=$data['Intensity']='';
		 }
		 if(strrpos( $tdata[5],'-')!==0){// 底面
			 $data['CuletSize']=array_search( trim($tdata[5]) ,$this->datadirct['CuletSize']); 
		 }else{
			$data['CuletSize']='';
		 }
		 
		 if(strrpos( $tdata[6],'-')!==0){// 净度
	 
			 $clarity=trim($tdata[6]);
			 if(strpos( $tdata[6],'(')){
				$clarity=trim(substr($tdata[6] ,0, strpos( $clarity,'(')  )) ;
			 }
			 $data['clarity']= array_search( $clarity,$this->datadirct['clarity']);  
		 }else{
			$data['clarity']='';
		 }
		 
		 if(strrpos( $tdata[7],'-')!==0){// 腰围
			 $tmpl7=explode(',',$tdata[7]);

			  $tmpl7=explode('-',$tmpl7[0]);
				  

			 $data['Girdle']=array_search( trim($tmpl7[0]) ,$this->datadirct['Girdle']);   
		 }else{
			$data['Girdle']='';
		 }
		 if(strrpos( $tdata[8],'-')!==0){//  切口
			 $data['cut']=array_search( trim($tdata[8]),$this->datadirct['Cut_symmetry_Polish']);    
		 }else{
			$data['cut']='';
		 }
		 if(strrpos( $tdata[9],'-')!==0){//  顶点
			 $data['top']=trim($tdata[9]);
		 }else{
			$data['top']='';
		 }
		 if(strrpos( $tdata[10],'-')!==0){//  抛光
			 $data['polish']=array_search( trim($tdata[10]),$this->datadirct['Cut_symmetry_Polish']);   
		 }else{
			$data['polish']='';
		 }
		 if(strrpos( $tdata[11],'-')!==0){//  展位
			 $data['stand']=$tdata[11];
		 }else{
			$data['stand']='';
		 }
		 if(strrpos( $tdata[12],'-')!==0){//   对称
			 $data['symmetry']=array_search( trim($tdata[12]),$this->datadirct['Cut_symmetry_Polish']);    
		 }else{
			$data['symmetry']='';
		 } 
		 if(strrpos( $tdata[13],'-')!==0){//   处理
			 $data['Treatments']=array_search( trim($tdata[13]),$this->datadirct['Treatments']);   
		 }else{
			$data['Treatments']='';
		 }
		 if(strrpos( $tdata[14],'-')!==0){//   荧光
			 $data['FluorescenceIntensity']=array_search( trim($tdata[14]),$this->datadirct['FluorescenceIntensity']);   
		 }else{
			$data['FluorescenceIntensity']='';
		 }
		 if(strrpos( $tdata[15],'-')!==0){//   标题
			 $data['title']=trim($tdata[15]);
		 }else{
			$data['title']='';
		 }
		 if(strrpos( $tdata[16],'-')!==0){//   深度 
			 $data['depth']=floatval($tdata[16]);
		 }else{
			$data['depth']='';
		 }
		 if(strrpos( $tdata[17],'-')!==0){//   比率
			 $data['Ratio']=$tdata[17];
		 }else{
			$data['Ratio']='';
		 }
			///var_dump(strrpos( $tdata[18],'-'));
		 if(strrpos( $tdata[18],'-')!==0){// 台面  (前台显示 表 )
			 $data['table']=floatval($tdata[18]);
		 }else{
			$data['table']='';
		 }
		 if(strrpos( $tdata[19],'-')!==0){//    星型刻面长
			 $data['Starshape']=$tdata[19];
		 }else{
			$data['Starshape']='';
		 }
		 if(strrpos( $tdata[21],'-')!==0){//    认证评论 
			 $data['Review']=$tdata[21];
		 }else{
			$data['Review']='';
		 }
		 if(strrpos( $tdata[22],'-')!==0){//   主要特征
			 $data['features']=$tdata[22];
		 }else{
			$data['features']='';
		 }

		 if(strrpos( $tdata[17],'-')!==0){//   比率
			 $data['Ratio']=$tdata[17];
		 }else{
			$data['Ratio']='';
		 }


		 echo trim(substr($tdata[6] ,0, strpos( $tdata[6],'('))) ;print_r($data );
exit;
		 ///////////////////

		//////////多店铺/////////////
		 ///////详情页 右边框数据 left
		$RightSideContainer=pq('.RightSideContainer');
		foreach($RightSideContainer as $f=>$RapInfoBox)
		{
			$rldata=$prodata=[];//$prodata导入商铺价格表数据
		//print_r($RapInfoBox);
			 foreach(pq($RapInfoBox)->find('.CellValue') as  $k=>$r){ 
				$rldata[]=trim(pq($r)->text( ));
			  
			 }
			 $Sellerinfo['id']=$prodata['Seller']= trim(pq($RapInfoBox)->find('.CompanyName')->text( ));//卖方
			 $Sellerinfo['name']=trim($rldata[4]);

			 preg_match_all("/[\d-x]+/",trim($rldata[7]), $out ); //联系方式
			 $Sellerinfo['connect']=implode(' ',$out[0]);
			  print_r($Sellerinfo);

			  $user = D('shops'); 
				// 模型对象赋值
				 
			  $user ->insert($Sellerinfo,true);
			 ///////////////////////////////////////////////

			 foreach(pq($RapInfoBox)->find('.MelbourneRegularSmallHeader') as $pk=>$prices){//价格
				 
				 if($pk==0){//$/Ct
					 $data['PriceCt']=trim(str_replace(array('$',','),'',pq($prices)->text( )));
				 }
				 if($pk==2){//总计
					 $data['PriceTotal']=trim(str_replace(array('$',','),'',pq($prices)->text( )));
				 }if($pk==1){//Rap%
					 $data['RapPercent']=round (floatval(trim(pq($prices)->text( ))),2);
				 }
			 
			 }

			 
			 //print_r($rldata);
			 if(strrpos( $rldata[0],'-')!==0){//  批号 LotNumber
				 $data['LotNumber']=$rldata[0];
			 }

			 if(strrpos( $rldata[1],'-')!==0){//    可用性
				 $data['Usability']=$rldata[1];
			 }
			 if(strrpos( $rldata[2],'-')!==0){//    区域位置 
				 $tmpl=explode(',',$rldata[2]);
				 foreach($tmpl as $k=>$v){
					 $tmpl[$k]=trim($v);
				 }
				 $tmplo=implode('","',$tmpl);   

				 $Locationssql=D('locations');
				 $Locations='';
				 
				 $sqlloc=$Locationssql->where('name','exp','in ("'.$tmplo.'") ' )->select(); 
				 if(is_array($sqlloc)){
					 $sqloc=[];
					 foreach($sqlloc as $l){
						 $sqloc[]=$l['id'];
					 }
					 $Locations=implode(',',$sqloc);
				 }
				 ///print_r($sql);print_r($Locationssql->getLastSql());
				 $data['Locations']=$Locations;
			 }
			 if(strrpos( $rldata[3],'-')!==0){//    Escrow 
				 $data['Escrow']=$rldata[3];
			 }

			 if(strrpos( $rldata[8],'-')!==0){//     品牌 
				 $data['Brand']=$rldata[8];
			 }
			 if(strrpos( $rldata[11],'-')!==0){//    updatetime 
				 $data['updatetime']=date('Y-d-m H:i:s',strtotime($rldata[11]));
			 }
			 if(strrpos( $rldata[12],'-')!==0){//    Inclusions 
				 $data['Inclusions']=$rldata[12];
			 }
			 if(strrpos( $rldata[13],'-')!==0){//     会员评论  
				 $data['comments']=$rldata[13];
			 }
			 if(strrpos( $rldata[3],'-')!==0){//    Escrow 
				 $data['Escrow']=$rldata[3];
			 }

			 print_r($data);
			 break;//如果需要其他几个商铺价格 break 去掉
		}
		return $data;

		
	}
 
}

?>