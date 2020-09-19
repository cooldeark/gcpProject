<!DOCTYPE html>
<html>
    <head>
        <!-- Standard Meta -->
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <!-- Standard Meta end-->

        <!-- import library -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <script type="text/javascript" src="{{URL::asset('js/importJS/jquery-3.3.1.min.js')}}"></script>

        {{--這裡的dataTable是去下載跟semantic有關係的dataTable，所以dataTable畫面比較好看--}}
        <script type="text/javascript" src="{{URL::asset('js/importJS/dataTable/datatables.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/importJS/semantic/semantic.min.js')}}"></script>

        {{--自己設計的js--}}
        <script type="text/javascript" src="{{URL::asset('js/importJS/main.js')}}"></script>

        {{--css 用 link--}}
        <link rel="stylesheet" type="text/css" href="{{URL::asset('js/importJS/semantic/semantic.min.css')}}"/>
        <link rel="stylesheet" href="{{ URL::asset('css/JLoading.css') }}">
        <!-- import library end-->

    <style>
        body{
            background-color:#d4d4d5;
        }
    </style>
    </head>
    <body>
        <div class="row">
        <table id="zone_tbl" class="ui celled table">{{--這裡的css為semantic的css--}}
            <thead>
                <tr>
                    <th>版位號碼</th>
                    <th>版位類別</th>
                    <th>版位名稱</th>
                </tr>
            </thead>
            <tfoot>

            </tfoot>
        </table>
    </div>

        <script>
            //預設dataTable進行process的時候顯示的字，這裡把它拿掉，就不會顯示東西了，但是會顯示白條
            $.extend($.fn.dataTable.defaults, {
                language: {
                    "processing": "請稍等"
                },

            });
            

            $('#zone_tbl').DataTable({
            "language": {
                "info": "第 _PAGE_ / _PAGES_ 頁",
                "paginate": {
                    "previous": "<",
                    "next": ">",
                },
                "search": "搜尋:",
                "lengthMenu": "一次顯示: _MENU_",
            },
            "columnDefs": [
                {
                "targets": [2],//target這個參數是指定陣列裡面的欄位要做什麼事情，下面的orderable的意思是說，地2筆欄位不能做排列
                "orderable": false
                },
                { "width": "5%", "targets": 0 },
                { "width": "5%", "targets": 1 },
                { "width": "15%", "targets": 2 },
                // { "width": "15%", "targets": 3 },
                // { "width": "15%", "targets": 4 },
                // { "width": "10%", "targets": 5 },
                // { "width": "10%", "targets": 6 },
                // { "width": "5%", "targets": 7 },
                // { "width": "5%", "targets": 8 },
            ],
            "order": [//order 必須跟下面的drawCallback做呼應，如果沒有drawCallBack 這個order好像不會起作用
                [0, "desc"]
            ],
            "destroy": true,
            "colReorder": true,
            // "processing": true,//設定為true，如果你再跑資料或是切換table顯示他會跑出一條字串提示
            "serverSide": true,
            responsive: true,
            "autoWidth": false,
            // fixedHeader: true,//如果他為true會讓除了設置每頁10筆以外，下面多跑出一條header
            sDom: 'lrtip',
            // "searching": false,
            "ajax": "{{url('/dataTableGetData')}}",

            "columns": [

            {
                    "mData": "id",
                    // "mRender": function (data, type, row) {
                        
                    //     return `
                    //         <a target="_blank" href="{{ url('/test/DrawRelation/zone/${data}') }}" class="ui mini basic">
                    //             ${data}</a>
                    //         `;
                    // },
                },
                {
                        "data":"type",
                        "className": "center",
                },
                {
                        "data":"name",
                        "className": "center",
                },
                /*
                {
                    "mData": "name",
                    "mRender": function (data) {
                        var charge_mode, profit, default_ad, lazy_loadin,is_adult;

                        if (data.charge_mode == '0') {
                            charge_mode = '百分比:';
                            profit = data.profit+'%';
                        } else if (data.charge_mode == '1') {
                            charge_mode = 'CPM:';
                            profit = data.fix_profit;
                        } else if (data.charge_mode == '2') {
                            charge_mode = 'CPC:';
                            profit = data.fix_profit;
                        } else if (data.charge_mode == '3') {
                            charge_mode = 'CPV:';
                            profit = data.fix_profit;
                        }

                        if (data.default_ad == '0') {
                            default_ad = '';
                        } else if (data.default_ad == '1') {
                            default_ad = '墊';
                        }

                        if (data.lazy_loading == '0') {
                            lazy_loading = '';
                        } else if (data.lazy_loading == '1') {
                            lazy_loading = 'Lazy';
                        }

                        if(data.is_adult == '0'){
                            is_adult = '';
                        }else if(data.is_adult == '1'){
                            is_adult = '成人';
                        }

                        return `
                        <h3 class="name_header">${data.name}</h3>
                        <div class="sm_chmode">
                            <span class="dfad">${default_ad}</span> <span class="lz">${lazy_loading}</span> <span class="chargemd">${charge_mode}${profit}</span>
                            <span class="adu">${is_adult}</span>
                        </div>
                        `
                    }
                },
                {
                    "mData": "site_name",
                    "mRender": function (data) {
                        return `
                            <a target='_blank' style='color: black;' href="{{url('/site/Managment/index')}}?supplier=${data.supplier}">${data.site_name}</a>
                        `
                    }
                },
         
                {
                    "data": "size_name"
                },
                {
                    "data": "type_name"
                },
                {
                    "mData": "status",
                    "mRender": function (data) {
                        if (data.status == '0') {
                            return `<a class="ui red mini label z" data-z="${data.id}" data-zto="1">{{ __('Zone.Managment.index.status.0') }}</a>`;
                        } else {
                            return `<a class="ui green mini label z" data-z="${data.id}" data-zto="0">{{ __('Zone.Managment.index.status.1') }}</a>`;
                        }
                    }
                },

                {
                    "mData": "getCode",
                    "mRender": function (data) {
                        if (data.type == '2') {
                            return `<a href="https://cdn.holmesmind.com/sdk/index.html" target="_blank" class="ui mini basic button">{{ __('Zone.GetCode.header')}}</a>`;
                        } else {
                            return `<a data-route="{{ url('/zone/getCode/${data.id}/${data.size}') }}" class="ui mini basic button ajax-sidebar-form">{{ __('Zone.GetCode.header')}}</a>`;
                        }
                    }
                },
                {
                    "mData": "id",
                    "mRender": function (data, type, row) {
                        return `<div class="ui dropdown updata mini basic button" style="padding-right: 1em;padding-left: 1em;">
                                            @lang('Supplier.Managment.index.action')
                                            <i class="dropdown icon"></i>
                                            <div class="left menu">
                                                <a data-route="{{ url('/zone/Managment/update/${data}') }}" class="item ajax-sidebar-form">
                                                    {{ __('Supplier.Managment.index.update') }} </a>

                                            </div>
                                        </div>`;
                    }
                }
                */

            ],
            //drawCallBack是你點選TH做排序的時候，他後面會執行的function
            drawCallback: function (settings, json) {
                removeJLoading();
                // $(".updata.button").dropdown();
                // eventAjaxSidebarForm();
                // $('#loading').removeClass("active");
                // changeStatus();


            }
        });


        //處理loading畫面，當你點下下一頁或上一頁她會需要進行時間所以這個是讓他在跑的時候顯示的東東
        var Table = $('#zone_tbl').on('processing.dt', function (e, settings, processing) {
            if (processing) {
                Jloading();
                console.log('in process');
            } else {
                removeJLoading();
                console.log('end process');
            }
        }).DataTable();
        //處理loading畫面end

        var table = $('#zone_tbl').DataTable();
        
        //dataTable欄位裡面的搜尋欄位
         var tt = '';
        var thtemp = `
                <th></th>
            `;

        for (var x = 0; x < $('#zone_tbl thead tr th').length; x++) {
            tt += thtemp;
        }
        // console.log($('#zone_tbl thead tr th').length);//這裡長度是3
        
        $('<tr role="row">' + tt + '</tr>').appendTo('#zone_tbl thead');

        $('#zone_tbl thead tr:eq(1) th').each(function (i) {

            switch (i) {
                case 0:
                var title = $(this).text();
                    var temp = `
                        <div class="ui fluid input" style="height: 3vmin; max-height: 3vmin;">
                            <input type="text" >
                        </div>`;

                    break;


                //case 1是下拉選單    
                case 1:

                var temp = `
                            <select class="ui fluid dt_select" style="height: 3vmin; max-height: 3vmin;">
                                    <option></option>

                                @foreach($dataTableTypeList as $k => $v)
                                <option value="{{$k}}">{{$v}}</option>
                                @endforeach
                            </select>
                        `;
                    break;
                case 2:
                var title = $(this).text();
                    var temp = `
                        <div class="ui fluid input" style="height: 3vmin; max-height: 3vmin;">
                            <input type="text" >
                        </div>`;

                    break;
                default:
                    var temp = `
                        <div class="ui fluid input" style="height: 3vmin; max-height: 3vmin;">
                        </div>`;
                    break;
            }

            $(this).html(temp);

            //一般資料輸入去找尋的地方 start
            $('input', this).on('change', function () {
                
                table.search(JSON.stringify({
                    'col': i,
                    'val': this.value,
                })).draw();

            });
            //一般資料輸入去找尋的地方 end

            $('.dt_select', this).on('change', function () {
                table.search(JSON.stringify({
                    'col': i,
                    'val': this.value
                })).draw();

            });

        });


        $('#filterSizeTypeSelect').dropdown({
            
            toggleSubMenusOn: 'click',
            apiSettings:{
                url:'{{url("/dataTableGetTypeList")}}',
                cache: false,
                saveRemoteData: false,
                data: {
                    "qu": ""
                },
                   //打API前先把搜尋框的值塞進去
                beforeSend: function (settings) {
                
                    var searchBox_value = $($(`#filterSizeTypeSelect> input.search`)[0]).val();
                    if (searchBox_value == '') {
                        settings.data.qu = null;
                    } else {
                        settings.data.qu = searchBox_value;
                    }
                    
                    return settings;
                },
                onSuccess: function (response) {
                console.log('success');
                var data = response.result;
                var td_arr = [];
      
                    $.each(data, function (k, v) {
                        
                        td_arr.push(
                            `<div class="item" data-value="${k}">${v}</div>`
                        );
                    })
                    document.getElementById(`filterSizeTypeValue`).innerHTML = td_arr.join('');
                    $(this).dropdown('show');
                },
                localSearch: false,
                debug: false,
                showOnFocus: true,
            }
        });

        </script>
    </body>
</html>