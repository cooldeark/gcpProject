(function(){"object"!==typeof window.bbkkbbk&&(window.bbkkbbk=function(){function D(a){f("In setMethods : "+a+"\n Type : "+typeof a+"\n Length : "+a.length,"info");var b=a.shift();var c=r[0];c[b]?c[b].apply(c,a):f("Not Default Method : "+b,"info")}function G(a){var b=E.getAsyncTrackers()[0].getAppliedMethods||{},c,d;f("In applyMethods : "+a+"\n Type : "+typeof a+"\n Length : "+a.length,"info");for(c=0;c<H.length;c++){var m=H[c];b[m]=1;for(d=0;d<a.length;d++)a[d]&&a[d][0]&&(m===a[d][0]&&(D(a[d]),delete a[d],
    1<b[m]&&f("The method "+m+" is registered","warning")),b[m]++)}E.getAsyncTrackers()[0].setAppliedMethods=b;return a}function I(a){function b(a){if(""==l)return f("No have Site ID, init fail !","error"),!1;var b=JSON.stringify(w.getUrlInfo())+l;f("Is same ? "+(k==b)+"\n new page info "+b+" and old page info "+k,"info");if(k==b)return f("This page has send pageview","error"),!1;x=[];y=0;k=b;b=[];b.push("cftuid="+v);b.push("cf_p="+z);b.push("sid="+l);J(["en=pageview"],b,a,p)}function c(a){v=a?a:q("_uid")?
    q("_uid"):v?v:S()}function d(a){z=a?a:q("_P")?q("_P"):""}function m(){navigator.cookieEnabled&&(q("_test",1),q("_test")?(n=!0,f("can use cookie","info"),q("_test",null)):(n=!1,f("can't use cookie","info")));q("_uid")&&(n=!0);return n}function h(a,b,c){var u=JSON.stringify(w.getUrlInfo())+l;if(k!==u)return f("This page hasn't send pageview","error"),!1;u=[];var d={},A={items:!0},t,m;for(t in a)a[t]&&a.hasOwnProperty(t)&&(b.hasOwnProperty(t)?d[b[t]]=a[t]:A.hasOwnProperty(t)||(d[t]=a[t]));for(m in d)u=
    u.concat([m+"="+d[m]]);a=[];a.push("cftuid="+v);a.push("cf_p="+z);a.push("sid="+l);f("The track string is "+u.join("&"),"info");J(u,a,c,p)}var l=a||"",p="https://pikachu.holmesmind.com/pixel.png",A={},v="",z="",n=!1,k="",x=[],y=0;this.setAppliedMethods=function(a){A=a};this.getAppliedMethods=function(){return A};this.getSiteId=function(){return l};this.setSiteId=function(u){a:{for(var p=0;p<r.length;p++)if(r[p].getSiteId===a){f("site id is registered","error");break a}l=u;c();d();f("cft_uid="+v+"cf_p="+
    z,"debug");b(void 0)}};this.getTPUid=function(){return z};this.setEnableCookie=function(a,b){if(m())return c(a),q("_uid",v,{domain:K(w.getHostName()),maxage:7776E3,path:"/"}),("function"==typeof b?b:L)(),!0;f("Cookie is not Enable","info");return!1};this.setTPCookie=function(){if(m()){if(d(),null==q("_P")){var a=g.createElement("iframe");a.setAttribute("style","display:none");a.setAttribute("height","0");a.setAttribute("width","0");a.src="js/getP.htm";window.addEventListener("message",function T(a){var b=
    a.data;"https://www.yangminglin.tk/"===a.origin&&b.constructor===Object&&"/js/getP.htm"===b.pathname&&(window.removeEventListener("message",T),d(b.cf_P),q("_P",b.cf_P,{domain:K(w.getHostName()),maxage:7776E3,path:"/"}))});g.getElementsByTagName("script")[0].appendChild(a)}}else return f("Cookie is not Enable","info"),!1};this.getEnabeCoookie=function(){return n};this.setEnabeCoookie=this.setEnableCookie;this.setServer=function(a){p=a};this.getServer=function(){return p};this.setDebug=function(){M=
    !0};this.setViewPercentage=function(a,b){a=void 0===a?[30,60,90]:a;F.addEventListener("scroll",function(){if(N()>y){y=N();for(var c=0;c<a.length;c++)y>a[c]&&-1==x.indexOf(a[c])&&(x.push(a[c]),h({name:"viewPercentage",action:"view",value:x[x.length-1]},O.general,b));f("current "+y,"debug")}})};this.pageview=function(a){b(a)};this.send=function(a,b,c){if(""==l)return f("No have Site ID, init fail !","error"),!1;if(void 0===a||""==a)return!1;a=a.toLowerCase();if("pageview"==a)return!1;b=b||{};b.name=
    a;"action"in b&&""!=b.action&&(f("ready to send : "+JSON.stringify(b),"debug"),h(b,O.general,c))};this.addTracker=function(a){if(!a)return f("site id is Undefind","error"),!1;for(var b=0;b<r.length;b++)if(r[b].getSiteId===a)return f("site id is registered","error"),!1;a=new I(a);r.push(a);return a}}function U(){return function(){var a;f("Your arguments : "+[].slice.call(arguments),"debug");(a=G([].slice.call(arguments)))&&D(a)}}function P(a){a=new I(a);var b=[];"undefined"!==typeof cft&&"undefined"!==
    typeof cft.q&&(b=cft.q);r.push(a);B=G(b);window.cft=new U;for(b=0;b<B.length;b++)B[b]&&D(B[b]);return a}var E,B=[],H="addTracker setTrackerUrl setDebug setEnabeCoookie setEnableCookie setTPCookie setSiteId".split(" "),M=!1,r=[],F=window,C=navigator||F.navigator,g=document||F.document,n=function(){var a={extend:function(a,b){var c={},d;for(d in a)c[d]=b[d]&&0===b[d].length%2?b[d].concat(a[d]):a[d];return c},has:function(a,b){return"string"===typeof a?-1!==b.toLowerCase().indexOf(a.toLowerCase()):!1},
    lowerize:function(a){return a.toLowerCase()},major:function(a){return"string"===typeof a?a.replace(/[^\d\.]/g,"").split(".")[0]:void 0},trim:function(a){return a.replace(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g,"")}},b=function(a,b){for(var c=0,d,p,f,k,m,l;c<b.length&&!m;){var g=b[c],h=b[c+1];for(d=p=0;d<g.length&&!m;)if(m=g[d++].exec(a))for(f=0;f<h.length;f++)l=m[++p],k=h[f],"object"===typeof k&&0<k.length?2==k.length?this[k[0]]="function"==typeof k[1]?k[1].call(this,l):k[1]:3==k.length?this[k[0]]="function"!==
    typeof k[1]||k[1].exec&&k[1].test?l?l.replace(k[1],k[2]):void 0:l?k[1].call(this,l,k[2]):void 0:4==k.length&&(this[k[0]]=l?k[3].call(this,l.replace(k[1],k[2])):void 0):this[k]=l?l:void 0;c+=2}},c=function(b,c){for(var d in c)if("object"===typeof c[d]&&0<c[d].length)for(var f=0;f<c[d].length;f++){if(a.has(c[d][f],b))return"?"===d?void 0:d}else if(a.has(c[d],b))return"?"===d?void 0:d;return b},d={ME:"4.90","NT 3.11":"NT3.51","NT 4.0":"NT4.0",2E3:"NT 5.0",XP:["NT 5.1","NT 5.2"],Vista:"NT 6.0",7:"NT 6.1",
    8:"NT 6.2","8.1":"NT 6.3",10:["NT 6.4","NT 10.0"],RT:"ARM"},m={browser:[[/(opera\smini)\/([\w\.-]+)/i,/(opera\s[mobiletab]+).+version\/([\w\.-]+)/i,/(opera).+version\/([\w\.]+)/i,/(opera)[\/\s]+([\w\.]+)/i],["name","version"],[/(opios)[\/\s]+([\w\.]+)/i],[["name","Opera Mini"],"version"],[/\s(opr)\/([\w\.]+)/i],[["name","Opera"],"version"],[/(kindle)\/([\w\.]+)/i,/(lunascape|maxthon|netfront|jasmine|blazer)[\/\s]?([\w\.]+)*/i,/(avant\s|iemobile|slim|baidu)(?:browser)?[\/\s]?([\w\.]*)/i,/(?:ms|\()(ie)\s([\w\.]+)/i,
    /(rekonq)\/([\w\.]+)*/i,/(chromium|flock|rockmelt|midori|epiphany|silk|skyfire|ovibrowser|bolt|iron|vivaldi|iridium|phantomjs|bowser|quark)\/([\w\.-]+)/i],["name","version"],[/(trident).+rv[:\s]([\w\.]+).+like\sgecko/i],[["name","IE"],"version"],[/(edge)\/((\d+)?[\w\.]+)/i],["name","version"],[/(yabrowser)\/([\w\.]+)/i],[["name","Yandex"],"version"],[/(puffin)\/([\w\.]+)/i],[["name","Puffin"],"version"],[/((?:[\s\/])uc?\s?browser|(?:juc.+)ucweb)[\/\s]?([\w\.]+)/i],[["name","UCBrowser"],"version"],
    [/(comodo_dragon)\/([\w\.]+)/i],[["name",/_/g," "],"version"],[/(micromessenger)\/([\w\.]+)/i],[["name","WeChat"],"version"],[/(QQ)\/([\d\.]+)/i],["name","version"],[/(Line)\/([\d\.]+)/i],["name","version"],[/m?(qqbrowser)[\/\s]?([\w\.]+)/i],["name","version"],[/xiaomi\/miuibrowser\/([\w\.]+)/i],["version",["name","MIUI Browser"]],[/;fbav\/([\w\.]+);/i],["version",["name","Facebook"]],[/headlesschrome(?:\/([\w\.]+)|\s)/i],["version",["name","Chrome Headless"]],[/\swv\).+(chrome)\/([\w\.]+)/i],[["name",
    /(.+)/,"$1 WebView"],"version"],[/((?:oculus|samsung)browser)\/([\w\.]+)/i],[["name",/(.+(?:g|us))(.+)/,"$1 $2"],"version"],[/android.+version\/([\w\.]+)\s+(?:mobile\s?safari|safari)*/i],["version",["name","Android Browser"]],[/(chrome|omniweb|arora|[tizenoka]{5}\s?browser)\/v?([\w\.]+)/i],["name","version"],[/(dolfin)\/([\w\.]+)/i],[["name","Dolphin"],"version"],[/((?:android.+)crmo|crios)\/([\w\.]+)/i],[["name","Chrome"],"version"],[/(coast)\/([\w\.]+)/i],[["name","Opera Coast"],"version"],[/fxios\/([\w\.-]+)/i],
    ["version",["name","Firefox"]],[/version\/([\w\.]+).+?mobile\/\w+\s(safari)/i],["version",["name","Mobile Safari"]],[/version\/([\w\.]+).+?(mobile\s?safari|safari)/i],["version","name"],[/webkit.+?(gsa)\/([\w\.]+).+?(mobile\s?safari|safari)(\/[\w\.]+)/i],[["name","GSA"],"version"],[/webkit.+?(mobile\s?safari|safari)(\/[\w\.]+)/i],["name",["version",c,{"1.0":"/8","1.2":"/1","1.3":"/3","2.0":"/412","2.0.2":"/416","2.0.3":"/417","2.0.4":"/419","?":"/"}]],[/(konqueror)\/([\w\.]+)/i,/(webkit|khtml)\/([\w\.]+)/i],
    ["name","version"],[/(navigator|netscape)\/([\w\.-]+)/i],[["name","Netscape"],"version"],[/(swiftfox)/i,/(icedragon|iceweasel|camino|chimera|fennec|maemo\sbrowser|minimo|conkeror)[\/\s]?([\w\.\+]+)/i,/(firefox|seamonkey|k-meleon|icecat|iceape|firebird|phoenix|palemoon|basilisk|waterfox)\/([\w\.-]+)$/i,/(mozilla)\/([\w\.]+).+rv:.+gecko\/\d+/i,/(polaris|lynx|dillo|icab|doris|amaya|w3m|netsurf|sleipnir)[\/\s]?([\w\.]+)/i,/(links)\s\(([\w\.]+)/i,/(gobrowser)\/?([\w\.]+)*/i,/(ice\s?browser)\/v?([\w\._]+)/i,
    /(mosaic)[\/\s]([\w\.]+)/i],["name","version"]],cpu:[[/(?:(amd|x(?:(?:86|64)[_-])?|wow|win)64)[;\)]/i],[["architecture","amd64"]],[/(ia32(?=;))/i],[["architecture",a.lowerize]],[/((?:i[346]|x)86)[;\)]/i],[["architecture","ia32"]],[/windows\s(ce|mobile);\sppc;/i],[["architecture","arm"]],[/((?:ppc|powerpc)(?:64)?)(?:\smac|;|\))/i],[["architecture",/ower/,"",a.lowerize]],[/(sun4\w)[;\)]/i],[["architecture","sparc"]],[/((?:avr32|ia64(?=;))|68k(?=\))|arm(?:64|(?=v\d+;))|(?=atmel\s)avr|(?:irix|mips|sparc)(?:64)?(?=;)|pa-risc)/i],
    [["architecture",a.lowerize]]],device:[[/\((ipad|playbook);[\w\s\);-]+(rim|apple)/i],["model","vendor",["type","tablet"]],[/applecoremedia\/[\w\.]+ \((ipad)/],["model",["vendor","Apple"],["type","tablet"]],[/(apple\s{0,1}tv)/i],[["model","Apple TV"],["vendor","Apple"]],[/(archos)\s(gamepad2?)/i,/(hp).+(touchpad)/i,/(hp).+(tablet)/i,/(kindle)\/([\w\.]+)/i,/\s(nook)[\w\s]+build\/(\w+)/i,/(dell)\s(strea[kpr\s\d]*[\dko])/i],["vendor","model",["type","tablet"]],[/(kf[A-z]+)\sbuild\/[\w\.]+.*silk\//i],
    ["model",["vendor","Amazon"],["type","tablet"]],[/(sd|kf)[0349hijorstuw]+\sbuild\/[\w\.]+.*silk\//i],[["model",c,{"Fire Phone":["SD","KF"]}],["vendor","Amazon"],["type","mobile"]],[/\((ip[honed|\s\w*]+);.+(apple)/i],["model","vendor",["type","mobile"]],[/\((ip[honed|\s\w*]+);/i],["model",["vendor","Apple"],["type","mobile"]],[/(blackberry)[\s-]?(\w+)/i,/(blackberry|benq|palm(?=\-)|sonyericsson|acer|asus|dell|meizu|motorola|polytron)[\s_-]?([\w-]+)*/i,/(hp)\s([\w\s]+\w)/i,/(asus)-?(\w+)/i],["vendor",
    "model",["type","mobile"]],[/\(bb10;\s(\w+)/i],["model",["vendor","BlackBerry"],["type","mobile"]],[/android.+(transfo[prime\s]{4,10}\s\w+|eeepc|slider\s\w+|nexus 7|padfone)/i],["model",["vendor","Asus"],["type","tablet"]],[/(sony)\s(tablet\s[ps])\sbuild\//i,/(sony)?(?:sgp.+)\sbuild\//i],[["vendor","Sony"],["model","Xperia Tablet"],["type","tablet"]],[/android.+\s([c-g]\d{4}|so[-l]\w+)\sbuild\//i],["model",["vendor","Sony"],["type","mobile"]],[/\s(ouya)\s/i,/(nintendo)\s([wids3u]+)/i],["vendor","model",
    ["type","console"]],[/android.+;\s(shield)\sbuild/i],["model",["vendor","Nvidia"],["type","console"]],[/(playstation\s[34portablevi]+)/i],["model",["vendor","Sony"],["type","console"]],[/(sprint\s(\w+))/i],[["vendor",c,{HTC:"APA",Sprint:"Sprint"}],["model",c,{"Evo Shift 4G":"7373KT"}],["type","mobile"]],[/(lenovo)\s?(S(?:5000|6000)+(?:[-][\w+]))/i],["vendor","model",["type","tablet"]],[/(htc)[;_\s-]+([\w\s]+(?=\))|\w+)*/i,/(zte)-(\w+)*/i,/(alcatel|geeksphone|lenovo|nexian|panasonic|(?=;\s)sony)[_\s-]?([\w-]+)*/i],
    ["vendor",["model",/_/g," "],["type","mobile"]],[/(nexus\s9)/i],["model",["vendor","HTC"],["type","tablet"]],[/d\/huawei([\w\s-]+)[;\)]/i,/(nexus\s6p)/i],["model",["vendor","Huawei"],["type","mobile"]],[/(microsoft);\s(lumia[\s\w]+)/i],["vendor","model",["type","mobile"]],[/[\s\(;](xbox(?:\sone)?)[\s\);]/i],["model",["vendor","Microsoft"],["type","console"]],[/(kin\.[onetw]{3})/i],[["model",/\./g," "],["vendor","Microsoft"],["type","mobile"]],[/\s(milestone|droid(?:[2-4x]|\s(?:bionic|x2|pro|razr))?(:?\s4g)?)[\w\s]+build\//i,
    /mot[\s-]?(\w+)*/i,/(XT\d{3,4}) build\//i,/(nexus\s6)/i],["model",["vendor","Motorola"],["type","mobile"]],[/android.+\s(mz60\d|xoom[\s2]{0,2})\sbuild\//i],["model",["vendor","Motorola"],["type","tablet"]],[/hbbtv\/\d+\.\d+\.\d+\s+\([\w\s]*;\s*(\w[^;]*);([^;]*)/i],[["vendor",a.trim],["model",a.trim],["type","smarttv"]],[/hbbtv.+maple;(\d+)/i],[["model",/^/,"SmartTV"],["vendor","Samsung"],["type","smarttv"]],[/\(dtv[\);].+(aquos)/i],["model",["vendor","Sharp"],["type","smarttv"]],[/android.+((sch-i[89]0\d|shw-m380s|gt-p\d{4}|gt-n\d+|sgh-t8[56]9|nexus 10))/i,
    /((SM-T\w+))/i],[["vendor","Samsung"],"model",["type","tablet"]],[/smart-tv.+(samsung)/i],["vendor",["type","smarttv"],"model"],[/((s[cgp]h-\w+|gt-\w+|galaxy\snexus|sm-\w[\w\d]+))/i,/(sam[sung]*)[\s-]*(\w+-?[\w-]*)*/i,/sec-((sgh\w+))/i],[["vendor","Samsung"],"model",["type","mobile"]],[/sie-(\w+)*/i],["model",["vendor","Siemens"],["type","mobile"]],[/(maemo|nokia).*(n900|lumia\s\d+)/i,/(nokia)[\s_-]?([\w-]+)*/i],[["vendor","Nokia"],"model",["type","mobile"]],[/android\s3\.[\s\w;-]{10}(a\d{3})/i],
    ["model",["vendor","Acer"],["type","tablet"]],[/android.+([vl]k\-?\d{3})\s+build/i],["model",["vendor","LG"],["type","tablet"]],[/android\s3\.[\s\w;-]{10}(lg?)-([06cv9]{3,4})/i],[["vendor","LG"],"model",["type","tablet"]],[/(lg) netcast\.tv/i],["vendor","model",["type","smarttv"]],[/(nexus\s[45])/i,/lg[e;\s\/-]+(\w+)*/i,/android.+lg(\-?[\d\w]+)\s+build/i],["model",["vendor","LG"],["type","mobile"]],[/android.+(ideatab[a-z0-9\-\s]+)/i],["model",["vendor","Lenovo"],["type","tablet"]],[/linux;.+((jolla));/i],
    ["vendor","model",["type","mobile"]],[/((pebble))app\/[\d\.]+\s/i],["vendor","model",["type","wearable"]],[/android.+;\s(oppo)\s?([\w\s]+)\sbuild/i],["vendor","model",["type","mobile"]],[/crkey/i],[["model","Chromecast"],["vendor","Google"]],[/android.+;\s(glass)\s\d/i],["model",["vendor","Google"],["type","wearable"]],[/android.+;\s(pixel c)\s/i],["model",["vendor","Google"],["type","tablet"]],[/android.+;\s(pixel xl|pixel)\s/i],["model",["vendor","Google"],["type","mobile"]],[/android.+(\w+)\s+build\/hm\1/i,
    /android.+(hm[\s\-_]*note?[\s_]*(?:\d\w)?)\s+build/i,/android.+(mi[\s\-_]*(?:one|one[\s_]plus|note lte)?[\s_]*(?:\d\w?)?[\s_]*(?:plus)?)\s+build/i,/android.+(redmi[\s\-_]*(?:note)?(?:[\s_]*[\w\s]+)?)\s+build/i],[["model",/_/g," "],["vendor","Xiaomi"],["type","mobile"]],[/android.+(mi[\s\-_]*(?:pad)(?:[\s_]*[\w\s]+)?)\s+build/i],[["model",/_/g," "],["vendor","Xiaomi"],["type","tablet"]],[/android.+;\s(m[1-5]\snote)\sbuild/i],["model",["vendor","Meizu"],["type","tablet"]],[/android.+a000(1)\s+build/i,
    /android.+oneplus\s(a\d{4})\s+build/i],["model",["vendor","OnePlus"],["type","mobile"]],[/android.+[;\/]\s*(RCT[\d\w]+)\s+build/i],["model",["vendor","RCA"],["type","tablet"]],[/android.+[;\/]\s*(Venue[\d\s]*)\s+build/i],["model",["vendor","Dell"],["type","tablet"]],[/android.+[;\/]\s*(Q[T|M][\d\w]+)\s+build/i],["model",["vendor","Verizon"],["type","tablet"]],[/android.+[;\/]\s+(Barnes[&\s]+Noble\s+|BN[RT])(V?.*)\s+build/i],[["vendor","Barnes & Noble"],"model",["type","tablet"]],[/android.+[;\/]\s+(TM\d{3}.*\b)\s+build/i],
    ["model",["vendor","NuVision"],["type","tablet"]],[/android.+[;\/]\s*(zte)?.+(k\d{2})\s+build/i],[["vendor","ZTE"],"model",["type","tablet"]],[/android.+[;\/]\s*(gen\d{3})\s+build.*49h/i],["model",["vendor","Swiss"],["type","mobile"]],[/android.+[;\/]\s*(zur\d{3})\s+build/i],["model",["vendor","Swiss"],["type","tablet"]],[/android.+[;\/]\s*((Zeki)?TB.*\b)\s+build/i],["model",["vendor","Zeki"],["type","tablet"]],[/(android).+[;\/]\s+([YR]\d{2}x?.*)\s+build/i,/android.+[;\/]\s+(Dragon[\-\s]+Touch\s+|DT)(.+)\s+build/i],
    [["vendor","Dragon Touch"],"model",["type","tablet"]],[/android.+[;\/]\s*(NS-?.+)\s+build/i],["model",["vendor","Insignia"],["type","tablet"]],[/android.+[;\/]\s*((NX|Next)-?.+)\s+build/i],["model",["vendor","NextBook"],["type","tablet"]],[/android.+[;\/]\s*(Xtreme_?)?(V(1[045]|2[015]|30|40|60|7[05]|90))\s+build/i],[["vendor","Voice"],"model",["type","mobile"]],[/android.+[;\/]\s*(LVTEL\-?)?(V1[12])\s+build/i],[["vendor","LvTel"],"model",["type","mobile"]],[/android.+[;\/]\s*(V(100MD|700NA|7011|917G).*\b)\s+build/i],
    ["model",["vendor","Envizen"],["type","tablet"]],[/android.+[;\/]\s*(Le[\s\-]+Pan)[\s\-]+(.*\b)\s+build/i],["vendor","model",["type","tablet"]],[/android.+[;\/]\s*(Trio[\s\-]*.*)\s+build/i],["model",["vendor","MachSpeed"],["type","tablet"]],[/android.+[;\/]\s*(Trinity)[\-\s]*(T\d{3})\s+build/i],["vendor","model",["type","tablet"]],[/android.+[;\/]\s*TU_(1491)\s+build/i],["model",["vendor","Rotor"],["type","tablet"]],[/android.+(KS(.+))\s+build/i],["model",["vendor","Amazon"],["type","tablet"]],[/android.+(Gigaset)[\s\-]+(Q.+)\s+build/i],
    ["vendor","model",["type","tablet"]],[/\s(tablet|tab)[;\/]/i,/\s(mobile)(?:[;\/]|\ssafari)/i],[["type",a.lowerize],"vendor","model"],[/(android.+)[;\/].+build/i],["model",["vendor","Generic"]]],engine:[[/windows.+\sedge\/([\w\.]+)/i],["version",["name","EdgeHTML"]],[/(presto)\/([\w\.]+)/i,/(webkit|trident|netfront|netsurf|amaya|lynx|w3m)\/([\w\.]+)/i,/(khtml|tasman|links)[\/\s]\(?([\w\.]+)/i,/(icab)[\/\s]([23]\.[\d\.]+)/i],["name","version"],[/rv:([\w\.]+).*(gecko)/i],["version","name"]],os:[[/microsoft\s(windows)\s(vista|xp)/i],
    ["name","version"],[/(windows)\snt\s6\.2;\s(arm)/i,/(windows\sphone(?:\sos)*)[\s\/]?([\d\.\s]+\w)*/i,/(windows\smobile|windows)[\s\/]?([ntce\d\.\s]+\w)/i],["name",["version",c,d]],[/(win(?=3|9|n)|win\s9x\s)([nt\d\.]+)/i],[["name","Windows"],["version",c,d]],[/\((bb)(10);/i],[["name","BlackBerry"],"version"],[/(blackberry)\w*\/?([\w\.]+)*/i,/(tizen)[\/\s]([\w\.]+)/i,/(android|webos|palm\sos|qnx|bada|rim\stablet\sos|meego|contiki)[\/\s-]?([\w\.]+)*/i,/linux;.+(sailfish);/i],["name","version"],[/(symbian\s?os|symbos|s60(?=;))[\/\s-]?([\w\.]+)*/i],
    [["name","Symbian"],"version"],[/\((series40);/i],["name"],[/mozilla.+\(mobile;.+gecko.+firefox/i],[["name","Firefox OS"],"version"],[/(nintendo|playstation)\s([wids34portablevu]+)/i,/(mint)[\/\s\(]?(\w+)*/i,/(mageia|vectorlinux)[;\s]/i,/(joli|[kxln]?ubuntu|debian|[open]*suse|gentoo|(?=\s)arch|slackware|fedora|mandriva|centos|pclinuxos|redhat|zenwalk|linpus)[\/\s-]?(?!chrom)([\w\.-]+)*/i,/(hurd|linux)\s?([\w\.]+)*/i,/(gnu)\s?([\w\.]+)*/i],["name","version"],[/(cros)\s[\w]+\s([\w\.]+\w)/i],[["name",
    "Chromium OS"],"version"],[/(sunos)\s?([\w\.]+\d)*/i],[["name","Solaris"],"version"],[/\s([frentopc-]{0,4}bsd|dragonfly)\s?([\w\.]+)*/i],["name","version"],[/(haiku)\s(\w+)/i],["name","version"],[/cfnetwork\/.+darwin/i,/ip[honead]+(?:.*os\s([\w]+)\slike\smac|;\sopera)/i],[["version",/_/g,"."],["name","iOS"]],[/(mac\sos\sx)\s?([\w\s\.]+\w)*/i,/(macintosh|mac(?=_powerpc)\s)/i],[["name","Mac OS"],["version",/_/g,"."]],[/((?:open)?solaris)[\/\s-]?([\w\.]+)*/i,/(aix)\s((\d)(?=\.|\)|\s)[\w\.]*)*/i,/(plan\s9|minix|beos|os\/2|amigaos|morphos|risc\sos|openvms)/i,
    /(unix)\s?([\w\.]+)*/i],["name","version"]]},f=function(c,d){"object"===typeof c&&(d=c,c=void 0);if(!(this instanceof f))return(new f(c,d)).getResult();var g=c||(window&&window.navigator&&window.navigator.userAgent?window.navigator.userAgent:""),h=d?a.extend(m,d):m;this.getBrowser=function(){var c={name:"",version:""};b.call(c,g,h.browser);c.major=a.major(c.version);return c};this.getCPU=function(){var a={architecture:""};b.call(a,g,h.cpu);return a};this.getDevice=function(){var a={vendor:"",model:"",
    type:""};b.call(a,g,h.device);return a};this.getEngine=function(){var a={name:"",version:""};b.call(a,g,h.engine);return a};this.getOS=function(){var a={name:"",version:""};b.call(a,g,h.os);return a};this.getResult=function(){return{ua:this.getUA(),browser:this.getBrowser(),engine:this.getEngine(),os:this.getOS(),device:this.getDevice(),cpu:this.getCPU()}};this.getUA=function(){return g};this.setUA=function(a){g=a;return this};return this};return f(C.userAgent)},L=function(){},K=function(a){var b=
    a.split(".")[0];return"www"===b||"cdn"===b||"pikachu"===b?a.substring(3):a},h=function(a,b){if("undefined"==b||""==b)return a;var c=b;b=encodeURIComponent instanceof Function?encodeURIComponent(c).replace(/\(/g,"%28").replace(/\)/g,"%29").replace(/\//g,"%2F").replace("%%","%25%"):c;return a+b},V=function(a){function b(a){var b=(a.hostname||"").split(":")[0].toLowerCase(),c=(a.protocol||"").toLowerCase();c=1*a.port||("http:"==c?80:"https:"==c?443:"");a=a.pathname||"";0==a.indexOf("/")||(a="/"+a);return[b,
    ""+c,a]}var c=g.createElement("a");c.href=g.location.href;var d=(c.protocol||"").toLowerCase(),f=b(c),h=c.search||"",l=d+"//"+f[0]+(f[1]?":"+f[1]:"");0==a.indexOf("//")?a=d+a:0==a.indexOf("/")?a=l+a:a&&0!=a.indexOf("?")?0>a.split("/")[0].indexOf(":")&&(a=l+f[2].substring(0,f[2].lastIndexOf("/"))+"/"+a):a=l+f[2]+(a||h);c.href=a;d=b(c);return{protocol:(c.protocol||"").toLowerCase(),host:d[0],port:d[1],path:d[2],query:c.search||"",url:a||""}},f=function(a,b){if(M||"error"==b.toLowerCase()){b=b||"black";
    switch(b.toLowerCase()){case "success":b="Green";break;case "info":b="DodgerBlue";break;case "error":b="Red";break;case "warning":b="Orange";break;case "debug":b="Orange"}"object"===a&&(a=JSON.stringify(a));console.trace("%c"+a,"color:"+b)}},W={getScreen:function(){return screen?[screen.width,screen.height,screen.colorDepth].join("x"):"Unknown"},getUserAgent:function(){return n().ua},getBrowserName:function(){return n().browser.name||"Unknown"},getBrowserVersion:function(){return n().browser.major},
    getPlatformName:function(){return n().os.name||"Unknown"},getPlatformVersion:function(){return n().os.version},getDeviceVendor:function(){return n().device.vendor},getDeviceModel:function(){return n().device.model},getDeviceType:function(){return n().device.type||(/window|mac|chromium/i.test(n().os.name)?"PC":"Unknown")},getTimezone:function(){return(new Date).getTimezoneOffset()/-60},getTouchEvent:function(){var a="0";try{if(g.createEvent("TouchEvent")){a="1";try{null!=C.maxTouchPoints&&(a=C.maxTouchPoints.toString())}catch(b){}}return a}catch(b){return"0"}},
    getInfo:function(){return[h("sc=",this.getScreen()),h("bn=",this.getBrowserName()),h("bv=",this.getBrowserVersion()),h("pn=",this.getPlatformName()),h("pv=",this.getPlatformVersion()),h("dv=",this.getDeviceVendor()),h("dm=",this.getDeviceModel()),h("dt=",this.getDeviceType()),h("tz=",this.getTimezone()),h("tu=",this.getTouchEvent())]}},w={getEncoding:function(){return g.characterSet||g.charset||"Unknown"},getLanguage:function(){return C.language.toLowerCase()||"Unknown"},getTitle:function(){return g.title||
    "Unknown"},isInIframe:function(){return window!=top?"Y":"N"},getPreviousUrl:function(){return g.referrer},getUri:function(){return V(g.location.href)},getHostName:function(){return this.getUri().host},getPath:function(){return this.getUri().path},getQuery:function(){return this.getUri().query},getUrlInfo:function(){return{protocol:this.getUri().protocol,host:this.getUri().host,port:this.getUri().port,path:this.getUri().path,query:this.getUri().query}},getUTM:function(){for(var a=this.getUri().query.split(/[?&#]+/),
    b=[],c=0;c<a.length;++c)if(0==a[c].indexOf("utm_id=")||0==a[c].indexOf("utm_campaign=")||0==a[c].indexOf("utm_source=")||0==a[c].indexOf("utm_medium=")||0==a[c].indexOf("utm_term=")||0==a[c].indexOf("utm_content=")||0==a[c].indexOf("gclid=")||0==a[c].indexOf("dclid=")||0==a[c].indexOf("gclsrc=")){var d=a[c].split("=");b.push(h(d[0]+"=",d[1]))}return 0<b.length?b.join("&"):""},getInfo:function(){return[h("de=",this.getEncoding()),h("ul=",this.getLanguage()),h("if=",this.isInIframe()),h("tt=",this.getTitle()),
    h("rf=",this.getPreviousUrl()),h("uh=",this.getHostName()),h("up=",this.getPath()+this.getQuery()),this.getUTM()]}},Q=function(){return W.getInfo().concat(w.getInfo())},O={general:{name:"en",action:"ea",label:"el",category:"ec",value:"ev"},ecItem:{id:"ti",sku:"ic",name:"in",category:"iv",price:"ip",quantity:"iq"},ecommerce:{id:"ti",affiliation:"ta",revenue:"tr",tax:"tx",shipping:"ts",item:[]}},X=function(a){var b=g.createElement("img");b.width=1;b.height=1;b.src=a+"&z="+Math.round(4251684561*Math.random())+
    "&t="+(new Date).toISOString().replace(/-|:|\./g,"").substring(0,15);f("Send img tracker url : "+b.src,"success");return b},R=function(a,b,c){var d=X(a+"?"+b),f="function"==typeof c?c:L;d.onload=d.onerror=function(){d.onload=null;d.onerror=null;f()}},Y=function(a,b,c){b=b.split(/[?&#]/);for(e=0;e<b.length;++e)500<b[e].length&&(b[e]=b[e].substring(0,500));return R(a,b.join("&"),c)},J=function(a,b,c,d){void 0===d&&(d="https://pikachu.holmesmind.com/pixel.png");a=a.concat(b).concat(Q());a=a.filter(function(a){return a}).join("&");
    2036<=b.length?R(d,a,c):Y(d,a,c)},q=function(a,b,c){a="_cft"+a;if("undefined"==typeof b)return(new RegExp(";?"+a+"=([^;]*);?")).test(g.cookie)?RegExp.$1:null;null===b&&(b="",c=c||{},c.maxage=-1);a=a+"="+b;c&&(c.path&&(a+="; path="+c.path),c.maxage&&(a+="; max-age="+c.maxage),c.domain&&(a+="; domain="+c.domain),c.secure&&(a+="; secure"));g.cookie=a},S=function(){function a(){return Math.floor(65536*(1+Math.random())).toString(16).substring(1)}return a()+a()+"-"+a()+"-"+a()+"-"+a()+"-"+a()+a()+a()},
    N=function(){var a=Math.max(g.documentElement.clientHeight,g.documentElement.scrollHeight,g.documentElement.offsetHeight,g.body.scrollHeight,g.body.offsetHeight);return Math.round(100*((window.pageYOffset||g.documentElement.scrollTop||g.body.scrollTop)/a+Math.max(g.documentElement.clientHeight,window.innerHeight)/a))};return E={initialized:!1,getAsyncTrackers:function(){return r},getTracker:function(a){f("creatTrackekr","success");return P},addTracker:function(a){return r.length?r[0].addTracker(a):
    P(a)},getTrackerSt:function(){return Q.join("&")},getUAParser:function(){return n()}}}());bbkkbbk.addTracker();bbkkbbk.initialized=!0})();cft("setEnabeCoookie");cft("setTPCookie");